<div class="row">
    <div class="col-sm-5">
        <h4 class="card-title mb-0">
            @lang('labels.backend.services.service.management')
        </h4>
    </div><!--col-->

    <div class="col-sm-7">
        @can(config('permission.permissions.create_company_services'))
            <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                <button type="button" class="btn btn-success ml-1" data-toggle="modal" data-target="#addServices" title="@lang('labels.general.toggle')">
                    <i class="fas fa-exchange-alt"></i>
                </button>
            </div><!--btn-toolbar-->
        @endcan
    </div><!--col-->
</div><!--row-->

<div class="row mt-4">
    <div class="col">
        <table class="table table-responsive">
            <thead>
            <tr>
                <th>@lang('labels.backend.companies.company.tabs.content.service.table.name')</th>
                <th>@lang('labels.backend.companies.company.tabs.content.service.table.code')</th>
{{--                <th>@lang('labels.backend.companies.company.tabs.content.service.table.logo')</th>--}}
                <th>@lang('labels.backend.companies.company.tabs.content.service.table.active')</th>
                <th>@lang('labels.backend.companies.company.tabs.content.service.table.customercommission')</th>
                <th>@lang('labels.backend.companies.company.tabs.content.service.table.providercommission')</th>
                <th>@lang('labels.backend.companies.company.tabs.content.service.table.commissiondistribution')</th>
                <th>@lang('labels.general.actions')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companyServices as $service)
                <tr>
                    <td>{!! $service->logo_label !!} {{ $service->name }}</td>
                    <td>{{ $service->code }}</td>
                    {{--<td>{!! $service->logo_label !!}</td>--}}
                    <td>{!! $service->specific->active_label !!}</td>
                    <td>{{ ! is_null($service->specific->customercommission_id) ? @$service->specific->customer_commission->name : @$service->customer_commission->name }}</td>
                    <td>{{ ! is_null($service->specific->providercommission_id) ? @$service->specific->provider_commission->name : @$service->provider_commission->name }}</td>
                    <td>{{ ! is_null($service->specific->commission_distribution_id) ? @$service->specific->commission_distribution->name : @$service->commission_distribution->name }}</td>
                    <td>
                        @can(config('permission.permissions.update_company_services'))
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#service-{{ $service->uuid }}" data-placement="top" title="@lang('buttons.general.crud.edit')"><i class="fas fa-edit"></i></button>
                        @endcan
                    </td>
                </tr>
                <div class="modal fade" id="service-{{ $service->uuid }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalCenterTitle">
                                    @lang('labels.backend.companies.company.tabs.content.service.management')
                                    <small class="text-muted">@lang('labels.backend.companies.company.tabs.content.service.edit', ['company' => $company->name])</small>
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="@lang('buttons.general.cancel')">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{ html()->form('PUT', route('admin.companies.company.service.update', [$company->uuid, $service->uuid]))->class('form-horizontal')->open() }}

                                    <div class="form-group">
                                        <label for="customercommission_id" class="col-form-label">@lang('validation.attributes.backend.companies.service.customercommission')</label>
                                        <div class="form-check mb-2 mr-sm-2">
                                            <label class="form-check-label" ><input type="checkbox" name="customer-default" class="form-check-input" id="{{ $service->uuid }}"/> @lang('validation.attributes.backend.companies.service.default_setting') ({{ @$service->customer_commission->name ?: '-'.__('labels.general.none'). '-' }})</label>
                                        </div>
                                        {{ html()->select('customercommission_id' , [null => null ] + $commissions)
                                            ->class('form-control')
                                            ->value($service->specific->customercommission_id)
                                         }}
                                    </div>

                                    <div class="form-group">
                                        <label for="providercommission_id" class="col-form-label">@lang('validation.attributes.backend.companies.service.providercommission')</label>
                                        <div class="form-check mb-2 mr-sm-2">
                                            <label class="form-check-label" ><input type="checkbox" name="provider-default" class="form-check-input" id="{{ $service->uuid }}"/> @lang('validation.attributes.backend.companies.service.default_setting') ({{ @$service->provider_commission->name ?: '-'.__('labels.general.none'). '-' }})</label>
                                        </div>
                                        {{ html()->select('providercommission_id' , [null => null ] + $commissions)
                                            ->class('form-control')
                                            ->value($service->specific->providercommission_id)
                                        }}
                                    </div>

                                    <div class="form-group">
                                        <label for="commission_distribution_id" class="col-form-label">@lang('validation.attributes.backend.companies.service.commissiondistribution')</label>
                                        <div class="form-check mb-2 mr-sm-2">
                                            <label class="form-check-label" ><input type="checkbox" name="distribution-default" class="form-check-input" id="{{ $service->uuid }}"/> @lang('validation.attributes.backend.companies.service.default_setting') ({{ @$service->commission_distribution->name ?: '-'.__('labels.general.none'). '-' }})</label>
                                        </div>
                                        {{ html()->select('commission_distribution_id' , [null => null ] + $distributions)
                                            ->class('form-control')
                                            ->value($service->specific->commission_distribution_id)
                                        }}
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="'btn btn-secondary btn-sm" data-dismiss="modal">@lang('buttons.general.cancel')</button>
                                        {{ form_submit(__('buttons.general.crud.update')) }}
                                    </div>

                                {{ html()->form()->close() }}
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
            </tbody>
        </table>
    </div><!--col-->
