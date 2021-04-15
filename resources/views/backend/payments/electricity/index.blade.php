@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.payment.electricity.management'))

@section('breadcrumb-links')
    @include('backend.payments.electricity.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.payment.electricity.management')
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.payments.electricity.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>@lang('labels.backend.payment.electricity.show')</th>
                                <th>@lang('labels.backend.payment.electricity.table.company')</th>
                                <th>@lang('labels.backend.payment.electricity.table.supply_point')</th>
                                <th>@lang('labels.backend.payment.electricity.table.external_identifier')</th>
                                <th>@lang('labels.backend.payment.electricity.table.cycle_year')</th>
                                <th>@lang('labels.backend.payment.electricity.table.cycle_month')</th>
                                <th>@lang('labels.backend.payment.electricity.table.confirmed')</th>
                                <th>@lang('labels.backend.payment.electricity.table.system_commission') ({{ $default_currency->code }})</th>
                                <th>@lang('labels.backend.payment.electricity.table.amount_collected') ({{ $default_currency->code }})</th>
                                <th>@lang('labels.backend.payment.electricity.table.amount_paid') ({{ $default_currency->code }})</th>
                                <th>@lang('labels.backend.payment.electricity.table.iat_consumption') (KWh)</th>
                                <th>@lang('labels.backend.payment.electricity.table.eneo_consumption') (KWh)</th>
                                <th>@lang('labels.backend.payment.electricity.table.current_tariff') ({{ $default_currency->code. '/KWh' }}) </th>
                                <th>@lang('labels.backend.payment.electricity.table.new_tariff') ({{ $default_currency->code. '/KWh' }}) </th>
{{--                                <th>@lang('labels.backend.payment.electricity.table.balance') ({{ $default_currency->code }})</th>--}}

                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($points as $point)
                                <tr>
                                    <td
                                            data-placement="top"
                                            title="@lang('buttons.general.crud.view')"
                                            data-toggle="collapse"
                                            data-target="#payments-{{ $point->uuid }}"
                                            class="accordion-toggle"><button class="btn btn-default btn-xs"><span class="fa fa-eye"></span></button>
                                    </td>
                                    <td>{{ $point->company->name }}</td>
                                    <td>{{ $point->name }}</td>
                                    <td>{{ $point->external_identifier }}</td>
                                    <td>{{ $cycleYear }}</td>
                                    <td>{{ $cycleMonth }}</td>
                                    <td>{!! $point->getPaymentsConfirmedStatusForCycleLabel($cycleYear, $cycleMonth) !!}</td>
                                    <td>{{ number_format($point->getSumSystemCommissionForCycle($cycleYear, $cycleMonth), 2 )}}</td>
                                    <td>{{ number_format($point->getSumCollectedForCycle($cycleYear, $cycleMonth), 2 )}}</td>
                                    <td>{{ number_format($point->getSumPaymentsForCycle($cycleYear, $cycleMonth), 2) }}</td>
                                    <td>{{ number_format($point->getSumIATConsumptionForCycle($cycleYear, $cycleMonth), 2) }}</td>
                                    <td>{{ number_format($point->getENEOConsumptionForCycle($cycleYear, $cycleMonth), 2) }}</td>
                                    <td>
                                        @if($point->is_auto_price)
                                            {{ number_format($point->adjusted_price, 2) }}
                                        @else
                                            {{ number_format($point->price->amount, 2) }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($point->is_auto_price)
                                            {{ $point->getEstimatedNewTariffForCycle($cycleYear, $cycleMonth) }}
                                        @else
                                            {{ 'N/A' }}
                                        @endif
                                    </td>
                                    {{--<td></td>--}}
                                    <td>
                                        <div class="btn-group" role="group" aria-label="{{__('labels.general.actions')}}">
                                            @if(! $point->getPaymentsConfirmedStatusForCycle($cycleYear, $cycleMonth))
                                                <a href="{{route('admin.payments.electricity.edit', [
                                                    'point_id' => $point->uuid,
                                                    'cycle_year' => $cycleYear,
                                                    'cycle_month' => $cycleMonth
                                                    ])}}" data-toggle="tooltip" data-placement="top" title="{{__('buttons.general.crud.edit')}}" class="btn btn-primary"><i class="fas fa-edit"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr class="child">
                                    <td colspan="5" align="center" class="hiddenRowtable collapse fade" id="payments-{{ $point->uuid }}">
                                        <div>
                                            @if($point->billPayments->count())
                                                <table class="table table-responsive-sm table-secondary">
                                                    <thead>
                                                    <tr>
                                                        <th>@lang('validation.attributes.backend.payment.payments.amount') ({{ $default_currency->code }})</th>
                                                        <th>@lang('validation.attributes.backend.payment.payments.bill_number')</th>
                                                        <th>@lang('validation.attributes.backend.payment.payments.payment_ref')</th>
                                                        <th>@lang('validation.attributes.backend.payment.payments.consumption') (KWh)</th>
                                                        <th>@lang('validation.attributes.backend.payment.payments.method')</th>
                                                        <th>@lang('validation.attributes.backend.payment.payments.note')</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($point->getPaymentsForCycle($cycleYear, $cycleMonth) as $payment)
                                                        <tr>
                                                            <td>{{ number_format($payment->amount, 2) }}</td>
                                                            <td>{{ $payment->bill_number }}</td>
                                                            <td>{{ $payment->payment_ref }}</td>
                                                            <td>{{ $payment->consumption }}</td>
                                                            <td>{{ $payment->method_label }}</td>
                                                            <td>{{ $payment->note }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            @else
                                                <table class="table table-responsive-sm table-secondary table-borderless">
                                                    <tbody>
                                                    <tr>
                                                        <td>@lang('labels.backend.quote.quote.table.empty')</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            @endif
                                        </div>
                                    </td>
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
                        {!! $points->total() !!} {{ trans_choice('labels.backend.quote.quote.table.total', $points->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $points->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
