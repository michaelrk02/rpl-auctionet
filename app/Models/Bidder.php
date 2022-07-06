<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthContract;
use Illuminate\Http\Request;

class Bidder extends Model implements
    AuthContract
{
    use HasFactory, Authenticatable;

    protected $table = 'bidder';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function getPasswordResetUrl($duration)
    {
        $expire = time() + $duration;

        return route('bidder.auth.reset', [
            'id' => $this->id,
            'expire' => $expire,
            'signature' => hash_hmac('sha256', $this->id.$expire, env('APP_KEY'))
        ]);
    }

    public function dataSaldo()
    {
        return $this->hasOne(Saldo::class, 'bidder', 'id');
    }

    public function listPengiriman()
    {
        return $this->hasMany(Pengiriman::class, 'penerima', 'id');
    }

    public static function fromEmail($email)
    {
        return Bidder::where('email', $email)->first();
    }

    public static function fromPasswordReset(Request $request)
    {
        $id = $request->query('id');
        $expire = $request->query('expire');
        $signature = $request->query('signature');

        $bidder = Bidder::find($id);
        if (!isset($bidder)) {
            return null;
        }

        if (hash_hmac('sha256', $id.$expire, env('APP_KEY')) !== $signature) {
            return null;
        }

        return $bidder;
    }
}
