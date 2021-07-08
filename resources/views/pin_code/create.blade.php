@extends('layouts.app')

@section('content')

<div class="col-lg-6 col-lg-offset-3">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{translate('Pin  Code Information')}}</h3>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <form action="{{route('pin_code.import')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <span style="margin-left:3%; font-size:15px; font-weight:600">Import Excel File: </span>
        <input type="file" name='import_pin' value='' style="display:inline-block; cursor: pointer ">
        <input type="submit" value="Submit" class="btn btn-warning" style='display:inline-block'>
        </form>
        <form class="form-horizontal" action="{{ route('pin_code.store') }}" method="POST" enctype="multipart/form-data">
        	@csrf
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name">{{translate('Pin Code')}}</label>
                    <div class="col-sm-9">
                        <input type="number" placeholder="{{translate('Pin Code')}}" id="name" name="pin_code" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="delivery_time">{{translate('Delivery Time')}}</label>
                    <div class="col-sm-9">
                        <input type="number" placeholder="{{translate('Delivery Time')}}" id="delivery_time" name="delivery_time" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="City">{{translate('City')}}</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="{{translate('City')}}" id="City" name="city" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="state">{{translate('State')}}</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="{{translate('State')}}" id="state" name="state" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="panel-footer text-right">
                <button class="btn btn-purple" type="submit">{{translate('Save')}}</button>
            </div>
        </form>
        <!--===================================================-->
        <!--End Horizontal Form-->

    </div>
</div>

@endsection
