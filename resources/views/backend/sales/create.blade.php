@extends('backend.layouts.app')

@section('title', __('labels.backend.sales.management'))

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>
                        @lang('labels.backend.sales.management')
                        <small class="text-muted">@lang('labels.backend.sales.create')</small>
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    {{ html()->form('POST', route('admin.sales.quote'))->open() }}
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('validation.attributes.backend.sales.service_code'))->for('service_code') }}

                                <div class="col-md-10">
                                    {{ html()->select('service_code', [null => null] + $services)
                                        ->class('form-control')
                                        }}
                                </div><!--col-->
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('validation.attributes.backend.sales.amount'))->for('amount') }}
                                <div class="col-md-10">
                                {{ html()->text('amount')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.sales.amount'))
                                    ->required() }}
                                </div>
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('validation.attributes.backend.sales.service_number'))->for('service_number') }}
                                <div class="col-md-10">
                                {{ html()->text('service_number')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.sales.service_number'))
                                    ->required() }}
                                </div>
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->
                    <div class="row">
                    {{ html()->hidden('currency_code')
                        ->class('form-control')
                        ->value($default_currency->code)
                        ->required()
                    }}
                    </div><!--row-->

                    <div>
                        <div class="row">
                            <div class="col text-left">
                                <div class="form-group clearfix">
                                    {{ form_cancel(route('admin.sales.index'), __('buttons.general.cancel')) }}
                                </div><!--form-group-->
                            </div><!--col-->

                            <div class="col text-right">
                                <div class="form-group clearfix">
                                    {{ form_submit(__('labels.general.continue')) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                    </div>
                    {{ html()->form()->close() }}

                </div><!--card body-->
            </div><!--card-->
        </div><!-- col-md-8 -->
    </div><!-- row -->
@endsection

