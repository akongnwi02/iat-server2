@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.points.editMap'))

@section('breadcrumb-links')
    @include('backend.points.electricity.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->modelForm($point, 'PATCH', route('admin.point.electricity.storeMap', $point))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.points.electricity')
                        <small class="text-muted">@lang('labels.backend.points.editMap')</small>
                    </h4>
                </div><!--col-->
                <div class="col-sm-7">
                    {{--@include('backend.points.electricity.includes.show-header-buttons')--}}
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
                                ->disabled() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.points.electricity.city'))
                            ->class('col-md-2 form-control-label')
                            ->for('city') }}

                        <div class="col-md-10">
                            {{ html()->text('city')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.points.electricity.city'))
                                ->attribute('maxlength', 191)
                                ->disabled() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.points.electricity.address'))
                            ->class('col-md-2 form-control-label')
                            ->for('address') }}

                        <div class="col-md-10">
                            {{ html()->text('address')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.points.electricity.address'))
                                ->attribute('maxlength', 191)
                                ->disabled() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.points.electricity.gps_lat'))
                            ->class('col-md-2 form-control-label')
                            ->for('gps_lat') }}

                        <div class="col-md-10">
                            {{ html()->text('gps_lat')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.points.electricity.gps_lat'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.points.electricity.gps_long'))
                            ->class('col-md-2 form-control-label')
                            ->for('gps_long') }}

                        <div class="col-md-10">
                            {{ html()->text('gps_long')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.points.electricity.gps_long'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.point.electricity.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->closeModelForm() }}
@endsection