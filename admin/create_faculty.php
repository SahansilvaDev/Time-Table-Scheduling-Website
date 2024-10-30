<?php
include './c_header.php';
include './config.php'; // Include your database connection file

// Fetch faculty from the database
$t_faculty = "SELECT * FROM faculty";
$t_result = mysqli_query($conn, $t_faculty);
?>

<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12 mb-2">
                        <h2>Create Faculty</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 my-3">
                        <!-- tables -->
                        <div class="card-box mb-30">
                            <div class="pd-20">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#CreateFacultyModal" type="button">
                                    Create Faculty
                                </a>
                            </div>
                            <div class="pb-20">
                                <table class="data-table table stripe hover nowrap">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th class="table-plus datatable-nosort">Faculty Name</th>
                                            <th>Department</th>
                                            <th>Joined Date</th>
                                            <th class="datatable-nosort">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                        if (mysqli_num_rows($t_result) > 0) {
                                            while ($row = mysqli_fetch_array($t_result)) {
                                                $id = $row['id'];
                                                $faculty_name = $row['faculty_name'];
                                                $department = $row['department'];
                                                $joined_date = $row['joined_date'];
                                        ?>
                                        <tr>
                                            <td class="table-plus"><?php echo $id; ?></td>
                                            <td><?php echo $faculty_name; ?></td>
                                            <td><?php echo $department; ?></td>
                                            <td><?php echo $joined_date; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                        <i class="dw dw-more"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#EditFacultyModal" onclick="editFaculty('<?php echo $id; ?>', '<?php echo $faculty_name; ?>', '<?php echo $department; ?>', '<?php echo $joined_date; ?>')"><i class="dw dw-edit2"></i> Edit</a>
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

                <!-- Create Faculty Modal -->
                <div class="modal fade" id="CreateFacultyModal" tabindex="-1" role="dialog" aria-labelledby="createFacultyModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="createFacultyModalLabel">Create Faculty</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="./php/faculty_create.php">
                                    <div class="form-group">
                                        <label for="facultyName">Faculty Name</label>
                                        <input class="form-control" name="faculty_name" type="text" id="facultyName" placeholder="Faculty Name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="department">Department</label>
                                        <textarea class="form-control" name="department" id="department" rows="3" placeholder="Department" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="joinedDate">Joined Date</label>
                                        <input type="date" name="joined_date" class="form-control" id="joinedDate" required>
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

                <!-- Edit Faculty Modal -->
                <div class="modal fade" id="EditFacultyModal" tabindex="-1" role="dialog" aria-labelledby="editFacultyModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="editFacultyModalLabel">Edit Faculty</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form id="editFacultyForm" method="POST" action="./php/edit_faculty.php">
                                    <input type="hidden" name="id" id="editFacultyId">
                                    <div class="form-group">
                                        <label for="editFacultyName">Faculty Name</label>
                                        <input class="form-control" name="faculty_name" id="editFacultyName" type="text" placeholder="Faculty Name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="editDepartment">Department</label>
                                        <textarea class="form-control" name="department" id="editDepartment" rows="3" placeholder="Department" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="editJoinedDate">Joined Date</label>
                                        <input type="date" name="joined_date" id="editJoinedDate" class="form-control" required>
                                    </div>
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
function editFaculty(id, faculty_name, department, joined_date) {
    document.getElementById('editFacultyId').value = id;
    document.getElementById('editFacultyName').value = faculty_name;
    document.getElementById('editDepartment').value = department;
    document.getElementById('editJoinedDate').value = joined_date;
}
</script>
