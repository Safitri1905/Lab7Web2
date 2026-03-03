# Praktikum 1: PHP Framework (CodeIgniter)

---

## Tujuan Praktikum

1. Memahami konsep dasar Framework.
2. Memahami konsep dasar MVC (Model-View-Controller).
3. Mampu membuat program sederhana menggunakan Framework CodeIgniter 4.

---

## Langkah-langkah Praktikum

### 1. Persiapan Lingkungan Pengembangan

- **Text Editor:** Menggunakan Visual Studio Code (VSCode).
- **Web Server:** Membuat folder baru dengan nama `lab11_php_ci` di dalam direktori `htdocs` (pada XAMPP).

### 2. Persiapan Awal (Konfigurasi PHP)

**Cara mengaktifkan ekstensi:**
- Buka XAMPP Control Panel.
- Klik Config pada Apache → pilih `PHP.ini`.
- Cari bagian ekstensi, hilangkan tanda titik koma (`;`) pada ekstensi yang akan diaktifkan.
- Simpan file dan restart Apache.

**Screenshot:**

<img src="img/1.png" width="450">

### 3. Instalasi CodeIgniter 4 (Manual)

- Unduh CodeIgniter 4 dari [situs resmi](https://codeigniter.com/download).
- Ekstrak file zip ke direktori `htdocs/lab11_ci`.
- Ubah nama folder `framework-4.x.xx` menjadi `ci4`.
- Buka browser dan akses:  
  `http://localhost/lab11_ci/ci4/public/`

**Screenshot:**

<img src="img/2.png" width="450">

### 4. Menjalankan CLI (Command Line Interface)

- Buka terminal/command prompt.
- Arahkan ke direktori proyek:  
  `cd xampp/htdocs/lab11_ci/ci4/`
- Jalankan perintah CLI CodeIgniter:  
  `php spark`

**Screenshot:**

<img src="img/3.png" width="450">

### 5. Mengaktifkan Mode Debugging
Codeigniter 4 menyediakan fitur debugging untuk memudahkan developer untuk mengetahui pesan error apabila terjadi kesalahan dalam membuat kode program. 
Secara default fitur ini belum aktif. Ketika terjadi error pada aplikasi akan ditampilkan pesan kesalahan seperti berikut. 

<img src="img/4.png" width="450">

Ubah nama file env menjadi .env kemudian buka file tersebut dan ubah nilai variable CI_ENVIRINMENT menjadi development. 

<img src="img/development.png" width="450">

### 6. Routing dan Controller

- Routing diatur dalam file `app/Config/Routes.php`.
- Contoh route default:  
  `$routes->get('/', 'Home::index');`

**Menambahkan Route Baru:**

```php
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
$routes->get('page/tos', 'Page::tos');
```

Lalu cek daftar route melalui CLI:
`php spark routes`

**Screenshot:**

<img src="img/5.png" width="450">

#### 7. Membuat Controller
```php
<?php 

namespace App\Controllers; 

class Page extends BaseController 
{ 
    public function about() 
    { 
        echo "Ini halaman About";
    } 

    public function contact() 
    { 
        echo "Ini halaman Contact"; 
    }
    
    public function faqs() 
    { 
        echo "Ini halaman FAQ"; 
    } 
}
```
Lalu akses route yang telah dibuat dengan mengakses alamat url http://localhost:8080/about

<img src="img/6.png" width="450">

#### 8. Auto Routing
Secara default fitur autoroute pada Codeiginiter sudah aktif. Untuk mengubah status autoroute dapat mengubah nilai variabelnya. Untuk menonaktifkan ubah nilai true menjadi false. 
```php
$routes->setAutoRoute(true); 
```
Tambahkan method baru pada Controller Page seperti berikut. 
```php
public function tos() 
{ 
    echo "ini halaman Term of Services"; 
} 
```
Method ini belum ada pada routing, sehingga cara mengaksesnya dengan menggunakan alamat: http://localhost:8080/page/tos  

<img src="img/7.png" width="450">

### 9. Membuat View
```html
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <title><?= $title; ?></title> 
</head> 
<body> 
    <h1><?= $title; ?></h1> 
    <hr> 
    <p><?= $content; ?></p> 
</body> 
</html> 
```
Ubah method about pada class Controller Page menjadi seperti berikut: 
```php
public function about() 
{ 
    return view('about', [ 
        'title' => 'Halaman About', 
        'content' => 'Ini adalah halaman about yang menjelaskan tentang isi halaman ini.' 
    ]); 
}
```
Setelah itu refresh halaman itu.

<img src="img/8.png" width="450">

### 10. Membuat Layout Web dengan CSS
Buat file css pada direktori public dengan nama style.css (copy file dari praktikum lab4_layout). Kita akan gunakan layout yang pernah dibuat pada praktikum 4.
```css
/* import google font */
@import
url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap');
@import
url('https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital,wght@0,300;0,700;1,300&display=swap');
/* Reset CSS */
* {
    margin: 0;
    padding: 0;
}

body {
    line-height:1;
    font-size:100%;
    font-family:'Open Sans', sans-serif;
    color:#5a5a5a;
}

#container {
    width: 980px;
    margin: 0 auto;
    box-shadow: 0 0 1em #cccccc;
}

/* header */
    header {
    padding: 20px;
}
header h1 {
    margin: 20px 10px;
    color: #b5b5b5;
}

/* navigasi */
nav {
    display: block;
    background-color: #1f5faa;
}

nav a{
    padding: 15px 30px;
    display: inline-block;
    color: #ffffff;
    font-size: 14px;
    text-decoration: none;
    font-weight: bold;
}

nav a.active,
nav a:hover {
    background-color: #2b83ea;
}

/* Hero Panel */
#hero {
    background-color: #e4e4e5;
    padding: 50px 20px;
    margin-bottom: 20px;
}

#hero h1 {
    margin-bottom: 20px;
    font-size: 35px;
}

#hero p {
    margin-bottom: 20px;
    font-size: 18px;
    line-height: 25px;
}

#main {
    float: left;
    width: 640px;
    padding: 20px;
}

/* sidebar area */
#sidebar {
    float: left;
    width: 260px;
    padding: 20px;
}

/* widget */
.widget-box {
    border:1px solid #eee;
    margin-bottom:20px;
 }
.widget-box .title {
    padding:10px 16px;
    background-color:#428bca;
    color:#fff;
}
    .widget-box ul {
    list-style-type:none;
}
    .widget-box li {
    border-bottom:1px solid #eee;
}
.widget-box li a {
    padding:10px 16px;
    color:#333;
    display:block;
    text-decoration:none;
}
.widget-box li:hover a {
    background-color:#eee;
}
.widget-box p {
    padding:15px;
    line-height:25px;
}

/* footer */
footer {
    clear: both;
    background-color: #1d1d1d;
    padding: 20px;
    color: #eee;
}

/* box */
.box {
    display:block;
    float:left;
    width:33.333333%;
    box-sizing:border-box;
    -moz-box-sizing:border-box;
    -webkit-box-sizing:border-box;
    padding:0 10px;
    text-align:center;
}
.box h3 {
    margin: 15px 0;
}
.box p {
    line-height: 20px;
    font-size: 14px;
    margin-bottom: 15px;
}
box img {
    border: 0;
    vertical-align: middle;
}
.image-circle {
    border-radius: 50%;
}
.row {
    margin: 0 -10px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
}
.row:after, .row:before,
.entry:after, .entry:before {
    content:'';
    display:table;
}
.row:after,
.entry:after {
    clear:both;
}

.divider {
    border:0;
    border-top:1px solid #eeeeee;
    margin:40px 0;
    }
/* entry */
.entry {
    margin: 15px 0;
}
    .entry h2 {
    margin-bottom: 20px;
}
.entry p {
    line-height: 25px;
}
.entry img {
    float: left;
    border-radius: 5px;
    margin-right: 15px;
}
.entry .right-img {
    float: right;
}

/* Bagian About */
.about-section {
    padding: 40px 20px;
}

.about-section h2 {
    color: #1f5faa;
    margin-bottom: 15px;
}

.about-section p {
    font-size: 18px;
    color: #555;
    line-height: 1.6;
    margin-bottom: 30px;
    max-width: 800px;
}

.portfolio {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.portfolio-item {
    background-color: #f4f6fa;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    text-align: center;
    padding: 20px;
    width: 280px;
    transition: all 0.3s ease;
}

.portfolio-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.portfolio-item img {
    width: 100%;
    max-width: 220px;
    border-radius: 8px;
    margin-bottom: 10px;
}

.portfolio-item h4 {
    color: #1f5faa;
    margin-bottom: 8px;
    font-size: 18px;
}

.portfolio-item p {
    font-size: 18px;
    color: #666;
    line-height: 1.5;
}

/* Bagian Kontak */
.contact-section {
    padding: 40px 20px;
}

.contact-section h2 {
    color: #1f5faa;
    margin-bottom: 10px;
}

.contact-section p {
    color: #555;
    margin-bottom: 25px;
    font-size: 16px;
}

.contact-form {
    max-width: 500px;
    margin: 0 auto;
    background-color: #f4f6fa;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 25px 30px;
}

.contact-form label {
    display: block;
    font-weight: bold;
    color: #333;
    margin-bottom: 5px;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 15px;
    font-size: 14px;
}

.contact-form textarea {
    resize: vertical;
}

.contact-form button {
    background-color: #1f5faa;
    color: #fff;
    border: none;
    padding: 10px 18px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 15px;
    transition: 0.3s;
}

.contact-form button:hover {
    background-color: #2b83ea;
}

/* Responsif */
@media (max-width: 768px) {
    .portfolio {
        flex-direction: column;
        align-items: center;
    }

    .portfolio-item {
        width: 90%;
    }

    .contact-form {
        width: 90%;
        padding: 20px;
    }
}
```

Kemudian buat folder template pada direktori view kemudian buat file header.php dan footer.php

File app/view/template/header.php
```html
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <title><?= $title; ?></title> 
    <link rel="stylesheet" href="<?= base_url('/style.css');?>"> 
</head> 
<body> 
    <div id="container"> 
    <header> 
        <h1>Layout Sederhana</h1> 
    </header> 
    <nav> 
        <a href="<?= base_url('/');?>" class="active">Home</a> 
        <a href="<?= base_url('/artikel');?>">Artikel</a> 
        <a href="<?= base_url('/about');?>">About</a> 
        <a href="<?= base_url('/contact');?>">Kontak</a> 
    </nav> 
    <section id="wrapper"> 
        <section id="main"> 
```
File app/view/template/footer.php
```php
        </section> 
        <aside id="sidebar"> 
            <div class="widget-box"> 
                <h3 class="title">Widget Header</h3> 
                <ul> 
                    <li><a href="#">Widget Link</a></li> 
                    <li><a href="#">Widget Link</a></li> 
                </ul> 
            </div> 
            <div class="widget-box"> 
                <h3 class="title">Widget Text</h3> 
                <p>Vestibulum lorem elit, iaculis in nisl volutpat, 
malesuada tincidunt arcu. Proin in leo fringilla, vestibulum mi porta, 
faucibus felis. Integer pharetra est nunc, nec pretium nunc pretium ac.</p> 
            </div> 
        </aside> 
    </section> 
    <footer> 
        <p>&copy; 2021 - Universitas Pelita Bangsa</p> 
    </footer> 
    </div> 
</body> 
</html> 
```
Kemudian ubah file app/view/about.php
```php
<?= $this->include('template/header'); ?> 
 
<h1><?= $title; ?></h1> 
<hr> 
<p><?= $content; ?></p> 
 
<?= $this->include('template/footer'); ?> 
```
Selanjutnya refresh tampilan pada alamat http://localhost:8080/about 

<img src="img/9.png" width="450">