@extends('backend.layouts.app')

@section('title', __('labels.backend.business.transactions.electricity.purchase'))

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>
                        @lang('labels.backend.business.transactions.electricity.search.search_box_title')
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    {{ html()->form('POST', route('admin.sales.store'))->open() }}
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('validation.attributes.backend.business.meter_code'))->for('service_code') }}

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
                                {{ html()->label(__('validation.attributes.backend.business.amount'))->for('amount') }}

                                {{ html()->text('amount')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.business.amount'))
                                    ->required() }}
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('validation.attributes.backend.business.amount'))->for('amount') }}

                                {{ html()->text('amount')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.business.amount'))
                                    ->required() }}
                            </div><!--form-group-->
                        </div><!--col-->
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
                                    {{ form_submit(__('labels.backend.business.transactions.electricity.search.search_button')) }}
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

