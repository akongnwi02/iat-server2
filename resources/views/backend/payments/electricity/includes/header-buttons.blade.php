@can(config('permission.permissions.read_bill_payments'))
    @can(config('permission.permissions.create_bill_payments'))
        <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
            <a href="{{ route('admin.payments.electricity.create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>
        </div><!--btn-toolbar-->
    @endcan

    <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
        <span onclick="showFilterPopup()" class="btn btn-{{ count(array_filter(request()->input('filter') ?: [], function($filter){return $filter !== null && $filter !== '';})) ?'primary':'dark'}} ml-1" data-toggle="tooltip" title="@lang('labels.backend.points.filter')"><i class="fas fa-filter"></i>
            @if(count(array_filter(request()->input('filter')?:[], function($filter){return $filter !== null && $filter !== '';})) && count(@request()->input()['filter']) > 0)
                <span class="badge badge-danger">{{ count(array_filter(request()->input('filter')?:[], function($filter){return $filter !== null && $filter !== '';})) }}</span>
            @endif
        </span>
    </div><!--btn-toolbar-->
@endcan

<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalCenterTitle">
                    <span class="title-text"></span>
                    <br/>
                    <small class="text-muted">@lang('labels.backend.points.filter')</small>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="@lang('buttons.general.cancel')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ html()->form('GET')->class('form-horizontal')->id('filterForm')->open() }}

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@lang('labels.backend.points.table.name')</span>
                    </div>
                    <input value="{{ @request()->input()['filter']['name'] }}" name="filter[name]" type="text" class="form-control"/>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@lang('labels.backend.points.table.external_identifier')</span>
                    </div>
                    <input value="{{ @request()->input()['filter']['external_identifier'] }}" name="filter[external_identifier]" type="text" class="form-control"/>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@lang('labels.backend.points.table.is_auto_price')</span>
                    </div>
                    {{ html()->select('filter[is_auto_price]', [null => null] + [0 => __('labels.general.no'), 1 => __('labels.general.yes')])
                        ->value(@request()->input()['filter']['is_auto_price'])
                        ->class('form-control')
                    }}
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@lang('labels.backend.meters.table.company')</span>
                    </div>
                    <input value="{{ @request()->input()['filter']['company.name'] }}" name="filter[company.name]" type="text" class="form-control"/>
                </div>


                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@lang('labels.backend.payment.electricity.table.is_internal')</span>
                    </div>
                    {{ html()->select('filter[is_internal]', [null => null] + [0 => __('labels.general.no'), 1 => __('labels.general.yes')])
                        ->value(@request()->input()['filter']['is_internal'])
                        ->class('form-control')
                    }}
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@lang('labels.backend.payment.electricity.table.cycle_year')</span>
                    </div>
                    <select id="cycle_year" style="min-width:100px" name="cycle_year" class="form-control" required>
                        <option></option>
                        @foreach(range(2010, now()->year) as $year)
                            <option value="{{ $year }}" {{(@request('cycle_year') == $year) ? "selected":""}}>{{ $year }}</option>
                        @endforeach
                    </select>

                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@lang('labels.backend.payment.electricity.table.cycle_month')</span>
                    </div>
                    <select id="cycle_month" style="min-width:100px" name="cycle_month" class="form-control" required>
                        <option></option>
                        @for($month = 1; $month<=12; $month++)
                            <option value="{{ $month }}" {{(@request()->input('cycle_month') == $month) ? "selected":""}}>{{ $month }}</option>
                        @endfor
                    </select>
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