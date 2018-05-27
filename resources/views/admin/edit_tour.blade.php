@extends('layouts.app')

@section('content')
	<div class="container">
	  	@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<form action="/admin/edit-tour/{{$tour->id}}" enctype="multipart/form-data" method="post">
			{{ csrf_field() }}
			<div class="col-lg-12 row">
				<div class="col-lg-10">
					<div class="form-group">
						<label class="control-label">Tên : </label>
						<div class="col-lg-10">
							<input type="text" name="name" placeholder="" required="true" class="form-control" value='{{$tour->name}}'>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Mô tả :</label>
						<div class="col-lg-10">
							 <textarea name="description" class="form-control" rows="5" required="true" >{{$tour->description}}</textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Phương Tiện :</label>
						<div class="col-lg-10">
							<input type="text" name="vehicle" class="form-control" required="true" value="{{$tour->vehicle}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Thời gian :</label>
						<div class="col-lg-10">
							<input type="number" name="time" class="form-control" required="true" value="{{$tour->time}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Giá :</label>
						<div class="col-lg-10">
							<input type="number" name="cost" class="form-control" required="true" value="{{$tour->cost}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Địa Điểm Xuất Phát :</label>
						<div class="col-lg-10">
							<input type="text" name="start_address" class="form-control" required="true" value="{{$tour->start_address}}">
						</div>
					</div>
				</div>
				<div class="col-lg-2">
					<input type="file" name="cover" required="true">
				</div>
			</div>
			<div class="row col-lg-offset-6">
				<button class="btn btn-success form-control col-lg-6">Submit</button>
			</div>
		</form>
	</div>
@endsection