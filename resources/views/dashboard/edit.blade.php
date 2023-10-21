@extends('admin')

@section('content')
<div class="container mt-5">
@include('includes.notification')
    <div class="card">

        <div class="card-header">
            <h2>Edit Buku</h2>
        </div>

    <div class="card-body">
        <form action="{{ route('buku.update', $buku->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menggunakan metode PUT untuk mengirim perubahan -->

            <div class="form-group">
                <label for="judul">Judul Buku:</label>
                <input type="text" class="form-control border-bottom" id="judul" name="judul" value="{{ $buku->judul }}" required>
            </div>

            <div class="form-group">
                <label for="penulis">Penulis:</label>
                <input type="text" class="form-control border-bottom" id="penulis" name="penulis" value="{{ $buku->penulis }}" required>
            </div>

            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit:</label>
                <input type="number" class="form-control border-bottom" id="tahun_terbit" name="tahun_terbit" value="{{ $buku->tahun_terbit }}" required>
            </div>

            <div class="form-group">
                <label>Kategori:</label>
                @foreach($kategoriOptions as $kategori)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="kategori_{{ $kategori }}" name="kategori[]" value="{{ $kategori }}" {{ in_array($kategori, $kategoriBuku) ? 'checked' : '' }}>
                        <label class="form-check-label" for="kategori_{{ $kategori }}">{{ $kategori }}</label>
                    </div>
                @endforeach
                <label>Tambah kategori lain:</label>
                <input type="text" class="form-control border-bottom" id="kategori_lain" name="kategori_lain" placeholder="Kategori Lain" value="{{ old('kategori_lain') }}">
            </div>


            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
