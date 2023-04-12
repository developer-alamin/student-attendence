@extends('layout.app')
@section('title','Admin | Add Attendence')
@section('content')
<br>
	<div class="attendenceDiv">
		<div class="card">
			<div class="card-header">
				<strong>Daily Student Attendence Table</strong>
				<h5 class="AttencurrentDate">Today : <?php echo now(); ?></h5>
			</div>
			<div class="card-body">
				<form action="{{url('/getattendence')}}" method="">
					<table class="table table-hover table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Name</th>
								<th>Roll</th>
								<th>Attendence</th>
							</tr>
						</thead>
						<tbody>
						@foreach($attenDataKey as $key => $value)
							 <tr>
							 	<td>{{ $value->id }}</td>
							 	<td>{{ $value->name }}</td>
							 	<td>{{ $value->roll }}</td>
							 	<td>
							 		<input type="radio" class="radio" name="attend[{{ $value->roll }}]" value="present">P
							 		<input type="radio" class="radio" name="attend[{{ $value->roll }}]" value="Absent">A
							 	</td>
							 </tr>
						@endforeach()
						</tbody>
						<tfoot>
							<tr>
								<td style="border:none;"><button type="submit" class="btn attendenButton">Submit</button></td>
							</tr>
						</tfoot>
					</table>
				</form>
			</div>
		</div>
	</div>
@endsection()
@section('script')
<script type="text/javascript">
	/*$(document).ready(function() {
		$("#attenFormId").submit(function(e) {
			e.preventDefault();

			var url = "/getattendence";

			var data = new FormData(this);
			axios.post(url,data)
			.then(function(responce) {
				alert(responce.data);
			})
			.catch(function(error) {
				alert('error');
			})
		})
	})*/
</script>
@endsection()