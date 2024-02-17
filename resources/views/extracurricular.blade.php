@extends('layout.guest.main')
@section('content')
<table class="table mt-5 table-hover table-bordered caption-top table-responsive">
    <caption>List of Extracurriculars</caption>
    <thead>
      <tr class="table-dark">
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Nama Pembina</th>
        <th scope="col">Deskripsi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($extracurriculars as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$item["nama"]}}</td>
            <td>{{$item["nama_pembina"]}}</td>
            <td>{{$item["deskripsi"]}}</td>
          </tr>
        @endforeach
    </tbody>
  </table>
@endsection

