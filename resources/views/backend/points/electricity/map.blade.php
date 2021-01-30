@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.points.map'))

@section('breadcrumb-links')
    @include('backend.points.electricity.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.points.electricity') }}
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.points.electricity.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection