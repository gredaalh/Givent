@extends('layout.app')
@section('title', 'tambah penyerahanpegawai')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Tambah Penyerahan Pegawai</h1>

<div class="row"></div>
<div class="col-8">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Penyerahan Pegawai</h6>
    </div>
    <div class="card-body">
       <form action="{{ url('/savepenyerahanpegawai') }}" method="post">
        @csrf
        <div class="form-group">
            <label for='tanggal'>Tanggal Penyerahan</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="form-group">
            <label for='name'>Nama Pegawai</label>
            <select class="form-control" id="name" name="name" required>
                <option disabled value>Pilih User</option>
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for='nama_aset'>Aset</label>
            <select class="form-control" id="nama_aset" name="nama_aset" required>
                <option disabled value>Pilih Aset</option>
                @foreach($maset as $maset)
                <option value="{{$maset->id}}">{{$maset->id_aset}} {{$maset->nama_aset}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for='satuan'>Satuan</label>
            <select class="form-control" id="satuan" name="satuan" required>
                <option disabled value>Pilih Satuan</option>
                <option value="Pcs">Pcs</option>
                <option value="Set">Set</option>
                <option value="Pack">Pack</option>
            </select>
        </div>
        <div class="form-group">
            <label for='jumlah'>Jumlah</label>
            <input type="number" id='jumlah' name="jumlah" class="form-control" required>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="kondisi">Kondisi</label>
                <select class="form-control" id="kondisi" name="kondisi" required>
                    <option value="0">Baik</option>
                    <option value="1">Rusak Ringan</option>
                    <option value="2">Rusak Berat</option>
                </select>
            </div>
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