@extends('layout.app')
@section('title','Admin | Add Crouse')
@section('content')
<div class="addCrouseDiv">
	<div class="card mt-4">
		<div class="card-header">
			<strong>Attendence Add Crouse Manage</strong>
			<button class="addBtn addCrouseBtn btn">Add Crouse</button>
		</div>
		<div class="card-body">
			<table id="dataTable" class="CrouseTable d-none table table-hover table-bordered table-striped">
				<thead class="text-center">
					<tr>
						<th>Id</th>
            <th>Crouse Id</th>
						<th>Crouse</th>
						<th>Description</th>
            <th>Department</th>
						<th>Date & Time</th>
					</tr>
				</thead>
				<tbody class="CrouseTbody">
					
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
<div class="modal fade" id="addCrouseDepart" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header addCrouseHeader">
        <h5>Add Crouse Data</h5>
      </div>
      <form id="addCrouseForm">
        @csrf
        <div class="container">
            <div class="form-row">
                <div class="col-12">
                  <label for="crouseId">Crouse Id:</label>
                  <input type="number" name="crouseId" class="form-control crouseId" placeholder="Your Crouse Id">
                </div> 
                <div class="col-12">
                  <label for="crouseName">Crouse Name:</label>
                  <input type="text" name="crouseName" class="form-control crouseName" placeholder="Your Crouse Name">
                </div> 
                <div class="col-12">
                   <label for="addDescrip">Description</label>
                  <input type="text" name="addDescrip" class="form-control addDescrip" placeholder="Your Description Name">
                </div> 
                <div class="col-12">
                  <label class="crouseDate">Date</label>
                  <input type="text" name="crouseDate" class="crouseDate form-control" placeholder="Your date">
                </div>
            </div>
        </div>
        <br>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
          <button type="submit" id="addCrouse" class="btn btn-primary">Submit</button>
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

		$( ".crouseDate" ).datepicker({
		    altField: ".crouseDate",
		    altFormat: "d MM, yy"
		 });

		$('.addCrouseBtn').click(function() {
			$("#addCrouseDepart").modal('show');
		})
		addCrouse();
		getCrouse();
	});



	function addCrouse() {
    $('#addCrouseForm').submit(function(e){
      e.preventDefault();

      var crouseId = $(".crouseId").val();
      var name = $('.crouseName').val();
      var addDescrip = $('.addDescrip').val();
      var crouseDate = $('.crouseDate').val();

      if (crouseId == false) {
         toastr.error('Please Crouse Id');
      } else if (name == false) {
        toastr.error('Please Crouse Name');
      } else if (addDescrip == false) {
        toastr.error('Please Crouse Description');
      } else if(crouseDate == false){
        toastr.error('Please Crouse Date&Time');
      }else{

        var url = "/createCrouse";
        var addloader = "<span class='addLoader'></span>";
        $("#addCrouse").html(addloader);
        var data = new FormData(this);
        

        axios.post(url,data) 
        .then(function(responce) {
          if (responce.status == 200) {
            swal('Success!','Crouse Added SuccessFully','success');
            $("#addCrouseDepart").modal('hide');
            $('input').val("");
            $("#addCrouse").html('Submit');
            getCrouse();
          } else {
            swal('Sorry!','Crouse Added Faild','error');
            $("#addCrouseDepart").modal('hide');
            $('input').val(" ");
            $("#addCrouse").html('Submit');
            getCrouse();
          }
        })
        .catch(function(error) {
          swal('Sorry!','Crouse Added Faild','error');
              $("#addCrouseDepart").modal('hide');
              $('input').val(" ");
              $("#addCrouse").html('Submit');
              getCrouse();
        })
      }
      
      
    })
  }



  function getCrouse() {
    var url = "/joingetCrouse";

    axios.get(url)
    .then(function(responce) {
      if (responce.status == 200) {
        $(".CrouseTable").removeClass('d-none');
        $(".DisplayLoader").addClass('d-none');

         $('#dataTable').DataTable().destroy();
        $('.CrouseTbody').empty();
        var crousedata = responce.data;

        $.each(crousedata,function(i) {
            var id = "<td>"+crousedata[i].id+"</td>";
            var crouseid = "<td>"+crousedata[i].crouseid+"</td>"
            var name = "<td>"+crousedata[i].name+"</td>";
            var addDescrip = "<td>"+crousedata[i].descrip+"</td>";
            var depart = "<td>"+crousedata[i].department+"</td>";
            
            var date = "<td>"+crousedata[i].date+"</td>";
            $("<tr>").html(id+crouseid+name+addDescrip+depart+date).appendTo('.CrouseTbody');
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