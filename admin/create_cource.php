<?php
include './c_header.php';
include './config.php'; // Include your database connection file

// Fetch courses from the database
$t_courses = "SELECT * FROM courses";
$t_result = mysqli_query($conn, $t_courses);
?>

<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12 mb-2">
                        <h2>Create Courses</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 my-3">
                        <!-- tables -->
                        <div class="card-box mb-30">
                            <div class="pd-20">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#CreateCourseModal" type="button">
                                    Create Course
                                </a>
                            </div>
                            <div class="pb-20">
                                <table class="data-table table stripe hover nowrap">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th class="table-plus datatable-nosort">Course Name</th>
                                            <th>Description</th>
                                            <th>Start Date</th>
                                            <th class="datatable-nosort">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                        if (mysqli_num_rows($t_result) > 0) {
                                            while ($row = mysqli_fetch_array($t_result)) {
                                                $id = $row['id'];
                                                $course_name = $row['course_name'];
                                                $description = $row['description'];
                                                $start_date = $row['start_date'];
                                        ?>
                                        <tr>
                                            <td class="table-plus"><?php echo $id; ?></td>
                                            <td><?php echo $course_name; ?></td>
                                            <td><?php echo $description; ?></td>
                                            <td><?php echo $start_date; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                        <i class="dw dw-more"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#EditCourseModal" onclick="editCourse('<?php echo $id; ?>', '<?php echo $course_name; ?>', '<?php echo $description; ?>', '<?php echo $start_date; ?>')"><i class="dw dw-edit2"></i> Edit</a>
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

                <!-- Create Course Modal -->
                <div class="modal fade" id="CreateCourseModal" tabindex="-1" role="dialog" aria-labelledby="createCourseModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="createCourseModalLabel">Create Course</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="./php/course_create.php">
                                    <div class="form-group">
                                        <label for="courseName">Course Name</label>
                                        <input class="form-control" name="course_name" type="text" id="courseName" placeholder="Course Name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="courseDescription">Description</label>
                                        <textarea class="form-control" name="description" id="courseDescription" rows="3" placeholder="Course Description" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="startDate">Start Date</label>
                                        <input type="date" name="start_date" class="form-control" id="startDate" required>
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

                <!-- Edit Course Modal -->
                <div class="modal fade" id="EditCourseModal" tabindex="-1" role="dialog" aria-labelledby="editCourseModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="editCourseModalLabel">Edit Course</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form id="editCourseForm" method="POST" action="./php/course_edit.php">
                                    <input type="hidden" name="id" id="editCourseId">
                                    <div class="form-group">
                                        <label for="editCourseName">Course Name</label>
                                        <input class="form-control" name="course_name" id="editCourseName" type="text" placeholder="Course Name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="editCourseDescription">Description</label>
                                        <textarea class="form-control" name="description" id="editCourseDescription" rows="3" placeholder="Course Description" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="editStartDate">Start Date</label>
                                        <input type="date" name="start_date" id="editStartDate" class="form-control" required>
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
function editCourse(id, course_name, description, start_date) {
    document.getElementById('editCourseId').value = id;
    document.getElementById('editCourseName').value = course_name;
    document.getElementById('editCourseDescription').value = description;
    document.getElementById('editStartDate').value = start_date;
}
</script>
