# Laporan Praktikum Pemrograman Web Lanjut

**Nama:** [Isi Nama Kamu]
**NIM:** [Isi NIM Kamu]
**Mata Kuliah:** Pemrograman Web Lanjut
**Topik:** Implementasi Form Elements & Resource Post di Filament

---

## A. Tugas Praktikum

Berikut adalah implementasi kode untuk menjawab instruksi tugas praktikum:

### 1. Penambahan Validasi pada Form
Untuk menambahkan aturan minimal 5 karakter pada form *Title* dan memastikan *Slug* bersifat unik, modifikasi dilakukan pada file `PostForm.php`:

```php
TextInput::make('title')
    ->required()
    ->minLength(5),

TextInput::make('slug')
    ->required()
    ->unique(ignoreRecord: true),
```

### 2. Penambahan Kolom Published pada Tabel
Untuk menampilkan status boolean pada tabel Post, file `PostsTable.php` dimodifikasi dengan menambahkan komponen `IconColumn`:

```php
IconColumn::make('published')
    ->boolean(),
```

### 3. Hasil Pengujian Praktikum (Screenshot)
Berikut adalah dokumentasi hasil dari praktikum yang telah dijalankan:

**1. Form Create Post**
*(Menampilkan form saat mengisi data post baru, beserta input gambar, tags, dan select kategori)*

![Screenshot Form Create Post](image/hasil10.png)

**2. Tabel Post**
*(Menampilkan halaman tabel index yang menunjukkan minimal 3 data post berbeda yang berhasil disimpan beserta gambar dan ikon kolom published)*

![Screenshot Tabel Post](image/hasil11.png)

**3. Struktur Folder Storage**
*(Menampilkan file explorer yang menunjukkan folder `storage/app/public/posts` sudah terisi dengan file gambar)*

![Screenshot Folder Storage](image/hasil12.png)

---

## B. Analisis dan Diskusi

Berikut adalah jawaban dari pertanyaan diskusi pada jobsheet:

**1. Mengapa kita perlu menjalankan perintah `php artisan storage:link`?**
Secara bawaan, direktori `storage/app/public` tempat Laravel menyimpan file unggahan terisolasi dan tidak dapat diakses secara langsung melalui URL browser demi keamanan. Perintah `storage:link` berfungsi membuat tautan simbolik (*symbolic link*) dari folder `public/storage` menuju folder `storage/app/public`. Tanpa link ini, gambar yang telah diunggah tidak akan bisa dimuat atau ditampilkan di antarmuka web.

**2. Apa fungsi properti `$casts` untuk field JSON?**
Field database bertipe JSON menyimpan data dalam bentuk *string*. Properti `$casts` pada model Laravel berfungsi mengubah tipe data tersebut secara otomatis. Laravel akan merakit *string* JSON dari database menjadi format *array* PHP saat data ditarik, dan sebaliknya, mengubah data *array* menjadi *string* JSON saat akan disimpan kembali ke database.

**3. Mengapa kita menggunakan `category.name` bukan `category_id` di tabel?**
Kita menggunakan `category.name` agar informasi yang tampil di layar berupa teks yang mudah dibaca (misalnya "Laravel" atau "PHP"). Jika kita menggunakan `category_id`, yang muncul di layar hanyalah angka ID dari relasi database tersebut. Penggunaan format titik (`category.name`) di Filament secara otomatis memicu pemanggilan relasi antar tabel untuk mengambil atribut nama dari tabel relasinya.

**4. Apa perbedaan RichEditor dan MarkdownEditor?**
* **RichEditor:** Menyediakan antarmuka *WYSIWYG* (What You See Is What You Get). Pengguna dapat memformat teks secara langsung layaknya di Microsoft Word, dan hasil simpanannya di dalam database berbentuk *tag* HTML murni.
* **MarkdownEditor:** Pengguna harus menggunakan sintaks pemformatan Markdown (seperti `**tebal**` atau `# heading`). Hasil yang disimpan ke dalam database adalah teks mentah (*raw*) dengan format Markdown tersebut.