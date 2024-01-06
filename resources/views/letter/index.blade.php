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
    <h1 class="h3 mb-2 text-gray-800">Data Surat</h1>
    <p class="mb-4">.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('letter.create') }}" class="btn bg-secondary">
               
                <span class="text text-gray-100">Tambah Surat</span>
            </a>
            
            {{-- <a href="{{ route('letter.export-excel') }}" class="btn bg-secondary">
               
                <span class="text text-gray-100">Export (excel)</span>
            </a> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
            <th>No</th>
            <th>Nomor Surat</th>
            <th>Perihal</th>
            <th>Tanggal keluar</th>
            <th>Penerima Surat</th>
            <th>Notulis</th>
            <th>Hasil Rapat</th>

            
            <th class="text-center">Aksi</th>
                          
                        </tr>
                    </thead>
                        
                    <tbody>
            @php $no = 1 @endphp
            @foreach ($letter as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item['letter_type_id'] }}</td>
                <td>{{ $item['letter_perihal'] }}</td>
                <td>{{ $item['created_at']->format('d/m/Y') }}</td>
                <td>{{ implode(',', array_column($item->recipients, 'name')) }}</td>
                <td>{{ $item->user->name }}</td>
                <td></td>
                
               
                <td class="text-center " style="
                    text-align: center;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                ">
                   <a href="" class="text-primary mr-2">Lihat</a>
                <a href="{{ route('tipe.edit', $item->id)}}" class="btn btn-primary mr-2" >Edit</a>
                
          <form action="{{ route('tipe.delete', $item->id) }}" method="post">
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