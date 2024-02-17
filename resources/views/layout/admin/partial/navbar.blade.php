<div class="sidebar border border-right col-md-3 col-lg-2 p-0 h-100 position-fixed bg-body-tertiary">

  <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary w-100vh">
    <span class="fs-4">{{$title}}</span>
        
        <hr>
        <ul class="nav flex-column">
          
          <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{Request::is('dashboard')?'text-black':'text-blue'}}" aria-current="page" href="/dashboard">
                  Dashboard
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{Request::is('dashboard/student*')?'text-black':'text-blue'}}" href="/dashboard/student/all">
                  Student
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{Request::is('dashboard/kelas*')?'text-black':'text-blue'}}" href="/dashboard/kelas/all">
                  Class
              </a>
          </li>
      </ul>
        <hr />

        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 text-black" aria-current="page" href="/auth/home/all">
                Home
            </a>
        </li>
          <li class="nav-item">
              <a class="nav-link text-black d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#exampleModal" href="/login">
                  Logout
              </a>
          </li>
      </ul>
        {{-- <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->name }}
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
      </div> --}}
    </div>
  {{-- <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
       aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                  aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
              <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2 {{Request::is('dashboard')?'text-black':'text-blue'}}" aria-current="page" href="/dashboard">
                   
                      Dashboard
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2 {{Request::is('dashboard/student*')?'text-black':'text-blue'}}" href="/dashboard/student/all">
                    
                      Student
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2 {{Request::is('dashboard/kelas*')?'text-black':'text-blue'}}" href="/dashboard/kelas/all">
                     
                      Kelas
                  </a>
              </li>
          </ul>

        
          <hr class="my-3">

          <ul class="nav flex-column mb-auto">
              <li class="nav-item">
                <button class="nav-link d-flex align-items-center gap-2 " type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" href="/login">Logout</button>
              </li>
          </ul>
      </div>
</div> --}}
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