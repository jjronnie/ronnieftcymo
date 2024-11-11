@extends('backend.layouts.main')
@section('content')
  <div class="container-scroller">
    @include('backend.layouts.nav')
    <div class="container-fluid page-body-wrapper">
      @include('backend.layouts.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">Create New Admin</h3>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <!-- Notification Area -->
                  <div id="notification" class="mt-3"></div>
                  <h4 class="card-title">Admin Registration Form</h4>
                  <form id="adminForm" class="forms-sample" action="{{ route('admin.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Enter Admin Name" required>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" placeholder="Enter Admin Email" required>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2">Create Admin</button>
                    <button type="button" class="btn btn-light" onclick="resetForm()">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- jQuery and AJAX Script -->
          <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
          <script>
            $(document).ready(function() {
                $('#adminForm').on('submit', function(event) {
                    event.preventDefault(); // Prevent the default form submission

                    // Get the form data
                    var formData = $(this).serialize();

                    $.ajax({
                        type: 'POST',
                        url: $(this).attr('action'), // Use the form action URL
                        data: formData,
                        success: function(response) {
                            // Show success notification
                            $('#notification').html('<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                                response.success +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                '<span aria-hidden="true">&times;</span>' +
                                '</button></div>');
                            // Optionally, reset the form fields after success
                            $('#adminForm')[0].reset();
                        },
                        error: function(xhr) {
                            // Show error notifications
                            var errors = xhr.responseJSON.errors;
                            var errorMessage = '';
                            for (var error in errors) {
                                errorMessage += errors[error][0] + '<br>'; // Concatenate error messages
                            }
                            $('#notification').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                                errorMessage +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                '<span aria-hidden="true">&times;</span>' +
                                '</button></div>');
                        }
                    });
                });
            });

            function resetForm() {
                $('#adminForm')[0].reset(); // Reset form fields
                $('#notification').html(''); // Clear notifications
            }
          </script>
        </div>
        @include('backend.layouts.footer')
      </div>
    </div>
  </div>
@endsection
