@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-lg-offset-8">
		<button class="btn btn-default" style="margin-left: 900px;"><a href="/admin/add-tour" style="color: black;">+Add Tour</a></button>
	</div>
	<div class="row">
		<h2><b>Các Tour Đã Tạo : </b></h2>
	</div>
	@if($success = Session::get('success'))
      	<div class="alert alert-success alert-dismissable">
	        <a  class="close" data-dismiss="alert" aria-label="close">×</a>
	        <strong>Success!</strong> {{$success}}
        </div>
	@endif
	<div class="row" style="margin-left: 50px;border: 2px;">
		@foreach($tours as $tour)
			<div class="col-lg-12 row">
				<div class="col-lg-4">
					<img src="{{$tour->cover}}" style="height: 200px;width: 250px;">
				</div>
				<div class="col-lg-4">
					<div class="row">
						<p>Tên Tour : </p>{{$tour->name}}
					</div>
					<div class="row">
						<p>Mô Tả :</p>{{$tour->description}}
					</div>
					<div class="row">
						 <p>Phương Tiện :</p>{{$tour->vehicle}}
					</div>
					<div class="row">
						<p>Thời gian :</p>{{$tour->time}} Ngày
					</div>
					<div class="row">
						<p>Giá :</p>{{$tour->cost}}
					</div>
				</div>
				<div class="col-lg-4">
					<button class="btn btn-default"><a href="/admin/delete-tour/{{$tour->id}}">Xóa</a></button>
					<button class="btn btn-default"><a href="/admin/edit-tour/{{$tour->id}}">Edit</a></button>
					<button class="btn btn-default"><a href="/admin/add-place/{{$tour->id}}">+ Add Place</a></button>
				</div>
			</div>
		@endforeach
	</div>
	<div class="" style="margin-left: 500px;">
		{{$tours->links()}}
	</div>
</div>
@endsection
