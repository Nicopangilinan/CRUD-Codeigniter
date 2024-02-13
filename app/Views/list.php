<!DOCTYPE html>
<html lang="en">
<head>
<title>Grade Viewer</title>
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
                <h2>Student List</h2>
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
                    <th>Student ID</th>
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
            <tr id="<?php echo $row ['student_id'];?>">
                <td><?php echo $row ['student_id']; ?></td>
                <td><?php echo $row ['first_name']; ?></td>
                <td><?php echo $row ['last_name']; ?></td>
                <td><?php echo $row ['address']; ?></td>
                <td>
                    <a data-id="<?php echo $row ['student_id']; ?>" class="btn btn-success btnView">View Grades</a>
                    <a data-id="<?php echo $row ['student_id']; ?>" class="btn btn-primary btnEdit">Edit</a>
                    <a data-id="<?php echo $row ['student_id']; ?>" class="btn btn-danger btnDelete">Delete</a>
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

        <div class="modal fade" id="gradeModal" tabindex="-1" role="dialog" aria-labelledby="gradeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gradeModalLabel">Student Grade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped" id="studentGradesTable">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Grades data will be inserted here -->
                    </tbody>
                </table>
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
                        var student = '<tr id="'+res.data.student_id+'">';
                        student += '<td>' + res.data.student_id + '</td>';
                        student += '<td>' + res.data.first_name + '</td>';
                        student += '<td>' + res.data.last_name + '</td>';
                        student += '<td>' + res.data.address + '</td>';
                        student += '<td><a data-id="' + res.data.student_id + '" class="btn btn-primary btnEdit">Edit</a>  <a data-id="' + res.data.student_id + '" class="btn btn-danger btnDelete">Delete</a></td>';
                        student += '</tr>';            
                        $('#studentTable tbody').prepend(student);
                        $('#addStudent')[0].reset();
                        $('#addModal').modal('hide');
                    },
                    error: function (data) {
                        // handle error
                    }
                });
            }
        });

            $('body').on('click', '.btnEdit', function () {
                var student_id = $(this).attr('data-id');
                $.ajax({
                    url: 'student/edit/'+student_id,
                    type: "GET",
                    dataType: 'json',
                    success: function (res) {
                        $('#updateModal').modal('show');
                        $('#updateStudent #hdnStudentId').val(res.data.student_id); 
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
                    var student = '<td>' + res.data.student_id + '</td>';
                    student += '<td>' + res.data.first_name + '</td>';
                    student += '<td>' + res.data.last_name + '</td>';
                    student += '<td>' + res.data.address + '</td>';
                    student += '<td><a data-id="' + res.data.student_id + '" class="btn btn-primary btnEdit">Edit</a>  <a data-id="' + res.data.student_id + '" class="btn btn-danger btnDelete">Delete</a></td>';
                    $('#studentTable tbody #'+ res.data.student_id).html(student);
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

    $('body').on('click', '.btnView', function () {
        var student_id = $(this).data('student_id');

        $.ajax({
            url: '<?php echo base_url("student/getStudentGrades"); ?>',
            type: 'post',
            data: {student_id: student_id},
            dataType: 'json',
            success: function(response) {
                var modal = $('#gradeModal');
                modal.find('.modal-body').empty();
                var tableBody = modal.find('.modal-body');
                $.each(response, function(index, grade) {
                    tableBody.append('<tr><td>' + grade.subject + '</td><td>' + grade.grade + '</td></tr>');
                });
                modal.modal('show');
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });

</script>

</body>
</html>