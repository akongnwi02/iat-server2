@extends('backend.layouts.app')

@section('title', __('labels.backend.meters.maintain.title'))

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>
                        @lang('labels.backend.meters.maintain.title')
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>@lang('labels.backend.meters.maintain.meter_code')</th>
                                    <td>{{ $meter->meter_code }}</td>
                                </tr>

                                <tr>
                                    <th>@lang('labels.backend.meters.maintain.token')</th>
                                    <td style="user-select: all"><code>{{ $token }}</code></td>
                                </tr>

                                <tr>
                                    <th>@lang('labels.backend.meters.maintain.meter_type')</th>
                                    <td>{{ __($meter->type) }}</td>
                                </tr>

                                <tr>
                                    <th>@lang('labels.backend.meters.maintain.supply_point')</th>
                                    <td>{{ $meter->supplyPoint->name }}</td>
                                </tr>

                                <tr>
                                    <th>@lang('labels.backend.meters.maintain.address')</th>
                                    <td>{{ $meter->supplyPoint->address }}</td>
                                </tr>

                                <tr>
                                    <th>@lang('labels.backend.meters.maintain.type')</th>
                                    <td>{{ $type == 'clear_credit' ? __('clear credit') : __('clear tamper')}}</td>
                                </tr>
                            </table>
                        </div>
                    </div><!--table-responsive-->
                </div>
                <div class="card-footer">
                    <div>
                        <div class="row">
                            <div class="col text-left">
                                <div class="form-group clearfix">
                                    {{ form_cancel(route('admin.meter.electricity.maintain'), __('buttons.general.back')) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                    </div>
                </div><!--card-footer-->
            </div><!--card-->
        </div><!-- col-md-8 -->
    </div><!-- row -->
@endsection