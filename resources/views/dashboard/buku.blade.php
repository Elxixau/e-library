@extends('admin')

@section('content')
<div class="container mt-4">
    <div class="card">
    
        <div class="card-header"> Daftar Buku</div>
        
        <div class="card-body">
                    @include('includes.notification')
                 
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <a href="{{ route('upload') }}" class="btn btn-primary mb-3"><span>Tambah Buku</a>
                            <form action="{{ route('filter') }}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control border-bottom" id="searchInput" placeholder="filter data" name="search">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>


                    
                        <div class="table-responsive">
                            <table class="table table-bordered mt-2">
                            <thead class="thead-dark">
                    <tr>
                        <th scope="col">Aksi</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Tahun_Terbit</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Url_buku</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($buku as $b)
                                <tr>
                                    <td>
                                        <a href="{{ route('edit', $b->id) }}" class="btn btn-primary btn-sm mb-2" style="width: 70px;">Edit </a>
                                        <form action="{{ route('buku.delete', $b->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" style="width: 70px;" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</button>
                                        </form>
                                    </td>
                                    <td>{{ $b->judul }}</td>
                                    <td>{{ $b->penulis }}</td>
                                    <td>{{ $b->tahun_terbit }}</td>
                                    <td>{{ $b->kategori }}</td>
                                    <td>{{ $b->pdf_path }}</td>
                                </tr>
                                @endforeach
                </tbody>
                </table>'
        
    </div>
</div>


@endsection
