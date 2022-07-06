<?php

namespace App\Http\Controllers\Auctioneer;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function tawaran(Produk $produk)
    {
        return view('auctioneer.produk.tawaran', compact('produk'));
    }

    public function finalisasi(Produk $produk)
    {
        if (!$produk->selesai()) {
            return back()->withErrors(['error' => 'Auction has not ended yet']);
        }

        $produk->menangkan();

        return back()->with('success', 'A winner has been set');
    }

    public function tambah(Request $request)
    {
        $action = 'add';

        $produk = new Produk();
        $this->data($request, $produk);

        return view('auctioneer.produk.form', compact('action', 'produk'));
    }

    public function simpanTambah(Request $request)
    {
        $this->validasi($request);

        $produk = new Produk();
        $produk->id = (string)Str::uuid();
        $this->data($request, $produk);

        if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
            $produk->gambar = $request->file('gambar')->store('produk');
        }

        $produk->save();

        return redirect()->route('auctioneer.produk.semua')->with('success', 'Product created successfully');
    }

    public function semua()
    {
        $listProduk = Produk::orderBy('nama')->get();

        return view('auctioneer.produk.semua', compact('listProduk'));
    }

    public function edit(Request $request, Produk $produk)
    {
        $action = 'edit';

        $this->data($request, $produk);

        return view('auctioneer.produk.form', compact('action', 'produk'));
    }

    public function simpanEdit(Request $request, Produk $produk)
    {
        $this->validasi($request);

        $this->data($request, $produk);

        if ($request->boolean('hapus_gambar')) {
            Storage::delete($produk->gambar);
            $produk->gambar = null;
        }

        if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
            if (!$request->boolean('hapus_gambar')) {
                Storage::exists($produk->gambar) && Storage::delete($produk->gambar);
            }
            $produk->gambar = $request->file('gambar')->store('produk');
        }

        $produk->save();

        return redirect()->route('auctioneer.produk.semua')->with('success', 'Product updated successfully');
    }

    public function hapus(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('auctioneer.produk.semua')->with('success', 'Product deleted successfully');
    }

    protected function validasi(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:128',
            'deskripsi' => 'nullable',
            'lelang_waktu_perpanjangan' => 'required|integer|gte:0',
            'lelang_waktu_mulai' => 'required|date',
            'lelang_harga_buka' => 'required|integer|gte:0',
            'lelang_harga_tutup' => 'required|integer|gte:0',
            'lelang_kelipatan' => 'required|integer|gt:0'
        ]);
    }

    protected function data(Request $request, Produk $produk)
    {
        $tambah = $request->routeIs('auctioneer.produk.tambah');
        $submit = $request->isMethod('post');

        $produk->nama = $submit ? $request->input('nama') : old('nama', $tambah ? '' : $produk->nama);
        $produk->deskripsi = $submit ? $request->input('deskripsi') : old('deskripsi', $tambah ? '' : $produk->deskripsi);
        $produk->lelang_waktu_perpanjangan = $submit ? $request->input('lelang_waktu_perpanjangan') : old('lelang_waktu_perpanjangan', $tambah ? 24 : $produk->lelang_waktu_perpanjangan);
        $produk->lelang_waktu_mulai = $submit ? $request->input('lelang_waktu_mulai') : old('lelang_waktu_mulai', $tambah ? date('Y-m-d\TH:i:s') : date('Y-m-d\TH:i:s', strtotime($produk->lelang_waktu_mulai)));
        $produk->lelang_harga_buka = $submit ? $request->input('lelang_harga_buka') : old('lelang_harga_buka', $tambah ? 0 : $produk->lelang_harga_buka);
        $produk->lelang_harga_tutup = $submit ? $request->input('lelang_harga_tutup') : old('lelang_harga_tutup', $tambah ? 0 : $produk->lelang_harga_tutup);
        $produk->lelang_kelipatan = $submit ? $request->input('lelang_kelipatan') : old('lelang_kelipatan', $tambah ? 1 : $produk->lelang_kelipatan);
    }
}
