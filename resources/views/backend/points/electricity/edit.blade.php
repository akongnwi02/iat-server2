@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.points.edit'))

@section('breadcrumb-links')
    @include('backend.points.electricity.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->modelForm($point, 'PUT', route('admin.point.electricity.update', $point))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.points.electricity')
                        <small class="text-muted">@lang('labels.backend.points.edit')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->
            <!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.points.electricity.name'))
                            ->class('col-md-2 form-control-label')
                            ->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.points.electricity.name'))
                                ->attribute('maxlength', 191)
                                ->required()
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

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.meters.electricity.phone'))
                            ->class('col-md-2 form-control-label')
                            ->for('phone') }}

                        <div class="col-md-10">
                            {{ html()->text('phone')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.meters.electricity.phone'))
                                ->attribute('maxlength', 191)
                            }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.meters.electricity.email'))
                            ->class('col-md-2 form-control-label')
                            ->for('email') }}

                        <div class="col-md-10">
                            {{ html()->text('email')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.meters.electricity.email'))
                                ->attribute('maxlength', 191)
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