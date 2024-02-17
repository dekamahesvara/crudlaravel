@extends('layout.admin.main')
@section('content')
<table class="table mt-5 table-hover table-bordered caption-top table-responsive table align-middle">
        <caption>List of All Class</caption>
        <thead>
          <tr class="table-dark">
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($kelas as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->nama}}</td>
                <td class="d-flex justify-content-evenly">

                  <form action="">
                    <a href="/dashboard/kelas/edit{{$item->id}}"><button type="button" class="btn btn-outline-success">Edit</button></a>
                  </form>

                  <form action="">
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
                      Delete
                    </button>
                  </form>

                      <div class="modal fade" id="deleteModal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteModalLabel{{ $item->id }}">Alert!</h1>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center">Are you sure you want to delete {{$item->nama}}?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form action="/dashboard/kelas/delete/{{$item->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                      </div>
                  
                </td>
              </tr>
            @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-between">

  <a href="/dashboard/kelas/create"><button type="button" class="btn btn-success rounded-circle">+</button></a>
  
  <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <li class="page-item{{ $kelas->onFirstPage() ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $kelas->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">{{ $kelas->currentPage() }} of {{ $kelas->lastPage() }}</a>
        </li>
        <li class="page-item{{ $kelas->hasMorePages() ? '' : ' disabled' }}">
            <a class="page-link" href="{{ $kelas->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
  </nav>

</div>


@if(session('success'))
    <div class="modal" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Success!</h1>
          </div>
          <div class="modal-body">
            {{ session('success') }}
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

    @elseif(session('error'))
    <div class="modal" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Error!</h1>
          </div>
          <div class="modal-body">
            {{ session('error') }}
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


@endsection