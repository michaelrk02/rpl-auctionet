CREATE TABLE `produk` (
    `id` CHAR(36),
    `nama` VARCHAR(128),
    `deskripsi` TEXT,
    `gambar` TEXT,
    `lelang_waktu_perpanjangan` INT,
    `lelang_waktu_mulai` DATETIME,
    `lelang_harga_buka` INT,
    `lelang_harga_tutup` INT,
    `lelang_kelipatan` INT,
    `dimenangkan_oleh` CHAR(36),
    `dimenangkan_saat` DATETIME,
    PRIMARY KEY (`id`)
);

CREATE TABLE `bidder` (
    `id` CHAR(36),
    `nama` VARCHAR(128),
    `email` VARCHAR(254),
    `no_telepon` VARCHAR(24),
    `alamat` TEXT,
    PRIMARY KEY (`id`)
);

CREATE TABLE `saldo` (
    `bidder` CHAR(36),
    `nominal` INT,
    PRIMARY KEY (`bidder`)
);

CREATE TABLE `saldo_riwayat` (
    `id` CHAR(36),
    `saldo` CHAR(36),
    `waktu` DATETIME,
    `jenis` VARCHAR(16),
    `nominal` INT,
    PRIMARY KEY (`id`)
);

CREATE TABLE `tawaran` (
    `bidder` CHAR(36),
    `produk` CHAR(36),
    `waktu` DATETIME,
    `harga` INT,
    PRIMARY KEY (`bidder`, `produk`)
);

CREATE TABLE `pengiriman` (
    `id` CHAR(36),
    `produk` CHAR(36),
    `penerima` CHAR(36),
    `waktu` DATETIME,
    `layanan` VARCHAR(64),
    `no_resi` VARCHAR(64),
    `alamat` TEXT,
    PRIMARY KEY (`id`)
);

ALTER TABLE `produk`
ADD CONSTRAINT `FK_Produk_DimenangkanOleh` FOREIGN KEY (`dimenangkan_oleh`) REFERENCES `bidder` (`id`);

ALTER TABLE `saldo`
ADD CONSTRAINT `FK_Saldo_Bidder` FOREIGN KEY (`bidder`) REFERENCES `bidder` (`id`);

ALTER TABLE `saldo_riwayat`
ADD CONSTRAINT `FK_SaldoRiwayat_Saldo` FOREIGN KEY (`saldo`) REFERENCES `saldo` (`bidder`);

ALTER TABLE `tawaran`
ADD CONSTRAINT `FK_Tawaran_Bidder` FOREIGN KEY (`bidder`) REFERENCES `bidder` (`id`),
ADD CONSTRAINT `FK_Tawaran_Produk` FOREIGN KEY (`produk`) REFERENCES `produk` (`id`);

ALTER TABLE `pengiriman`
ADD CONSTRAINT `FK_Pengiriman_Produk` FOREIGN KEY (`produk`) REFERENCES `produk` (`id`),
ADD CONSTRAINT `FK_Pengiriman_Penerima` FOREIGN KEY (`penerima`) REFERENCES `bidder` (`id`);

CREATE SQL SECURITY INVOKER VIEW `produk_tawaran_tertinggi` AS
SELECT
`p`.`id`,
MAX(`t`.`harga`) `harga_tertinggi`
FROM `produk` `p`
LEFT JOIN `tawaran` `t` ON `t`.`produk` = `p`.`id`
GROUP BY `id`;

CREATE SQL SECURITY INVOKER VIEW `produk_lelang_waktu_selesai` AS
SELECT
`p`.`id`,
(CASE
    WHEN `ptt`.`harga_tertinggi` IS NULL THEN NULL
    ELSE DATE_ADD(`t`.`waktu`, INTERVAL `p`.`lelang_waktu_perpanjangan` HOUR)
END) `waktu_selesai`
FROM `produk` `p`
LEFT JOIN `produk_tawaran_tertinggi` `ptt` ON `ptt`.`id` = `p`.`id`
LEFT JOIN `tawaran` `t` ON `t`.`harga` = `ptt`.`harga_tertinggi`;

