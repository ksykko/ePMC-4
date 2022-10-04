<body>
	<div class="schedule">
		<div class="row sched-header">
			<div class="col">
				<h1>Schedule Overview</h1>
			</div>
			<div class="col addSched">
				<button id="btn-addSched">Add New Schedule</button>
			</div>
		</div>

		<!-- POPUP FORM -->
		<div class="popup">
			<div class="close-btn">&times;</div>
			<div class="form">
				<h2>Add Schedule</h2>
				<div class="form-element">
					<label for="doctor">Doctor</label><br>
					<input type="text" id="doctor-name" placeholder="Enter Doctor Name">
				</div>
				<div class="form-element">
					<label for="specialization">Specialization</label>
					<input type="text" id="specialization" placeholder="Enter Specialization">
				</div>
				<div class="form-element">
					<label for="start-time">Start Time</label>
					<label for="end-time" class="end-time">End Time</label><br>
					<input type="time" id="start-time" placeholder="Start Time">
					<input type="time" id="start-time" placeholder="Start Time">
				</div>
				<div class="form-element">
						<input type="button" value="Sun">
						<input type="button" value="Mon">
						<input type="button" value="Tue">
						<input type="button" value="Wed">
						<input type="button" value="Thurs">
						<input type="button" value="Fri">
						<input type="button" value="Sat">
				</div>
				<div class="form-element">
					<button>Save</button>
				</div>
				<div class="form-element cancel">
					<a href="#">Cancel</a>
				</div>
			</div>
		</div>
	
		<div class="container-fluid sched-body">
			<div class="row">
				<div class="label-doctors"><h3>Doctors</h3></div>
				<div class="col-lg-3 list-doctors">
					<h6>Dr. Luis Miguel Pagtakhan</h6>
				</div>
				<div class="col-lg-9">
					<div id="calendar"></div>
				</div>
			</div>
		</div>
	</div>
	

	