@extends('backend.layouts.app')

@section('title', __('labels.backend.meters.deactivate'))

@section('breadcrumb-links')
    @include('backend.meters.electricity.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>
                        @lang('labels.backend.meters.deactivate')
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    {{ html()->form('PATCH', route('admin.meter.electricity.deactivate', $meter))->open() }}
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('validation.attributes.backend.meters.electricity.meter_code'))->for('meterCode') }}

                                {{ html()->text('meterCode')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.meters.electricity.meter_code'))
                                    ->attribute('maxlength', 191)
                                    ->value($meter->meter_code)
                                    ->disabled()
                                }}
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('validation.attributes.backend.meters.electricity.comment'))->for('comment') }}

                                {{ html()->textarea('comment')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.meters.electricity.comment'))
                                    ->required() }}
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
                                    {{ form_submit(__('buttons.backend.meters.electricity.deactivate')) }}
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

