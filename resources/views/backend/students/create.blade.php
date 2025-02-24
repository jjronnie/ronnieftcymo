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
                        <!-- Notification Area -->
                        <div id="notification" class="mt-3"></div>
                        <h4 class="card-title">Student Registration Form</h4>
                        <p class="card-description">
                            <!-- Notification Area -->
                        <div id="notification" class="mt-3"></div>
                        </p>
                        <form id="registerForm" class="forms-sample" action="{{ route('student.store') }}" method="POST">
                          @csrf
                      
                          <div class="form-group">
                              <label for="student_name">Student Name</label>
                              <input type="text" class="form-control" name="student_name" placeholder="Enter Student Name" required>
                          </div>
                      
                          <div class="form-group">
                              <label for="student_level">Student Level</label>
                              <select class="form-control" name="student_level" required>
                                  <option value="">Select Student Level</option>
                                  <option value="Level One">Level One</option>
                                  <option value="Level Two">Level Two</option>
                                  <option value="Level Three">Level Three</option>
                                  <option value="Level Four">Level Four</option>                                 
                              </select>
                          </div>                    
                         
                      
                          <div class="form-group">
                              <label for="phone">Student Phone Number</label>
                              <input type="tel" class="form-control" name="phone" placeholder="Enter Student Phone Number" required>
                          </div>
                      
                          <div class="form-group">
                              <label for="dob">Date of Birth</label>
                              <input type="date" class="form-control" name="dob" required>
                          </div>
                      
                          <button type="submit" class="btn btn-primary mr-2">Register</button>
                          <button type="button" class="btn btn-light" onclick="resetForm()">Clear</button>
                      </form>
                      
                    </div>
                </div>
            </div>
        </div>
        
        <!-- jQuery and AJAX Script -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
          $(document).ready(function() {
              $('#registerForm').on('submit', function(event) {
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
      
                          // Reset the form fields after success
                          $('#registerForm')[0].reset();
      
                          // Hide notification after 5 seconds
                          setTimeout(function() {
                              $('#notification .alert').fadeOut('slow', function() {
                                  $(this).remove(); // Remove the element from the DOM
                              });
                          }, 5000);
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
      
                          // Hide notification after 5 seconds
                          setTimeout(function() {
                              $('#notification .alert').fadeOut('slow', function() {
                                  $(this).remove(); // Remove the element from the DOM
                              });
                          }, 5000);
                      }
                  });
              });
          });
      
          function resetForm() {
              $('#registerForm')[0].reset(); // Reset form fields
              $('#notification').html(''); // Clear notifications
          }
      </script>
      
        




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


