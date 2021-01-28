@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.points.electricity'))

@section('breadcrumb-links')
    @include('backend.points.electricity.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.points.electricity') }}
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.points.electricity.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>@lang('labels.backend.points.table.name')</th>
                                <th>@lang('labels.backend.points.table.city')</th>
                                <th>@lang('labels.backend.points.table.phone')</th>
                                <th>@lang('labels.backend.points.table.email')</th>
                                <th>@lang('labels.backend.points.table.address')</th>
                                <th>@lang('labels.backend.points.table.external_identifier')</th>
                                <th>@lang('labels.backend.points.table.service_charge')</th>
                                <th>@lang('labels.backend.points.table.price')</th>
                                <th>@lang('labels.backend.points.table.provider_price')</th>
                                <th>@lang('labels.backend.points.table.is_auto_price')</th>
                                <th>@lang('labels.backend.points.table.auto_price_margin')</th>

                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($points as $point)
                                <tr>
                                    <td>{{ $point->name }}</td>
                                    <td>{{ $point->city}}</td>
                                    <td>{{ $point->phone}}</td>
                                    <td>{{ $point->email}}</td>
                                    <td>{{ $point->address}}</td>
                                    <td>{{ $point->external_identifier}}</td>
                                    <td>{{ @$point->serviceCharge->name }}</td>
                                    <td>{{ @$point->price->name }}</td>
                                    <td>{{ $point->provider_price }}</td>
                                    <td>{!! @$point->is_auto_price_label !!}</td>
                                    <td>{{ $point->auto_price_margin }}</td>

                                    <td>{!! $point->action_buttons  !!}</td>
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
                        {!! $points->total() !!} {{ trans_choice('labels.backend.points.table.total', $points->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $points->appends(request()->except('page'))->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
@push('after-scripts')
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover();
        });

        $('.popover-dismiss').popover({
            trigger: 'focus'
        })

    </script>
@endpush