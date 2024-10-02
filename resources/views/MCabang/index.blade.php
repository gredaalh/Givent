@extends('layout.app')
@section('title', 'penyerahan')
@section('content')
  
        <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Cabang</h1>
   @if (session ('massage'))
   <div class="alert alert-succes alert-dismissible fade show" role="alert">
    {{ session('massage') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
       
   @endif
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <a href="{{ url('/tambahmcabang') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Tambah </a>
       </div>
       <div class="card-body">
           <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                       <tr class ="text-center">
                           <th>No</th>
                           <th>Nama Cabang</th>
                           <th>Alamat</th>
                           <th>Action</th>

                       </tr>
                   </thead>
                   <tbody>
                    <?php $no = 1;?>
                    @foreach ($cabang as $item)
                    <tr class ="text-center">
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->nama_cabang }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                            <a href="{{ url('/editmcabang', $item->id) }}"class='btn btn-warning btn-sm'> <i class="fas fa-edit"></i>Edit</a>
                            <a href="{{ url('/deletemcabang', $item->id) }}"class='btn btn-danger btn-sm'> <i class="fas fa-trash"></i>Delete</a>
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