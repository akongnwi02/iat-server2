@extends('backend.layouts.app')

@section('title', __('Change Key Result'))

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>{{ __('Change Key Result') }}</strong>
                </div>

                <div class="card-body">
                    <div class="alert alert-success">
                        {{ __('Meter update key tokens generated successfully.') }}
                    </div>

                    <table class="table table-bordered">
                        <tr>
                            <th>{{ __('Meter Code') }}</th>
                            <td>{{ $meter->meter_code }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Token 1') }}</th>
                            <td><strong>{{ $tokenOne }}</strong></td>
                        </tr>
                        <tr>
                            <th>{{ __('Token 2') }}</th>
                            <td><strong>{{ $tokenTwo }}</strong></td>
                        </tr>
                    </table>

                    <div class="mt-3">
                        <a href="{{ route('admin.meter.electricity.change-key') }}" class="btn btn-primary">
                            {{ __('Back') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection