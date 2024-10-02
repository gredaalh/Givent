@extends('layout.app')
@section('title', 'tambah penyerahancabang')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Ubah Penyerahan Cabang</h1>

<div class="row"></div>
<div class="col-8">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Ubah Penyerahan Cabang</h6>
    </div>
    <div class="card-body">
       <form method="post" action="{{ url('/updatepenyerahancabang' ,['id'=> $pucab->id]) }}">
        @csrf
        <div class="form-group">
            <label for='tanggal'>Tanggal Penyerahan</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $pucab->tanggal }}"  required>
        </div>
        <div class="form-group">
            <label for='nama_cabang'>Nama Cabang</label>
            <select class="form-control" id="nama_cabang" name="nama_cabang" required>
                <option disabled value>Pilih Cabang</option>
                @foreach($mcabang as $cabang)
                <option value="{{$cabang->id}} {{ $pucab->cabang_id == $cabang->id ? 'selected' : '' }} ">{{$cabang->nama_cabang}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for='nama_aset'>Aset</label>
            <select class="form-control" id="nama_aset" name="nama_aset" required>
                <option disabled value>Pilih Aset</option>
                @foreach($maset as $maset)
                <option value="{{$maset->id}} {{ $pucab->aset_id == $maset->id ? 'selected' : '' }}">{{$maset->id_aset}} {{$maset->nama_aset}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for='satuan'>satuan</label>
            <select class="form-control" id="satuan" name="satuan" required>
                <option disabled value>Pilih Satuan</option>
                <option value="Pcs"{{ $pucab->satuan === 'Pcs' ? 'selected' : '' }}>Pcs</option>
                <option value="Set"{{ $pucab->satuan === 'Set' ? 'selected' : '' }}>Set</option>
                <option value="Pack"{{ $pucab->satuan === 'Pack' ? 'selected' : '' }}>Pack</option>
            </select>
        </div>
        <div class="form-group">
            <label for='jumlah'>Jumlah</label>
            <input type="number" id='jumlah' name="jumlah" class="form-control" value="{{ $pucab->jumlah }}" required>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="kondisi">Kondisi</label>
                <select class="form-control" id="kondisi" name="kondisi" value="{{ $pucab->kondisi }}" required>
                    <option value="0"{{ $pucab->kondisi === '0' ? 'selected' : '' }}>Baik</option>
                    <option value="1"{{ $pucab->kondisi === '1' ? 'selected' : '' }}>Rusak Ringan</option>
                    <option value="2"{{ $pucab->kondisi === '2' ? 'selected' : '' }}>Rusak Berat</option>
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