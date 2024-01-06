@extends('layouts.template')

@section('content')

@if(Session::get('success'))
<div class="alert alert-success"> {{ Session::get('success') }} </div>
@endif
@if(Session::get('deleted'))
<div class="alert alert-warning"> {{ Session::get('deleted') }} </div>
@endif
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Data Staff</h1>
    <p class="mb-4">.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('user.create') }}" class="btn bg-secondary">
               
                <span class="text text-gray-100">Tambah Staff</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th class="text-center">Aksi</th>
                          
                        </tr>
                    </thead>
                        
                    <tbody>
            @php $no = 1 @endphp
            @foreach ($user as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['email'] }}</td>
                <td>{{ $item['role'] }}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{ route('user.edit', $item->id)}}" class="btn btn-primary me-3">Edit</a>
                
          <form action="{{ route('user.delete', $item->id) }}" method="post">
            @csrf
            @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
        
                </td>
            </tr>
            @endforeach
        </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection