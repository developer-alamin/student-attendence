@extends('layout.app')
@section('title','Admin | Add Depart')
@section('content')
<div class="addDepart">
	<div class="card mt-4">
		<div class="card-header">
			<strong>Attendence Add Department Manage</strong>
			<button class="addBtn addDepartbtn btn">Add Department</button>
		</div>
		<div class="card-body">
			<table id="dataTable" class="CrouseTable d-none table table-hover table-bordered table-striped">
				<thead class="text-center">
					<tr>
						<th>Id</th>
            <th>Depart Id</th>
						<th>Department</th>
						<th>Description</th>
						<th>Date & Time</th>
					</tr>
				</thead>
				<tbody class="departTbody">
					
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
<div class="modal fade" id="addDepartModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header addDepartHeader">
        <h5>Add Department Data</h5>
      </div>
      <form id="addDepartForm">
        @csrf
        <div class="container">
            <div class="form-row">
                <div class="col-12">
                  <label for="departid">Department Id:</label>
                  <input type="number" name="departid" class="form-control departid" placeholder="Your Department Id">
                </div> 
                <div class="col-12">
                  <label for="departName">Department Name:</label>
                  <input type="text" name="departName" class="form-control departName" placeholder="Your Department Name">
                </div> 
                <div class="col-12">
                   <label for="departDescrip">Description</label>
                  <input type="text" name="departDescrip" class="form-control departDescrip" placeholder="Your Description Name">
                </div> 
            </div>
        </div>
        <br>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
          <button type="submit" id="addDepartment" class="btn btn-primary">Submit</button>
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
		$(".addDepartbtn").click(function() {
			$("#addDepartModal").modal('show');
		})

		createDepartment();
		getdepart();
	})

	function createDepartment() {
  $("#addDepartForm").submit(function(e) {
      e.preventDefault();

      var departId = $(".departid").val();
      var departname = $(".departName").val();
      var departDes = $(".departDescrip").val();

      if (departId == false) {
        toastr.error('Please Department Id');
      } else if (departname == false) {
        toastr.error('Please Department Name');
     } else if(departDes == false){
        toastr.error('Please Department Description');
     }else{

       var addloader = "<span class='addLoader'></span>";
        $("#addDepartment").html(addloader);

        var url = "/createdepart";
        var data = new FormData(this);

        axios.post(url,data)
        .then(function(responce) {
          if (responce.status == 200) {
            swal('success','Department Data Added SuccessFully','success');
            $('input').val("");
            $("#addDepartModal").modal('hide');
            getdepart();
            setTimeout(function() {
               $("#addDepartment").html('Submit');
            },200);
          } else {
             swal('Sorry','Department Data Added Faild','error');
            $('input').val("");
            $("#addDepartModal").modal('hide');
            getdepart();
             setTimeout(function() {
               $("#addDepartment").html('Submit');
            },200);
          }
        })
        .catch(function(error) {
           swal('Sorry','Department Data Added Faild','error');
            $('input').val("");
            $("#addDepartModal").modal('hide');
            getdepart();
             setTimeout(function() {
               $("#addDepartment").html('Submit');
            },200);
        })
     }
  })
}


function getdepart() {
  var url = "/getdepart";
  axios.get(url)
  .then(function(responce) {
    if (responce.status == 200) {
      $(".DisplayLoader").addClass('d-none');
      $(".CrouseTable").removeClass('d-none');
      
        $('#dataTable').DataTable().destroy();
        $('.departTbody').empty();
        var departData = responce.data; 

        $.each(departData,function(i) {
            var id = "<td>"+departData[i].id+"</td>";
            var departid = "<td>"+departData[i].departid+"</td>"
            var name = "<td>"+departData[i].department+"</td>";
            var Descrip = "<td>"+departData[i].description+"</td>";
            var date = "<td>"+new Date(departData[i].created_at)+"</td>";
            $("<tr>").html(id+departid+name+Descrip+date).appendTo('.departTbody');
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
</script>
@endsection()