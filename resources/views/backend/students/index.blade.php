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
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task-todo">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
              </ul>
            </div>
            <div class="events py-4 border-bottom px-3">
              <div class="wrapper d-flex mb-2">
                <i class="fa fa-times-circle text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page</p>
              <p class="text-gray mb-0">build a js based app</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="fa fa-times-circle text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
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


          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Registered Students</h4>
                        <p class="card-description">List of Registered Students</p>
        
                        <!-- Search and Limit Options -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="text" id="search" class="form-control" placeholder="Search by name..." onkeyup="searchStudents()">
                            </div>
                            <div class="col-md-6">
                                <select id="limit" class="form-control" onchange="limitStudents()">
                                   
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="all">All</option>
                                </select>
                            </div>
                        </div>
        
                        <!-- Showing Message -->
                        <div id="showingMessage" class="mb-3"></div>
        
                        <div class="row">
                          <div class="col-12">
                              <div class="table-responsive">
                                  <table id="order-listing" class="table">
                                      <thead>
                                          <tr>
                                              <th>Student No.</th>
                                              <th>Student Name</th>
                                              <th>Student Level</th>
                                              <th>Phone</th>
                                              
                                              <th>Email</th>
                                              <th>Actions</th>
                                          </tr>
                                      </thead>
                                      <tbody id="studentTable">
                                          @foreach ($students as $student)
                                          <tr>
                                              <td>{{ $student->registration_number }}</td>
                                              <td>{{ $student->student_name }}</td>
                                              <td>{{ $student->student_level }}</td>
                                              <td>{{ $student->phone }}</td>
                                             
                                              <td>{{ $student->email }}</td>
                                              <td>
                                                  <a href="{{ route('student.show', $student->id) }}" class="btn btn-outline-primary">View</a>
                                                  <a href="{{ route('student.edit', $student->id) }}" class="btn btn-outline-success">Edit</a>
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
        
        <!-- JavaScript Functions for Search and Limit -->
        <script>
            // Get the total number of students
            const totalStudents = {{ $students->count() }};
        
            function searchStudents() {
                const input = document.getElementById('search').value.toLowerCase();
                const table = document.getElementById('studentTable');
                const rows = table.getElementsByTagName('tr');
        
                let visibleCount = 0;
        
                for (let i = 0; i < rows.length; i++) {
                    const cells = rows[i].getElementsByTagName('td');
                    if (cells.length > 0) {
                        const name = cells[1].textContent || cells[1].innerText;
                        if (name.toLowerCase().includes(input)) {
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
        
            function limitStudents() {
                const limit = document.getElementById('limit').value;
                const table = document.getElementById('studentTable');
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
                showingMessage.innerHTML = `Showing ${count} out of ${totalStudents} students`;
            }
        
            // Initialize the limit on page load
            document.addEventListener('DOMContentLoaded', () => {
                limitStudents();
            });
        </script>
        



                 

                </div>
              </div>
            </div>
          </div>





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


