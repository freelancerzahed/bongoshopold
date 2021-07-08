@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('pin_code.create')}}" class="btn btn-rounded btn-info pull-right">{{translate('Add New Pin')}}</a>
    </div>
</div>

<br>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
<div class="panel-heading bord-btm clearfix pad-all h-100">
        <h3 class="panel-title pull-left pad-no">{{translate('Pin Code')}}</h3>
        <div class="pull-right clearfix">
            <form class="" id="sort_subcategories" action="" method="GET">
                <div class="box-inline pad-rgt pull-left">
                    <div class="" style="min-width: 200px;">
                        <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type Pin Code & Enter') }}">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-striped res-table mar-no" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{translate('Pin Code')}}</th>
                    <th>{{translate('City')}}</th>
                    <th>{{translate('State')}}</th>
                    <th>{{translate('Dalivery Time')}}</th>
                    <th width="10%">{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pin_codes as $key => $pin_code)
                  
                        <tr>
                        <td>
                           {{$key+1}}
                           </td>
                           <td>
                           {{$pin_code->pin_code}}
                           </td>
                           <td>
                           {{$pin_code->city}}
                           </td>
                           <td>
                           {{$pin_code->state}}
                           </td>
                           <td>
                           {{$pin_code->delivery_time}} dayes
                           </td>
                           <td>
                                <div class="btn-group dropdown">
                                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                        {{translate('Actions')}} <i class="dropdown-caret"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{route('pin_code.edit', $pin_code->id)}}">{{translate('Edit')}}</a></li>
                                        <li><a onclick="confirm_modal('{{route('pin_code.destroy', $pin_code->id)}}');">{{translate('Delete')}}</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                   
                @endforeach
            </tbody>
        </table>
        <div class="clearfix">
            <div class="pull-right">
                {{ $pin_codes->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
