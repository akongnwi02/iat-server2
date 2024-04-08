@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.meters.electricity'))

@section('breadcrumb-links')
    @include('backend.meters.electricity.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.meters.electricity') }}
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.meters.electricity.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>@lang('labels.backend.meters.table.meter_code')</th>
                                <th>@lang('labels.backend.meters.table.supply_point')</th>
                                <th>@lang('labels.backend.meters.table.company')</th>
                                <th>@lang('labels.backend.meters.table.provider')</th>
                                {{--<th>@lang('labels.backend.meters.table.type')</th>--}}
                                <th>@lang('labels.backend.meters.table.active')</th>
                                <th>@lang('labels.backend.meters.table.location')</th>
                                <th>@lang('labels.backend.meters.table.type')</th>
                                <th>@lang('labels.backend.meters.table.identifier')</th>
                                <th>@lang('labels.backend.meters.table.last_vending_date')</th>
                                <th>@lang('labels.backend.meters.table.phone')</th>
                                <th>@lang('labels.backend.meters.table.email')</th>

                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($meters as $meter)
                                <tr>
                                    <td>{{ $meter->meter_code }}</td>
                                    <td>{{ @$meter->supplyPoint->name }}</td>
                                    <td>{{ @$meter->supplyPoint->company->name }}</td>
                                    <td>{{ @$meter->provider->name }}</td>
                                    {{--<td>{{ __($meter->type) }}</td>--}}
                                    <td>{!! @$meter->active_label !!}</td>
                                    <td>{{ $meter->location }}</td>
                                    <td>{{ $meter->type }}</td>
                                    <td>{{ $meter->identifier }}</td>
                                    <td>{{ @$meter->last_vending_date }}</td>
                                    <td>{{ $meter->phone }}</td>
                                    <td>{{ $meter->email }}</td>

                                    <td>{!! $meter->action_buttons  !!}</td>
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
                        {!! $meters->total() !!} {{ trans_choice('labels.backend.meters.table.total', $meters->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $meters->appends(request()->except('page'))->render() !!}
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