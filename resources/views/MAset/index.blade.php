@extends('layout.app')
@section('title', 'dataaset')
@section('content')
  
        <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Master Aset</h1>
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <a href="{{ url('/tambahmaset') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Tambah </a>
       </div>
       <div class="card-body">
           <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                       <tr class ="text-center">
                        <th rowspan="2" style="vertical-align: middle;" class="text-center">No</th>
                        <th rowspan="2" style="vertical-align: middle;" class="text-center">Tanggal Pembelian</th>
                        <th rowspan="2" style="vertical-align: middle;" class="text-center">Id Aset</th>
                        <th rowspan="2" style="vertical-align: middle;" class="text-center">Nama Aset</th>
                        <th rowspan="2" style="vertical-align: middle;" class="text-center">Kategori</th>
                        <th rowspan="2" style="vertical-align: middle;" class="text-center">Vendor</th>
                        <th rowspan="2" style="vertical-align: middle;" class="text-center">Satuan</th>
                        <th rowspan="2" style="vertical-align: middle;" class="text-center">Jumlah</th>
                        <th colspan="2" class="text-center">Harga</th>
                        <th rowspan="2" style="vertical-align: middle;" class="text-center">Aksi</th>
                        </tr>
                        <tr>
                            <th class="text-center">Satuan</th>
                            <th class="text-center">Total</th>
                        </tr>
                </tr>
                   </thead>
                   <tbody>
                    <?php $no = 1;?>
                    @foreach ($maset as $item)
                    <tr class ="text-center">
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->id_aset }}</td>
                        <td>{{ $item->nama_aset }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>{{ $item->mvendor->nama_vendor }}</td>
                        <td>{{ $item->satuan}}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>Rp. {{number_format($item->harga_satuan) }}</td>
                        <td>Rp. {{number_format($item->harga_total) }}</td>
                        <td>
                            <a href="{{ url('/editmaset', $item->id) }}"class='btn btn-warning btn-sm'> <i class="fas fa-edit"></i></a>
                            <a href="{{ url('/deletemaset', $item->id) }}"class='btn btn-danger btn-sm'> <i class="fas fa-trash"></i></a>
                        </td>
                    </tr>                   
                </tbody>
                    @endforeach
               </table>
           </div>
       </div>
   </div>

</div>
<!-- /.container-fluid -->
@endsection