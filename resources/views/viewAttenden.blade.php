@extends('layout.app')
@section('title','Admin | View Attendence')
@section('content')
<div class="ViewCrouseDiv">
	<div class="card mt-4">
		<div class="card-header text-center">
			<strong>Student Attendence Manage</strong>
		</div>
		<div class="card-body">
			<table id="dataTable" class="manageAttend table table-hover table-bordered table-striped">
				<thead class="text-center">
					<tr>
						<th>Id</th>
						<th>Roll</th>
						<th>Date</th>
						<th>Attendence</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody class="manageAttendTbody">
					
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
<div class="modal fade" id="updateAttenModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header updateMHAttend">
        <h5>Attendence Update Data Managment</h5>
        <h4></h4>
      </div>
      	<span class="UpDisplayLoader"></span>
		<div class="nothingData d-none">
		  <img src="{{asset('img/404.avif')}}" style="width: 200px;height: 200px">
		</div>
      <form id="attendupdateForm">
        @csrf
        <div class="container">
            <div class="form-row">
            	<input type="hidden" name="attendupid" class="attendupid">
              <div class="col-12">
                  <label for="upAttend">Attendence:</label>
                  <select class="form-select" name="upAttend" id="upAttend">
                  	<option value="present">present</option>
                  	<option value="absent">absent</option>
                  </select>
                </div> 
                <div class="col-12">
                  <label for="updateattenTime">Date & Time:</label>
                  <input type="text" name="updateattenTime" class="form-control updateattenTime">
                </div> 
            </div>
        </div>
        <br>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
          <button type="submit" id="updateattend" class="btn btn-primary">Update</button>
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
		$( ".updateattenTime" ).datepicker({
			 altField: ".updateattenTime",
		      numberOfMonths: 3,
           altFormat: "d-M-yy",
		      showButtonPanel: true
	    });

		getAttends();
		attenUpdate()
	})


	
function getAttends() {
    var url = "/getattend";
    axios.get(url)
      .then(function(responce) {
        if (responce.status == 200) {
          $(".manageAttend").removeClass('d-none');
          $(".DisplayLoader").addClass('d-none');

           $('#dataTable').DataTable().destroy();
          $('.manageAttendTbody').empty();

          var manageAttend = responce.data;

          $.each(manageAttend,function(i) {
            var id = "<td>"+manageAttend[i].id+"</td>";
            var roll = "<td>"+manageAttend[i].roll+"</td>";
            var date = "<td>"+manageAttend[i].date+"</td>";
              if (manageAttend[i].attenden == "present") {
               var attend = "<td><p class='present'>"+manageAttend[i].attenden+"</p></td>"; 
              } else {
               var attend = "<td><p class='absent'>"+manageAttend[i].attenden+"</p></td>";    
              }
                var action = "<td><i class='fa fa-edit tdEditIcon' data-edit='"+manageAttend[i].id+"'></i><i class='fas fa-trash tdDeleteIcon' data-date='"+manageAttend[i].date+"' data-delete='"+manageAttend[i].id+"'></i></td>";
              $("<tr>").html(id+roll+date+attend+action).appendTo('.manageAttendTbody');
          });

          $(".tdEditIcon").click(function() {
            var id = $(this).data('edit');
            $("#updateAttenModal").modal('show');
            $('.updateMHAttend h4').html(id);
            attenUpShow(id)
           
          })

          $(".tdDeleteIcon").click(function() {
            var id = $(this).data('delete');
            var date = $(this).data('date')
            attenDelete(id,date);
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


  function attenUpShow(id) {
    var url = "/attendUpShow"

    axios.post(url,{id:id})
    .then(function(responce) {
      if (responce.status == 200) {
        $(".UpDisplayLoader").addClass('d-none');

        var updateAttrndata = responce.data;
        $(".attendupid").val(updateAttrndata[0].id);
        $("#upAttend").val(updateAttrndata[0].attenden);
        $(".updateattenTime").val(updateAttrndata[0].date);
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

  function attenUpdate() {

  $("#attendupdateForm").submit(function(e) {
      e.preventDefault();
     var url = "/attendupdate";
     var data = new FormData(this);

     var updateLoader = "<span class='addLoader'></span>";
     $("#updateattend").html(updateLoader);


     axios.post(url,data)
     .then(function(responce) {
       if (responce.status == 200) {
          swal('suucees','Attendencee Update Successfully','success')
          $("#updateAttenModal").modal('hide');
          getAttends();
          setTimeout(function() {
            $("#updateattend").html('Update')
          },300);
       } else {
          swal('Sorry','Attendencee Update Faild','error')
          $("#updateAttenModal").modal('hide');
          getAttends();
          setTimeout(function() {
            $("#updateattend").html('Update')
          },300);
       }
     })
     .catch(function(error) {
      alert('error');
        swal('Sorry','Attendencee Update Faild','error')
          $("#updateAttenModal").modal('hide');
          getAttends();
          setTimeout(function() {
            $("#updateattend").html('Update')
          },300);
     })
  })
  
}

function attenDelete(id,date) {
 var url = "/attendDelete";
 var data = {id:id}

 swal({
        title: "Are you sure?",
        text: "Are You Want To "+date+" Attendence Data Deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true
    })
  .then((willDelete) => {
      if (willDelete) {
        axios.post(url,data)
          .then(function(response) {
            swal("Success", date +" Your Attendence Data Deleted!", "success");
            getAttends();
          })
          .catch(function(error) {
            swal("Sorry...", date +" Your Data Not Deleted!", "error");
            getAttends();
          })
      }
    });
}
	
</script>
@endsection()