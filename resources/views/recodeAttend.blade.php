@extends('layout.app')
@section('title','Admin | Recode Attendence')
@section('content')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">
<div class="ViewCrouseDiv">
		@foreach($valueKey as $value)
		<div class="card mt-4">
			<div class="card-header text-center">
				  <strong>{{$value[0]->date}}</strong>
			</div>
			<div class="card-body">
				<table class="example table table-hover table-bordered table-striped">
					<thead class="text-center recodeAttenThead">
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Roll</th>
							<th>Date</th>
							<th>Photo</th>
							<th>Attendence</th>
						</tr>
					</thead>
					<tbody class="text-center">
						@foreach($value as $result)
						<tr>
							<td>{{$result->id}}</td>
							<td>{{$result->name}}</td>
							<td>{{$result->roll}}</td>
							<td>{{$result->date}}</td>
							<td><img src="{{$result->photo}}" style="width: 30px;height: 30px;border-radius: 100%;"></td>
							
							@if ($result->attenden == "present")
								<td><p class="present">{{$result->attenden}}</p></td>
							@else
							    <td><p class="absent">{{$result->attenden}}</p></td>
							@endif
						</tr>
						 @endforeach
					</tbody>
			   </table>
			</div>
		</div>
	@endforeach
</div>
@endsection()

@section('script')
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap4.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
<script type="text/javascript">
	/*$(document).ready(function() {
		    var table = $('.example').DataTable( {
		        lengthChange: false,
		        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
		    } );
		 
		    table.buttons().container()
		        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
	} );*/
	/*$(document).ready(function() {
		getAttends()
	})*/
/*	function getAttends() {
		var url = "/getattend";

		axios.get(url)
	    .then(function(responce) {
	      if (responce.status == 200) {
	        $(".manageAttend").removeClass('d-none');
	        $(".DisplayLoader").addClass('d-none');

	         $('#dataTable').DataTable().destroy();
	        $('.manageAttendTbody').empty();

	        var manageAttend = responce.data;

	        $.each(manageAttend,function(i) {
	            var attend = "<td>"+manageAttend[i].date+"</td>";
	            var action = "<td>View</td>";
	            $("<tr>").html(attend+action).appendTo('.manageAttendTbody');
	        });

	        $("#dataTable").DataTable();
	        $('.datatablees_length').addClass('bs-select');
	        
	      } else {
	        $(".nothingData").removeClass('d-none');
	       $(".DisplayLoader").addClass('d-none');
	      }
	    })
	    .catch(function(error) {
	    	 $(".nothingData").removeClass('d-none');
	       $(".DisplayLoader").addClass('d-none');
	    })
	}*/
</script>
@endsection()