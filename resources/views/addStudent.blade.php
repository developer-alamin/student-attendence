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
				<thead class="text-center bg-light">
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Roll No</th>
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
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header addCrouseHeader">
        <h5>Add Student Data</h5>
      </div>
      <form id="addStudentForm">
        @csrf
        <div class="container">
            <div class="form-row">
                <div class="col-12">
                  <label for="StudentName">Student Name:</label>
                  <input type="text" name="StudentName" class="form-control StudentName" placeholder="Your Student Name">
                </div> 
                <div class="col-12">
                  <label class="studentDate">Date</label>
                  <input type="text" name="studentDate" class="studentDate form-control" placeholder="Your date">
                </div>
                <div class="col-12">
                   <label for="roll">Roll</label>
                  <input type="number" name="roll" class="form-control roll" placeholder="Your Roll No">
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

			if (name == false) {
				toastr.error('Please Student Name');
			}else if(date == false){
				toastr.error('Please Student Date');
			}else if(roll == false){
				toastr.error('Please Student Roll');
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
		            var date = "<td>"+studentData[i].date+"</td>";
		            $("<tr>").html(id+name+roll+date).appendTo('.studentTbody');
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