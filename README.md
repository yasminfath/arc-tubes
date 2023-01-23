# Aplikasi Toko Buku Sederhana
Tugas Besar Cakru ARC 2023

## Deskripsi  Aplikasi
Aplikasi ini merepresentasikan sebuah toko buku sederhana yang menjual berbagai buku. Untuk dapat melakukan transaksi, pembeli harus login terlebih dahulu. 


## Fitur yang Ada Pada Aplikasi
#### 1. Login dan Register
   
   a. Login
   
   Terdapat dua macam akun yang dapat login ke dalam aplikasi ini, yaitu akun pembeli dan penjual.
   ![image](https://user-images.githubusercontent.com/101006947/214045158-eb8964ac-5978-4c34-bec0-868d0d3c7bd5.png)
   
   b. Register
   
   Fitur ini diperuntukkan bagi pembeli yang ingin mengakses aplikasi, sehingga akun yang didaftarkan akan otomatis menjadi pembeli.
   ![image](https://user-images.githubusercontent.com/101006947/214045237-376cf944-a59b-4f9e-85f1-adf2a534544e.png)

#### 2. Pembeli

   a. Melihat Katalog Buku yang Dijual dan Melakukan Pembelian
      ![image](https://user-images.githubusercontent.com/101006947/214045756-e9857668-4249-426c-8568-7c04b8ffcec2.png)
   
   b. Melihat Riwayat Transaksi
      ![image](https://user-images.githubusercontent.com/101006947/214056185-93c919a1-4e78-40cc-8a9d-bd6d51df6b9a.png)
   
#### 3. Penjual

   a. Melihat Daftar Buku serta Stok 
      ![image](https://user-images.githubusercontent.com/101006947/214055722-e9c6c5c0-55f5-4a9a-9e3d-bf8de158b429.png)
   
   b. Menambahkan Stok Buku yang Tersedia
      ![image](https://user-images.githubusercontent.com/101006947/214055971-4efac3a9-8380-47e8-9cf5-4e3d3fac5b34.png)
   
   c. Menambahkan Koleksi Buku Baru
      ![image](https://user-images.githubusercontent.com/101006947/214055828-f7a1116f-68d1-41ee-8781-d3181614e588.png)
   
   d. Memperbarui Data Buku
      ![image](https://user-images.githubusercontent.com/101006947/214056492-5011582f-c6ac-4f6c-ab12-1edd5306281f.png)
   
   e. Menghapus Buku yang Sudah Ada
      ![image](https://user-images.githubusercontent.com/101006947/214056668-c2759e80-8409-44b9-9add-48d147267f22.png)
   
   f. Melihat Riwayat Transaksi dari Seluruh User
      ![image](https://user-images.githubusercontent.com/101006947/214056829-85d06b2e-1028-410c-9092-283ba59dfee2.png)
      
   g. Memperbarui Status Pengiriman Barang
      ![image](https://user-images.githubusercontent.com/101006947/214057015-e5a7739a-ec32-427f-a65f-928fe42ef9e1.png)


## Cara Menjalankan Aplikasi
1. Pastikan XAMPP telah terpasang pada server komputer
2. Aktifkan MySQL dan Apache pada XAMPP
3. Letakkan folder aplikasi di dalam folder htdocs
4. Buka file pada application/config/config.php line ke-26, ubah isi variabel $config['base_url'] menjadi 'http://localhost/' kemudian diikuti dengan nama folder aplikasi di dalam folder htdocs
5. Import database toko_buku.sql pada server MySQL 
6. Sesuaikan setting pada server MySQL dengan isi file application/config/database.php pada variabel $db['default']
7. Buka aplikasi melalui 'http://localhost/' kemudian diikuti dengan nama folder aplikasi di dalam folder htdocs
8. Jika berhasil, akan terlihat halaman login pada website

## Pembagian Tugas
1. Yasmin Fathanah Zakiyyah - 16522087 - Back End
2. Bagas Sambega Rosyada - 19622189 - Front End
3. Ahmad Habibie Marijan - 19622003 - Front End
4. Natali Wulan Rehulina P. A. - 16522242  - Back End
