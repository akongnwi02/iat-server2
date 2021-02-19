@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.quote.inventory.management'))

@section('breadcrumb-links')
    {{--@include('backend.administration.service.includes.breadcrumb-links')--}}
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.quote.inventory.management')
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.quotes.inventory.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>@lang('labels.backend.quote.inventory.table.name_en')</th>
                                <th>@lang('labels.backend.quote.inventory.table.name_fr')</th>

                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($inventories as $inventory)
                                <tr>
                                    <td>{{ $inventory->name_en }}</td>
                                    <td>{{ $inventory->name_fr }}</td>

                                    <td>{!! $inventory->action_buttons  !!}</td>
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
                        {!! $inventories->total() !!} {{ trans_choice('labels.backend.quote.inventory.table.total', $inventories->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $inventories->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
