@extends('layout.app')
@section('title','Admin | Home Page')
@section('content')
<br>
<div class="homeDiv">
	{{ session('userKey') }}
	<div class="cardDiv">

		<div class="row">
			<div class="col-3 mb-3">
				<div class="card">
					<div class="card-body text-center">
						<h3 class="card-title">All Student</h3>
						<h4 class="card-title h3">{{$studentkey}}</h4>
					</div>
					<div class="card-footer">
						<a href="{{ url('admin/viewStudent') }}"><i>All Student</i><i class="fa-solid fa-circle-arrow-right "></i></a>
					</div>
				</div>
			</div>
			<div class="col-3 mb-3">
				<div class="card">
					<div class="card-body text-center">
						<h3 class="card-title">All Attendence</h3>
						<h4 class="card-title h3">{{$attendKey}}</h4>
					</div>
					<div class="card-footer">
						<a href="{{ url('admin/viewAttenden') }}"><i>All Attendence</i><i class="fa-solid fa-circle-arrow-right "></i></a>
					</div>
				</div>
			</div>
			<div class="col-3 mb-3">
				<div class="card">
					<div class="card-body text-center">
						<h3 class="card-title">All Class</h3>
						<h4 class="card-title h3">{{$classKey}}</h4>
					</div>
					<div class="card-footer">
						<a href="{{ url('admin/viewClass') }}"><i>All Class</i><i class="fa-solid fa-circle-arrow-right "></i></a>
					</div>
				</div>
			</div>
			<div class="col-3 mb-3">
				<div class="card">
					<div class="card-body text-center">
						<h3 class="card-title">All Department</h3>
						<h4 class="card-title h3">{{$departKey}}</h4>
					</div>
					<div class="card-footer">
						<a href="{{ url('admin/viewDepart') }}"><i>All Department</i><i class="fa-solid fa-circle-arrow-right "></i></a>
					</div>
				</div>
			</div>
			<div class="col-3 mb-3">
				<div class="card">
					<div class="card-body text-center">
						<h3 class="card-title">All Crouse</h3>
						<h4 class="card-title h3">{{$crouseKey}}</h4>
					</div>
					<div class="card-footer">
						<a href="{{ url('admin/viewCrouse') }}"><i>All Student</i><i class="fa-solid fa-circle-arrow-right "></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="chartDiv">
		<div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Area Chart Example
                    </div>
                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Bar Chart Example
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection()
@section('chartScript')
<script type="text/javascript">
/*chart bar custom js start form here*/
  var _YattendChartarea = JSON.parse('{!! json_encode($attenMounthsKey) !!}');
  var _XattendChartArea = JSON.parse('{!! json_encode($attenMounthCountKey) !!}');
/*chart bar custom js end form here*/
/*chart bar custom js start form here*/
 var _yStudentChatBarmonthKey = JSON.parse('{!! json_encode($studentMonthKey) !!}');
  var _XStudentchatBarMonthCount = JSON.parse('{!! json_encode($studentmonthCount) !!}');
/*chart bar custom js end form here*/


</script>
@endsection()