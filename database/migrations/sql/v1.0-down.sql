DROP VIEW `produk_lelang_waktu_selesai`;
DROP VIEW `produk_tawaran_tertinggi`;

ALTER TABLE `produk`
DROP CONSTRAINT `FK_Produk_DimenangkanOleh`;

ALTER TABLE `saldo`
DROP CONSTRAINT `FK_Saldo_Bidder`;

ALTER TABLE `saldo_riwayat`
DROP CONSTRAINT `FK_SaldoRiwayat_Saldo`;

ALTER TABLE `tawaran`
DROP CONSTRAINT `FK_Tawaran_Bidder`,
DROP CONSTRAINT `FK_Tawaran_Produk`;

ALTER TABLE `pengiriman`
DROP CONSTRAINT `FK_Pengiriman_Produk`,
DROP CONSTRAINT `FK_Pengiriman_Penerima`;

DROP TABLE `produk`;
DROP TABLE `bidder`;
DROP TABLE `saldo`;
DROP TABLE `saldo_riwayat`;
DROP TABLE `tawaran`;
DROP TABLE `pengiriman`;

