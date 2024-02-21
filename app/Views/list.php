<!DOCTYPE html>
<html lang="en">
<head>
<title>CRUD Jquery Ajax</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js   "></script>

</head>
<body>
    <div class="container"><br/><br/>
        <div class="row">
            <div class="col-lg-10">
                <h2> CodeIgniter CRUD test</h2>
            </div>
            <div class="col-lg-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                    Add New Student
                </button>
            </div>
        </div>
        <table class="table table-bordered table-striped" id="studentTable">
            <thead>
                <tr>
                    <th>id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($students_detail as $row){
            ?>
            <tr id="<?php echo $row ['id'];?>">
                <td><?php echo $row ['id']; ?></td>
                <td><?php echo $row ['first_name']; ?></td>
                <td><?php echo $row ['last_name']; ?></td>
                <td><?php echo $row ['address']; ?></td>
                <td>
                    <a data-id="<?php echo $row ['id']; ?>" class="btn btn-primary btnEdit">Edit</a>
                    <a data-id="<?php echo $row ['id']; ?>" class="btn btn-danger btnDelete">Delete</a>
                    <a data-id="<?php echo $row ['id']; ?>" class="btn btn-success btnView">View Grades</a>

                </td>
            </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Add New Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addStudent" name="addStudent" action="<?php echo site_url('student/store');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="txtFirstName">First Name:</label>
                        <input type="text" class="form-control" id="txtFirstName" placeholder="Enter First Name" name="txtFirstName">
                    </div>
                    <div class="form-group">
                        <label for="txtLastName">Last Name:</label>
                        <input type="text" class="form-control" id="txtLastName" placeholder="Enter Last Name" name="txtLastName">
                    </div>
                    <div class="form-group">
                        <label for="txtAddress">Address:</label>
                        <input type="text" class="form-control" id="txtAddress" placeholder="Enter Address" name="txtAddress">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
                </div>
        </div>
</div>

    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Update Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateStudent" name="updateStudent" action="<?php echo site_url('student/update');?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="hdnStudentId" id="hdnStudentId"/>
                    <div class="form-group">
                        <label for="txtFirstName">First Name:</label>
                        <input type="text" class="form-control" id="txtFirstName" placeholder="Enter First Name" name="txtFirstName">
                    </div>
                    <div class="form-group">
                        <label for="txtLastName">Last Name:</label>
                        <input type="text" class="form-control" id="txtLastName" placeholder="Enter Last Name" name="txtLastName">
                    </div>
                    <div class="form-group">
                        <label for="txtAddress">Address:</label>
                        <textarea class="form-control" id="txtAddress" name="txtAddress" rows="10" placeholder="Enter Address"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
                </div>
            </div>
        </div>

        <!-- First Modal -->
<div class="modal fade" id="addGradeModal" aria-labelledby="addGradeModalLabel" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addGradeModalLabel">Add Grade</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Add form inputs for subject and grade -->
                <form id="addGrade" name="addGrade" action="<?php echo site_url('student/storeGrades');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="txtSubject">Subject:</label>
                        <select class="form-select" id="subject" id="txtSubject" name="txtSubject" >
                        <option value="" disabled selected>Please select a subject..</option>
                        <option value="Math">Math</option>
                        <option value="Science">Science</option>
                        <option value="English">English</option>
                        <option value="History">History</option>
                        <option value="Geography">Geography</option>
                        <option value="Art">Art</option>
                        <option value="Music">Music</option>
                        <option value="Physical Education">Physical Education</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="txtGrade">Grade:</label>
                        <input type="text" class="form-control" id="txtGrade" placeholder="Please Enter Grade" name="txtGrade">
                    </div>
                    <input type="hidden" id="studentIdInput" name="student_id">

                </div>
                
                    <button type="submit" class="btn btn-success">Submit</button>
            
                </form>
            </div>
            <div class="modal-footer">
                <!-- Button to toggle to the second modal -->
                <button class="btn btn-primary" data-bs-target="#viewModal" data-bs-toggle="modal" data-bs-dismiss="modal">View Grades</button>
            </div>
        </div>
    </div>
</div>

<!-- Second Modal -->
<div class="modal fade" id="viewModal" aria-labelledby="viewModalLabel" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">View Grades</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Content for viewing grades -->
                <table class="table table-bordered table-striped" id="viewTable">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Grade details will be displayed here -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <!-- Button to toggle back to the first modal -->
                <button class="btn btn-primary" data-bs-target="#addGradeModal" data-bs-toggle="modal" data-bs-dismiss="modal"  >Add Grade</button>
            </div>
        </div>
    </div>
</div>

</div>
</div>

<script>
    $(document).ready(function() {
        $('#studentTable').DataTable();

        $("#addStudent").validate({
            rules: {
                txtFirstName: "required",
                txtLastName: "required",
                txtAddress: "required"
            },
            messages: {
            },

            submitHandler: function(form) {
            var form_action = $("#addStudent").attr("action");
            $.ajax({
                data: $('#addStudent').serialize(),
                url: form_action,
                type: "POST",
                dataType: 'json',
                success: function (res) {
                    var student = '<tr id="'+res.data.id+'">';
                    student += '<td>' + res.data.id + '</td>';
                    student += '<td>' + res.data.first_name + '</td>';
                    student += '<td>' + res.data.last_name + '</td>';
                    student += '<td>' + res.data.address + '</td>';
                    student += '<td><a data-id="' + res.data.id + '" class="btn btn-primary btnEdit">Edit</a>  <a data-id="' + res.data.id + '" class="btn btn-danger btnDelete">Delete</a> <a data-id="' + res.data.id + '" class="btn btn-success btnView">View Grades</a> </td>';
                    student += '</tr>';            
                    $('#studentTable tbody').prepend(student);
                    $('#addStudent')[0].reset();
                    $('#addModal').modal('hide');
                },
                    error: function (data) {
                }
                });
            }
        });

            $('body').on('click', '.btnEdit', function () {
                var student_id = $(this).attr('data-id');
                console.log(student_id);
                $.ajax({
                    url: 'student/edit/'+student_id,
                    type: "GET",
                    dataType: 'json',
                    success: function (res) {
                        $('#updateModal').modal('show');
                        $('#updateStudent #hdnStudentId').val(res.data.id); 
                        $('#updateStudent #txtFirstName').val(res.data.first_name);
                        $('#updateStudent #txtLastName').val(res.data.last_name);
                        $('#updateStudent #txtAddress').val(res.data.address);
                },
                error: function (xhr, status, error) {
            console.log('Error:', xhr, status, error);
                }
            });
        });

        $("updateStudent").validate({
            rules: {
            txtFirstName: "required",
                txtLastName: "required",
                txtAddress: "required"
            },  
            messages: {
            },
        });

        
        $('body').on('click', '.btnView', function () {
    var student_id = $(this).attr('data-id');
    $.ajax({
        url: 'student/view/' + student_id,
        type: "GET",
        dataType: 'json',
        success: function (res) {
            if (res.status && typeof res.data === 'object') {
                // Display the student's full name
                var fullName = 'Student: ' + res.data.first_name + ' ' + res.data.last_name;
                $('.nameStudent').text(fullName);

                // Show the modal
                $('#viewModal').modal('show');

                // Fetch grade details using gradeId
                $.ajax({
                    url: 'student/viewGrades/' + student_id,
                    type: "GET",
                    dataType: 'json',
                    success: function (gradeRes) {
                        if (gradeRes.status && gradeRes.data.length > 0) {
                            // Clear the previous content
                            $('#viewTable tbody').empty();

                            // Loop through each grade record and append it to the table body
                            gradeRes.data.forEach(function(grade) {
                                var row = '<tr>';
                             // Assuming you have a gradeId field
                                row += '<td>' + grade.subject + '</td>';
                                row += '<td>' + grade.grade + '</td>';
                                row += '</tr>';

                                $('#viewTable tbody').append(row);
                            });

                        } else {
                                // Display "no grades found" message
                                $('#viewTable tbody').html('<tr><td colspan="2">No grades found</td></tr>');
                            }
                            
                    },

                    error: function (xhr, status, error) {
                        // Handle error
                        console.error("Error fetching grade data:", xhr, status, error);
                    }
                });
            } else {
                // Handle invalid or empty student data
                console.error("Invalid or empty student data received.");
            }
        },
        error: function (xhr, status, error) {
            // Handle error
            console.error("Error fetching student data:", xhr, status, error);
        }
    });
});
    });

    $("#updateStudent").validate({
        rules: {
            txtFirstName: "required",
            txtLastName: "required",
            txtAddress: "required"
        },
            messages: {
        },
        submitHandler: function(form) {
            var form_action = $("#updateStudent").attr("action");
            $.ajax({
                data: $('#updateStudent').serialize(),
                url: form_action,
                type: "POST",
                dataType: 'json',
                success: function (res) {
                    // Update student data in the table
                    var studentRow = '<td>' + res.data.id + '</td>';
                    studentRow += '<td>' + res.data.first_name + '</td>';
                    studentRow += '<td>' + res.data.last_name + '</td>';
                    studentRow += '<td>' + res.data.address + '</td>';
                    studentRow += '<td><a data-id="' + res.data.id + '" class="btn btn-primary btnEdit">Edit</a>  <a data-id="' + res.data.id + '" class="btn btn-danger btnDelete">Delete</a> <a data-id="' + res.data.id + '" class="btn btn-success btnView">View Grades</a> </td>';
                    
                    $('#studentTable tbody #'+ res.data.id).html(studentRow);
                    $('#updateStudent')[0].reset();
                    $('#updateModal').modal('hide');
                },
                    error: function (data) {
                }
            });
        }
    }); 

    $('body').on('click', '.btnDelete', function () {
        var student_id = $(this).attr('data-id');
        $.get('student/delete/'+student_id, function (data) {
            $('#studentTable tbody #'+ student_id).remove();
        })
    });  

    $(document).ready(function() {
    $('#addGrade').submit(function(e) {
        e.preventDefault(); // Prevent the form from submitting normally
        
        // Retrieve the data-id attribute from the button
        var student_id = $(this).attr('data-id');
        console.log(student_id); // Check if the student_id is correctly captured

        // Get form data
        var formData = $(this).serialize();

        // Append studentId to the formData
        formData += '&student_id=' + student_id;

        // Send AJAX request
        $.ajax({
            url: 'student/storeGrades',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                // Handle the response from the server
                if (response.status) {
                    alert('Grade added successfully!');
                    // Optionally, you can close the modal or clear the form fields
                    $('#addGradeModal').modal('hide');
                    $('#addGrade')[0].reset(); // Reset the form fields
                } else {
                    alert('Failed to add grade. Please try again.');
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", xhr, status, error);
                alert('An error occurred while processing your request. Please try again later.');
            }
        });
    });
});


</script>

</body>
</html>