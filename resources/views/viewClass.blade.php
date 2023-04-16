@extends('layout.app')
@section('title','Admin | Add Attendence')
@section('content')
<br>
<div class="viewClassDiv">
	<div class="card">
		<div class="card-header">
			<strong>Class Data Managment</strong>
		</div>
		<div class="card-body">
			<table id="datatable" class="AddClassTable d-none table table-hover table-bordered table-striped">
				<thead class="text-center">
					<tr>
						<th>Sr No</th>
						<th>Class</th>
						<th>Action</th>
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


{{-- crouse update modal html code start form here --}}
<div class="modal fade" id="updateModalClass" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header updateClassHeader">
        <h5>Class Update Data Managment</h5>
        <h4></h4>
      </div>
      	<span class="UpDisplayLoader"></span>
		<div class="nothingData d-none">
		  <img src="{{asset('img/404.avif')}}" style="width: 200px;height: 200px">
		</div>
      <form id="classUpdateForm">
        @csrf
        <div class="container">
            <div class="form-row">
            	<input type="hidden" name="upId" class="upId">
              	<div class="col-12">
                  <label for="upClassName">Class Name:</label>
                  <input type="text" name="upClassName" class="form-control upClassName">
                </div> 
            </div>
        </div>
        <br>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
          <button type="submit" id="updateClass" class="btn btn-primary">Update</button>
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
		getClass();
		ClassUpdate();
	})
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
		           var action = "<td><i class='fa fa-edit tdEditIcon' data-edit='"+classData[i].id+"'></i><i class='fas fa-trash tdDeleteIcon' data-delete='"+classData[i].id+"'></i></td>";
		            $("<tr>").html(id+name+action).appendTo('.classTbody');
		        });


		         $(".tdEditIcon").click(function() {
		           var id = $(this).data('edit');
		           $('#updateModalClass').modal('show');
		           $(".updateClassHeader h4").html(id);
		           upShowClass(id);
		        })
		         $(".tdDeleteIcon").click(function() {
		           var id = $(this).data('delete');
		           ClassDelete(id)
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

	function upShowClass(id) {
		var url = "/upShowClass";
	    var data = {id:id}

	    axios.post(url,data)
	    .then(function(responce) {
	     if (responce.status == 200) {
	        $(".UpDisplayLoader").addClass('d-none');

	        var updatedata = responce.data;
	        $(".upId").val(updatedata[0].id);
	        $(".upClassName").val(updatedata[0].class);
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

function ClassUpdate() {
    $("#classUpdateForm").submit(function(e) {
      e.preventDefault();
      var url = "/updateClass";
      var data = new FormData(this);

       var updateLoader = "<span class='addLoader'></span>";
       $("#updateClass").html(updateLoader);


      axios.post(url,data)
      .then(function(responce) {
      	
       if (responce.status == 200) {
          swal("Updated!",'Class Data Updated','success');
         $('#updateModalClass').modal('hide');
          getClass();

          setTimeout(function() {
            $("#updateClass").html('Update')
          },300);

       } else {
          swal("Sorry!",'Class Data Updated Faild','error');
          $('#updateModalClass').modal('hide');
          getClass();

          setTimeout(function() {
            $("#updateClass").html('Update')
          },300);
       }

      })
      .catch(function(error) {
          swal("Sorry!",'Class Data Updated Faild','error');
          $('#updateModalClass').modal('hide');
          getClass();

          setTimeout(function() {
            $("#updateClass").html('Update')
          },300);
      })
    })
  }

function ClassDelete(id) {
  var url = "/deleteClass";
  var data = {id:id}

  swal({
        title: "Are you sure?",
        text: "Are You Want To Class Data Deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true
    })
  .then((willDelete) => {
      if (willDelete) {
        axios.post(url,data)
          .then(function(response) {
            swal("Success", "Your Data Deleted Success!", "success");
            getClass();
          })
          .catch(function(error) {
            swal("Sorry...", "Your Data Not Deleted!", "error");
            getClass();
          })
      }
    });
}


</script>
@endsection()
