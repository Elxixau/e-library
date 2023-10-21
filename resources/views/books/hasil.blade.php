@extends('welcome')

@section('content')
<div class="container mt-4">

    <form class="form-inline" action="{{route('search')}}" method="GET">
        <div class="input-group">
            <input type="text" class="form-control border-bottom" id="searchInput" placeholder="Cari buku..." name="search">
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <p class="mt-4">Hasil Pencarian untuk "{{ $searchTerm }}"</p>

    <div class="row">
        @foreach($books as $book)
        <div class="col-md-5 mb-4">
            <div class="card" style="width: 18rem; ">
                <img src="{{ asset($book->gambar_sampul) }}" class="card-img-top" alt="{{ $book->judul }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->judul }}</h5>
                    <p class="card-text">{{ $book->kategori }}</p>
                    <a href="{{ route('book.download', $book->id) }}" class="btn btn-primary">Lihat Buku</a>
                </div>
            </div>  
        </div>
        @endforeach
    </div>

    @if(count($books) === 0)
    <p>Tidak ditemukan buku yang sesuai dengan kata kunci "{{ $searchTerm }}".</p>
    @endif

</div>
@endsection
