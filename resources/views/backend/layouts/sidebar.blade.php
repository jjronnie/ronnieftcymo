<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <div class="nav-link">
          <div class="profile-image">
            @if (Auth::user()->profile_photo_path)
                <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Profile Image"/>
            @else
                <!-- Default image if no profile picture was uploaded -->
                <img src="{{ asset('images/faces/full.png') }}" alt="Default Profile Image"/>
            @endif
        </div>
        
          <div class="profile-name">
            <p class="name text-small">
              Hi!! {{ auth()->user()->name }}
            </p>
            <p class="designation">
              {{ auth()->user()->role }}
            </p>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard')}}">
          <i class="fa fa-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>



      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
          <i class="icon-sm fas fa-user-graduate mr-2"></i>

          <span class="menu-title">Student</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="page-layouts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{route('student.create')}}">Add Student</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('student.index')}}">View Students</a></li>
            </ul>
        </div>
      </li>

      {{-- // --}}
      <li class="nav-item d-none d-lg-block">
        <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false" aria-controls="sidebar-layouts">
          <i class="fas fa-folder-open menu-icon"></i>
          <span class="menu-title">Course</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="sidebar-layouts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('course.create')}}">Add Course</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('course.index')}}">View Courses</a></li>
       </ul>
        </div>
      </li>


  </nav>
