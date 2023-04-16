@extends('layout.app')
@section('title','Admin | Add Attendence')
@section('content')
<br>
	<div class="attendenceDiv">
		<div class="card">
			<div class="card-header">
				<strong>Daily Student Attendence Table</strong>
				<h5 class="AttencurrentDate">Today : <?php echo date('D-M-Y'); ?></h5>
			</div>
			<div class="card-body">
				<form id="">
                    @csrf
					<table id="dataTable" class="table createAttendtable d-none	 table-hover table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Name</th>
								<th>Roll</th>
								<th>Attendence</th>
							</tr>
						</thead>
						<tbody class="StudentAttendenTbody">
						
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

	<span class="DisplayLoader"></span>
	<div class="nothingData d-none">
	  <img src="{{asset('img/404.avif')}}">
	</div>
@endsection()
@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$("form").submit(function(e) {


		})
		getattend();
		createAttend();
	})
	function getattend() {
		var url = "/getStudentAttend";

		axios.get(url)
		.then(function(responce) {
			if (responce.status == 200) {
				$(".DisplayLoader").addClass('d-none');
				$(".createAttendtable").removeClass('d-none');


				 $('#dataTable').DataTable().destroy();
		         $('.StudentAttendenTbody').empty();
		        var studentattend = responce.data;

		        $.each(studentattend,function(i) {
		            var id = "<td>"+studentattend[i].id+"</td>";
		            var name = "<td>"+studentattend[i].name+"</td>";
		            var roll = "<td>"+studentattend[i].roll+"</td>";
		            var date = "<td>"+"<input type='radio' class='radio' name='attend["+studentattend[i].roll+"]' value='present'>P "+"<input type='radio' class='radio' name='attend["+studentattend[i].roll+"]' value='absent'>A"+"</td>";
		            $("<tr>").html(id+name+roll+date).appendTo('.StudentAttendenTbody');
		        })


		        $("#dataTable").DataTable();
		        $('.datatablees_length').addClass('bs-select');

			} else {
				$(".DisplayLoader").addClass('d-none');
				$(".nothingData").removeClass('d-none');
			}
		})
		.catch(function(error) {
			$(".DisplayLoader").addClass('d-none');
			$(".nothingData").removeClass('d-none');	
		})

	}
	function createAttend() {
		$("form").submit(function(e) {
			e.preventDefault();

			var d = new Date();
			var strDate = d.getDate() + "/" + (d.getMonth()+1) + "/" + d.getFullYear();

			var url = "/createAttendence";
			var data = new FormData(this);

			axios.post(url,data)
			.then(function(responce) {
				 if (responce.status == 200 && responce.data == 400) {
					swal('Sorry','Today '+ strDate +' Attendence Already Exits','error');
					getattend();
				}else if (responce.status == 200) {
					swal('Suuccess','Today '+ strDate +' Attendence Success','success');
					getattend();
				}else {
					swal('Sorry','Today '+ strDate +' Attendence Faild','error');
					getattend();
				}
			})
			.catch(function(error) {
				swal('Sorry','Today '+ strDate +' Attendence Faild','error');
				getattend();
			})
			
		})
	}
</script>
@endsection()
