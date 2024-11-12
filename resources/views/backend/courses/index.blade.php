@extends('backend.layouts.main')

@section('content')
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('backend.layouts.nav')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('backend.layouts.sidebar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">Dashboard</h3>
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
                                    <!-- Define an array of colors to assign dynamically to each course -->
                                    @php
                                        $colors = ['success', 'danger', 'warning', 'info', 'primary'];
                                    @endphp

                                    <!-- Display each course if there are registered courses -->
                                    @foreach($courses as $index => $course)
                                        <div class="popover bs-popover-bottom bs-popover-bottom-demo popover-{{ $colors[$index % count($colors)] }}">
                                            <div class="arrow"></div>
                                            <h3 class="popover-header">
                                                <i class="fas fa-graduation-cap"></i> {{ $course->course_name }}
                                            </h3>
                                            <div class="popover-body">
                                                <p><strong>Course ID:</strong> {{ $course->course_id }}</p>
                                                <p><strong>Course Name:</strong> {{ $course->course_name }}</p>
                                                <!-- View Course button -->
                                                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-success btn-sm">View Course Details</a>
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
