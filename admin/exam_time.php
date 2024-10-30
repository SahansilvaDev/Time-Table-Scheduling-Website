<?php  include './c_header.php'; ?>


<!--Main Content start-->
<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								
                            <form method="POST" action="./php/create_exam_schedule.php">
    <div class="form-group">
        <label for="faculty">Select Faculty:</label>
        <select name="faculty_id" id="faculty" class="form-control" required>
            <!-- Populate faculties from the database -->
            <?php
            $faculty_result = mysqli_query($conn, "SELECT * FROM faculty");
            while ($faculty = mysqli_fetch_assoc($faculty_result)) {
                echo "<option value='" . $faculty['id'] . "'>" . $faculty['faculty_name'] . "</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="course">Select Course:</label>
        <select name="course_id" id="course" class="form-control" required>
            <!-- Populate courses based on selected faculty -->
            <?php
            $courses_result = mysqli_query($conn, "SELECT * FROM courses");
            while ($courses = mysqli_fetch_assoc($courses_result)) {
                echo "<option value='" . $courses['id'] . "'>" . $courses['course_name'] . "</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="examDate">Exam Date:</label>
        <input type="date" name="exam_date" id="examDate" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="examTime">Exam Time:</label>
        <input type="time" name="exam_time" id="examTime" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Create Schedule</button>
</form>


<script>
    document.getElementById('faculty').addEventListener('change', function () {
    var facultyId = this.value;
    var courseSelect = document.getElementById('course');
    courseSelect.innerHTML = '';

    // Fetch courses based on faculty ID
    fetch('get_courses.php?faculty_id=' + facultyId)
        .then(response => response.json())
        .then(data => {
            data.forEach(course => {
                var option = document.createElement('option');
                option.value = course.id;
                option.text = course.course_name;
                courseSelect.appendChild(option);
            });
        });
});

</script>



							</div>
						</div>
					</div>
					
				</div>
				
			</div>
		</div>





<?php  include './c_footer.php'; ?>