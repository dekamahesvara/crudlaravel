@extends('layout.guest.main')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <main class="d-flex justify-content-center align-items-center" style="height: 90vh">
        <div class="w-50">
            <form action="/login" method="POST">
                @csrf
                <h1 class="h3 mb-5 fw-normal">Please Log In</h1>

                <div class="form-floating mb-2">
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        placeholder=""
                    />
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating mb-5">
                    <input
                        type="password"
                        class="form-control"
                        id="password"
                        name="password"
                        placeholder=""
                    />
                    <label for="password">Password</label>
                </div>
               
                <button class="btn btn-primary w-100 py-2" type="submit">
                    Log In
                </button>
              
                <div class="text-start my-3">
                    <p>Don't have an account?
                        <a href="/register">Register</a>
                    </p>
                </div>
            </form>
        </div>
    </main>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

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
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Okay</button>
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

@if(session('LoginError'))
    <div class="modal" id="errorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Error!</h1>
          </div>
          <div class="modal-body">
            {{ session('LoginError') }}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Okay</button>
        </div>
        </div>
      </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('errorModal'));
            myModal.show();
        });
    </script>
@endif
</body>
</html>
@endsection
