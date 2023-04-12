@extends('layout.app')
@section('content')
<br>
<div class="addStudentDiv">
	<div class="card">
		<div class="card-header">
			<strong>Student Data Manage</strong>
		</div>
		<div class="card-body">
			<table id="dataTable" class="table StudentTable d-none table-bordered table-hover table-striped">
				<thead class="text-center bg-light">
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Roll No</th>
						<th>Date & Time</th>
						<th>Action</th>
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

{{-- crouse update modal html code start form here --}}
<div class="modal fade" id="studentUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header SMHeader">
        <h5>Student Update Data Managment</h5>
        <h4></h4>
      </div>
      	<span class="UpDisplayLoader"></span>
		<div class="nothingData d-none">
		  <img src="{{asset('img/404.avif')}}" style="width: 200px;height: 200px">
		</div>
      <form id="studentUpForm">
        @csrf
        <div class="container">
            <div class="form-row">
            	<input type="hidden" name="studentid" class="studentid">
                <div class="col-12">
                  <label for="stuName">Student Name:</label>
                  <input type="text" name="stuName" class="form-control stuName">
                </div> 
                <div class="col-12">
                   <label for="stuUpRoll">Student Roll</label>
                  <input type="number" name="stuUpRoll" class="form-control stuUpRoll">
                </div> 
                <div class="col-12">
                   <label for="stuUpDate">Date</label>
                  <input type="text" name="stuUpDate" class="form-control stuUpDate">
                </div> 
                
            </div>
        </div>
        <br>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
          <button type="submit" id="StudetUpBtn" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- crouse update modal html code end form here --}}
@endsection()

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$( ".stuUpDate" ).datepicker({
		    altField: ".stuUpDate",
		    altFormat: "d MM, yy"
		 });

		getStudent();
		studentUpdate();
	})

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
		            var action = "<td><i class='fa fa-edit tdEditIcon' data-edit='"+studentData[i].id+"'></i><i class='fas fa-trash tdDeleteIcon' data-delete='"+studentData[i].id+"'></i></td>";
		            $("<tr>").html(id+name+roll+date+action).appendTo('.studentTbody');
		        });

		        $(".tdEditIcon").click(function() {
		        	$("#studentUpdateModal").modal('show');
		        	var id = $(this).data('edit');
		        	$(".SMHeader h4").html(id);
		        	studentUpShow(id);
		        });

		        $(".tdDeleteIcon").click(function() {
		        	var id = $(this).data('delete');
		        	studentDelete(id);
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


function studentUpShow(id) {
	  var url = "/upShowStudent";
	  var data = {id:id}

	  axios.post(url,data)
	    .then(function(responce) {
	     if (responce.status == 200) {

	        $(".UpDisplayLoader").addClass('d-none');
	        var updatedata = responce.data;
	        $(".studentid").val(updatedata[0].id);
	        $(".stuName").val(updatedata[0].name);
	        $(".stuUpRoll").val(updatedata[0].roll);
	        $(".stuUpDate").val(updatedata[0].date);
	     } else {
	      $(".UpDisplayLoader").addClass('d-none');
	      $(".nothingData").removeClass('d-none');
	     }
	    })
	    .catch(function(error) {
	      $(".UpDisplayLoader").addClass('d-none');
	     $(".nothingData").removeClass('d-none');
	  })

} 



function studentUpdate() {
  $("#studentUpForm").submit(function(e) {
    e.preventDefault();

    var url = "/updateStudent";
    var data = new FormData(this);

     var updateLoader = "<span class='addLoader'></span>";

     $("#StudetUpBtn").html(updateLoader);


    axios.post(url,data)
    .then(function(responce) {
     if (responce.status == 200) {
        swal("Updated!",'Student Data Updated','success');
        $('#studentUpdateModal').modal('hide');
        getStudent();
        setTimeout(function() {
          $("#StudetUpBtn").html('Update')
        },300);

     } else {
        swal("Sprry!",'Student Data Updated Faild','error');
        $('#studentUpdateModal').modal('hide');
        getStudent();
        setTimeout(function() {
          $("#StudetUpBtn").html('Update')
        },300);
     }

    })
    .catch(function(error) {
         swal("Sprry!",'Student Data Updated Faild','error');
        $('#studentUpdateModal').modal('hide');
        getStudent();
        setTimeout(function() {
          $("#StudetUpBtn").html('Update')
        },300);
    })
  })
}

function studentDelete(id) {
  var url = "/deleteStudent";
  var data = {id:id}

  swal({
        title: "Are you sure?",
        text: "Are You Want To Student Data Deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true
    })
  .then((willDelete) => {
      if (willDelete) {
        axios.post(url,data)
          .then(function(response) {
            swal("Success", "Your Data Deleted Success!", "success");
            getStudent();
          })
          .catch(function(error) {
            swal("Sorry...", "Your Data Not Deleted!", "error");
            getStudent();
          })
      }
    });
}

</script>
@endsection()