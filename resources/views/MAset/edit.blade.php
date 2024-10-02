@extends('layout.app')
@section('title', 'ubah data aset')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Ubah Master Aset</h1>

<div class="row"></div>
<div class="col-8">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Ubah Master Aset</h6>
    </div>
    <div class="card-body">
       <form method="post" action= "{{ url('/updatemaset',['id'=> $maset->id] )}}" >
        @csrf
        <div class="form-group">
            <label for='tanggal'>Tanggal Pembelian</label>
            <input type="text" type="date" name="tanggal" id='tanggal' class="form-control" value="{{ $maset->tanggal }}" readonly>
        </div>
        <div class="form-group">
            <label>Id Aset</label>
            <input type="text" id='id_aset' name="id_aset" class="form-control" value="{{ $maset->id_aset }}" readonly>
        </div>
        <div class="form-group">
            <label for="nama_aset">Nama Aset</label>
             <input class="form-control" id="nama_aset" name="nama_aset" value="{{ $maset->nama_aset }}"required>
        </div>
        <div class="form-group">
            <label for='kategori'>Kategori</label>
            <select class="form-control" id="kategori" name="kategori" required>
                <option disabled value>Pilih Kategori</option>
                <option value="Alat Kantor"{{ $maset->kategori === 'Alat Kantor' ? 'selected' : '' }}>Alat Kantor</option>
                <option value="Alat Elektronik"{{ $maset->kategori === 'Alat Elektronik' ? 'selected' : '' }}>Alat Elektronik</option>
                <option value="Alat Kebersihan"{{ $maset->kategori === 'Alat Kebersihan' ? 'selected' : '' }}>Alat Kebersihan</option>
                <option value="Alat Dapur"{{ $maset->kategori === 'Alat Dapur' ? 'selected' : '' }}>Alat Dapur</option>
                <option value="Alat Produksi"{{ $maset->kategori === 'Alat Produksi' ? 'selected' : '' }}>Alat Produksi</option>
                <option value="Alat Kasir"{{ $maset->kategori === 'Alat Kasir' ? 'selected' : '' }}>Alat Kasir</option>
                <option value="Alat Gudang"{{ $maset->kategori === 'Alat Gudang' ? 'selected' : '' }}>Alat Gudang</option>
                <option value="Alat Dekorasi"{{ $maset->kategori === 'Alat Dekorasi' ? 'selected' : '' }}>Alat Dekorasi</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nama_vendor">Vendor</label>
            <select class="form-control" id="nama_vendor" name="nama_vendor" required>
                <option disabled value>Pilih Vendor</option>
                @foreach($vendor as $vendor)
                <option value="{{$vendor->id}} {{ $maset->vendor_id == $vendor->id ? 'selected' : '' }} ">{{$vendor->nama_vendor}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for='satuan'>satuan</label>
            <select class="form-control" id="satuan" name="satuan" required>
                <option disabled value>Pilih Satuan</option>
                <option value="Pcs"{{ $maset->satuan === 'Pcs' ? 'selected' : '' }}>Pcs</option>
                <option value="Set"{{ $maset->satuan === 'Set' ? 'selected' : '' }}>Set</option>
                <option value="Pack"{{ $maset->satuan === 'Pack' ? 'selected' : '' }}>Pack</option>
            </select>
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ $maset->jumlah }}" >
        </div>
        <div class="form-group">
            <label>Harga Satuan</label>
            <input type="number" name="harga_satuan" class="form-control" value="{{ $maset->harga_satuan }}" >
           
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