@extends('layout.app')
@section('title','Admin | View Crouse')
@section('content')
<div class="ViewCrouseDiv">
	<div class="card mt-4">
		<div class="card-header">
			<strong>Attendence Add Crouse Manage</strong>
		</div>
		<div class="card-body">
			<table id="dataTable" class="CrouseTable d-none table table-hover table-bordered table-striped">
				<thead class="text-center">
					<tr>
						<th>Id</th>
            <th>Crouse Id</th>
						<th>Crouse</th>
						<th>Description</th>
						<th>Date & Time</th>
						<th>Action</th>
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

{{-- crouse update modal html code start form here --}}
<div class="modal fade" id="updateModalCrose" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header updateCrouseHeader">
        <h5>Crouse Update Data Managment</h5>
        <h4></h4>
      </div>
      	<span class="UpDisplayLoader"></span>
		<div class="nothingData d-none">
		  <img src="{{asset('img/404.avif')}}" style="width: 200px;height: 200px">
		</div>
      <form id="CrouseUpdateForm">
        @csrf
        <div class="container">
            <div class="form-row">
            	<input type="hidden" name="upId" class="upId">
              <div class="col-12">
                  <label for="upcrouseid">Crouse Name:</label>
                  <input type="number" name="upcrouseid" class="form-control upcrouseid">
                </div> 
                <div class="col-12">
                  <label for="UpCrouseName">Crouse Name:</label>
                  <input type="text" name="UpCrouseName" class="form-control UpCrouseName">
                </div> 
                <div class="col-12">
                   <label for="UpCrouseDes">Description</label>
                  <input type="text" name="UpCrouseDes" class="form-control UpCrouseDes">
                </div> 
                <div class="col-12">
                	<label class="UpCrouseDate">Date</label>
                	<input type="text" name="UpCrouseDate" class="UpCrouseDate form-control">
                </div>
            </div>
        </div>
        <br>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
          <button type="submit" id="updateCrouse" class="btn btn-primary">Update</button>
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
		$( ".UpCrouseDate" ).datepicker({
		    altField: ".UpCrouseDate",
		    altFormat: "d MM, yy"
		 });

		getCrouse();
		CrouseUpdate();
	});

	
 function getCrouse() {
    var url = "/getCrouse";

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
            var crouseid = "<td>"+crousedata[i].crouseid+"</td>";
            var name = "<td>"+crousedata[i].name+"</td>";
            var addDescrip = "<td>"+crousedata[i].descrip+"</td>";
            var date = "<td>"+crousedata[i].date+"</td>";
            var action = "<td><i class='fa fa-edit tdEditIcon' data-edit='"+crousedata[i].id+"'></i><i class='fas fa-trash tdDeleteIcon' data-delete='"+crousedata[i].id+"'></i></td>";
            $("<tr>").html(id+crouseid+name+addDescrip+date+action).appendTo('.CrouseTbody');
        });


        $(".tdEditIcon").click(function() {
           var id = $(this).data('edit');
           $('#updateModalCrose').modal('show');
           $(".updateCrouseHeader h4").html(id);
           crouseUpdateShow(id);
        })
         $(".tdDeleteIcon").click(function() {
           var id = $(this).data('delete');
           CrouseDelete(id);
        })
      

        $("#dataTable").DataTable();
        $('.datatablees_length').addClass('bs-select');
        
      } else {
        $(".nothingData").removeClass('d-none');
       $(".DisplayLoader").addClass('d-none');
      }
    })

  }

function crouseUpdateShow(id) {
    var url = "/updateShowCrouse";
    var data = {id:id}

    axios.post(url,data)
    .then(function(responce) {
     if (responce.status == 200) {
        $(".UpDisplayLoader").addClass('d-none');

        var updatedata = responce.data;
        $(".upId").val(updatedata[0].id);
        $(".upcrouseid").val(updatedata[0].crouseid);
        $(".UpCrouseName").val(updatedata[0].name);
         $(".UpCrouseDes").val(updatedata[0].descrip);
         $(".UpCrouseDate").val(updatedata[0].date);
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

function CrouseUpdate() {
  $("#CrouseUpdateForm").submit(function(e) {
    e.preventDefault();
    var url = "/updateCrouse";
    var data = new FormData(this);

     var updateLoader = "<span class='addLoader'></span>";
     $("#updateCrouse").html(updateLoader);


    axios.post(url,data)
    .then(function(responce) {
     if (responce.status == 200) {
        swal("Updated!",'Crouse Data Updated','success');
        $('#updateModalCrose').modal('hide');
        getCrouse();

        setTimeout(function() {
          $("#updateCrouse").html('Update')
        },300);

     } else {
        swal("Sprry!",'Crouse Data Updated Faild','error');
        $('#updateModalCrose').modal('hide');
        getCrouse();
        setTimeout(function() {
          $("#updateCrouse").html('Update')
        },300);
     }

    })
    .catch(function(error) {
        swal("Sprry!",'Crouse Data Updated Faild','error');
        $('#updateModalCrose').modal('hide');
        getCrouse();
        setTimeout(function() {
          $("#updateCrouse").html('Update')
        },300);
    })
  })
}

function CrouseDelete(id) {
  var url = "/deleteCrouse";
  var data = {id:id}

  swal({
        title: "Are you sure?",
        text: "Are You Want To Crouse Data Deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true
    })
  .then((willDelete) => {
      if (willDelete) {
        axios.post(url,data)
          .then(function(response) {
            swal("Success", "Your Data Deleted Success!", "success");
            getCrouse();
          })
          .catch(function(error) {
            swal("Sorry...", "Your Data Not Deleted!", "error");
            getCrouse();
          })
      }
    });
}


</script>
@endsection()