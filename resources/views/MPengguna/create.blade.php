@extends('layout.app')
@section('title', 'tambah pengguna')
@section('content')


<h1 class="h3 mb-2 text-gray-800">Tambah Master Pengguna</h1>

<div class="row"></div>
<div class="col-8">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Master Pengguna</h6>
    </div>
    <div class="card-body">
       <form action="{{ url('/savempengguna') }}" method="post">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Jabatan</label>
            <select class="form-control" id="jabatan" name="jabatan" required>
                <option value="CEO">CEO</option>
                <option value="CMO">CMO</option>
                <option value="CFO">CFO</option>
                <option value="Manajer">Manajer</option>
                <option value="Supervisor">Supervisor</option>
                <option value="Staf">Staf</option>
            </select>
        </div>
        <div class="form-group">
            <label>Divisi</label>
            <select class="form-control" id="divisi" name="divisi" required>
                <option value="Operaional">Operasional</option>
                <option value="Finance">Finance</option>
                <option value="Marketing">Marketing</option>
            </select>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
    </div>
</form>
</div>
</div>

</div>

<div class="col-lg-6">

@endsection