<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample View</title>

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
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Grades Data</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="studentTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Student ID</th>
                                <th>Subject</th>
                                <th>Grade</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($grades as $row) : ?>
                            <tr>
                                <td><?=$row['grade_id']?></td>
                                <td><?=$row['id']?></td>
                                <td><?=$row['subject']?></td>
                                <td><?=$row['grade']?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        </table>

                        <!-- Students Table -->
                            <h5>Students Data</h5>
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

                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>

    

