<!-- CALENDAR JS -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- Calendar -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" /> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<!-- <script>
	$(document).ready(function() {
		var calendar = $('#calendar').fullCalendar({
			editable:true,
			header:{
				left:'prev, today, next ',
				center:'title',
				right:'month, agendaWeek, agendaDay'
			},
            views: {
                month: {
                    buttonText: 'Month'
                },
                agendaWeek: {
                    buttonText: 'Week'
                },
                agendaDay: {
                    buttonText: 'Day'
                }
            },
            selectable:true,
            selectHelper:true
		});
	});
</script> -->

<!-- POPUP ADD SCHED -->
<script>
    document.getElementById("btn-addSched").addEventListener("click", function() {
        document.querySelector(".popup").style.display = "block";
    })

    document.querySelector(".close-btn").addEventListener("click", function() {
        document.querySelector(".popup").style.display = "none";
    })

    document.querySelector(".cancel").addEventListener("click", function() {
        document.querySelector(".popup").style.display = "none";
    })
</script>

