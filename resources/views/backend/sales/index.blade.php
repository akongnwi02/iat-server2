@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.sales.management'))

@section('breadcrumb-links')
    @include('backend.sales.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.sales.management')
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.sales.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>@lang('labels.backend.sales.table.service')</th>
                                <th>@lang('labels.backend.sales.table.code')</th>
                                <th>@lang('labels.backend.sales.table.date')</th>
                                <th>@lang('labels.backend.sales.table.company')</th>
                                <th>@lang('labels.backend.sales.table.user')</th>
                                <th>@lang('labels.backend.sales.table.token')</th>
                                <th>@lang('labels.backend.sales.table.amount') ({{$default_currency->code}})</th>
                                <th>@lang('labels.backend.sales.table.system_commission') ({{$default_currency->code}})</th>
                                <th>@lang('labels.backend.sales.table.supply_point')</th>
                                <th>@lang('labels.backend.sales.table.supply_point_amount') ({{$default_currency->code}})</th>
                                <th>@lang('labels.backend.sales.table.vat')</th>
                                <th>@lang('labels.backend.sales.table.amount_with_vat') ({{$default_currency->code}})</th>
                                <th>@lang('labels.backend.sales.table.price') ({{$default_currency->code}})</th>
                                <th>@lang('labels.backend.sales.table.units')</th>
                                <th>@lang('labels.backend.sales.table.service_number')</th>
                                <th>@lang('labels.backend.sales.table.payment_account')</th>

                                {{--<th>@lang('labels.general.actions')</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sales as $sale)
                                <tr>
                                    <td>{!! @$sale->service->logo_label !!} <span> {{ $sale->service->name }}</span></td>
                                    <td>{{ $sale->code }}</td>
                                    <td>{{ $sale->created_at->toDatetimeString() }}</td>
                                    <td>{{ @$sale->company->name }}</td>
                                    <td>{{ $sale->user->username }}</td>
                                    <td>{{ $sale->token }}</td>
                                    <td>{{ number_format($sale->amount, 2) }}</td>
                                    <td>{{ number_format($sale->system_commission, 2) }}</td>
                                    <td>{{ @$sale->point->name }}</td>
                                    <td>{{ number_format($sale->amount - $sale->system_commission, 2) }}</td>
                                    <td>{{ $sale->vat }}</td>
                                    <td>{{ number_format($sale->amount_with_vat, 2) }}</td>
                                    <td>{{ number_format($sale->price, 2) }}</td>
                                    <td>{{ $sale->units_label }}</td>
                                    <td>{{ $sale->destination }}</td>
                                    <td>{{ $sale->paymentaccount}}</td>
{{--                                    <td><span class="badge badge-{{ $sale->status_class_label }}">{{ __($sale->status) }}</span></td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
            <div class="row">
                <div class="col-7">
                    <div class="float-left">
                        {!! $sales->total() !!} {{ trans_choice('labels.backend.sales.table.total_sales', $sales->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $sales->appends(request()->except('page'))->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
