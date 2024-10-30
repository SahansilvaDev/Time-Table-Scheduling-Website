
<?php
include './c_header.php';
include './config.php'; // Include your database connection file

// Fetch students from the database
$t_teachers = "SELECT * FROM teachers";
$t_result = mysqli_query($conn, $t_teachers);
?>

<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12 mb-2">
                        <h2>Create teachers</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 my-3">
                        <!-- tables -->
                        <div class="card-box mb-30">
                            <div class="pd-20">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#Medium-modal" type="button">
                                    Create teachers
                                </a>
                            </div>
                            <div class="pb-20">
                                <table class="data-table table stripe hover nowrap">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th class="table-plus datatable-nosort">Name</th>
                                            <th>Email</th>
                                            <th>Teacher_id</th>
                                            <th>Start Date</th>
                                            <th class="datatable-nosort">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                        if (mysqli_num_rows($t_result) > 0) {
                                            while ($row = mysqli_fetch_array($t_result)) {
                                                $id = $row['id'];
                                                $username = $row['username'];
                                                $email = $row['email'];
                                                $student_id = $row['user_id'];
                                                $date = $row['created_at'];
                                        ?>
                                        <tr>
                                            <td class="table-plus"><?php echo $id; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $student_id; ?></td>
                                            <td><?php echo $date; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                        <i class="dw dw-more"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Edit-modal" onclick="editStudent('<?php echo $id; ?>', '<?php echo $username; ?>', '<?php echo $email; ?>', '<?php echo $student_id; ?>')"><i class="dw dw-edit2"></i> Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php 
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Simple Datatable End -->

                    </div>
                </div>

                <!-- Create Student Modal -->
                <div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Create teachers</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                            <form method="POST" action="./php/teachers_create.php">
                            <div class="form-group">
                                <label for="exampleInputusername">Username</label>
                                <input class="form-control" name="username" type="text" placeholder="Username" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                            </div>

                         
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                                </form>
                        </div>
                    </div>
                </div>

                <!-- Edit Student Modal -->
                <div class="modal fade" id="Edit-modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="editModalLabel">Edit teachers</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form id="editStudentForm" method="POST" action="./php/teachers_edit.php">
                                    <input type="hidden" name="id" id="editStudentId">
                                    <div class="form-group">
                                        <label for="editUsername">Username</label>
                                        <input class="form-control" name="username" id="editUsername" type="text" placeholder="Username" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="editEmail">Email address</label>
                                        <input type="email" name="email" id="editEmail" class="form-control" aria-describedby="emailHelp" required>
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="editPassword">Password</label>
                                        <input type="password" name="password" id="editPassword" class="form-control" required>
                                    </div> -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                            </div>
                                </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include './c_footer.php'; ?>

<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<!-- buttons for Export datatable -->
<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>

<script>
function editStudent(id, username, email, student_id) {
    document.getElementById('editStudentId').value = id;
    document.getElementById('editUsername').value = username;
    document.getElementById('editEmail').value = email;
    document.getElementById('editPassword').value = ''; // Clear password field
}
</script>
