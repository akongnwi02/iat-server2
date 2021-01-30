<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.meters.electricity') }}
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('labels.backend.meters.table.meter_code')</th>
                            <th>@lang('labels.backend.meters.table.supply_point')</th>
                            <th>@lang('labels.backend.meters.table.company')</th>
                            <th>@lang('labels.backend.meters.table.provider')</th>
                            <th>@lang('labels.backend.meters.table.active')</th>
                            <th>@lang('labels.backend.meters.table.phone')</th>
                            <th>@lang('labels.backend.meters.table.email')</th>
                            <th>@lang('labels.backend.meters.table.last_vending_date')</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($meters as $meter)
                            <tr>
                                <td>{{ $meter->meter_code }}</td>
                                <td>{{ @$meter->supplyPoint->name }}</td>
                                <td>{{ @$meter->supplyPoint->company->name }}</td>
                                <td>{{ @$meter->provider->name }}</td>
                                @if($meter->is_active)
                                    <td>@lang('labels.general.yes')</td>
                                @else
                                    <td>@lang('labels.general.no')</td>
                                @endif
                                <td>{{ @$meter->phone }}</td>
                                <td>{{ @$meter->email }}</td>
                                <td>{{ @$meter->last_vending_date }}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->