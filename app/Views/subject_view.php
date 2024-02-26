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
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " aria-current="page" href="/student">Student List</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="/subject">Subject List</a>
  </li>
</ul>
    <div class="container"><br/><br/>
        <div class="row">
            <div class="col-lg-10">
                <h2> Subjects' List </h2>
            </div>
        </div>

        <table class="table table-bordered table-striped" id="subjectTable">
            <thead>
                <tr>
                    <th>subject_id</th>
                    <th>Subject name</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($subject_list as $row){
            ?>
            <tr id="<?php echo $row ['subject_id'];?>">
                <td><?php echo $row ['subject_id']; ?></td>
                <td><?php echo $row ['subject_name']; ?></td>
                <td>
                    <a data-id="<?php echo $row ['subject_id']; ?>" class="btn btn-primary btnEdit">Edit</a>
                    <a data-id="<?php echo $row ['subject_id']; ?>" class="btn btn-success btnView">View Students</a>

                </td>
            </tr>
            <?php
            }
            ?>
            </tbody>
        </table>

        <!-- VIEW GRADE MODAL -->
        <div class="modal fade" id="viewModal" aria-labelledby="viewModalLabel" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewModalLabel">View Students</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Content for viewing grades -->
                        <table class="table table-bordered table-striped" id="viewTable">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Grade</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Grade details -->
                            </tbody>
                        </table>
                    </div>
                    <div id="addGradeButton" class="modal-footer">
                    <a  id="btnAddGrade" class="btn btn-primary" data-bs-target="#addGradeModal" data-bs-toggle="modal" data-bs-dismiss="modal">Add Grade</a>
                        <!-- Button to toggle back to the first modal -->
                    </div>
                </div>
            </div>
        </div>
<script>
$(document).ready(function() {
$('#subjectTable').DataTable();

});
</script>
</body>
</html>