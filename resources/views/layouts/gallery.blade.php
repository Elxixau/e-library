@extends('welcome')

@section('content')
<section class="gallery">
  <div class="row mb-4">
    <div class="col-md-12 text-center mb-4">
      <h1 class="display-5">Galeri</h1>
      <p class="section-title">Berikut dokumentasi aktivitas di perpustakaan</p>
    </div>
  </div>
  <div class="container">
    <div class="lightbox">
      <div class="row">
        <div class="col-lg-6">
          <div class="images">
            <img
              src="{{asset('images/KKN1.jpg')}}"
              data-mdb-img="{{asset('images/KKN1.jpg')}}"
              alt="Table Full of Spices"
              class="w-100 mb-3 mb-md-4 shadow-1-strong rounded"
              data-aos="zoom-in-right" data-aos-duration="1000"
            />
          </div>
          <div class="images">
            <img
              src="{{asset('images/KKN4.jpg')}}"
              data-mdb-img="{{asset('images/KKN4.jpg')}}"
              alt="Coconut with Strawberries"
              class="w-100 mb-3 mb-md-4 shadow-1-strong rounded"
              data-aos="zoom-in-right" data-aos-duration="1000"
            />
          </div>
          <div class="images mb-3">
            <img
              src="{{asset('images/KKN3.jpg')}}"
              data-mdb-img="{{asset('images/KKN3.jpg')}}"
              alt="Table Full of Spices"
              class="w-100  shadow-1-strong rounded"
              data-aos="zoom-in-right" data-aos-duration="1000"
            />
          </div>
        </div>
        <div class="col-lg-6">
          <div class="images">
          <img
            src="{{asset('images/KKN5.jpg')}}"
            data-mdb-img="{{asset('images/KKN5.jpg')}}"
            alt="Dark Roast Iced Coffee"
            class="w-100 mb-3 shadow-1-strong mb-md-4 rounded"
            data-aos="zoom-in-left" data-aos-duration="2000"
          />
          </div>
          <div class="images">
          <img
            src="{{asset('images/KKN2.jpg')}}"
            data-mdb-img="{{asset('images/KKN2.jpg')}}"
            alt="Table Full of Spices"
            class="w-100 mb-3 mb-md-4 shadow-1-strong rounded"
            data-aos="zoom-in-left" data-aos-duration="2000"
          />
          </div>
          <div class="images">
          <img
            src="{{asset('images/KKN6.jpg')}}"
            data-mdb-img="{{asset('images/KKN6.jpg')}}"
            alt="Table Full of Spices"
            class="w-100 h70 mb-3    shadow-1-strong rounded"
            data-aos="zoom-in-left" data-aos-duration="2000"
          />
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection