@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.quote.quote.management'))

@section('breadcrumb-links')
    {{--@include('backend.services.service.includes.breadcrumb-links')--}}
@endsection

@section('content')
    {{ html()->form('POST', route('admin.quotes.quote.store'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.quote.quote.management')
                        <small class="text-muted">@lang('labels.backend.quote.quote.create')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.quote.quote.title'))->class('col-md-2 form-control-label required')->for('title') }}

                        <div class="col-md-10">
                            {{ html()->text('title')
                                ->class('form-control')
                                ->required()
                                ->attribute('maxlength', 191)
                                ->placeholder(__('validation.attributes.backend.quote.quote.title'))}}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.quote.quote.name'))->class('col-md-2 form-control-label required')->for('customer_name') }}

                        <div class="col-md-10">
                            {{ html()->text('customer_name')
                                ->class('form-control')
                                ->required()
                                ->attribute('maxlength', 191)
                                ->placeholder(__('validation.attributes.backend.quote.quote.name'))}}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.quote.quote.phone'))->class('col-md-2 form-control-label required')->for('customer_phone') }}

                        <div class="col-md-10">
                            {{ html()->text('customer_phone')
                                ->class('form-control')
                                ->required()
                                ->attribute('maxlength', 191)
                                ->placeholder(__('validation.attributes.backend.quote.quote.phone'))}}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.quote.quote.address'))->class('col-md-2 form-control-label required')->for('customer_address') }}

                        <div class="col-md-10">
                            {{ html()->text('customer_address')
                                ->class('form-control')
                                ->required()
                                ->attribute('maxlength', 191)
                                ->placeholder(__('validation.attributes.backend.quote.quote.address'))}}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.quote.quote.type'))->class('col-md-2 form-control-label required')->for('type') }}

                        <div class="col-md-10">
                            {{ html()->select('type', [null => null, 'ownership' => __('ownership'), 'partnership' => __('partnership')])
                                ->class('form-control')
                                ->required()}}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.quote.quote.description'))->class('col-md-2 form-control-label')->for('description') }}

                        <div class="col-md-10">
                            {{ html()->textarea('description')
                                ->class('form-control')
                                ->attribute('maxlength', 191)
                                ->placeholder(__('validation.attributes.backend.quote.quote.description'))}}
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
                                <th>@lang('validation.attributes.backend.quote.quote.inventories.material')</th>
                                <th>@lang('validation.attributes.backend.quote.quote.inventories.unit_cost')</th>
                                <th>@lang('validation.attributes.backend.quote.quote.inventories.quantity')</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select id="material" style="min-width:100px" name="inventories[0][inventory_id]" class="form-control" required>
                                            <option></option>
                                        @foreach($inventories as $inventory)
                                                <option value="{{ $inventory->uuid }}">{{ $inventory->{'name_' . $current_locale} }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input id="unit_cot" style="min-width:100px" type="number" name="inventories[0][unit_cost]" step="0.01" class="form-control" min="0" required/></td>
                                    <td><input id="quantity" style="min-width:100px" type="number" name="inventories[0][quantity]" step="1" class="form-control" min="0" required/></td>
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
                    {{ form_cancel(route('admin.quotes.quote.index'), __('buttons.general.cancel')) }}
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

            let inp1 = new_row.cells[0].getElementsByTagName('select')[0];
            inp1.value = '';
            inp1.name = `inventories[${len}][inventory_id]`;

            let inp2 = new_row.cells[1].getElementsByTagName('input')[0];
            inp2.value = '';
            inp2.name = `inventories[${len}][unit_cost]`;

            let inp3 = new_row.cells[2].getElementsByTagName('input')[0];
            inp3.value = '';
            inp3.name = `inventories[${len}][quantity]`;

            x.appendChild(new_row);
        }

    </script>
@endpush
