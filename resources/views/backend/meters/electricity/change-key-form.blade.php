@extends('backend.layouts.app')

@section('title', __('Change Key'))

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>
                        {{ __('Change Key') }}
                    </strong>
                </div>

                <div class="card-body">
                    {{ html()->form('POST', route('admin.meter.electricity.change-key'))->open() }}

                    <!-- Meter Code -->
                    <div class="form-group">
                        {{ html()->label(__('Meter Code'))->for('meter_code') }}
                        {{ html()->text('meter_code')
                            ->class('form-control')
                            ->placeholder(__('Enter meter code'))
                            ->attribute('maxlength', 191)
                            ->required() }}
                    </div>

                    <!-- SGC -->
                    <div class="form-group">
                        {{ html()->label(__('From SGC'))->for('fromSgc') }}
                        {{ html()->number('fromSgc')
                            ->class('form-control')
                            ->placeholder(__('Enter SGC (e.g 999946)'))
                            ->required() }}
                    </div>

                    <!-- TI -->
                    <div class="form-group">
                        {{ html()->label(__('From TI'))->for('fromTi') }}
                        {{ html()->number('fromTi', 1)
                            ->class('form-control')
                            ->required() }}
                    </div>

                    <!-- KRN -->
                    <div class="form-group">
                        {{ html()->label(__('From KRN'))->for('fromKrn') }}
                        {{ html()->number('fromKrn', 1)
                            ->class('form-control')
                            ->required() }}
                    </div>

                    <div class="row mt-4">
                        <div class="col text-left">
                            {{ form_cancel(route('admin.meter.electricity.index'), __('Cancel')) }}
                        </div>

                        <div class="col text-right">
                            {{ form_submit(__('Continue')) }}
                        </div>
                    </div>

                    {{ html()->form()->close() }}
                </div>
            </div>
        </div>
    </div>
@endsection