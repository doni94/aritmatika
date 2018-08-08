<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aritmatika</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">

        <style>
        #site-content {
            margin-top: 80px;
            margin-left: -10px;
            margin-right: 15px;
        }
        .hidden{display:none;}
        .space { margin-bottom: 30px; margin-top: 30px; }
    </style>

  </head>
  <body>
    
    <div class="container">
    
    <header>

    <div class="row">
        <div class="col-md-12 header" id="site-header">
            <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header" style="margin-left: 15px;">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">PROGRAM ARITMATIKA ONLINE</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            
          </ul>
        </div>
      </div>
    </nav>

        </div>
    </div>
 </header>   
    <!-- End Bagian Header -->
<div class="container">
    
    <div class="row">
        <div class="col-md-3 articles">
           <!-- isi content -->
          </div>
    <div class="row">
        <div class="col-md-5 articles" id="site-content">
           <!-- isi content -->


<!-- Form untuk memasukkan variabel yang dibutuhkan dalam operasi aritmatika menggunakan php -->
<form action="" method="POST">

 <br>BILANGAN 1 :<br> 
 <input type="text" name="bilangan1" class="form-control">

 <br>OPERATOR :<br> 
 <select name="pilih" class="form-control">
  <option value="+">+</option>
  <option value="-">-</option>
  <option value="*">*</option>
  <option value="/">/</option>
 </select>

 <br>BILANGAN 2 :<br> 
 <input type="text" name="bilangan2" class="form-control">

 <br>

 <input type="submit" name="hitung" value="Hitung">

 </form>

 <br>

<?php  
// jika di klik tombol hitung pada form, fungsi aritmatika dengan php dimulai
 if(isset($_POST['hitung'])){
//mengambil variabel dari form
  $bil1 = $_POST['bilangan1'];
  $bil2 = $_POST['bilangan2'];
  $pilih = $_POST['pilih'];

// Mengubah operator aritmatika menjadi text untuk diubah menjadi suara
  if($pilih == '+'){
    $operator='Penjumlahan';
  }elseif ($pilih == '-') {
    $operator='Pengurangan';
  }elseif ($pilih == '*') {
    $operator='Perkalian';
  }elseif ($pilih == '/') {
    $operator='Pembagian';
  }

 // kondisi jika data pada text field tidak di isi, keluar notif "nilainya belum di isi"
  if($pilih){
   if($bil1 == "" || $bil2 == ""){
    ?> <script> alert("Nilai nya belum diisi!"); </script> <?php
    // kondisi jika memilih operator tambah pada form akan menghasilkan proses aritmatika penambahan
   }elseif($pilih == '+'){
    $hasil = $bil1 + $bil2;
    // menampilkan hasil penjumlahan pada form
    echo "Hasil Penjumlahan $bil1 dengan $bil2 adalah ".$hasil."<br>";
    // kondisi jika memilih operator minus pada form akan menghasilkan proses aritmatika pengurangan
   }elseif($pilih == '-'){
    $hasil = $bil1 - $bil2;
    // menampilkan hasil pengurangan pada form
    echo "Hasil Pengurangan $bil1 dengan $bil2 adalah ".$hasil."<br>";
    // kondisi jika memilih operator perkalian (*) pada form akan menghasilkan proses aritmatika perkalian
   }elseif($pilih == '*'){
    $hasil = $bil1 * $bil2;
    // menampilkan hasil perkalian pada form
    echo "Hasil Perkalian $bil1 dengan $bil2 adalah ".$hasil."<br>";
    // kondisi jika memilih operator pembagian (/) pada form akan menghasilkan proses aritmatika pembagian
   }elseif($pilih == '/'){
    $hasil = $bil1 / $bil2;
    // menampilkan hasil pembagian pada form
    echo "Hasil Pembagian $bil1 dengan $bil2 adalah ".$hasil."<br>";
   }
  }

// Mengubah text menjadi suara dengan hasil format (MP3)
// ------------------------------------

// Google Translate API tidak dapat menangani string > 100 karakter
   $words = substr('hasil'.$operator.$bil1.'dengan'.$bil2.'adalah'.$hasil, 0, 100);

// Ganti karakter menjadi non-alfanumerik
// Ruang di dalam kalimat diganti dengan simbol Plus (+) agar dapat di terjemahkan oleh google translate melalui url
   $words = urlencode('hasil'.$operator.$bil1.'dengan'.$bil2.'adalah'.$hasil);

// Nama file MP3 yang dihasilkan menggunakan MD5
   $file  = md5($words);
  
// Simpan file MP3 di folder suara dengan ekstensi .mp3
   $file = "suara/" . $file . ".mp3";

// Jika file MP3 ada, jangan buat permintaan baru
   if (!file_exists($file)) {
     $mp3 = file_get_contents(
        'https://translate.google.com/translate_tts?ie=UTF-8&tl=id-ID&client=tw-ob&q='."$words");
     file_put_contents($file, $mp3);
   }
  
 }

?>

<br>

<!-- Putar hasil convert text ke suara menggunakan HTML5 -->

<audio controls="controls" autoplay="autoplay">
  <source src="<?php echo $file; ?>" type="audio/mp3" />
</audio>

 </div>
    </div>
    </div>
    <!-- End Bagian wrapper -->

  <script type="text/javascript" charset="utf8" src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>

  </body>
</html>