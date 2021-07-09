@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.payment.electricity.management'))

@section('breadcrumb-links')
    {{--@include('backend.services.service.includes.breadcrumb-links')--}}
@endsection

@section('content')
    {{ html()->form('POST', route('admin.payments.electricity.store'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.payment.electricity.management')
                        <small class="text-muted">@lang('labels.backend.payment.electricity.edit')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.payment.supply_point'))
                            ->class('col-md-2 form-control-label')
                            ->for('supply_point_id') }}

                        <div class="col-md-10">
                            {{ html()->select('supply_point_id', [null => null] + $points)
                                ->class('form-control')
                                ->required()
                            }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.payment.cycle_year'))->class('col-md-2 form-control-label')->for('cycle_year') }}

                        <div class="col-md-10">
                            <select id="cycle_year" style="min-width:100px" name="cycle_year" class="form-control" required>
                                <option></option>
                                @foreach(range(2010, now()->year) as $year)
                                    <option value="{{ $year }}" {{(@request('cycle_year') == $year) ? "selected":""}}>{{ $year }}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.payment.cycle_month'))->class('col-md-2 form-control-label')->for('cycle_month') }}

                        <div class="col-md-10">
                            <select id="cycle_month" style="min-width:100px" name="cycle_month" class="form-control" required>
                                <option></option>
                                @for($month = 1; $month<=12; $month++)
                                    <option value="{{ $month }}" {{(@request()->input('cycle_month') == $month) ? "selected":""}}>{{ $month }}</option>
                                @endfor
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div id="POItablediv">
                        <div class="btn-toolbar" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                            <span id="addPOIbutton" onclick="insRow()" class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.general.add')"><i class="fas fa-plus-circle"></i></span>
                        </div>

                        <br/>

                        <table class="table table-responsive table-borderless" id="POITable">
                            <thead>
                            <tr>
                                <th>@lang('validation.attributes.backend.payment.payments.amount')</th>
                                <th>@lang('validation.attributes.backend.payment.payments.bill_number')</th>
                                <th>@lang('validation.attributes.backend.payment.payments.payment_ref')</th>
                                <th>@lang('validation.attributes.backend.payment.payments.consumption')</th>
                                <th>@lang('validation.attributes.backend.payment.payments.method')</th>
                                <th>@lang('validation.attributes.backend.payment.payments.note')</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input id="amount" style="min-width:100px" width="50px" type="number" name="payments[0][amount]" step="0.01" class="form-control" min="0" required/></td>
                                    <td><input id="bill_number" style="min-width:100px" type="text" name="payments[0][bill_number]" class="form-control" required/></td>
                                    <td><input id="payment_ref" style="min-width:100px" type="text" name="payments[0][payment_ref]" class="form-control"/></td>
                                    <td><input id="consumption" type="number" name="payments[0][consumption]" step="0.01" class="form-control" min="0" required/></td>
                                    <td>
                                        <select id="method" style="min-width:100px" name="payments[0][method]" class="form-control" required>
                                            <option></option>
                                            <option value="bill_settlement">@lang('strings.backend.bill_payment.bill_settlement')</option>
                                            <option value="money_transfer">@lang('strings.backend.bill_payment.money_transfer')</option>
                                        </select>
                                    </td>
                                    <td><input id="note" type="text" name="payments[0][note]" class="form-control"/></td>
                                    <td><span id="delPOIbutton" onclick="deleteRow(this)" class="btn btn-default btn-xs"><span class="fa fa-trash"></span></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!--col-->

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.payments.electricity.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.submit')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->closeModelForm() }}
@endsection

<style>
    .required:after{
        content:'*';
        color:red;
        padding-left:5px;
    }
</style>

@push('after-scripts')
    <script>
        function deleteRow(row) {

            let x = document.getElementById('POITable');
            let len = x.rows.length;
            if (len <= 2) {
                event.preventDefault();
                return;
            }

            let i = row.parentNode.parentNode.rowIndex;
            document.getElementById('POITable').deleteRow(i);
        }

        function insRow() {
            let x = document.getElementById('POITable');

            let new_row = x.rows[1].cloneNode(true);
            let len = x.rows.length;

            let inp1 = new_row.cells[0].getElementsByTagName('input')[0];
            inp1.value = '';
            inp1.name = `payments[${len}][amount]`;

            let inp2 = new_row.cells[1].getElementsByTagName('input')[0];
            inp2.value = '';
            inp2.name = `payments[${len}][bill_number]`;

            let inp3 = new_row.cells[2].getElementsByTagName('input')[0];
            inp3.value = '';
            inp3.name = `payments[${len}][payment_ref]`;

            let inp4 = new_row.cells[3].getElementsByTagName('input')[0];
            inp4.value = '';
            inp4.name = `payments[${len}][consumption]`;

            let inp5 = new_row.cells[4].getElementsByTagName('select')[0];
            inp5.value = '';
            inp5.name = `payments[${len}][method]`;

            let inp6 = new_row.cells[5].getElementsByTagName('input')[0];
            inp6.value = '';
            inp6.name = `payments[${len}][note]`;

            x.appendChild(new_row);
        }

    </script>
@endpush
