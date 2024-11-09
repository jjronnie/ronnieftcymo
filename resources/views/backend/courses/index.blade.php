@extends('backend.layouts.main')

@section('content')
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('backend.layouts.nav')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
            <div id="settings-trigger"><i class="fas fa-fill-drip"></i></div>
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close fa fa-times"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles primary"></div>
                    <div class="tiles success"></div>
                    <div class="tiles warning"></div>
                    <div class="tiles danger"></div>
                    <div class="tiles info"></div>
                    <div class="tiles dark"></div>
                    <div class="tiles default"></div>
                </div>
            </div>
        </div>
        <div id="right-sidebar" class="settings-panel">
            <i class="settings-close fa fa-times"></i>
            <ul class="nav nav-tabs" id="setting-panel" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
                </li>
            </ul>
            <div class="tab-content" id="setting-content">
                <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
                    <!-- Todo section content -->
                </div>
                <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                    <!-- Chat section content -->
                </div>
            </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        @include('backend.layouts.sidebar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">
                        Dashboard
                    </h3>
                </div>

                <div class="col-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <h4 class="card-title">All Courses</h4>
                            <p class="card-description">Click to view course details</p>
                            <div class="popover-static-demo">

                                <!-- Check if there are any registered courses -->
                                @if($courses->isEmpty())
                                    <!-- Message displayed if there are no courses -->
                                    <div class="alert alert-warning" role="alert">
                                        No registered courses.
                                    </div>
                                @else
                                    <!-- Display each course if there are registered courses -->
                                    @foreach($courses as $course)
                                        <div class="popover bs-popover-bottom bs-popover-bottom-demo popover-success">
                                            <div class="arrow"></div>
                                            <h3 class="popover-header">
                                                <i class="fas fa-graduation-cap"></i> {{ $course->course_name }}
                                            </h3>
                                            <div class="popover-body">
                                                <p><strong>Course ID:</strong> {{ $course->course_id }}</p>
                                                <p><strong>Course Name:</strong> {{ $course->course_name }}</p>
                                                <p><strong>Enrolled Students:</strong> </p>
                                                
                                                <!-- View Course button -->
                                                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-success btn-sm">View Course</a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Add custom CSS to style the card -->
                <style>
                    .custom-card {
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add box shadow */
                        padding: 20px; /* Add padding to the card */
                        border-radius: 20px; /* Optional: for rounded corners */
                        background-color: #fff; /* Optional: white background */
                    }
                    .card-body {
                        padding: 30px; /* Increase padding inside the card */
                    }
                    .popover {
                        margin-bottom: 15px; /* Add space between popovers */
                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Optional: add shadow to popover */
                    }
                </style>
                
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            @include('backend.layouts.footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
@endsection
