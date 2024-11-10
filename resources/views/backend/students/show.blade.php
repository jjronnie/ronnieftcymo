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
                  <h4 class="card-title">View Student Details</h4>
                  <p class="card-description">Here you can view the details of the student.</p>

                  <form class="forms-sample" action="" method="POST">
                    @csrf
                    <!-- Student Details -->
                    <div class="form-group">
                      <label for="registration_number">Student Number</label>
                      <input type="text" class="form-control" id="registration_number" value="{{ $student->registration_number }}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="student_name">Student Name</label>
                      <input type="text" class="form-control" id="student_name" value="{{ $student->student_name }}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="student_level">Student Level</label>
                      <input type="text" class="form-control" id="student_level" value="{{ $student->student_level }}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="phone">Student Phone</label>
                      <input type="text" class="form-control" id="phone" value="{{ $student->phone }}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="dob">Date of Birth</label>
                      <input type="text" class="form-control" id="dob" value="{{ $student->dob }}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control" id="email" value="{{ $student->email }}" readonly>
                    </div>

                    <!-- Action Buttons -->
                    <div>
                      <button type="button" class="btn btn-primary" onclick="editStudent()">Edit Student Details</button>
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#enrollModal">Enroll to Courses</button>
                      <button type="button" class="btn btn-info" onclick="generateReport()">Generate Report</button>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete Student</button>
                    </div>
                  </form>

                  <!-- Enroll to Courses Modal -->
                  <div class="modal fade" id="enrollModal" tabindex="-1" role="dialog" aria-labelledby="enrollModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="enrollModalLabel">Enroll in Courses</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <ul class="list-group">
                            @foreach($courses as $course)
                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $course->course_name }}
                                <button 
                                  type="button" 
                                  class="btn btn-success btn-sm enroll-btn" 
                                  data-course-id="{{ $course->id }}" 
                                  data-student-id="{{ $student->id }}"
                                  id="enroll-btn-{{ $course->id }}"
                                  {{ $student->courses->contains($course->id) ? 'disabled' : '' }}
                                >
                                  {{ $student->courses->contains($course->id) ? 'Enrolled' : 'Enroll' }}
                                </button>
                              </li>
                            @endforeach
                          </ul>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Delete Confirmation Modal -->
                  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deleteModalLabel">Delete Student</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to delete this student?
                        </div>
                        <div class="modal-footer">
                          <form action="{{ route('delete-student', $student->id) }}" method="POST">
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
    function editStudent() {
        window.location.href = '{{ route("student.edit", $student->id) }}';
    }

    function generateReport() {
        const studentDetails = `
            <div class="report-container">
                <h2 class="report-title">Student Report</h2>
                <p><strong>Student Number:</strong> ${document.getElementById('registration_number').value}</p>
                <p><strong>Student Name:</strong> ${document.getElementById('student_name').value}</p>
                <p><strong>Student Level:</strong> ${document.getElementById('student_level').value}</p>
                <p><strong>Student Phone:</strong> ${document.getElementById('phone').value}</p>
                <p><strong>Date of Birth:</strong> ${document.getElementById('dob').value}</p>
                <p><strong>Email:</strong> ${document.getElementById('email').value}</p>
            </div>
        `;
        
        const printWindow = window.open('', '', 'height=600,width=800');
        printWindow.document.write('<html><head><title>Student Report</title>');
        printWindow.document.write('<style>body { font-family: Arial, sans-serif; padding: 20px; }</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write(studentDetails);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }

    document.querySelectorAll('.enroll-btn').forEach(button => {
        button.addEventListener('click', function() {
            const courseId = this.dataset.courseId;
            const studentId = this.dataset.studentId;
            const buttonId = this.id;

            // Fix the URL to properly interpolate studentId and courseId
            fetch(`/enroll/${studentId}/${courseId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById(buttonId).textContent = 'Enrolled';
                    document.getElementById(buttonId).disabled = true;
                    alert(data.message);
                } else {
                    alert(data.message || 'Enrollment failed.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Enrollment failed. Please try again.');
            });
        });
    });
</script>
