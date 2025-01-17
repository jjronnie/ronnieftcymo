@extends('backend.layouts.main')
@section('content')
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
   
   <!-- Include the nav partial and pass the students data -->
@include('backend.layouts.nav', ['students' => $students])

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
          <div class="row grid-margin">
           
            <div class="col-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-user-graduate mr-2"></i>
                          Registered Students
                          
                        </p>
                        <h2>{{ $totalStudents }} 
                            {{-- <small>
                                <label class="badge badge-outline-success badge-pill">
                                    {{ number_format($increasePercentage, 1) }}% increase
                                </label>
                            </small> --}}
                        </h2>
                    </div>
                    
                   
                     
                     
                  </div>
                </div>
              </div>
            </div>

            <div class="col-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                 
                    
                    <div class="statistics-item">
                      <p>
                        <i class="icon-sm fas fa-book mr-2"></i>
                        Number of Courses
                        
                      </p>
                      <h2>{{ $totalCourses }}</h2>
                  </div>
                  
                    
                     
                  </div>
                </div>
              </div>
            </div>

            <div class="col-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                  
                   
                  
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-clipboard-list mr-2"></i>
                          Recent Enrollments
                          
                        </p>
                        <h2>8</h2>
                      
                      </div>
                     
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">

            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body d-flex flex-column">
                      <h4 class="card-title">
                          <i class="fas fa-chart-pie"></i>
                          Total Students by Level
                      </h4>
                      <div class="flex-grow-1 d-flex flex-column justify-content-between">
                          <canvas id="students-level-chart" width="400" height="400" class="mt-3"></canvas>
                          <div class="pt-4">
                              <div id="students-level-chart-legend" class="students-level-chart-legend"></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          
          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
          {{-- <script>
              var studentsCountByLevel = @json($studentsCountByLevel);
              console.log(studentsCountByLevel); // Debugging output
          
              var labels = studentsCountByLevel.map(function(item) {
                  return item.student_level;
              });
              var data = studentsCountByLevel.map(function(item) {
                  return item.total;
              });
          
              console.log(labels);  // Debugging output
              console.log(data);    // Debugging output
          
              var ctx = document.getElementById('students-level-chart').getContext('2d');
              var studentsLevelChart = new Chart(ctx, {
                  type: 'pie', // Type of chart (pie chart)
                  data: {
                      labels: labels, // Levels (e.g., S1, S2, etc.)
                      datasets: [{
                          data: data, // Student counts for each level
                          backgroundColor: ['#ff7f7f', '#ffcc00', '#3b97d3', '#4bbd82', '#e4e4e4', '#d63384'], // Custom colors
                          borderWidth: 1
                      }]
                  },
                  options: {
                      responsive: true,
                      plugins: {
                          legend: {
                              position: 'top',
                          },
                          tooltip: {
                              callbacks: {
                                  label: function(tooltipItem) {
                                      return tooltipItem.label + ': ' + tooltipItem.raw + ' students';
                                  }
                              }
                          }
                      }
                  }
              });
          </script>
           --}}
          
          <script>
              // Get the student data passed from the controller
              var studentsCountByLevel = @json($studentsCountByLevel);
          
              // Extract labels and data for the pie chart
              var labels = studentsCountByLevel.map(function(item) {
                  return item.student_level;
              });
              var data = studentsCountByLevel.map(function(item) {
                  return item.total;
              });
          
              // Create the pie chart
              var ctx = document.getElementById('students-level-chart').getContext('2d');
              var studentsLevelChart = new Chart(ctx, {
                  type: 'pie', // Type of chart (pie chart)
                  data: {
                      labels: labels, // Levels (e.g., S1, S2, etc.)
                      datasets: [{
                          data: data, // Student counts for each level
                          backgroundColor: ['#ff7f7f', '#ffcc00', '#3b97d3', '#4bbd82', '#e4e4e4', '#0C3E9A'], // Custom colors
                          borderWidth: 1
                      }]
                  },
                  options: {
                      responsive: true,
                      plugins: {
                          legend: {
                              position: 'top',
                          },
                          tooltip: {
                              callbacks: {
                                  label: function(tooltipItem) {
                                      return tooltipItem.label + ': ' + tooltipItem.raw + ' students';
                                  }
                              }
                          }
                      }
                  }
              });
          </script>

          <script>
             document.addEventListener('DOMContentLoaded', function() {
                // Prepare the data from PHP variables
                const labels = @json($monthlyRegistrations->pluck('month'));
                const counts = @json($monthlyRegistrations->pluck('count'));

                // Initialize Chart.js
                const ctx = document.getElementById('registrations-chart').getContext('2d');
                new Chart(ctx, {
                    type: 'line', // Use 'bar' if you prefer a bar chart
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Registered Students',
                            data: counts,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            fill: true,
                            tension: 0.3
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Month'
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Number of Registrations'
                                },
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
          </script>
          
          

            
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">
                  <i class="fas fa-chart-line"></i>
                  Monthly Registrations
                </h4>
                <canvas id="registrations-chart"></canvas>
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


