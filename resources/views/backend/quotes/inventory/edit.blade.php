@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.quote.inventory.management'))

@section('breadcrumb-links')
    {{--@include('backend.administration.service.includes.breadcrumb-links')--}}
@endsection

@section('content')
    {{ html()->modelForm($inventory, 'PUT', route('admin.quotes.inventory.update', $inventory))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.quote.inventory.management')
                        <small class="text-muted">@lang('labels.backend.quote.inventory.edit')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.quote.inventory.name_en'))->class('col-md-2 form-control-label required')->for('name_en') }}

                        <div class="col-md-10">
                            {{ html()->text('name_en')
                                ->class('form-control')
                                ->required()
                                ->attribute('maxlength', 191)
                                ->placeholder(__('validation.attributes.backend.quote.inventory.name_en'))}}
                        </div><!--col-->
                    </div><!--form-group-->
                    
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.quote.inventory.name_fr'))->class('col-md-2 form-control-label required')->for('name_fr') }}

                        <div class="col-md-10">
                            {{ html()->text('name_fr')
                                ->class('form-control')
                                ->required()
                                ->attribute('maxlength', 191)
                                ->placeholder(__('validation.attributes.backend.quote.inventory.name_fr'))}}
                        </div><!--col-->
                    </div><!--form-group-->
                    
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.quotes.inventory.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->closeModelForm() }}
@endsection

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
