@extends('backend.layouts.app')

@section('title', __('labels.backend.sales.management'))

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>
                        @lang('labels.backend.sales.create')
                    </strong>
                </div><!--card-header-->
                <div class="card-body">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>@lang('labels.backend.sales.quote.meter_code')</th>
                                    <td>{{ $transaction->meter->meter_code }}</td>
                                </tr>

                                <tr>
                                    <th>@lang('labels.backend.sales.quote.meter_type')</th>
                                    <td>{{ __($transaction->meter->type) }}</td>
                                </tr>

                                <tr>
                                    <th>@lang('labels.backend.sales.quote.supply_point')</th>
                                    <td>{{ $transaction->meter->supplyPoint->name }}</td>
                                </tr>

                                <tr>
                                    <th>@lang('labels.backend.sales.quote.address')</th>
                                    <td>{{ $transaction->meter->supplyPoint->address }}</td>
                                </tr>

                                <tr>
                                    <th>@lang('labels.backend.sales.quote.units')</th>
                                    <td>{{ $transaction->units_label }}</td>
                                </tr>

                                <tr>
                                    <th>@lang('labels.backend.sales.quote.amount')</th>
                                    <td>{{ number_format($transaction->amount, 2). ' ' .$transaction->currency_code }}</td>
                                </tr>

                                <tr>
                                    <th>@lang('labels.backend.sales.quote.tariff_price')</th>
                                    <td>{{ number_format($transaction->price, 2) . ' ' . $default_currency->code }}</td>
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
                                    {{ form_cancel(route('admin.sales.quote'), __('buttons.general.cancel')) }}
                                </div><!--form-group-->
                            </div><!--col-->

                            <div class="col text-right">
                                <div class="form-group clearfix">
                                    {{ form_cancel(route('admin.sales.confirm', $transaction->code), __('buttons.general.confirm'), 'btn btn-success btn-sm') }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                    </div>
                </div><!--card-footer-->
            </div><!--card-->
        </div><!-- col-md-8 -->
    </div><!-- row -->
@endsection

