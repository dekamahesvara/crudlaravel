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


        <div class="card mt-5">
            <div class="card-header">
                <h5 class="card-title">Add Class</h5>
            </div>
            <div class="card-body">
                <form action="/dashboard/kelas/add" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Kelas</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Enter class name" value="{{old('nama')}}"> 
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">Add Class</button>
                </form>
            </div>
        </div>
    </div>
@endsection