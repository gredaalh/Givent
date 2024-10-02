@extends('layout.app')
@section('title', 'savemvendor')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Tambah Master Vendor</h1>

<div class="row"></div>
<div class="col-8">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Master Vendor</h6>
    </div>
    <div class="card-body">
       <form action="{{ url('/savemvendor') }}" method="post">
        @csrf
        <div class="form-group">
            <label>Nama vendor</label>
            <input type="text" name="nama_vendor" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Nama Principal Sales</label>
            <input type="text" name="nama_principalsales" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Nomor HP</label>
            <input type="number" name="nomorhp" class="form-control" required>
        </div>
      <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
    </div>
</form>
</div>
</div>

</div>
</div>

<div class="col-lg-6">

@endsection