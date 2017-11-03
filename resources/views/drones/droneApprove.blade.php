@extends('master')

@section('content')
    <div class="block-area container" id="droneApproval">
        <ol class="breadcrumb hidden-xs">
            <li><a href="{{ url('tasks') }}"></a></li>
            <li class="active"></li>
        </ol>
        <h4 class="page-title">First Approval</h4>
        <br>
        <div class="row justify-content-center">
            <div  class="col-md-4 " style="margin-left: 200px;">
                <h3 class="block-title">DETAILS</h3>
                <h5 class="h3"> Case  Number   :{{$droneRequest->id}}</h5>
                <h5 class="h3">Case Status     :{{$droneRequest->DroneCaseStatus->name}} </h5>
                <h5 class="h3">Case logged Date:{{$droneRequest->created_at}}</h5>
                <h5 class="h3">Case Duration   :{{$droneRequest->created_at->diffForHumans()}}</h5>
            </div>
            <div  class="col-md-4">
                <h3 class="block-title"> DETAILS</h3>
                <h5 class="h3">  Service  Request : {{$droneRequest->DroneType->name}} </h5>
                <h5 class="h3">Drone sub type  : {{$droneRequest->DroneSubType->name}}</h5>
                <h5 class="h3">Created by :{{$droneRequest->User->name}} {{$droneRequest->User->surname}} </h5>
                <h5 class="h3">Department Requested Service:  {{$droneRequest->Department->name}}</h5>
            </div>
        </div>
        <br/>
        <div  class="col-md-4 " style="margin-right: 200px;">
            {{--<h3 class="block-title">ACTION</h3>--}}
        </div>
        <div class="row" style="margin-left: 500px;">

            {!! Form::open(['url' => 'http://localhost:8000/api/v1/firstDroneApproval/1','method' => 'post', 'class' => 'form-horizontal', 'id'=>"drone_request_id" ]) !!}
           {{--// {!! Form::hidden(['user'=>]) !!}--}}
            {!! Form::hidden('user',Auth::user()->id) !!}
            <div class="form-group">
                <div class="col-md-6" style="margin-top:20px;">
                    <button id="approveId" class="btn btn-primary">Approve</button>
                    <button type="button" class="btn  btn-danger" id="rejectId">Reject</button>
                </div>
            </div>

            <div class="form-group reason hidden ">
                <div class="col-md-6">
                    <div class="col-md-3 " style="margin-top:10px;">
                        <select name="rejectReason" id="rejectReason" class="form-control input-sm" >
                            <option value="">--Select Reason--</option>
                            @foreach($droneRejectReasons as $droneRejectReason)
                            {
                            <option value="{{$droneRejectReason->id}}">{{$droneRejectReason->reason}}</option>
                            }

                            @endforeach

                        </select>
                    </div>
                </div>
            </div>
            <br/>
            <div class="form-group other reason hidden" >
                <div class="row">

                    <div class="col-md-6">
                        {{--<label for="comment">Comment</label>--}}
                        {!! Form::label('Comment for other','Comment',array('class'=>'col-md-3 control-label'))!!}
                        <textarea id="commentId" rows="5" class="form-control" name="comm_other" ></textarea>

                    </div>

                </div>
            </div>

            <div class="form-group" >
                <div class="row">

                    <div class="col-md-6">
                        {{--<label for="comment">Comment</label>--}}
                        {!! Form::label('Comment','Comment',array('class'=>'col-md-3 control-label'))!!}
                        <textarea id="comment" rows="5" class="form-control" name="comment" ></textarea>

                    </div>

                </div>
            </div>
            <br/>

            <div class="form-group submit">
                <div class="col-md-10">
                    <button type="submit" type="button" class="btn btn-sm" id="submitId" >Submit</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
@section('footer')
    <script>

        $('#rejectId').on('click',function() {
            alert('are you sure you want to reject? if yes press ok');

            $('.reason').removeClass('hidden');
            $('.submit').removeClass('hidden');
            $("#rejectReason").attr('');
            $("#approveId").attr('disabled','disabled');


        })


    </script>
@endsection

