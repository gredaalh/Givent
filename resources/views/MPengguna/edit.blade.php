@extends('layout.app')
@section('title', 'ubah master pengguna')
@section('content')


<h1 class="h3 mb-2 text-gray-800">Ubah Master Pengguna</h1>

<div class="row"></div>
<div class="col-8">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Ubah Master Pengguna</h6>
    </div>
    <div class="card-body">
       <form method="post" action="{{ url('/updatempengguna', ['id'=>$users->id ] ) }}">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" class="form-control" value="{{$users->name}}" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control" value="{{$users->username}}" required>
        </div>
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <select class="form-control" id="jabatan" name="jabatan"  required>
                <option value="CEO"{{ $users->jabatan === 'CEO' ? 'selected' : '' }}>CEO</option>
                <option value="CMO"{{ $users->jabatan === 'CMO' ? 'selected' : '' }}>CMO</option>
                <option value="COO">{{ $users->jabatan === 'COO' ? 'selected' : '' }}COO</option>
                <option value="Manajer"{{ $users->jabatan === 'Manajer' ? 'selected' : '' }}>Manajer</option>
                <option value="Supervisor"{{ $users->jabatan === 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
                <option value="Staf"{{ $users->jabatan === 'Staff' ? 'selected' : '' }}>Staf</option>
            </select>
        </div>
        <div class="form-group">
            <label for="divisi">Divisi</label>
            <select class="form-control" id="divisi" name="divisi" value="{{$users->divisi}}" required>
                <option value="Operaional"{{ $users->divisi === 'Operasional' ? 'selected' : '' }}>Operasional</option>
                <option value="Finance"{{ $users->divisi === 'Finance' ? 'selected' : '' }}>Finance</option>
                <option value="Marketing"{{ $users->divisi === 'Marketing' ? 'selected' : '' }}>Marketing</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{$users->email}}" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" id="password" name="password" class="form-control" >
        </div>
        
        <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-save"></i> Ubah</button>
    </div>
</form>
</div>
</div>

</div>

<div class="col-lg-6">

@endsection