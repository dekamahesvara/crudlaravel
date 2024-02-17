@extends('layout.admin.main')
@section('content')
    <div class="container mt-4">

        @if(session('danger'))
        <div class="modal" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Error!</h1>
            </div>
            <div class="modal-body">
                {{ session('danger') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Okay</button>
            </div>
            </div>
         </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var myModal = new bootstrap.Modal(document.getElementById('successModal'));
                myModal.show();
            });
        </script>
        @endif

        {{-- <a href="/student/all" class="btn btn-primary mb-4">Back to List</a> --}}

        <div class="card mt-5">
            <div class="card-header">
                <h5 class="card-title">Edit Student</h5>
            </div>
            <div class="card-body">
                <form action="/dashboard/student/update/{{$student->id}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" name="nis" class="form-control" id="nis" placeholder="Enter NIS" value="{{old('nis', $student->nis)}}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Enter student name" value="{{old('nama', $student->nama)}}"> 
                    </div>
                    <div class="form-group">
                        <label for="kelas_id">Kelas</label>
                        <select name="kelas_id" id="kelas_id" class="form-control">
                            @foreach ($kelas as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $student->kelas_id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nis">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{old('tanggal_lahir', $student->tanggal_lahir)}}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Enter student address" value="{{old('alamat', $student->alamat)}}">
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">Update Student</button>
                </form>
            </div>
        </div>
    </div>
@endsection