@extends('welcome')

@section('content')
<div class=" custom-jumbotron">
  <center>
    <div class="banner">
      <div class="container">
        <img src="{{asset('images/spanda.png')}}" alt="">
        <h1 class="display-5 font-weight-light">Selamat <span class="blue">Datang</span> di <span>E-Library</span><br>
        <span class="blue">SMPN 2</span> Samarinda</h1>
        <h1 class="display-5 font-weight-light"></h1>
        <p class="col-md-6 fs-4">Tempat Inspirasi dan Pengetahuan! Kami dengan penuh semangat membuka pintu dunia pendidikan untuk Anda. Sebagai lembaga pendidikan terdepan, kami berkomitmen untuk memberikan pengalaman belajar yang tak terlupakan kepada setiap siswa. </p>
        <button class="btn btn-primary btn-lg" type="button"><a href="#tentang-perpustakaan" class="text-white">Jelajahi...</a></button>
      </div>
    </div>
  </center>
</div>
<section id="tentang-perpustakaan" class="about ">
  <div class="container aos-init aos-animate" data-aos="fade-up">
    <div class="row content">
      <div class="col-lg-7">
        <p class="section-title">TENTANG PERPUSTAKAAN</p>
        <h3 class="fs-2 fw-lighter mb-5 w-70">E-Library SMPN2 adalah Bentuk Modernisasi Media Baca yang Ada Pada Perpustakaan SMPN 2 Samarinda</h3>
        <p class="mt-4 fs-6 opacity-50 w-70">     
          Di E-Library SMPN2, kita tidak hanya menyajikan perpustakaan konvensional. Melainkan, kita membawa literasi ke level berikutnya dengan dunia digital. 
          Dengan koleksi e-book terkini dan sumber daya daring, setiap klik adalah pintu menuju pembelajaran inovatif. Selamat datang di E-Library SMPN2, di mana literasi bertemu teknologi untuk pengalaman belajar yang tak tertandingi.</p>
        <a href="{{route('more')}}"><button class="btn btn-primary btn-animate mt-4" type="button">Selengkapnya</button></a></div>
      <div class="col-lg-4 pt-4 pt-lg-0" data-aos="zoom-in-left" data-aos-duration="1500"><img src="{{asset('images/sally.png')}}" alt="..."  caption="false" /></div>
    </div>
  </div>
</section>
<section id="visi-misi-sekolah" class="vision " >
    <div class="container visi p-5" data-aos="zoom-in-right" data-aos-duration="1500">
        <div class="row mb-4">
          <div class="col-md-12 text-center mb-4">
            <h1 class="display-5">VISI MISI PERPUSTAKAAN</h1>
            <p class="section-title">Melangkah Bersama ke Dunia Ilmu dan Inspirasi</p>
          </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3 class="display-5">Visi</h3>
                <p>
                    Menjadi pusat pembelajaran dan pengetahuan unggul, memancarkan inspirasi bagi siswa untuk menjelajahi dunia melalui kegemaran membaca.
                </p>
            </div>
            <div class="col-md-6">
                <h3 class="display-5">Misi</h3>
                <ul>
                    <li>Menggairahkan minat baca dan literasi di kalangan siswa.</li>
                    <li>Menyediakan koleksi buku berkualitas yang memenuhi kebutuhan siswa.</li>
                    <li>Merayakan kegiatan literasi dan dialog buku yang merangsang pemikiran.</li>
                    <li>Memberikan pelayanan prima untuk setiap pengunjung perpustakaan.</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="quotes ">  
  <div class="card rounded" data-aos="zoom-in-up" data-aos-duration="1500">
    <div class="container  ">
      <div class="row mt-2">
        <div class="col-md-12 text-center">
          <h1 class="display-5 ">QUOTES</h1>
          <blockquote class="blockquote">
            <p>Quotes dari para tokoh-tokoh dunia perihal membaca</p>
          </blockquote>
        </div>
      </div>
      <div class="row quote">
        <div class="card"></div>
        <div class="col-md-12">
          <blockquote class="quote text-center" id="quote-container">
            <!-- Tampilan Quotes sesuai tokoh dengan JS -->
          </blockquote>
          <figcaption class="blockquote-footer text-center" id="character-container">
            <!-- Tampilan Tokoh sesuai tokoh dengan JS -->
          </figcaption>
        </div>
      </div>
      <center>
        <div class="people">
          <div class="figure ">
            <img src="{{asset('images/quotes/mercurius.jpeg')}}" alt="Person 1" class="img-fluid  person-image" onclick="changeQuote(1)">
          </div>
          <div class="figure ">
            <img src="{{asset('images/quotes/thomas.jpg')}}" alt="Person 2" class="img-fluid  person-image" onclick="changeQuote(2)">
          </div>
          <div class="figure ">
            <img src="{{asset('images/quotes/download.jpeg')}}" alt="Person 3" class="img-fluid  person-image" onclick="changeQuote(3)">
          </div>
          <div class="figure ">
            <img src="{{asset('images/quotes/oscar.jpeg')}}" alt="Person 4" class="img-fluid  person-image" onclick="changeQuote(4)">
          </div>
        </div>
        <p class="text-body-secondary fw-lighter mt-5 text-center"><u>Click gambar</u> untuk melihat quotes</p>
      </div>
    </center>
  </div>
</section>

<script>
    const quotes = [
  "- Sebuah ruangan tanpa buku seperti tubuh tanpa jiwa -",
  "- Saya tidak bisa hidup tanpa membaca - ",
  "- Buku adalah jendela dunia -",
  "- Membaca adalah suatu tempat di mana kita bisa hidup lebih dari satu kehidupan - "
];

const character = [
  "Marcus Tullius Cicero",
  "Thomas Jefferson",
  "Louis L'Amour",
  "Oscar Wilde "
];

function changeQuote(personIndex) {
  const quoteContainer = document.getElementById('quote-container');
  const characterContainer = document.getElementById('character-container');
  quoteContainer.innerHTML = `<p>${quotes [personIndex - 1]}</p>`;
  characterContainer.innerHTML = `<p>${character [personIndex - 1]}</p>`;
}

document.addEventListener('DOMContentLoaded', function() {
    changeQuote(2);
  });
</script>



@endsection