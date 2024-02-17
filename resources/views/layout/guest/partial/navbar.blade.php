<nav class="navbar navbar-expand-lg bg-body-tertiary">
         
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <p class="nav-link active">{{$title}}</p>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Menu
                    </a>

                    @auth
                    <ul class="dropdown-menu">


                      <li><a class="dropdown-item" href="/auth/home/all">Home</a></li>
                      <li><a class="dropdown-item" href="/auth/home/about">About</a></li>
                      <li><a class="dropdown-item" href="/auth/home/extracurricular">Extracurricular</a></li>
                      <li><a class="dropdown-item" href="/auth/home/student/student">Student</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>

                      
                    </ul>
                    @else
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="/guest/student/all">Student</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="">Something else here</a></li>
                    </ul>
                    @endauth
                   
                  </li>
                </ul>
                @auth
                  <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome,  {{ auth()->user()->name }}
                      </button>
                      <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li>
                            <form>
                              @csrf
                            <button class=" dropdown-item btn-danger btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" href="/login">Logout</button>
                            </form>
                          </li>
                      </ul>
                  </div>
                @else
                <div class="container-fluid d-flex justify-content-end">
                  <form>
                    <a href="/login" class="btn btn-outline-primary m-2">Login</a>
                    <a href="/register" class="btn btn-outline-primary m-2">Register</a>
                  </form>
                </div>
                @endauth
                  
              </div>
            </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Warning</h1>
      </div>
      <div class="modal-body">
        Are you sure to Log Out?
      </div>
      <div class="modal-footer">
        <form>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </form>
        <form method="post" action="/logout">
          @csrf
          <button type="submit" class="btn-danger btn">Yes, Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>

</nav>