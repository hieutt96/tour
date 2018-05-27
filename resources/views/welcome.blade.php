@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2><b>Các Tour: </b></h2>
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
                <div class="col-lg-3">
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
                <div class="col-lg-3">
                    <p>Các địa điểm của Tour :</p>
                    <b> 
                        @foreach($tour->place as $place)
                            {{$place->name}},
                        @endforeach
                    </b>
                </div>
                <input type="hidden" class="tour_id" value="{{$tour->id}}">
                <div class="col-lg-2">
                    @if(sizeof($tour->dtour))
                       @foreach($tour->dtour as $dtour)
                            @if($dtour->user_id == Auth::user()->id)
                                <button class="btn btn-success join" value="1">Hủy Tham Gia</button>
                            @else
                                <button class="btn btn-success join" value="0">Tham Gia</button>
                            @endif
                       @endforeach
                    @else
                        <button class="btn btn-success join" value="0">Tham Gia</button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    <div class="" style="margin-left: 500px;">
        {{$tours->links()}}
    </div>
</div>
    <script type="text/javascript" src="{{asset('/js/user.js')}}">

    </script>
@endsection
