@extends('admin')

@section('content')
<div class="container mt-5">
@include('includes.notification')
    <div class="card">

        <div class="card-header">
            <h2>Edit Akun ({{$user->name}})</h2>
        </div>

    <div class="card-body">
        <form action="{{ route('member.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menggunakan metode PUT untuk mengirim perubahan -->
            <div class="form-group">
                            <label for="judul">Nama ({{$user->name}})</label>
                            <input type="text" class="form-control border-bottom" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="penulis">Username ({{$user->username}})</label>
                            <input type="text" class="form-control border-bottom" id="username" name="username" required>
                        </div>

                        <div class="form-group">
                            <label for="penulis">Password ({{$user->password}})</label>
                            <input type="text" class="form-control border-bottom" id="password" name="password" required>
                        </div>  
        
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
