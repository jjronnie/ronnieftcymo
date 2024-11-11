@extends('backend.layouts.main')
@section('content')
  <div class="container-scroller">
    <!-- Navbar -->
    @include('backend.layouts.nav')
    <div class="container-fluid page-body-wrapper">
  
      <!-- Sidebar -->
      @include('backend.layouts.sidebar')
      
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">Admin Dashboard</h3>
          </div>
          
          <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Admin Profile</h4>
                  <form id="updateAdminForm" action="{{ route('admin.update', $admin->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Admin Username -->
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" value="{{ $admin->name }}" name="name" placeholder="Enter Username">
                    </div>

                    <!-- Admin Email -->
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" value="{{ $admin->email }}" placeholder="Enter Email">
                    </div>

                  

                   

                    

                    <!-- Notification Area -->
                    <div id="notification" class="mt-3"></div>

                    <div class="d-flex justify-content-between">
                      <button type="submit" class="btn btn-primary">Update</button>
                      <button type="button" class="btn btn-light" id="cancelBtn" onclick="window.location.href='{{ route('admin.index') }}'">Back</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          
          <!-- JavaScript for AJAX submission -->
          <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
          <script>
            $(document).ready(function() {
              // Handle form submission with AJAX
              $('#updateAdminForm').on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                var actionUrl = form.attr('action');
                var formData = form.serialize();
                
                $.ajax({
                  url: actionUrl,
                  type: 'POST',
                  data: formData,
                  dataType: 'json',
                  success: function(response) {
                    $('#notification').html(
                      '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                      response.success + 
                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                      '<span aria-hidden="true">&times;</span>' +
                      '</button>' +
                      '</div>'
                    );
                    setTimeout(function() { $('#notification .alert').fadeOut(); }, 5000);
                  },
                  error: function(xhr) {
                    var errorMsg = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : 'An error occurred';
                    $('#notification').html(
                      '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                      errorMsg + 
                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                      '<span aria-hidden="true">&times;</span>' +
                      '</button>' +
                      '</div>'
                    );
                  }
                });
              });
              
              // Cancel button functionality
              $('#cancelBtn').on('click', function() {
                window.location.href = '{{ route("admin.index") }}';
              });
            });
          </script>
        </div>
        @include('backend.layouts.footer')
      </div>
    </div>
  </div>
@endsection
