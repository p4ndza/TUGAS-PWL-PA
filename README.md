
# Informasi Databes
---
### 1. Membuat & Menggunakan Database

```sql
CREATE DATABASE db_umkm_lokal;
USE db_umkm_lokal;

```

---

### 2. Membuat Tabel Master

```sql
-- Tabel User
CREATE TABLE User (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    no_telp VARCHAR(20) NOT NULL,
    alamat TEXT NOT NULL,
    role ENUM('admin_umkm', 'pelanggan') NOT NULL
);

-- Tabel Kategori
CREATE TABLE Kategori (
    id_kategori INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(255) NOT NULL
);

```

---

### 3. Membuat Tabel Produk (Katalog)

```sql
CREATE TABLE Produk (
    id_produk INT AUTO_INCREMENT PRIMARY KEY,
    id_kategori INT NOT NULL,
    nama_produk VARCHAR(255) NOT NULL,
    deskripsi TEXT NOT NULL,
    harga DECIMAL(12,2) NOT NULL, -- Menggunakan 12 digit dengan 2 angka di belakang koma
    stok INT NOT NULL,
    foto_produk VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_kategori) REFERENCES Kategori(id_kategori) ON DELETE CASCADE ON UPDATE CASCADE
);

```

---

### 4. Membuat Tabel Keranjang Belanja

```sql
CREATE TABLE Keranjang (
    id_keranjang INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    id_produk INT NOT NULL,
    jumlah INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES User(id_user) ON DELETE CASCADE,
    FOREIGN KEY (id_produk) REFERENCES Produk(id_produk) ON DELETE CASCADE
);

```

---

### 5. Membuat Tabel Transaksi & Detail (Bahan Laporan)

```sql
-- Tabel Pesanan
CREATE TABLE Pesanan (
    id_pesanan INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    tanggal_pesanan DATETIME NOT NULL,
    total_harga DECIMAL(12,2) NOT NULL,
    status_pesanan ENUM('pending', 'dibayar', 'dikirim', 'selesai', 'dibatalkan') NOT NULL,
    bukti_pembayaran VARCHAR(255) NULL, -- Nullable karena di awal pesanan belum dibayar
    FOREIGN KEY (id_user) REFERENCES User(id_user) ON DELETE CASCADE
);

-- Tabel Detail_Pesanan
CREATE TABLE Detail_Pesanan (
    id_detail INT AUTO_INCREMENT PRIMARY KEY,
    id_pesanan INT NOT NULL,
    id_produk INT NULL, -- Di-set NULL agar jika produk dihapus dari katalog, riwayat transaksi di laporan tidak ikut hilang
    jumlah INT NOT NULL,
    harga_satuan DECIMAL(12,2) NOT NULL,
    FOREIGN KEY (id_pesanan) REFERENCES Pesanan(id_pesanan) ON DELETE CASCADE,
    FOREIGN KEY (id_produk) REFERENCES Produk(id_produk) ON DELETE SET NULL
);

```

---

> **Catatan Tambahan untuk Kelompok 9:**
> * `ON DELETE CASCADE`: Jika data induk (misal: User) dihapus, maka data turunannya (misal: isi Keranjang milik user tersebut) akan otomatis terhapus agar database bersih.
> * `ON DELETE SET NULL` (pada `Detail_Pesanan`): Jika produk dihapus dari katalog, ID produk di detail pesanan berubah jadi `NULL`, tapi catatan `harga_satuan` dan `jumlah` tetap utuh. Ini krusial agar total laporan penjualan bulananmu tidak berubah atau *error*.
> 
>
---