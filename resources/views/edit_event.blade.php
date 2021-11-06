<x-app-layout>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Event') }}
        </h2>
    </x-slot>
	<div class="container">
	  <form method="post" action="/edit_event_details">
	  	@csrf
		  <div class="panel panel-primary">
		    <div class="panel-heading">Add Event</div>
		      <div class="panel-body">
		         <div class="row">
		            <div class="col-md-6">
		               <div class="form-group">
		                  <label class="control-label">Name</label>
		                  <input type="text" class="form-control" name="name" id="fname" value="{{$event_data->name}}">
		                  <input type="hidden" class="form-control" name="id"value="{{$event_data->id}}">
		               </div>
		            </div>
		         </div>
		         <div class="row">
		            <div class='col-md-6'>
		               <div class="form-group">
		                  <label class="control-label">Description</label>
		                  <textarea class="form-control" name="description" id="fname">{{$event_data->description}}</textarea>
		               </div>
		            </div>
		        </div>
		         <div class="row">
		            <div class='col-md-6'>
		               <div class="form-group">
		                  <label class="control-label">Start Date and Time</label><br>
		                  <label class="control-label">Actual Start date and time: {{$startDateTime}}</label>
		                  <div class='input-group date' id='datetimepicker1'>
		                     <input type='text' class="form-control" name="start_datetime"/>
		                     <span class="input-group-addon">
		                     <span class="glyphicon glyphicon-calendar"></span>
		                     </span>
		                  </div>
		               </div>
		            </div>
		        </div>
		         <div class="row">
		            <div class='col-md-6'>
		               <div class="form-group">
		                  <label class="control-label">End Date and Time</label><br>
		                  <label class="control-label">Actual End date and time: {{$endDateTime}}</label>
		                  <div class='input-group date' id='datetimepicker2'>
		                     <input type='text' class="form-control" name="end_datetime"/>
		                     <span class="input-group-addon">
		                     <span class="glyphicon glyphicon-calendar"></span>
		                     </span>
		                  </div>
		               </div>
		            </div>
		        </div>
		        <input type="submit" class="btn btn-primary" value="Submit">
		      </div>
		   </div>
	  </div>
	</div>
</x-app-layout>
<script type="text/javascript">
  $(function () {
    $('#datetimepicker1').datetimepicker();
    $('#datetimepicker2').datetimepicker();
 });
</script>