@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.services.price.management'))

@section('breadcrumb-links')
    {{--@include('backend.services.service.includes.breadcrumb-links')--}}
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.services.price.management') }}
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.services.price.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>@lang('labels.backend.services.price.table.name')</th>
                                <th>@lang('labels.backend.services.price.table.description')</th>
                                <th>@lang('labels.backend.services.price.table.amount') ({{$default_currency->code}})</th>

                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($prices as $price)
                                <tr>
                                    <td>{{ $price->name }}</td>
                                    <td>{{ $price->description }}</td>
                                    <td>{{ number_format($price->amount, 2) }}</td>

                                    <td>{!! $price->action_buttons  !!}</td>
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
                        {!! $prices->total() !!} {{ trans_choice('labels.backend.services.price.table.total', $prices->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $prices->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
