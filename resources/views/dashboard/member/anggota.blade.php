@extends('admin')

@section('content')
<div class="container mt-4">
    <div class="card">
    
        <div class="card-header"> Daftar Anggota</div>
        
        <div class="card-body">
                    @include('includes.notification')
                 
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <a href="{{ route('add') }}" class="btn btn-primary mb-3"><span>Tambah Anggota</a>
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
                        <th scope="col">id</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">name</th>
                        <th scope="col">username</th>
                        <th scope="col">role</th>
                        <th scope="col">Password</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($user as $u)
                                <tr>
                                    <td>{{ $u->id }}</td>
                                    <td >
                                        <center>
                                        <a href="{{ route('change', $u->id) }}" class="btn btn-primary btn-sm mb-2 " style="width: 70px;">Edit </a>
                                        <form action="{{route('member.delete', $u->id)}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" style="width: 70px;" onclick="return confirm('Apakah Anda yakin ingin menghapus {{$u->name }} dari keanggotaan?')">Hapus</button>
                                        </form>
                                        </center>
                                    </td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->username }}</td>
                                    <td>{{ $u->role }}</td>
                                    <td>{{ $u->password }}</td>
                                </tr>
                                @endforeach
                </tbody>
                </table>'
        
    </div>
</div>

@endsection('content')