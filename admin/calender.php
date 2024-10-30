<!DOCTYPE html>
<html lang="en">



	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <link href="vendor/fullcalendar/css/main.min.css" rel="stylesheet">
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
		
    <link class="main-css" href="css/style.css" rel="stylesheet">

	<link class="main-css" href="./css/timetable_style.css" rel="stylesheet">
	



	
</head>

<body>

    <!--*******************

        <div class="content-body">
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-xl-3 col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-intro-title">Calendar</h4>

                                <div class="">
                                    <div id="external-events" class="my-3">
                                        <p>Drag and drop your event or click in the calendar</p>
                                        <div class="external-event btn-primary light" data-class="bg-primary"><i class="fa fa-move"></i><span>New Theme Release</span></div>
                                        <div class="external-event btn-warning light" data-class="bg-warning"><i class="fa fa-move"></i>My Event
                                        </div>
                                        <div class="external-event btn-danger light" data-class="bg-danger"><i class="fa fa-move"></i>Meet manager</div>
                                        <div class="external-event btn-info light" data-class="bg-info"><i class="fa fa-move"></i>Create New theme</div>
                                        <div class="external-event btn-dark light" data-class="bg-dark"><i class="fa fa-move"></i>Project Launch</div>
                                        <div class="external-event btn-secondary light" data-class="bg-secondary"><i class="fa fa-move"></i>Meeting</div>
                                    </div>
                                    <!-- checkbox -->
									<div class="checkbox form-check checkbox-event custom-checkbox pt-3 pb-5">
										<input type="checkbox" class="form-check-input" id="drop-remove">
										<label class="form-check-label" for="drop-remove">Remove After Drop</label>
									</div>
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#add-category" class="btn btn-primary btn-event w-100">
                                        <span class="align-middle"><i class="ti-plus me-2"></i></span> Create New
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-xxl-8">
                        <div class="card">
                            <div class="card-body">
                                <div id="calendar" class="app-fullcalendar"></div>
                            </div>
                        </div>
                    </div>
                    <!-- BEGIN MODAL -->
                    <div class="modal fade none-border" id="event-modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><strong>Add New Event</strong></h4>
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success save-event waves-effect waves-light">Create
                                        event</button>

                                    <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-bs-toggle="modal">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Add Category -->
                    <div class="modal fade none-border" id="add-category">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><strong>Add a category</strong></h4>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label form-label">Category Name</label>
                                                <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label form-label">Choose Category Color</label>
                                                <select class="form-control form-white default-select" data-placeholder="Choose a color..." name="category-color">
                                                    <option value="success">Success</option>
                                                    <option value="danger">Danger</option>
                                                    <option value="info">Info</option>
                                                    <option value="pink">Pink</option>
                                                    <option value="primary">Primary</option>
                                                    <option value="warning">Warning</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light waves-effect" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary waves-effect waves-light save-category" data-bs-toggle="modal">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->

    <script src="vendor/global/global.min.js"></script>


    <script src="vendor/fullcalendar/js/main.min.js"></script>
	<!-- <script src="js/plugins-init/fullcalendar-init.js"></script> -->
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	

<script>
    
"use strict"

function fullCalender(){
	
	/* initialize the external events
		-----------------------------------------------------------------*/

		var containerEl = document.getElementById('external-events');
		if($('#external-events').length > 0){
			new FullCalendar.Draggable(containerEl, {
			  itemSelector: '.external-event',
			  eventData: function(eventEl) {
				return {
				  title: eventEl.innerText.trim()
				}
			  }
			 
			});
		}
		/* initialize the calendar
		-----------------------------------------------------------------*/

		var calendarEl = document.getElementById('calendar');
		var calendar = new FullCalendar.Calendar(calendarEl, {
		  headerToolbar: {
			left: 'prev,next today',
			center: 'title',
			right: 'dayGridMonth,timeGridWeek,timeGridDay'
		  },
		  
		  selectable: true,
		  selectMirror: true,
		  select: function(arg) {
			var title = prompt('Event Title:');
			if (title) {
			  calendar.addEvent({
				title: title,
				start: arg.start,
				end: arg.end,
				allDay: arg.allDay
			  })
			}
			calendar.unselect()
		  },
		  
		  editable: true,
		  droppable: true, // this allows things to be dropped onto the calendar
		  drop: function(arg) {
			// is the "remove after drop" checkbox checked?
			if (document.getElementById('drop-remove').checked) {
			  // if so, remove the element from the "Draggable Events" list
			  arg.draggedEl.parentNode.removeChild(arg.draggedEl);
			}
		  },
		  initialDate: '2021-02-13',
			  weekNumbers: true,
			  navLinks: true, // can click day/week names to navigate views
			  editable: true,
			  selectable: true,
			  nowIndicator: true,
		   events: [
				{
				  title: 'All Day Event',
				  start: '2021-02-01'
				},
				{
				  title: 'Long Event',
				  start: '2021-02-07',
				  end: '2021-02-10',
				  className: "bg-danger"
				},
				{
				  groupId: 999,
				  title: 'Repeating Event',
				  start: '2021-02-09T16:00:00'
				},
				{
				  groupId: 999,
				  title: 'Repeating Event',
				  start: '2021-02-16T16:00:00'
				},
				{
				  title: 'Conference',
				  start: '2021-02-11',
				  end: '2021-02-13',
				  className: "bg-danger"
				},
				{
				  title: 'Lunch',
				  start: '2021-02-12T12:00:00'
				},
				{
				  title: 'Meeting',
				  start: '2021-04-12T14:30:00'
				},
				{
				  title: 'Happy Hour',
				  start: '2021-07-12T17:30:00'
				},
				{
				  title: 'Dinner',
				  start: '2021-02-12T20:00:00',
				  className: "bg-warning"
				},
				{
				  title: 'Birthday Party',
				  start: '2021-02-13T07:00:00',
				  className: "bg-secondary"
				},
				{
				  title: 'Click for Google',
				  url: 'http://google.com/',
				  start: '2021-02-28'
				}
			  ]
		});
		calendar.render();
	
}	
	
	
	
jQuery(window).on('load',function(){
	setTimeout(function(){
		fullCalender();	
	}, 1000);
	
	
});	


		


</script>

</body>

<!-- Mirrored from yashadmin.dexignzone.com/xhtml/app-calender.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 May 2024 06:12:50 GMT -->
</html>