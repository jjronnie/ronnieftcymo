@extends('backend.layouts.main')
@section('content')
  <div class="container-scroller">
    @include('backend.layouts.nav')
    <div class="container-fluid page-body-wrapper">
      @include('backend.layouts.sidebar')

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Edit Course: {{ $course->course_name }}
            </h3>
          </div>

          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Edit Course Details</h4>
                <p class="card-description">Update the course information below</p>
                
                <!-- Feedback Messages -->
                <div id="message"></div>

                <form id="course-form" method="POST">
                  @csrf
                  @method('PUT')

                  <div class="form-group">
                    <label for="course_name">Course Name</label>
                    <input type="text" class="form-control" id="course_name" name="course_name" value="{{ old('course_name', $course->course_name) }}" required>
                    @error('course_name')
                      <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="credit_hours">Credit Hours</label>
                    <input type="number" class="form-control" id="credit_hours" name="credit_hours" value="{{ old('credit_hours', $course->credit_hours) }}" required>
                    @error('credit_hours')
                      <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="description">Course Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $course->description) }}</textarea>
                    @error('description')
                      <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                  </div>

                  <button type="submit" class="btn btn-primary">Update Course</button>
                  <a href="{{ route('course.index') }}" class="btn btn-secondary">Back</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('backend.layouts.footer')

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    // Handle form submission with AJAX
    $(document).ready(function() {
      $('#course-form').submit(function(e) {
        e.preventDefault(); // Prevent page reload

        var formData = $(this).serialize(); // Serialize the form data

        $.ajax({
          url: '{{ route('course.update', $course->id) }}', // Your update route
          method: 'PUT',
          data: formData,
          success: function(response) {
            $('#message').html('<div class="alert alert-success">Course updated successfully!</div>');
          },
          error: function(xhr) {
            // Display validation errors or other issues
            var errors = xhr.responseJSON.errors;
            var errorMessage = '';
            for (var key in errors) {
              errorMessage += '<div class="alert alert-danger">' + errors[key].join(', ') + '</div>';
            }
            $('#message').html(errorMessage);
          }
        });
      });
    });
  </script>
@endsection