</div><!--row-->
<div class="row">
    <div class="col-12">
        <div class="float-left">
            {!! count($companyServices) !!} {{ trans_choice('labels.backend.companies.company.tabs.content.service.table.total', count($companyServices)) }}
        </div>
    </div><!--col-->
</div><!--row-->



<!-- Modal -->
<div class="modal fade" id="addServices" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addServices">
                    {{--@lang('labels.backend.companies.company.tabs.content.service.management')--}}
                    <small class="text-muted">@lang('labels.backend.companies.company.tabs.content.service.add', ['company' => $company->name])</small>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ html()->form('POST', route('admin.companies.company.service.store', [$company->uuid]))->class('form-horizontal')->open() }}

                <div class="row mt-4">
                    <div class="col">

                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.companies.service.services'))
                                ->class('col-md-3 form-control-label')
                                ->for('service_ids') }}

                            <div class="col-md-9">
                                @if($services->count())
                                    @foreach($services as $service)
                                        <div class="checkbox d-flex align-items-center">
                                            {{ html()->label(
                                                    html()->checkbox('service_ids[]', $company->services->contains($service), $service->uuid)
                                                            ->class('switch-input')
                                                            ->id('permission-'.$service->uuid)
                                                        . '<span class="switch-slider" data-checked="on" data-unchecked="off"></span>')
                                                    ->class('switch switch-label switch-pill switch-primary mr-2')
                                                ->for('permission-'.$service->uuid) }}
                                                {!! $service->logo_label . '&nbsp;&nbsp;&nbsp;' !!}
                                            {{ html()->label($service->name)->for('permission-'.$service->uuid) }}
                                        </div>
                                    @endforeach
                                @endif
                            </div><!--col-->
                        </div><!--form-group-->
                    </div><!--col-->

                </div><!--row-->
                <div class="row">
                    <div class="col-12">
                        <div class="float-left">
                            {!! count($services) !!} {{ trans_choice('labels.backend.services.service.table.total', count($services)) }}
                        </div>
                    </div><!--col-->
                </div><!--row-->
            </div><!--modal-body-->
            <div class="modal-footer">
                <button type="button" class="'btn btn-secondary btn-sm" data-dismiss="modal">@lang('buttons.general.cancel')</button>
                {{ form_submit(__('buttons.general.crud.update')) }}
            </div>
            {{ html()->form()->close() }}
        </div>
    </div>
</div>
@push('after-scripts')
    <script>
        $('input[name="customer-default"]').click(function(){
            let id = $(this).attr('id');
            $('select[name="customercommission_id"][id="customercommission_id"]').attr('disabled', this.checked).val('')
        });

        $('input[name="provider-default"]').click(function(){
            let id = $(this).attr('id');
            $('select[name="providercommission_id"][id="providercommission_id"]').attr('disabled', this.checked).val('')
        });

        $('input[name="distribution-default"]').click(function(){
            let id = $(this).attr('id');
            $('select[name="commission_distribution_id"][id="commission_distribution_id"]').attr('disabled', this.checked).val('')
        });
    </script>
@endpush
