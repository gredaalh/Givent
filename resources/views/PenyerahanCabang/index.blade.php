@extends('layout.app')
@section('title', 'penyerahancabang')
@section('content')
  
        <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Penyerahan Aset Cabang</h1>

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <a href="{{ url('/tambahpenyerahancabang') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Tambah </a>
       </div>
       <div class="card-body">
           <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                       <tr class ="text-center">
                           <th>No</th>
                           <th>Tanggal Penyerahan</th>
                           <th>Nama Cabang</th>
                           <th>Aset</th>
                           <th>Satuan</th>
                           <th>Jumlah</th>
                           <th>Kondisi</th>
                           <th>Aksi</th>

                       </tr>
                   </thead>
                   <tbody>
                    <?php $no = 1;?>
                    @foreach ($pucab as $item)
                    <tr class ="text-center">
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->mcabang->nama_cabang }}</td>
                        <td>{{ $item->maset->nama_aset }}</td>
                        <td>{{ $item->satuan }}</td>
                        <td>{{ $item->jumlah }}</td>
                        @if($item->kondisi == 0)
                        <td class="text-center"><span class="badge badge-success">Baik</span></td>
                        @elseif($item->kondisi == 1)
                        <td class="text-center"><span class="badge badge-warning">Rusak Ringan</span></td>
                        @elseif($item->kondisi == 2)
                        <td class="text-center"><span class="badge badge-danger">Rusak Berat</span></td>
                        @endif
                        <td>
                            <a href="{{ url('/editpenyerahancabang', $item->id) }}"class='btn btn-warning btn-sm'> <i class="fas fa-edit"></i></a>
                            <a href="{{ url('/deletepenyerahancabang', $item->id) }}"class='btn btn-danger btn-sm'> <i class="fas fa-trash"></i></a>
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