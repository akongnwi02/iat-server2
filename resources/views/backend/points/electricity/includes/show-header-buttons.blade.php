@can(config('permission.permissions.create_supply_points'))
    <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
       <a href="{{ route('admin.point.electricity.map', request()->except('page')) }}"><span class="btn btn-facebook ml-1" data-toggle="tooltip" title="@lang('labels.general.location')"><i class="fa fa-map-marker-alt"></i></span><a>
    </div><!--btn-toolbar-->
@endcan
