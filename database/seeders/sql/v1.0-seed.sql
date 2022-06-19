INSERT INTO `produk` (`id`, `nama`, `deskripsi`, `lelang_waktu_perpanjangan`, `lelang_waktu_mulai`, `lelang_harga_buka`, `lelang_harga_tutup`, `lelang_kelipatan`) VALUES
('7fd6a179-d4b9-482e-a9f9-3fed55a20aa0', 'Topi Meniup Gelembung', 'Dipakai oleh Smitty Weber Jagerman Jensen a.k.a. si paling nomor satu', 3 * 24, DATE_SUB(NOW(), INTERVAL 7 DAY), 0, 0, 50000),
('ae04f908-c6f6-43df-a3a6-3572d7334b99', 'Payung Antik', 'Payung berlubang dipakai oleh ratu Swiss', 7 * 24, DATE_SUB(NOW(), INTERVAL 1 DAY), 50000, 500000, 25000),
('27ce5d8e-5238-4747-85dd-e985983f1308', 'Sendok Sup', 'Barang bersejarah abad ke-17', 12, DATE_SUB(NOW(), INTERVAL 3 DAY), 100000, 1000000, 20000);

INSERT INTO `bidder` (`id`, `nama`, `email`, `no_telepon`, `alamat`) VALUES
('6cda170e-4f64-45cd-93e7-bb4f0f3801f1', 'Alice', 'alice@localhost.localdomain', '62812340001', 'Rumah Alice'),
('3e9577e9-b92a-4458-b1d7-1ddf1a2eee84', 'Bob', 'bob@localhost.localdomain', '62812340002', 'Rumah Bob'),
('6a3d8c8b-f32c-416b-a429-47e0c209e860', 'Charlie', 'charlie@localhost.localdomain', '62812340003', 'Rumah Charlie'),
('76d5463e-55b4-4eab-b07c-4bb006432c62', 'Daisy', 'daisy@localhost.localdomain', '62812340004', 'Rumah Daisy'),
('3bbe5b1a-67d3-4f9e-9e1c-779d7b62092c', 'Eddie', 'eddie@localhost.localdomain', '62812340005', 'Rumah Eddie');

INSERT INTO `saldo` (`bidder`, `nominal`) VALUES
('6cda170e-4f64-45cd-93e7-bb4f0f3801f1', 5000000),
('3e9577e9-b92a-4458-b1d7-1ddf1a2eee84', 2500000),
('6a3d8c8b-f32c-416b-a429-47e0c209e860', 3500000),
('76d5463e-55b4-4eab-b07c-4bb006432c62', 7000000),
('3bbe5b1a-67d3-4f9e-9e1c-779d7b62092c', 1000000);

INSERT INTO `tawaran` (`bidder`, `produk`, `waktu`, `harga`) VALUES
('6cda170e-4f64-45cd-93e7-bb4f0f3801f1', '7fd6a179-d4b9-482e-a9f9-3fed55a20aa0', DATE_SUB(NOW(), INTERVAL 4 DAY), 350000),
('3e9577e9-b92a-4458-b1d7-1ddf1a2eee84', '7fd6a179-d4b9-482e-a9f9-3fed55a20aa0', DATE_SUB(NOW(), INTERVAL 2 DAY), 500000),
('3bbe5b1a-67d3-4f9e-9e1c-779d7b62092c', '7fd6a179-d4b9-482e-a9f9-3fed55a20aa0', DATE_SUB(NOW(), INTERVAL 1 DAY), 750000),
('76d5463e-55b4-4eab-b07c-4bb006432c62', '27ce5d8e-5238-4747-85dd-e985983f1308', DATE_SUB(NOW(), INTERVAL 2 DAY), 200000);

