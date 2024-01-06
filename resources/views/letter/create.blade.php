@extends('layouts.template')

@section('content')
    <form action="{{ route('letter.store') }}" method="POST" class="card p-5">
        @csrf
        @if(Session::get('success'))
            <div class="alert alert-success"> {{ Session::get('success') }} </div>
        @endif
        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="row">
            <div class="col">
                <label for="form-label" for="perihal">Perihal</label>
              <input type="text" class="form-control" name="letter_perihal">
            </div>
            <div class="col-md-5">
                <label for="klasifikasi" class="form-label">Klasifikasi Surat</label>
                <select  class="form-select" name="letter_type_id" id="klasifikasi">
                    <option selected disabled hidden>Pilih</option>
                        @foreach ($letter as $item)
                            <option value="{{ $item->id }}"> {{ $item->name_type }}</option>
                        @endforeach
                    </select>
            </div>
        </div>
            <div class="mb-3">
                <label for="agenda" class="form-label">Isi Surat</label>
                <textarea class="form-control" id="agenda" name="content" rows="3"></textarea>
            </div> 
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Nama</th>
                    <th>Peserta(Ceklis Jika ya)</th>
                </tr>
                @foreach($user as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="flexCheckChecked" name="recipients[]">
                            </div>
                        </td>
                    </tr> 
                @endforeach
            </table>
            <div class="mb-3">
                <label for="lampiran" class="form-label">Lampiran</label>
                <input class="form-control" type="file" id="attachment">
            </div>
            <div class="mb-3">
                <label for="notulis" class="form-label">Notulis</label>
                <select id="notulis" class="form-select" name="notulis">
                    <option selected disabled hidden>Pilih</option>
                    @foreach ($user as $item)
                        <option value="{{ $item->id}}">{{ $item->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        
    </form>
@endsection