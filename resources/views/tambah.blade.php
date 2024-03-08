@extends('template')
@section('main')
    <form action="{{ route('siswa.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">NIS</label>
            <input type="number" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ old('nis') }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" class="form-control  @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Alamat</label>
            <input type="text" class="form-control  @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}">
        </div>
        <label for="exampleInputEmail1" class="form-label">Sekolah</label>
        <div class="input-group mb-3">
            <select class="form-control" name="sekolah_id">
                @foreach ($sekolah as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_sekolah }}</option>
                @endforeach
              </select>              
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection