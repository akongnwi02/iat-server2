
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.points.electricity') }}
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('labels.backend.points.table.name')</th>
                            <th>@lang('labels.backend.points.table.city')</th>
                            <th>@lang('labels.backend.points.table.phone')</th>
                            <th>@lang('labels.backend.points.table.email')</th>
                            <th>@lang('labels.backend.points.table.address')</th>
                            <th>@lang('labels.backend.points.table.external_identifier')</th>
                            <th>@lang('labels.backend.points.table.company')</th>
                            <th>@lang('labels.backend.points.table.service_charge')</th>
                            <th>@lang('labels.backend.points.table.price')</th>
                            <th>@lang('labels.backend.points.table.provider_price') ({{$default_currency->code}})</th>
                            <th>@lang('labels.backend.points.table.is_auto_price')</th>
                            <th>@lang('labels.backend.points.table.auto_price_margin') ({{$default_currency->code}})</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($points as $point)
                            <tr>
                                <td>{{ $point->name }}</td>
                                <td>{{ $point->city}}</td>
                                <td>{{ $point->phone}}</td>
                                <td>{{ $point->email}}</td>
                                <td>{{ $point->address}}</td>
                                <td>{{ $point->external_identifier}}</td>
                                <td>{{ $point->company->name}}</td>
                                <td>{{ @$point->serviceCharge->name }}</td>
                                <td>{{ @$point->price->name }}</td>
                                <td>{{ $point->provider_price }}</td>
                                @if($point->is_auto_price)
                                    <td>@lang('labels.general.yes')</td>
                                @else
                                    <td>@lang('labels.general.no')</td>
                                @endif
                                <td>{{ $point->auto_price_margin }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->