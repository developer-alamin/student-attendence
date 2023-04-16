@extends('layout.app')
@section('title','Admin | Add Class')
@section('content')
<br>
<div class="addClassDiv">
	<div class="card">
		<div class="card-header">
			<strong>Add Class</strong>
			<button class="addBtn AddClassbutton btn">Add Class</button>
		</div>
		<div class="card-body">
			<table id="datatable" class="AddClassTable d-none table table-hover table-bordered table-striped">
				<thead class="text-center">
					<tr>
						<th>Sr No</th>
						<th>Class</th>
						<th>Date & Time</th>
					</tr>
				</thead>
				<tbody class="classTbody text-center">
					
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
<div class="modal fade" id="addClassModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header addClassMHeader">
        <h5>Add Class Data</h5>
      </div>
      <form id="addClassForm">
        @csrf
        <div class="container">
            <div class="form-row">
                <div class="col-12">
                  <label for="className">Class Name:</label>
                  <input type="text" name="className" class="form-control className" placeholder="Your Class Name">
                </div> 
            </div>
        </div>
        <br>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
          <button type="submit" id="addClass" class="btn btn-primary">Submit</button>
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
		$(".AddClassbutton").click(function() {
			$("#addClassModal").modal('show');
		})
		getClass();
		createClass();
	})
	function createClass() {
		$("#addClassForm").submit(function(e) {
			e.preventDefault();
			var className = $(".className").val();
			if (className == false) {
				toastr.error('Please Your Class');
			} else {
				var addloader = "<span class='addLoader'></span>";
	            $("#addClass").html(addloader);


				var url = "/createClass";
				var data = new FormData(this);

				axios.post(url,data)
				.then(function(responce) {
					if (responce.status == 200 && responce.data == 500) {
						toastr.error('<h3>Class Already Exits</h3>');
						setTimeout(function() {
			               $("#addClass").html('Submit');
			            },200);
						$('input').val("");
					}else if(responce.status == 200 && responce.data == 1){
						swal('success','Class Added Successfully','success');
						$("#addClassModal").modal('hide');
						getClass();
						 setTimeout(function() {
			               $("#addClass").html('Submit');
			            },200);
						$('input').val("");
					} else {
						swal('Sorry','Class Added Successfully','error');
						$("#addClassModal").modal('hide');
						getClass()
						 setTimeout(function() {
			               $("#addClass").html('Submit');
			            },200);
						$('input').val("");
					}
				})
				.catch(function(error) {
					swal('Sorry','Class Added Successfully','error');
					$("#addClassModal").modal('hide');
					getClass()
					 setTimeout(function() {
		               $("#addClass").html('Submit');
		            },200);
					$('input').val("");
				})
			}
			
		})
	}

	function getClass() {
		var url = "/getClass";

		axios.get(url)
		.then(function(responce) {
			if (responce.status == 200) {
				$('.DisplayLoader').addClass('d-none');
				$('.AddClassTable').removeClass('d-none');
				
				  $('#dataTable').DataTable().destroy();
		        $('.classTbody').empty();
		        var classData = responce.data;

		        $.each(classData,function(i) {
		            var id = "<td>"+classData[i].id+"</td>";
		            var name = "<td>"+classData[i].class+"</td>";
		            var date = "<td>"+classData[i].created_at+"</td>";
		            $("<tr>").html(id+name+date).appendTo('.classTbody');
		        })
		        $("#dataTable").DataTable();
		        $('.datatablees_length').addClass('bs-select');
        
			} else {
				$('.DisplayLoader').addClass('d-none');
				$('.nothingData').removeClass('d-none');
			}
		})
		.catch(function(error) {
			$('.DisplayLoader').addClass('d-none');
			$('.nothingData').removeClass('d-none');
		})
	}
</script>
@endsection()
