@extends('layout.guest.main')

@section('content')
    <table class="table table-bordered table-hover caption-top">
      <caption>About me</caption>
          <tr>
            <td>Nama</td>
            <td>{{$nama}}</td>
          </tr>
          <tr>
            <td>Kelas</td>
            <td>{{$kelas}}</td>
          </tr>
      </table>
@endsection