<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="rapi.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Beranda</title>
</head>
<tbody>
  {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-sm bg-light shadow navbar-dark">
           <div class="container-fluid">
             <h4> <img src="gambar/tutwuri.png" alt="" width="30px"> E-Pembayaran SPP SD Z Medan</h4>
          <ul class="navbar-nav ms-auto">
               <a href="login"> <button type="button" class="btn btn-success me-2 ms-auto">Login</button></a>
                <a href="register"> <button type="button" class="btn btn-danger ms-auto">Register</button></a>
          </ul>
        </div>
      </nav>
    
    
    <!-- Carousel -->
   
    <div id="demo" class="carousel slide" data-bs-ride="carousel">
    
      <!-- Indicators/dots -->
      {{-- <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
      </div> --}}
      
      <!-- The slideshow/carousel -->
     
      <div class="carousel-inner">

        @foreach ($databerita as $key=>$item)

        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
          <img src="{{ url('storage/image/' . $item->image) }}" class="d-block mx-auto" style="width:80%; height:50%">
          <div class="carousel-caption">
            <h3> {{$item->title}} </h3>
            <p> {{$item->caption}} </p>
          </div>
        </div>
        @endforeach

        




      {{-- <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="gambar/th (1).jpg" class="d-block mx-auto" style="width:80%; height:50%">
          <div class="carousel-caption">
            <h3>Bermain sambil Belajar</h3>
            <p>Kemajuan bangsa Indonesia di masa depan tergantung generasi muda saat ini. Untuk menciptakan generasi yang unggul, anak-anak muda perlu dibekali pendidikan karakter yang baik.

                Kementerian Pendidikan dan Kebudayaan (Kemendikbud) terus bekerja keras demi mewujudkan visi dan misi Presiden RI, yaitu Indonesia maju yang berdaulat, mandiri, dan berkepribadian melalui terciptanya Profil Pelajar Pancasila.</p>
          </div>
        </div>


        <div class="carousel-item">
          <img src="gambar/sd hemat.jpg" alt="menabung" class="d-block mx-auto" style="width:80% ; height:50%">
          <div class="carousel-caption">
            <h3>Menabung sejak dini</h3>
            <p>Berkat adanya program  menabung disekolah dari SD RA Kartini,sangat banyak orang tua murid yang terbantu dikarenakan anak anak mereka jadi lebih hemat dan bersemangat untuk menabung,serta menjadikan murid-muridnya menjadi lebih mandiri</p>
          </div> 
        </div>
        <div class="carousel-item">
          <img src="gambar/sd.jpg" alt="aktif" class="d-block mx-auto" style="width:80%; height:50%">
          <div class="carousel-caption">
            <h3>Semangat menggapai mimpi</h3>
            <p>Selain mengajarkan agar anak didiknya bisa hemat dan mandiri,para tanaga pendidik di SD Z juga mencari berbagai cara agar aanak didiknya aktif dan cerdas baik di ruang kelas maupun dilingkungan masyarakat</p>
          </div>  
        </div>
      </div> --}}
      
      <!-- Left and right controls/icons -->
      <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon btn-secondary"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon btn-secondary"></span>
      </button>
    </div>
    

    
        
<script src="js/bootstrap.js"></script>
</tbody>
</html>
