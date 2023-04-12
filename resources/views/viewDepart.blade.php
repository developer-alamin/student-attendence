@extends('layout.app')
@section('title','Admin | Add DepartMent')
@section('content')
<div class="addDepart">
	<div class="card mt-4">
		<div class="card-header">
			<strong>Attendence Department Data Manage</strong>
		</div>
		<div class="card-body">
			<table id="dataTable" class="CrouseTable d-none table table-hover table-bordered table-striped">
				<thead class="text-center">
					<tr>
						<th>Id</th>
            			<th>Depart Id</th>
						<th>Department</th>
						<th>Description</th>
						<th>Action</th>
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


{{-- crouse update modal html code start form here --}}
<div class="modal fade" id="departUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header departModalHeader">
        <h5>Department Update Data Managment</h5>
        <h4></h4>
      </div>
      	<span class="UpDisplayLoader"></span>
		<div class="nothingData d-none">
		  <img src="{{asset('img/404.avif')}}" style="width: 200px;height: 200px">
		</div>
      <form id="departUPdateForm">
        @csrf
        <div class="container">
            <div class="form-row">
            	<input type="hidden" name="departPriId" class="departPriId">
              <div class="col-12">
                  <label for="updepartId">Crouse Id:</label>
                  <input type="number" name="updepartId" class="form-control updepartId">
                </div> 
                <div class="col-12">
                  <label for="updepartName">Crouse Name:</label>
                  <input type="text" name="updepartName" class="form-control updepartName">
                </div> 
                <div class="col-12">
                   <label for="updepartdes">Description</label>
                  <input type="text" name="updepartdes" class="form-control updepartdes">
                </div> 
            </div>
        </div>
        <br>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
          <button type="submit" id="updateDepartbtn" class="btn btn-primary">Update</button>
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
		getdepart();
		departUPdate()
	})

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
             var action = "<td><i class='fa fa-edit tdEditIcon' data-edit='"+departData[i].id+"'></i><i class='fas fa-trash tdDeleteIcon' data-delete='"+departData[i].id+"'></i></td>";
            $("<tr>").html(id+departid+name+Descrip+action).appendTo('.departTbody');
        });

        $(".tdEditIcon").click(function() {
        	$("#departUpdateModal").modal('show');
        	var id = $(this).data('edit');
        	$(".departModalHeader h4").html(id);
        	UPdateShow(id);
        })

        $(".tdDeleteIcon").click(function() {
        	var id =$(this).data('delete');
        	departDelate(id);
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


function UPdateShow(id) {
  var url = "/upShowDepart";
  var data = {id:id}

  axios.post(url,data)
    .then(function(responce) {
     if (responce.status == 200) {
        $(".UpDisplayLoader").addClass('d-none');

        var updatedata = responce.data;
        $(".departPriId").val(updatedata[0].id);
        $(".updepartId").val(updatedata[0].departid);
        $(".updepartName").val(updatedata[0].department);
         $(".updepartdes").val(updatedata[0].description);
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



function departUPdate() {
  $("#departUPdateForm").submit(function(e) {
    e.preventDefault();
    var url = "/updateDepart";
    var data = new FormData(this);

     var updateLoader = "<span class='addLoader'></span>";

     $("#updateDepartbtn").html(updateLoader);


    axios.post(url,data)
    .then(function(responce) {
     if (responce.status == 200) {
        swal("Updated!",'Department Data Updated','success');
        $('#departUpdateModal').modal('hide');
       getdepart();
        setTimeout(function() {
          $("#updateDepartbtn").html('Update')
        },300);

     } else {
        swal("Sprry!",'Department Data Updated Faild','error');
        $('#departUpdateModal').modal('hide');
       getdepart();
        setTimeout(function() {
          $("#updateDepartbtn").html('Update')
        },300);
     }

    })
    .catch(function(error) {
        swal("Sprry!",'Department Data Updated Faild','error');
        $('#departUpdateModal').modal('hide');
       getdepart();
        setTimeout(function() {
          $("#updateDepartbtn").html('Update')
        },300);
    })
  })
}


function departDelate(id) {
  var url = "/delatedepart";
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
            getdepart();
          })
          .catch(function(error) {
            swal("Sorry...", "Your Data Not Deleted!", "error");
            getdepart();
          })
      }
    });
}

</script>
@endsection()