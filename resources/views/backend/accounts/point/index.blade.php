@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.account.point.management'))

@section('breadcrumb-links')
    @include('backend.accounts.point.includes.breadcrumb-links')
@endsection

@section('content')

    @include('backend.accounts.point.includes.credit')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.account.point.management')
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                @include('backend.accounts.point.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>@lang('labels.backend.account.point.table.code')</th>
                                <th>@lang('labels.backend.account.point.table.type')</th>
                                <th>@lang('labels.backend.account.point.table.owner')</th>
                                <th>@lang('labels.backend.account.point.table.company')</th>
                                <th>@lang('labels.backend.account.point.table.active')</th>
                                <th>@lang('labels.backend.account.point.table.balance')</th>
                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($accounts as $account)
                                <tr>
                                    <td>{{ $account->code }}</td>
                                    <td>{{ ucwords(__($account->type->name)) }}</td>
                                    <td>{{ $account->owner_label }}</td>
                                    <td>{{ @$account->point->company->name }}</td>
                                    <td>{!! $account->active_label !!}</td>
                                    @if($account->getFloatBalance() < 0)
                                        <td class="text-danger">{{ $account->float_balance_label }}</td>
                                    @else
                                        <td>{{ $account->float_balance_label }}</td>
                                    @endif
                                    <td>
                                        <div class="btn-group" role="group" aria-label="@lang('labels.backend.account.point.actions')">
                                            @can(config('permission.permissions.read_accounts'))
                                                <a href="{{ route('admin.account.point.show', $account->uuid) }}" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.view')" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                            @endcan
                                            @can(config('permission.permissions.credit_accounts'))
                                                <button name="creditPopup" id="{{ $account->uuid }}" title="@lang('labels.backend.account.credit')" class="btn btn-success"><i class="fas fa-plus-circle"></i></button>
                                            @endcan
                                            @can(config('permission.permissions.debit_accounts'))
                                                <button name="debitPopup" id="{{ $account->uuid }}" title="@lang('labels.backend.account.debit')" class="btn btn-danger"><i class="fas fa-minus-circle"></i></button>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
            <div class="row">
                <div class="col-7">
                    <div class="float-left">
                        {!! $accounts->total() !!} {{ trans_choice('labels.backend.account.point.table.total', $accounts->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $accounts->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection

@push('after-scripts')
    <script>

        $(function () {
            $("button[name='creditPopup']").click(function () {
                let title = this.title;
                let direction = "IN";
                let id = this.id;

                $("#creditModal .title-text").html(title);
                $("#creditModal button[type='submit']").html(title);
                $("#creditModal input[name='direction']").val(direction);
                $("#creditModal form").attr('action', `/admin/account/${id}/credit`);

                $("#creditModal").modal("show");
            });

            $("button[name='debitPopup']").click(function () {
                let title = this.title;
                let direction = "OUT";
                let id = this.id;

                $("#creditModal .title-text").html(title);
                $("#creditModal button[type='submit']").html(title);
                $("#creditModal input[name='direction']").val(direction);
                $("#creditModal form").attr('action', `/admin/account/${id}/credit`);

                $("#creditModal").modal("show");
            });

        });

    </script>
@endpush
