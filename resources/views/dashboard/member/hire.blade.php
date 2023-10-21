@extends('admin') 

@section('content')
<div class="container scoped-container mt-4">
    @include('includes.notification')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Anggota</div>

                <div class="card-body">
                    
                    <form action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="judul">Nama</label>
                            <input type="text" class="form-control border-bottom" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="penulis">Username</label>
                            <input type="text" class="form-control border-bottom" id="username" name="username" required>
                        </div>

                        <div class="form-group">
                            <label for="penulis">Password</label>
                            <input type="password" class="form-control border-bottom" id="password" name="password" required>
                        </div>  

                        <button type="submit" class="btn btn-primary">Tambah Anggota</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
