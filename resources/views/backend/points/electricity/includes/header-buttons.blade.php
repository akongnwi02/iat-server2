@can(config('permission.permissions.create_supply_points'))
    <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
        <span onclick="showFilterPopup()" class="btn btn-{{ count(array_filter(request()->input('filter') ?: [], function($filter){return $filter !== null && $filter !== '';})) ?'primary':'dark'}} ml-1" data-toggle="tooltip" title="@lang('labels.backend.points.filter')"><i class="fas fa-filter"></i>
            @if(count(array_filter(request()->input('filter')?:[], function($filter){return $filter !== null && $filter !== '';})) && count(@request()->input()['filter']) > 0)
                <span class="badge badge-danger">{{ count(array_filter(request()->input('filter')?:[], function($filter){return $filter !== null && $filter !== '';})) }}</span>
            @endif
        </span>
        <a href="{{ route('admin.point.electricity.create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>
    </div><!--btn-toolbar-->
@endcan

<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

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