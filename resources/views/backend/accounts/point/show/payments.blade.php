<div class="row mt-4">
    <div class="col">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>@lang('labels.backend.account.deposit.tabs.content.payments.table.cycle_year')</th>
                    <th>@lang('labels.backend.account.deposit.tabs.content.payments.table.cycle_month')</th>
                    <th>@lang('labels.backend.account.deposit.tabs.content.payments.table.amount') ({{ $default_currency->code }})</th>
                    <th>@lang('labels.backend.account.deposit.tabs.content.payments.table.bill_number')</th>
                    <th>@lang('labels.backend.account.deposit.tabs.content.payments.table.consumption')</th>
                    <th>@lang('labels.backend.account.deposit.tabs.content.payments.table.method')</th>
                    <th>@lang('labels.backend.account.deposit.tabs.content.payments.table.payment_ref')</th>
                    <th>@lang('labels.backend.account.deposit.tabs.content.payments.table.note')</th>

                    {{--<th>@lang('labels.general.actions')</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($account->point->billPayments->where('is_confirmed', true) as $payment)
                    <tr>
                        <td>{{ $payment->cycle->cycle_year }}</td>
                        <td>{{ $payment->cycle->cycle_month }}</td>
                        <td>{{ number_format($payment->amount, 2) }}</td>
                        <td>{{ $payment->bill_number }}</td>
                        <td>{{ $payment->consumption }}</td>
                        @if($payment->method == 'bill_settlement')
                            <td>@lang('strings.backend.bill_payment.bill_settlement')</td>
                        @else
                            <td>@lang('strings.backend.bill_payment.money_transfer')</td>
                        @endif
                        <td>{{ $payment->payment_ref }}</td>
                        <td>{{ $payment->note }}</td>
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
            {!! $movements->total() !!} {{ trans_choice('labels.backend.account.deposit.tabs.content.movements.table.total', $movements->total()) }}
        </div>
    </div><!--col-->

    <div class="col-5">
        <div class="float-right">
            {!! $movements->render() !!}
        </div>
    </div><!--col-->
</div><!--row-->
