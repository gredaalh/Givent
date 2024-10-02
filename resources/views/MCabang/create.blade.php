@extends('layout.app')
@section('title', 'cabang')
@section('content')

<div class="card shadow mb-4 mt-5">
    <div class="card-body">
        <h3 class="font-weight-bold text-secondary mb-2 mt-2"><strong>Tambah Cabang</strong></h3>
        <form class="p-3" method="POST" action="{{ url('/savemcabang') }}">
            @csrf
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="nama_cabang">Nama Cabang</label>
                    <input type="text" class="form-control" id="nama_cabang" name="nama_cabang" required>
                </div>
                <div class="col-md-6">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
</div>
@endsection