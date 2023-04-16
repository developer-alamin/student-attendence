@extends('layout.app')
@section('title','Admin | Add Student')
@section('content')
<br>
<div class="addStudentDiv">
	<div class="card">
		<div class="card-header">
			<strong>Add Student Managment</strong>
			<button class="addBtn btn addStudentBtn">Add Student</button>
		</div>
		<div class="card-body">
			<table id="dataTable" class="table StudentTable d-none table-bordered table-hover table-striped">
				<thead class="text-center">
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Roll No</th>
						<th>Mobile</th>
						<th>Class</th>
						<th>Crouse</th>
						<th>Department</th>
						<th>Photo</th>
						<th>Date & Time</th>
					</tr>
				</thead>
				<tbody class="studentTbody">
					
				</tbody>
			</table>
		</div>
	</div>
</div>

<span class="DisplayLoader"></span>
<div class="nothingData d-none">
  <img src="{{asset('img/404.avif')}}">
</div>


{{-- modal html code start form here --}}
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header addCrouseHeader">
        <h5>Add Student Data</h5>
        <img src="" id="studentPreviewImg" style="width: 70px;height: 70px;border-radius: 100%;">
      </div>
      <form id="addStudentForm">
        @csrf
        <div class="container">
            <div class="form-row">
            	<div class="col-4">
                   <label for="photo">Photo</label>
                  <input type="file" name="photo" class="form-control photo" required>
                </div> 
                <div class="col-4">
                  <label for="StudentName">Student Name:</label>
                  <input type="text" name="StudentName" class="form-control StudentName" placeholder="Your Student Name">
                </div> 
                <div class="col-4">
                  <label class="studentDate">Date</label>
                  <input type="text" name="studentDate" class="studentDate form-control" placeholder="Your date">
                </div>
             </div>
             <br>
             <div class="form-row">
             	<div class="col-4">
                   <label for="roll">Roll</label>
                  <input type="number" name="roll" class="form-control roll" placeholder="Your Roll No">
                </div> 
                 <div class="col-4">
                   <label for="mobile">Mobile</label>
                  <input type="number" name="mobile" class="form-control mobile" placeholder="Your mobile No">
                </div> 
                 <div class="col-4">
                 	<label for="class">Class</label>
                 	<select class="form-select class" name="class" >
                 		<option>--Select Class---</option>
                 		@foreach($classKey as $value)
                 			<option value="{{ $value->class }}">{{ $value->class }}</option>
                 		@endforeach()
                 	</select>
                </div> 
             </div>
             <br>
             <div class="form-row">
             	<div class="col-4">
             		<label for="crouse">Crouse</label>
             		<select class="form-select crouse" name="crouse" >
                 		<option>--Select Crouse---</option>
                 		@foreach($crouseKey as $value)
                 			<option value="{{ $value->name }}">{{ $value->name }}</option>
                 		@endforeach()
                 	</select>
             	</div>
             	<div class="col-4">
             		<label for="department">Department</label>
             		<select class="form-select department" name="department" >
                 		<option>--Select Department---</option>
                 		@foreach($departKey as $value)
                 			<option value="{{ $value->department }}">{{ $value->department }}</option>
                 		@endforeach()
                 	</select>
             	</div>
             </div>
        </div>
        <br>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
          <button type="submit" id="addStudent" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- modal html code end form here --}}


@endsection()

@section('script')
<script type="text/javascript">
	$(document).ready(function() {

		$( ".studentDate" ).datepicker({
		    altField: ".studentDate",
		    altFormat: "d MM, yy"
		 });


		$(".addStudentBtn").click(function() {
			$("#addStudentModal").modal('show')
		})

		createStudent();
		getStudent();
	})

	function createStudent() {
		$("#addStudentForm").submit(function(e) {
			e.preventDefault();

			var name = $(".StudentName").val();
			var roll = $(".roll").val();
			var date = $(".studentDate").val();
			var mobile = $(".mobile").val();
			var classs = $(".class").val();
			var crouse = $(".crouse").val();
			var depart = $(".department").val();

			if (name == false) {
				toastr.error('Please Student Name');
			}else if(date == false){
				toastr.error('Please Student Date');
			}else if(roll == false){
				toastr.error('Please Student Roll');
			}else if(mobile == false){
				toastr.error('Please Student Mobile');
			}else if(classs == false){
				toastr.error('Please Student Class');
			}else if(crouse == false){
				toastr.error('Please Student Crouse');
			}else if(depart == false){
				toastr.error('Please Student Department');
			}else{
				var addloader = "<span class='addLoader'></span>";
                $("#addStudent").html(addloader);

				var url = "/createStudent";
				var data = new FormData(this);

				axios.post(url,data)
				.then(function(responce) {
					if (responce.status == 200 && responce.data == 100) {
						toastr.error('<h6>Your Roll Alredy Exits</h6>');
						getStudent();
						setTimeout(function() {
			               $("#addStudent").html('Submit');
			            },100);
					} else if(responce.status == 200 && responce.data == 200){
						swal('success','Student Data Added Success','success');
						$("#addStudentModal").modal('hide');
						$('input').val("");
						getStudent();
						setTimeout(function() {
			               $("#addStudent").html('Submit');
			            },200);
					}else{
						swal('Sorry','Student Data Added Faild','error');
						$("#addStudentModal").modal('hide');
						$('input').val("");
						getStudent();
						setTimeout(function() {
			               $("#addStudent").html('Submit');
			            },200);
					}
				})
				.catch(function(error) {
				   swal('Sorry','Student Data Added Faild','error');
					$("#addStudentModal").modal('hide');
					$('input').val("");
					getStudent();
					setTimeout(function() {
		               $("#addStudent").html('Submit');
		            },200);
				})
			}


		})
	}


	function getStudent() {
		var url = "/getStudent";
		 axios.get(url)
		    .then(function(responce) {
		      if (responce.status == 200) {
		        $(".StudentTable").removeClass('d-none');
		        $(".DisplayLoader").addClass('d-none');

		         $('#dataTable').DataTable().destroy();
		        $('.studentTbody').empty();
		        var studentData = responce.data;

		        $.each(studentData,function(i) {
		            var id = "<td>"+studentData[i].id+"</td>";
		            var name = "<td>"+studentData[i].name+"</td>"
		            var roll = "<td>"+studentData[i].roll+"</td>";
		            var mobile = "<td>"+studentData[i].mobile+"</td>";
		            var classs = "<td>"+studentData[i].class+"</td>";
		            var crouse = "<td>"+studentData[i].crouse+"</td>";
		            var depart = "<td>"+studentData[i].depart+"</td>";
		            
		            var photo = "<td><img class='studentImg' src='"+studentData[i].photo+"'></td>";
		            var date = "<td>"+studentData[i].date+"</td>";
		            $("<tr>").html(id+name+roll+mobile+classs+crouse+depart+photo+date).appendTo('.studentTbody');
		        })
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
	}
</script>
@endsection()