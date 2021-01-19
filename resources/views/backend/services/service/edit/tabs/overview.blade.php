{{ html()->modelForm($service, 'PUT', route('admin.services.service.update', $service))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
    <div class="row mt-4 mb-4">
        <div class="col">

            <div class="form-group row">
                {{ html()->label(__('validation.attributes.backend.services.service.name'))->class('col-md-2 form-control-label required')->for('name') }}

                <div class="col-md-10">
                    {{ html()->text('name')
                        ->class('form-control')
                        ->required()
                        ->attribute('maxlength', 191)
                        ->placeholder(__('validation.attributes.backend.services.service.name'))}}
                </div><!--col-->
            </div><!--form-group-->

            <div class="form-group row">
                {{ html()->label(__('validation.attributes.backend.services.service.code'))->class('col-md-2 form-control-label required')->for('code') }}

                <div class="col-md-10">
                    {{ html()->text('code')
                        ->class('form-control')
                        ->disabled()
                        ->attribute('maxlength', 191)
                        ->placeholder(__('validation.attributes.backend.services.service.code'))}}
                </div><!--col-->
            </div><!--form-group-->

            <div class="form-group row">
                {{ html()->label(__('validation.attributes.backend.services.service.destination_placeholder'))->class('col-md-2 form-control-label required')->for('destination_placeholder') }}

                <div class="col-md-10">
                    {{ html()->text('destination_placeholder')
                        ->class('form-control')
                        ->attribute('maxlength', 191)
                        ->placeholder(__('validation.attributes.backend.services.service.destination_placeholder'))}}
                </div><!--col-->
            </div><!--form-group-->

            <div class="form-group row">
                {{ html()->label(__('validation.attributes.backend.services.service.destination_regex'))->class('col-md-2 form-control-label required')->for('destination_regex') }}

                <div class="col-md-10">
                    {{ html()->text('destination_regex')
                        ->class('form-control')
                        ->attribute('maxlength', 191)
                        ->placeholder(__('validation.attributes.backend.services.service.destination_regex'))}}
                </div><!--col-->
            </div><!--form-group-->

            {{--<div class="form-group row">--}}
                {{--{{ html()->label(__('validation.attributes.backend.services.service.category'))->class('col-md-2 form-control-label required')->for('category_id') }}--}}

                {{--<div class="col-md-10">--}}
                    {{--{{ html()->select('category_id', $categories)--}}
                        {{--->class('form-control')--}}
                        {{--->required()}}--}}
                {{--</div><!--col-->--}}
            {{--</div><!--form-group-->--}}

            <div class="form-group row">
                {{ html()->label(__('validation.attributes.backend.services.service.min_amount'))->class('col-md-2 form-control-label required')->for('min_amount') }}

                <div class="col-md-10">
                    {{ html()->text('min_amount')
                        ->class('form-control')
                        ->required()
                         ->attribute('min', 0)
                         ->attribute('step', 0.01)
                        ->attribute('max', 100)
                        ->placeholder(__('validation.attributes.backend.services.service.min_amount'))}}
                </div><!--col-->
            </div><!--form-group-->

            <div class="form-group row">
                {{ html()->label(__('validation.attributes.backend.services.service.max_amount'))->class('col-md-2 form-control-label required')->for('max_amount') }}

                <div class="col-md-10">
                    {{ html()->text('max_amount')
                        ->class('form-control')
                        ->required()
                         ->attribute('min', 0)
                         ->attribute('step', 0.01)
                        ->attribute('max', 100)
                        ->placeholder(__('validation.attributes.backend.services.service.max_amount'))}}
                </div><!--col-->
            </div><!--form-group-->

            <div class="form-group row">
                {{ html()->label(__('validation.attributes.backend.services.service.step_amount'))->class('col-md-2 form-control-label required')->for('step_amount') }}

                <div class="col-md-10">
                    {{ html()->text('step_amount')
                        ->class('form-control')
                        ->required()
                         ->attribute('min', 0)
                         ->attribute('step', 0.01)
                        ->attribute('max', 100)
                        ->placeholder(__('validation.attributes.backend.services.service.step_amount'))}}
                </div><!--col-->
            </div><!--form-group-->

            <div class="form-group row">
                {{ html()->label(__('validation.attributes.backend.services.service.supplypoint_servicecharge'))->class('col-md-2 form-control-label')->for('customercommission_id') }}

                <div class="col-md-10">
                    {{ html()->select('customercommission_id', [null => null] + $commissions)
                        ->class('form-control')
                        }}
                </div><!--col-->
            </div><!--form-group-->

            {{--<div class="form-group row">--}}
                {{--{{ html()->label(__('validation.attributes.backend.services.service.items'))->class('col-md-2 form-control-label')->for('has_items') }}--}}

                {{--<div class="col-md-10">--}}
                    {{--<label class="switch switch-label switch-pill switch-primary">--}}
                        {{--{{ html()->checkbox('has_items', null, 1)->class('switch-input') }}--}}
                        {{--<span class="switch-slider" data-checked="yes" data-unchecked="no"></span>--}}
                    {{--</label>--}}
                {{--</div><!--col-->--}}
            {{--</div><!--form-group-->--}}
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            {{ form_cancel(route('admin.services.service.index'), __('buttons.general.cancel')) }}
        </div><!--col-->

        <div class="col text-right">
            {{ form_submit(__('buttons.general.continue')) }}
        </div><!--row-->
    </div><!--row-->

{{ html()->closeModelForm() }}

@push('after-styles')
    <style>
        .required:after {
            content: '*';
            color: red;
            padding-left: 5px;
        }

        table {
            width: 70%;
            font: 17px Calibri;
        }

        table, th, td {
            border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;
        }
    </style>
@endpush
@push('after-scripts')
    <script>

    </script>
@endpush
