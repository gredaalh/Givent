@extends('layout.app')
@section('title', 'penghapusan')
@section('content')
  
        <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Penghapusan Aset</h1>
   
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <a href="{{ url('/tambahpenghapusan') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Tambah </a>
       </div>
       <div class="card-body">
           <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                       <tr class ="text-center">
                           <th>No</th>
                           <th>Tanggal Dihapus</th>
                           <th>Nama Aset</th>
                           <th>Jumlah Dihapus</th>
                           <th>Kondisi</th>
                           <th>Keterangan</th>
                           <th>Aksi</th>
                       </tr>
                   </thead>
                   <tbody>
                    <?php $no = 1;?>
                    @foreach ($penghapusan as $item)
                    <tr class ="text-center">
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->tanggal }}</td>>
                        <td>{{ $item->maset->nama_aset }}</td>
                        <td>{{ $item->jumlah_hapus }}</td>
                        @if($item->kondisi == 0)
                        <td class="text-center"><span class="badge badge-success">Dibuang</span></td>
                        @elseif($item->kondisi == 1)
                        <td class="text-center"><span class="badge badge-warning">Dihibahkan</span></td>
                        @endif
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a href="{{ url('/editpenghapusan', $item->id) }}"class='btn btn-warning btn-sm'> <i class="fas fa-edit"></i></a>
                            <a href="{{ url('/deletepenghapusan', $item->id) }}"class='btn btn-danger btn-sm'> <i class="fas fa-trash"></i></a>
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