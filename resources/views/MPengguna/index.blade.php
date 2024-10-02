@extends('layout.app')
@section('title', 'Pengguna')
@section('content')
  
        <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Master Pengguna</h1>
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <a href="{{ url('/tambahmpengguna') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Tambah </a>
       </div>
       <div class="card-body">
           <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                       <tr class ="text-center">
                           <th>No</th>
                           <th>Nama</th>
                           <th>Username</th>
                           <th>Jabatan</th>
                           <th>Divisi</th>
                           <th>Action</th>
                       </tr>
                   </thead>
                   <tbody>
                    <?php $no = 1;?>
                    @foreach ($users as $item)
                    <tr class ="text-center">
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td>{{ $item->divisi }}</td>
                        <td>
                            <a href="{{ url('/editmpengguna', $item->id) }}"class='btn btn-warning btn-sm'> <i class="fas fa-edit"></i></a>
                            <a href="{{ url('/deletempengguna', $item->id) }}"class='btn btn-danger btn-sm'> <i class="fas fa-trash"></i></a>
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