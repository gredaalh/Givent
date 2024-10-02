@extends('layout.app')
@section('title', 'mastervendor')
@section('content')
  
        <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Master Vendor</h1>
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
           <a href="{{ url('/tambahmvendor') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Tambah </a>
       </div>
       <div class="card-body">
           <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                       <tr class ="text-center">
                           <th>No</th>
                           <th>Nama Vendor</th>
                           <th>Nama Principal Sales</th>
                           <th>Nomor HP</th>
                           <th>Alamat</th>
                           <th>Aksi</th>
                       </tr>

                   </thead>
                   <tbody>
                    <?php $no = 1;?>
                    @foreach ($mvendor as $item)
                    <tr class ="text-center">
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->nama_vendor }}</td>
                        <td>{{ $item->nama_principalsales }}</td>
                        <td>{{ $item->nomorhp }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                            <a href="{{ url('/editmvendor', $item->id) }}"class='btn btn-warning btn-sm'> <i class="fas fa-edit"></i>Edit</a>
                            <a href="{{ url('/deletemvendor', $item->id) }}"class='btn btn-danger btn-sm'> <i class="fas fa-trash"></i>Delete</a>
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