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
                                ->required()
                            }}
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
                                ->required()
                            }}
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
                            }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.points.electricity.phone'))
                            ->class('col-md-2 form-control-label')
                            ->for('phone') }}

                        <div class="col-md-10">
                            {{ html()->text('phone')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.points.electricity.phone'))
                                ->attribute('maxlength', 191)
                            }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.points.electricity.email'))
                            ->class('col-md-2 form-control-label')
                            ->for('email') }}

                        <div class="col-md-10">
                            {{ html()->email('email')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.points.electricity.email'))
                                ->attribute('maxlength', 191)
                            }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.points.electricity.external_identifier'))
                            ->class('col-md-2 form-control-label')
                            ->for('external_identifier') }}

                        <div class="col-md-10">
                            {{ html()->text('external_identifier')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.points.electricity.external_identifier'))
                                ->attribute('maxlength', 191)
                                ->required()
                            }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.points.electricity.meter_no'))
                            ->class('col-md-2 form-control-label')
                            ->for('meter_no') }}

                        <div class="col-md-10">
                            {{ html()->text('meter_no')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.points.electricity.meter_no'))
                                ->attribute('maxlength', 191)
                            }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.points.electricity.company'))
                            ->class('col-md-2 form-control-label')
                            ->for('company_id') }}

                        <div class="col-md-10">
                            {{ html()->select('company_id', [null => null] + $companies)
                                ->class('form-control')
                                ->required()
                            }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.points.electricity.is_internal'))->class('col-md-2 form-control-label')->for('is_internal') }}

                        <div class="col-md-10">
                            <label class="switch switch-label switch-pill switch-primary">
                                {{ html()->checkbox('is_internal', null, 1)->class('switch-input') }}
                                <span class="switch-slider" data-checked="yes" data-unchecked="no"></span>
                            </label>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.points.electricity.price'))
                            ->class('col-md-2 form-control-label')
                            ->for('price_id') }}

                        <div class="col-md-10">
                            {{ html()->select('price_id', [null => null] + $prices)
                                ->class('form-control')
                            }}
                            <div>
                                <small class="text-muted">@lang('strings.description.points.electricity.price')</small>
                            </div>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.points.electricity.tax'))
                            ->class('col-md-2 form-control-label')
                            ->for('tax') }}

                        <div class="col-md-10">
                            {{ html()->number('tax', null, 0, 100, 0.01)
                                ->class('form-control')
                            }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.points.electricity.service_charge'))
                            ->class('col-md-2 form-control-label')
                            ->for('service_charge_id') }}

                        <div class="col-md-10">
                            {{ html()->select('service_charge_id', [null => null] + $commissions)
                                ->class('form-control')
                            }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.points.electricity.provider_price', ['currency' => $default_currency->code]))
                            ->class('col-md-2 form-control-label')
                            ->for('provider_price') }}

                        <div class="col-md-10">
                            {{ html()->number('provider_price')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.points.electricity.provider_price', ['currency' => $default_currency->code]))
                                ->attribute('maxlength', 191)

                            }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.points.electricity.is_auto_price'))->class('col-md-2 form-control-label')->for('is_auto_price') }}

                        <div class="col-md-10">
                            <label class="switch switch-label switch-pill switch-primary">
                            {{ html()->checkbox('is_auto_price', null, 1)->class('switch-input') }}
                            <span class="switch-slider" data-checked="yes" data-unchecked="no"></span>
                            </label>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.points.electricity.auto_price_margin', ['currency' => $default_currency->code]))
                            ->class('col-md-2 form-control-label')
                            ->for('auto_price_margin') }}

                        <div class="col-md-10">
                            {{ html()->number('auto_price_margin')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.points.electricity.auto_price_margin', ['currency' => $default_currency->code]))
                                ->attribute('maxlength', 191)

                            }}
                            <div>
                                <small class="text-muted">@lang('strings.description.points.electricity.auto_price_margin')</small>
                            </div>
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