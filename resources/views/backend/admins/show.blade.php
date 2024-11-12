@extends('backend.layouts.main')
@section('content')
  <div class="container-scroller">
    @include('backend.layouts.nav')
    <div class="container-fluid page-body-wrapper">
      @include('backend.layouts.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">Dashboard</h3>
          </div>

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">View Admin Details</h4>
                  <p class="card-description">Here you can view the details of the admin.</p>

                  <form class="forms-sample" action="" method="POST">
                    @csrf
                    <!-- Admin Details -->
                    <div class="form-group">
                      <label for="admin_id">Admin ID</label>
                      <input type="text" class="form-control" id="admin_id" value="{{ $admin->id }}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="admin_name">Admin UserName</label>
                      <input type="text" class="form-control" id="admin_name" value="{{ $admin->name }}" readonly>
                    </div>
                 
                 
                    
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control" id="email" value="{{ $admin->email }}" readonly>
                    </div>

                    <!-- Action Buttons -->
                    <div>
                      <button type="button" class="btn btn-primary" onclick="editAdmin()">Edit Admin Details</button>
                     <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete Admin</button>
                    </div>
                  </form>

                  <!-- Delete Confirmation Modal -->
                  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deleteModalLabel">Delete Admin</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to delete this admin?
                        </div>
                        <div class="modal-footer">
                          <form action="{{ route('admin.destroy', $admin->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        @include('backend.layouts.footer')
      </div>
    </div>
  </div>
@endsection

<script>
    function editAdmin() {
        window.location.href = '{{ route("admin.edit", $admin->id) }}';
    }

 
</script>
