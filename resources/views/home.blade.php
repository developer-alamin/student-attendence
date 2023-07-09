<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	 {{-- toastr css start form here --}}
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}"/>
    {{-- bootstrap min css start form here --}}
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
     <link href="{{asset('css/admin.css')}}" rel="stylesheet"/>
     <link href="{{asset('css/loader.css')}}" rel="stylesheet"/>
</head>
<body>
	<div class="UserDiv">
		<div class="loginDiv">
			<form id="loginForm">
				<div class="form-group">
					<div class="col-12">
						<select class="form-select form-control userClass" id="userClass" name="userClass">
							<option value="">--Select Class--</option>
							@foreach($classKey as $class)
								<option value="{{ $class->class }}">{{ $class->class }}</option>
							@endforeach()
						</select><br>
						<input type="number" name="adminId" id="adminId" class="form-control" placeholder="Type Admin Id">
						<br>
						<input type="password" name="userPass" class="userPass form-control" placeholder="Enter User Password">
						<br>
						<button type="submit" class="UserLogin form-control">Login</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	{{-- JQuery js start form here --}}
  	 <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    {{-- propper js start form here --}}
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
    {{-- bootstrap min js start form here --}}
    <script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    {{-- toastr min js start form here --}}
    <script type="text/javascript" src="{{asset('js/toastr.min.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/axios.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
        <script type="text/javascript">
	$(document).ready(function() {
		$("#loginForm").submit(function(e) {
			e.preventDefault();

			var userClass = $("#userClass").val();
			var adminId = $('#adminId').val();
			var pass = $(".userPass").val();

			if (userClass == "--Select Class--") {
				toastr.error("Please User Class");
			}else if(adminId == ""){
				toastr.error("Please Admin Id");
			} else if(pass == false){
				toastr.error("Please User Password");
			}else{
				var loginLoader = "<span class='loginLoader'></span>";
				$(".UserLogin").html(loginLoader);

				var data = new FormData(this);
				var url = "/userlogin";

				axios.post(url,data)
				.then(function(responce) {
					if(responce.data == 404){
						toastr.warning('Admin Class And Admin Id Incorrect');
						setTimeout(function(){
							$(".UserLogin").html('Login');
						},300);
					}else if(responce.data == 1){
						toastr.success('Success');
						window.location.href="admin/";
						setTimeout(function(){
							$(".UserLogin").html('Login');
						},300);
						
					}else{
						toastr.warning('Incorrect Password');
						setTimeout(function(){
							$(".UserLogin").html('Login');
						},300);
					}
				})
				.catch(function(error) {
					toastr.warning('User Login Faild');
					setTimeout(function(){
						$(".UserLogin").html('Login');
					},300);
				})
			}
		})
	})
</script>
</body>
</html>