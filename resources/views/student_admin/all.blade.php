@extends('layout.admin.main')
@section('content')
  <table class="table mt-5 table-hover table-bordered caption-top table-responsive table align-middle">
   
    <caption>{{$caption}}</caption>
    <thead>
      <tr class="table-dark">
        <th scope="col">No</th>
        <th scope="col">NIS</th>
        <th scope="col">Nama</th>
        <th scope="col">Kelas</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @php
        $startIndex = ($students->currentPage() - 1) * $students->perPage() + 1;
        @endphp
        @foreach ($students as $item)
        <tr>
            <td>{{ $startIndex++ }}</td>
            <td>{{$item->nis}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->kelas->nama ?? "Class Not Found"}}</td>
            <td class="d-flex justify-content-evenly">

              <form action="">
                <button type="button" class="detail btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$item->id}}">Detail</button>
              </form>

              <form action="">
                <a href="/dashboard/student/edit{{$item->id}}"><button type="button" class="btn btn-outline-success">Edit</button></a>
              </form>

              <form action="">
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
                  Delete
                </button>
              </form>

              {{-- Delete --}}
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
                            <form action="/dashboard/student/delete/{{$item->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            {{-- Detail --}}
            <div class="modal fade" id="staticBackdrop{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <table class="table table-hover table-bordered caption-top table-responsive table align-middle">
                      <thead>
                        <tr class="table-dark">
                          <th scope="col">NIS</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Kelas</th>
                          <th scope="col">Tanggal Lahir</th>
                          <th scope="col">Alamat</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>{{ $item->nis }}</td>
                          <td>{{ $item->nama }}</td>
                          <td>{{ $item->kelas->nama ?? "Class Not Found"}}</td>
                          <td>{{ $item->tanggal_lahir }}</td>
                          <td>{{ $item->alamat }}</td>
                        </tr>
                  </tbody>
              </table>
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

    <a href="/dashboard/student/create"><button type="button" class="btn btn-success rounded-circle ">+</button></a>
    
    <nav aria-label="Page navigation">
      <ul class="pagination justify-content-center">
          <li class="page-item{{ $students->onFirstPage() ? ' disabled' : '' }}">
              <a class="page-link" href="{{ $students->previousPageUrl() }}" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
              </a>
          </li>
          <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">{{ $students->currentPage() }} of {{ $students->lastPage() }}</a>
          </li>
          <li class="page-item{{ $students->hasMorePages() ? '' : ' disabled' }}">
              <a class="page-link" href="{{ $students->nextPageUrl() }}" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
              </a>
          </li>
      </ul>
    </nav>


    <div class="d-flex ">
          <form action="/dashboard/student/all">
            <div class="input-group mb-3">
                <input type="text" value="{{request('search')}}" class="form-control pe-5" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2" name="search">
                <button class="btn btn-success" type="submit" >Search</button>
            </div>
        </form>

        <div class="dropdown ms-4">
          <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Filter by Class
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard/student/all">Show All</a></li>
            @foreach ($kelas as $item)
            <li><a class="dropdown-item" href="{{ route('filter_students_auth', $item->id) }}">{{ $item->nama }}</a></li>
              @endforeach
          </ul>
        </div>

    </div>
     
  
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
  @endif


@endsection