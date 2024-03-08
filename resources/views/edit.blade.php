@extends('template')
@section('main')
    <h2>Edit Data</h2>
    <form action="{{ route('siswa.update', $data->id)}}" method="POST">
        @csrf
        @method('put')
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">NIS</label>
            <input type="number" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ $data->nis }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" class="form-control  @error('nama') is-invalid @enderror" name="nama" value="{{ $data->nama }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Alamat</label>
            <input type="text" class="form-control  @error('alamat') is-invalid @enderror" name="alamat" value="{{ $data->alamat }}">
        </div>
        <label for="exampleInputEmail1" class="form-label">Sekolah</label>
        <div class="input-group mb-3">
            <select class="form-control" name="sekolah_id">
                @foreach ($sekolah as $item)
                    <option value="{{ $item->id }}" @selected($data->sekolah_id == $item->id)>{{ $item->nama_sekolah }}</option>
                @endforeach
              </select>              
          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection