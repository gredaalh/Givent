@extends('layout.app')
@section('title', 'ubah penghapusan')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Ubah Penghapusan</h1>

<div class="row"></div>
<div class="col-8">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Ubah Penghapusan</h6>
    </div>
    <div class="card-body">
       <form action="{{ url('/updatepenghapusan',['id'=> $penghapusan->id]) }}" method="post">
        @csrf
        <div class="form-group">
            <label for='tanggal'>Tanggal Penghapusan</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $penghapusan->tanggal }}" required>
        </div>
        <div class="form-group">
            <label for='nama_aset'>Nama Aset</label>
            <select class="form-control" id="nama_aset" name="nama_aset" required>
                <option disabled value>Pilih Aset</option>
                @foreach($maset as $maset)
                <option value="{{$maset->id}}{{$maset->id == $penghapusan->nama_aset  ? 'selected' : '' }}">{{$maset->id_aset}} {{$maset->nama_aset}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for='jumlah_hapus'>Jumlah Dihapus</label>
            <input type="number" id='jumlah_hapus' name="jumlah_hapus" class="form-control" value="{{ $penghapusan->jumlah_hapus }}"required>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="kondisi">Kondisi</label>
                <select class="form-control" id="kondisi" name="kondisi" required>
                    <option value="0"{{ $penghapusan->kondisi === '0' ? 'selected' : '' }}>Dibuang</option>
                    <option value="1"{{ $penghapusan->kondisi === '1' ? 'selected' : '' }}>Dihibahkan</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for='keterangan'>Keterangan</label>
            <textarea class="form-control" id='keterangan' rows="3" name="keterangan" value="{{ $penghapusan->keterangan }}" required></textarea>
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