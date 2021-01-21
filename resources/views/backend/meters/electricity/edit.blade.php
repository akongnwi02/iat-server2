@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.meters.edit'))

@section('breadcrumb-links')
    @include('backend.meters.electricity.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->modelForm($meter, 'PUT', route('admin.meter.electricity.update', $meter))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.meters.electricity')
                        <small class="text-muted">@lang('labels.backend.meters.edit')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->
            <!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.meters.electricity.meter_code'))
                            ->class('col-md-2 form-control-label')
                            ->for('meter_code') }}

                        <div class="col-md-10">
                            {{ html()->text('meter_code')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.meters.electricity.meter_code'))
                                ->attribute('maxlength', 191)
                                ->disabled() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.meters.electricity.provider'))
                            ->class('col-md-2 form-control-label')
                            ->for('provider_id') }}

                        <div class="col-md-10">
                            {{ html()->text('provider_id')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.meters.electricity.provider'))
                                ->attribute('maxlength', 191)
                                ->value(@$meter->provider->name)
                                ->disabled() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.meters.electricity.supply_point'))
                            ->class('col-md-2 form-control-label')
                            ->for('supply_point_id') }}

                        <div class="col-md-10">
                            {{ html()->select('supply_point_id', [null => null] + $supplyPoints)
                                ->class('form-control')
                                }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.meter.electricity.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->closeModelForm() }}
@endsection