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
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Registered Admins</h4>
                  <p class="card-description">List of Registered Admins</p>

                  <!-- Search and Limit Options -->
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <input type="text" id="search" class="form-control" placeholder="Search by username..." onkeyup="searchAdmins()">
                    </div>
                    <div class="col-md-6">
                      <select id="limit" class="form-control" onchange="limitAdmins()">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="all">All</option>
                      </select>
                    </div>
                  </div>

                  <!-- Showing Message -->
                  <div id="showingMessage" class="mb-3"></div>

                  <!-- Table with Admin List -->
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="admin-listing" class="table">
                          <thead>
                            <tr>
                              <th>Admin ID</th>
                              <th>Username</th>
                              <th>Email</th>
                              
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody id="adminTable">
                            @foreach ($admins as $admin)
                            <tr>
                              <td>{{ $admin->id }}</td>
                              <td>{{ $admin->name }}</td>
                              <td>{{ $admin->email }}</td>
                              
                              <td>
                                <a href="{{ route('admin.show', $admin->id) }}" class="btn btn-outline-primary">View</a>
                                <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-outline-success">Edit</a>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>

          <!-- JavaScript for Search and Limit -->
          <script>
            // Get the total number of admins
            const totalAdmins = {{ $admins->count() }};

            function searchAdmins() {
              const input = document.getElementById('search').value.toLowerCase();
              const table = document.getElementById('adminTable');
              const rows = table.getElementsByTagName('tr');

              let visibleCount = 0;

              for (let i = 0; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                if (cells.length > 0) {
                  const username = cells[1].textContent || cells[1].innerText;
                  if (username.toLowerCase().includes(input)) {
                    rows[i].style.display = "";
                    visibleCount++;
                  } else {
                    rows[i].style.display = "none";
                  }
                }
              }

              // Update showing message
              updateShowingMessage(visibleCount);
            }

            function limitAdmins() {
              const limit = document.getElementById('limit').value;
              const table = document.getElementById('adminTable');
              const rows = table.getElementsByTagName('tr');

              let visibleCount = 0;

              for (let i = 0; i < rows.length; i++) {
                if (limit === 'all' || i < limit) {
                  rows[i].style.display = "";
                  visibleCount++;
                } else {
                  rows[i].style.display = "none";
                }
              }

              // Update showing message
              updateShowingMessage(visibleCount);
            }

            function updateShowingMessage(count) {
              const showingMessage = document.getElementById('showingMessage');
              showingMessage.innerHTML = `Showing ${count} out of ${totalAdmins} admins`;
            }

            // Initialize the limit on page load
            document.addEventListener('DOMContentLoaded', () => {
              limitAdmins();
            });
          </script>

        </div>
        @include('backend.layouts.footer')
      </div>
    </div>
  </div>
@endsection
