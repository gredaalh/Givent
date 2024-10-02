@extends('layout.app')
@section('title', 'updatecabang')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Ubah Data Cabang</h1>

<div class="row"></div>
<div class="col-8">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Ubah Data Cabang </h6>
    </div>
    <div class="card-body">
       <form method="post" action="{{ url('/updatemcabang',['id'=>$cabang->id] )}}" >
        @csrf
        
        <div class="form-group">
            <label for='nama_cabang'>Nama Cabang</label>
            <input type="text" name="nama_cabang"  id="nama_cabang" class="form-control" value="{{ $cabang->nama_cabang }}" required>
        </div>
      <div class="form-group">
        <label for='alamat'>Alamat</label>
        <input type="text"  id="alamat" name="alamat" class="form-control"value="{{ $cabang->alamat }}" required>
        </div>
        <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-update"></i> Ubah</button>
    </div>
</form>
</div>
</div>

</div>
</div>

<div class="col-lg-6">

@endsection