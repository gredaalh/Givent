@extends('layout.app')
@section('title', 'ubah penyerahanpegawai')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Ubah Penyerahan Pegawai</h1>

<div class="row"></div>
<div class="col-8">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Ubah Penyerahan Pegawai</h6>
    </div>
    <div class="card-body">
       <form method="post" action="{{ url('/updatepenyerahanpegawai' ,['id'=> $pwai->id]) }}">
        @csrf
        <div class="form-group">
            <label for='tanggal'>Tanggal Penyerahan</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $pwai->tanggal }}"  required>
        </div>
        <div class="form-group">
            <label for='name'>Nama Pegawai</label>
            <select class="form-control" id="name" name="name"  required>
                <option disabled value>Pilih User</option>
                @foreach($users as $user)
                <option value="{{$user->id}} {{ $pwai->user_id == $user->id ? 'selected' : '' }} ">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for='nama_aset'>Aset</label>
            <select class="form-control" id="nama_aset" name="nama_aset" required>
                <option disabled value>Pilih Aset</option>
                @foreach($maset as $maset)
                <option value="{{$maset->id}} {{ $pwai->aset_id == $maset->id ? 'selected' : '' }}">{{$maset->id_aset}} {{$maset->nama_aset}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for='satuan'>satuan</label>
            <select class="form-control" id="satuan" name="satuan" required>
                <option disabled value>Pilih Satuan</option>
                <option value="Pcs"{{ $pwai->satuan === 'Pcs' ? 'selected' : '' }}>Pcs</option>
                <option value="Set"{{ $pwai->satuan === 'Set' ? 'selected' : '' }}>Set</option>
                <option value="Pack"{{ $pwai->satuan === 'Pack' ? 'selected' : '' }}>Pack</option>
            </select>
        </div>
        <div class="form-group">
            <label for='jumlah'>Jumlah</label>
            <input type="number" id='jumlah' name="jumlah" class="form-control" value="{{ $pwai->jumlah }}" required>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="kondisi">Kondisi</label>
                <select class="form-control" id="kondisi" name="kondisi" value="{{ $pwai->kondisi }}" required>
                    <option value="0"{{ $pwai->kondisi === '0' ? 'selected' : '' }}>Baik</option>
                    <option value="1"{{ $pwai->kondisi === '1' ? 'selected' : '' }}>Rusak Ringan</option>
                    <option value="2"{{ $pwai->kondisi === '2' ? 'selected' : '' }}>Rusak Berat</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-save"></i> Ubah</button>
        </div>
       </form>
    </div>
</div>

</div>
</div>

<div class="col-lg-6">

@endsection