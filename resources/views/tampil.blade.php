@extends('template')

@section('main')
<h2>Data Siswa</h2>
{{-- <a href="{{ url('siswa/create') }}" class="btn btn-primary">Tambah Data</a> --}}
<a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Data</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">NIS</th>
        <th scope="col">Nama</th>
        <th scope="col">Alamat</th>
        <th scope="col">Sekolah</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->nis }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->sekolah->nama_sekolah }}</td>
                <td><a class="btn btn-warning" href="{{url('siswa/'. $item->id . '/edit')}}">Edit</a></td>
                <td>
                    <form action="{{route('siswa.destroy', $item->id)}}" method="POST">
                      @csrf 
                      @method('delete')
                      <button class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>      
        @endforeach 
    </tbody>
  </table>
@endsection