@extends('backend.layouts.app')

@section('title', __('labels.backend.meters.maintain.title'))

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>
                        @lang('labels.backend.meters.maintain.title')
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    {{ html()->form('POST', route('admin.meter.electricity.maintain'))->open() }}
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('strings.backend.meters.maintain', ['type' => $type == 'clear_credit' ? __('clear credit') : __('clear tamper')]))->for('meter_code') }}

                                {{ html()->text('meter_code')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.meters.electricity.meter_code'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->hidden('type', $type) }}
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->
                    <div>
                        <div class="row">
                            <div class="col text-left">
                                <div class="form-group clearfix">
                                    {{ form_cancel(route('admin.meter.electricity.index'), __('buttons.general.cancel')) }}
                                </div><!--form-group-->
                            </div><!--col-->

                            <div class="col text-right">
                                <div class="form-group clearfix">
                                    {{ form_submit(__('buttons.general.continue')) }}
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

