@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.administration.cycle.management'))

@section('breadcrumb-links')
    {{--@include('backend.payments.cycle.includes.breadcrumb-links')--}}
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.administration.cycle.management') }}
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.payments.cycle.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>@lang('labels.backend.administration.cycle.table.year')</th>
                                <th>@lang('labels.backend.administration.cycle.table.month')</th>
                                <th>@lang('labels.backend.administration.cycle.table.complete')</th>
                                <th>@lang('labels.backend.administration.cycle.table.amount_collected') ({{ $default_currency->code }})</th>
                                <th>@lang('labels.backend.administration.cycle.table.amount_paid') ({{ $default_currency->code }})</th>
                                <th>@lang('labels.backend.administration.cycle.table.balance') ({{ $default_currency->code }})</th>

                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cycles as $cycle)
                                <tr>
                                    <td>{{ $cycle->cycle_year }}</td>
                                    <td>{{ $cycle->cycle_month }}</td>
                                    <td>{!! $cycle->complete_label !!}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{!! $cycle->action_buttons  !!}</td>
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
                        {!! $cycles->total() !!} {{ trans_choice('labels.backend.administration.cycle.table.total', $cycles->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $cycles->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
