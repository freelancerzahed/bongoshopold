@extends('layouts.app')

@section('content')

<div class="col-lg-6 col-lg-offset-3">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{translate('Pin  Code Information')}}</h3>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <form class="form-horizontal" action="{{ route('pin_code.update',$pin_code->id) }}" method="POST" enctype="multipart/form-data">
        	@csrf
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name">{{translate('Pin Code')}}</label>
                    <div class="col-sm-9">
                        <input type="number" placeholder="{{translate('Pin Code')}}" id="name" name="pin_code" class="form-control" value={{$pin_code->pin_code}} required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="delivery_time">{{translate('Delivery Time')}}</label>
                    <div class="col-sm-9">
                        <input type="number" placeholder="{{translate('Delivery Time')}}" id="delivery_time" name="delivery_time" value={{$pin_code->delivery_time}} class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="City">{{translate('City')}}</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="{{translate('City')}}" id="City" name="city" value= {{$pin_code->city}} class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="state">{{translate('State')}}</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="{{translate('State')}}" id="state" value ={{$pin_code->state}} name="state" 
                        class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="panel-footer text-right">
                <button class="btn btn-purple" type="submit">{{translate('Update')}}</button>
            </div>
        </form>
        <!--===================================================-->
        <!--End Horizontal Form-->

    </div>
</div>

@endsection
