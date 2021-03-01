@can(config('permission.permissions.create_meters'))
    <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
        <span onclick="showFilterPopup()" class="btn btn-{{ count(array_filter(request()->input('filter') ?: [], function($filter){return $filter !== null && $filter !== '';})) ?'primary':'dark'}} ml-1" data-toggle="tooltip" title="@lang('labels.backend.meters.filter')"><i class="fas fa-filter"></i>
            @if(count(array_filter(request()->input('filter')?:[], function($filter){return $filter !== null && $filter !== '';})) && count(@request()->input()['filter']) > 0)
                <span class="badge badge-danger">{{ count(array_filter(request()->input('filter')?:[], function($filter){return $filter !== null && $filter !== '';})) }}</span>
            @endif
        </span>
        <a href="{{ route('admin.meter.electricity.download', request()->except('page')) }}"><span class="btn btn-secondary ml-1" data-toggle="tooltip" title="@lang('labels.general.download')"><i class="fas fa-download"></i></span><a>
        @can(config('permission.permissions.create_meters'))
            <a href="{{ route('admin.meter.electricity.create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>
        @endcan
    </div><!--btn-toolbar-->
@endcan

<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalCenterTitle">
                    <span class="title-text"></span>
                    <br/>
                    <small class="text-muted">@lang('labels.backend.meters.filter')</small>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="@lang('buttons.general.cancel')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ html()->form('GET')->class('form-horizontal')->id('filterForm')->open() }}

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@lang('labels.backend.meters.table.meter_code')</span>
                    </div>
                    <input value="{{ @request()->input()['filter']['meter_code'] }}" name="filter[meter_code]" type="text" class="form-control"/>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@lang('labels.backend.meters.table.company')</span>
                    </div>
                    <input value="{{ @request()->input()['filter']['supply_point.company.name'] }}" name="filter[supply_point.company.name]" type="text" class="form-control"/>

                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@lang('labels.backend.meters.table.supply_point')</span>
                    </div>
                    <input value="{{ @request()->input()['filter']['supply_point.name'] }}" name="filter[supply_point.name]" type="text" class="form-control"/>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@lang('labels.backend.meters.table.provider')</span>
                    </div>
                    {{ html()->select('filter[provider_id]', [null => null] + $providers)
                        ->value(@request()->input()['filter']['provider_id'])
                        ->class('form-control')
                    }}
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@lang('labels.backend.meters.table.active')</span>
                    </div>
                    {{ html()->select('filter[is_active]', [null => null] + [0 => __('labels.general.no'), 1 => __('labels.general.yes')])
                        ->value(@request()->input()['filter']['is_active'])
                        ->class('form-control')
                    }}
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@lang('labels.backend.meters.table.last_vending_date')</span>
                    </div>
                    <input value="{{ @request()->input()['filter']['vend_start_date'] }}" name="filter[vend_start_date]" type="date" class="form-control">

                    <input value="{{ @request()->input()['filter']['vend_end_date'] }}" name="filter[vend_end_date]" type="date" class="form-control">
                </div>


                <div class="modal-footer">
                    <button type="button" class="'btn btn-secondary btn-sm" onclick="clearFilters()">@lang('buttons.general.filter.clear')</button>

                    {{ form_submit(__('buttons.general.filter.filter')) }}
                </div>
                {{ html()->form()->close() }}
            </div>
        </div>
    </div>
</div>

<script>
    function showFilterPopup() {
        $("#filterModal").modal("show");
    }

    function clearFilters() {
        // $('input[name="filter[code]"]').val("");

        $(':input','#filterForm')
            .not(':button, :submit, :reset, :hidden')
            .val(null)
            .prop('checked', false)
            .prop('selected', false);

    }
</script>