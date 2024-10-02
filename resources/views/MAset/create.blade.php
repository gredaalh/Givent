@extends('layout.app')
@section('title', 'tambah data aset')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Tambah Data Aset</h1>

<div class="row"></div>
<div class="col-8">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data</h6>
    </div>
 
    <div class="card-body">
       <form action="{{ url('/savemaset') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="tanggal">Tanggal Pembelian</label>
             <input class="form-control" type="date" id="tanggal" name="tanggal" required>
        </div>
        <div class="form-group">
            <label>Id Aset</label>
            <input type="text" name="id_aset" value="{{ $nextCode }}" class="form-control"readonly>
        </div>
        <div class="form-group">
            <label for="nama_aset">Nama Aset</label>
             <input class="form-control" id="nama_aset" name="nama_aset" required>
        </div>
        <div class="form-group">
            <label for='kategori'>Kategori</label>
            <select class="form-control" id="kategori" name="kategori" required>
                <option disabled value>Pilih Kategori</option>
                <option value="Alat Kantor">Alat Kantor</option>
                <option value="Alat Elektronik">Alat Elektronik</option>
                <option value="Alat Kebersihan">Alat Kebersihan</option>
                <option value="Alat Dapur">Alat Dapur</option>
                <option value="Alat Produksi">Alat Produksi</option>
                <option value="Alat Kasir">Alat Kasir</option>
                <option value="Alat Gudang">Alat Gudang</option>
                <option value="Alat Dekorasi">Alat Dekorasi</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nama_vendor">Vendor</label>
            <select class="form-control" id="nama_vendor" name="nama_vendor" required>
                <option disabled value>Pilih Vendor</option>
                @foreach($vendor as $vendor)
                <option value="{{$vendor->id}}">{{$vendor->nama_vendor}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>satuan</label>
            <select class="form-control" id="satuan" name="satuan" required>
                <option disabled value>Pilih Satuan</option>
                <option value="Pcs">Pcs</option>
                <option value="Set">Set</option>
                <option value="Pack">Pack</option>
            </select>
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
           
        </div>
        <div class="form-group">
            <label>Harga Satuan</label>
            <input type="number" name="harga_satuan" step="0.01" class="form-control" required> 
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