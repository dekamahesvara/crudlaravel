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
            <form action="/register" method="POST">
                @csrf 
                <h1 class="h3 mb-5 fw-normal text-bold">Please Register</h1>
                
                <div class="form-floating mb-2">
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        placeholder=""
                    />
                    <label for="nama">Name</label>
                </div>

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
                    Register
                </button>

                <div class="text-start my-3">
                    <p>Already have an account?
                        <a href="/login">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </main>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
