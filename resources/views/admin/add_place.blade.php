@extends('layouts.app')
@section('content')

	<div style="margin-left: 1000px;">
		<button class="btn btn-default" id="sub">-</button>
		<button class="btn btn-default" id="add">+</button>
	</div>
	<div class="row col-lg-offset-2">
		<p style="margin-left: 100px;">Thêm Địa Điểm Cho Tour :</p>{{$tour->name}}
	</div>
	<div class="col-lg-8" id="form">
		<div class="row col-lg-12 formData">
			<div class="form-group col-lg-4" style="margin-left: 60px;">
				<input type="text" name="name" required="true"  class="form-control" placeholder="Tên">
			</div>
			<div class="form-group col-lg-5">
				<textarea type="text" name="description" required="true" class="form-control" placeholder="Mô tả"></textarea>
			</div>
		</div>
	</div>
	<div class="row col-lg-12">
		<button class="form-control col-lg-6" style="margin-left: 200px;" id="submit">Submit</button>
	</div>
	<input type="hidden" id="id" value="{{$tour->id}}">
	<script type="text/javascript" src="{{asset('/js/admin.js')}}">

	</script>
@endsection