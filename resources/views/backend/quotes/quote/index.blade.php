@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.quote.quote.management'))

@section('breadcrumb-links')
    {{--@include('backend.administration.service.includes.breadcrumb-links')--}}
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.quote.quote.management')
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.quotes.quote.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>@lang('labels.backend.quote.quote.show')</th>
                                <th>@lang('labels.backend.quote.quote.table.title')</th>
                                <th>@lang('labels.backend.quote.quote.table.code')</th>
                                <th>@lang('labels.backend.quote.quote.table.amount') ({{ $default_currency->code }})</th>
                                <th>@lang('labels.backend.quote.quote.table.description')</th>
                                <th>@lang('labels.backend.quote.quote.table.status')</th>
                                <th>@lang('labels.backend.quote.quote.table.type')</th>
                                <th>@lang('labels.backend.quote.quote.table.created_at')</th>

                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($quotes as $quote)
                                <tr>
                                    <td
                                            data-placement="top"
                                            title="@lang('buttons.general.crud.view')"
                                            data-toggle="collapse"
                                            data-target="#inventories-{{ $quote->uuid }}"
                                            class="accordion-toggle"><button class="btn btn-default btn-xs"><span class="fa fa-eye"></span></button>
                                    </td>
                                    <td>{{ $quote->title }}</td>
                                    <td>{{ $quote->code }}</td>
                                    <td>{{ number_format($quote->amount, 2) }}</td>
                                    <td>{{ $quote->description }}</td>
                                    <td>{!! $quote->status_label !!}</td>
                                    <td>{{ __($quote->type)  }}</td>
                                    <td>{{ __($quote->created_at->toDatetimeString())  }}</td>

                                    <td>{!! $quote->action_buttons  !!}</td>
                                </tr>
                                <tr class="child">
                                    <td colspan="5" align="center" class="hiddenRowtable collapse fade" id="inventories-{{ $quote->uuid }}">
                                        <div>
                                            @if($quote->inventories->count())
                                                <table class="table table-responsive-sm table-secondary">
                                                    <thead>
                                                    <tr>
                                                        <th>@lang('labels.backend.quote.quote.table.inventories.name')</th>
                                                        <th>@lang('labels.backend.quote.quote.table.inventories.unit_cost') ({{ $default_currency->code }})</th>
                                                        <th>@lang('labels.backend.quote.quote.table.inventories.quantity')</th>
                                                        <th>@lang('labels.backend.quote.quote.table.inventories.sub_total') ({{ $default_currency->code }})</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($quote->inventories as $inventory)
                                                        <tr>
                                                            <td>{{ $inventory->{'name_' . $current_locale} }}</td>
                                                            <td>{{ number_format($inventory->pivot->unit_cost, 2) }}</td>
                                                            <td>{{ $inventory->pivot->quantity }}</td>
                                                            <td>{{ number_format($inventory->pivot->sub_total, 2) }}</td>
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
                        {!! $quotes->total() !!} {{ trans_choice('labels.backend.quote.quote.table.total', $quotes->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $quotes->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
