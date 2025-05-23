
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo" href="{{ route('welcome') }}"><img src="{{asset('images/elite/logo2.png')}}" alt="logo"/></a>
      <a class="navbar-brand brand-logo-mini" href="{{ route('welcome') }}"><img src="{{asset('images/elite/logo-mini.png')}}" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="fas fa-bars"></span>
      </button>
      <ul class="navbar-nav">
        <li class="nav-item nav-search d-none d-md-flex">
          {{-- <div class="nav-link">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search" aria-label="Search">
            </div>
          </div> --}}
          <div id="currentTime">
            Today is: 

          {{ \Carbon\Carbon::now()->format('l F j, Y - h:i:s A') }}
          </div>
        </li>
      </ul>
      <ul class="navbar-nav navbar-nav-right">
        {{-- <li class="nav-item d-none d-lg-flex">
          <a class="nav-link" href="#">
            <span class="btn btn-primary">+ Create new</span>
          </a>
        </li> --}}
        {{-- <li class="nav-item dropdown d-none d-lg-flex">
          <div class="nav-link">
            <span class="dropdown-toggle btn btn-outline-dark" id="languageDropdown" data-toggle="dropdown">English</span>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
              <a class="dropdown-item font-weight-medium" href="#">
                French
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item font-weight-medium" href="#">
                Espanol
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item font-weight-medium" href="#">
                Latin
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item font-weight-medium" href="#">
                Arabic
              </a>
            </div>
          </div>
        </li> --}}
        <li class="nav-item dropdown">
          <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="fas fa-bell mx-0"></i>
              <span class="count">5</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item">
                  <p class="mb-0 font-weight-normal float-left">Recently Registered Students</p>
                  
              </a>
              <div class="dropdown-divider"></div>
      
              <!-- Display the Last 5 Registered Students -->
              @foreach($students as $student)
                  <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                          <div class="preview-icon bg-success">
                              <i class="fas fa-user mx-0"></i>
                          </div>
                      </div>
                      <div class="preview-item-content">
                          <h6 class="preview-subject font-weight-medium">{{ $student->student_name }}</h6>
                          <p class="font-weight-light small-text">
                              Registered recently
                          </p>
                      </div>
                  </a>
                  <div class="dropdown-divider"></div>
              @endforeach
          </div>
      </li>
      
        {{-- <li class="nav-item dropdown">
          <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-envelope mx-0"></i>
            <span class="count">25</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
            <div class="dropdown-item">
              <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
              </p>
              <span class="badge badge-info badge-pill float-right">View all</span>
            </div>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                  <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
              </div>
              <div class="preview-item-content flex-grow">
                <h6 class="preview-subject ellipsis font-weight-medium">David Grey
                  <span class="float-right font-weight-light small-text">1 Minutes ago</span>
                </h6>
                <p class="font-weight-light small-text">
                  The meeting is cancelled
                </p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                  <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
              </div>
              <div class="preview-item-content flex-grow">
                <h6 class="preview-subject ellipsis font-weight-medium">Tim Cook
                  <span class="float-right font-weight-light small-text">15 Minutes ago</span>
                </h6>
                <p class="font-weight-light small-text">
                  New product launch
                </p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                  <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
              </div>
              <div class="preview-item-content flex-grow">
                <h6 class="preview-subject ellipsis font-weight-medium"> Johnson
                  <span class="float-right font-weight-light small-text">18 Minutes ago</span>
                </h6>
                <p class="font-weight-light small-text">
                  Upcoming board meeting
                </p>
              </div>
            </a>
          </div>
        </li> --}}
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            @if (Auth::user()->profile_photo_path)
            <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Profile Image"/>
        @else
            <!-- Default image if no profile picture was uploaded -->
            <img src="{{ asset('images/elite/profileuser.png') }}" alt="Default Profile Image"/>
        @endif
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="{{ route('profile.show') }}" wire:navigate>
              <i class="fas fa-cog text-primary"></i>
              Profile
          </a>
          
              <div class="dropdown-divider"></div>
              <!-- Logout Link -->
              <a class="dropdown-item" href="{{ route('logout') }}" 
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="fas fa-power-off text-primary"></i>
                  Logout
              </a>
              <!-- Logout Form -->
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
      </li>
      
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="fas fa-bars"></span>
      </button>
    </div>
  </nav>