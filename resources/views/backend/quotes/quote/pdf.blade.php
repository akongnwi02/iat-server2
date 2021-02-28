<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $quote->title }}</title>
    <style>
        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        h1,h2,h3,h4,h5,h6,p,span,div {
            font-family: DejaVu Sans;
            font-size:10px;
            font-weight: normal;
        }
        th,td {
            font-family: DejaVu Sans;
            font-size:10px;
        }
        .panel {
            margin-bottom: 20px;
            background-color: #fff;
            border: 1px solid transparent;
            border-radius: 4px;
            -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .panel-default {
            border-color: #ddd;
        }
        .panel-body {
            padding: 15px;
        }
        table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 0px;
            border-spacing: 0;
            border-collapse: collapse;
            background-color: transparent;
        }
        thead  {
            text-align: left;
            display: table-header-group;
            vertical-align: middle;
        }
        th, td  {
            border: 1px solid #ddd;
            padding: 6px;
        }
        .well {
            min-height: 20px;
            padding: 19px;
            margin-bottom: 20px;
            background-color: #f5f5f5;
            border: 1px solid #e3e3e3;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
        }
    </style>
</head>
<body>
<header>
    {{--<div style="position:absolute; left:0pt; width:250pt;">--}}
        {{--<img class="img-rounded" height="224" src="file:///usr/src/iat-server2/public/img/backend/brand/logo_pdf.png">--}}
    {{--</div>--}}
    <div style="margin-left:300pt;">
        <b>@lang('labels.backend.quote.quote.pdf.date'): </b> {{ \Carbon\Carbon::parse($quote->created_at)->format('d M Y') }}<br />
        <br />
    </div>
    <br />
    <h2>@lang('labels.backend.quote.quote.pdf.invoice') #{{ $quote->code }}</h2>
</header>
<main>
    <div style="clear:both; position:relative;">
        <div style="position:absolute; left:0pt; width:250pt;">
            <h4>@lang('labels.backend.quote.quote.pdf.business_details'):</h4>
            <div class="panel panel-default">
                <div class="panel-body">
                    IAT Technologies<br />
                    No: M 121914366214 J<br />
                    653150281 / 675274587 / 651788020<br />
                    Cassava Farms Limbe<br />
                    @lang('labels.backend.quote.quote.pdf.country')
                    <br />
                </div>
            </div>
        </div>
        <div style="margin-left: 300pt;">
            <h4>@lang('labels.backend.quote.quote.pdf.customer_details'):</h4>
            <div class="panel panel-default">
                <div class="panel-body">
                    {{ $quote->customer_name }}<br />
                    {{ $quote->customer_phone }}<br />
                    {{ $quote->customer_address }}<br />
                    <span style="background-color: yellow;">{{ ucwords(__($quote->type)) }}</span>
                </div>
            </div>
        </div>
    </div>
    <h4>@lang('labels.backend.quote.quote.pdf.table.title'):</h4>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>@lang('labels.backend.quote.quote.pdf.table.material')</th>
            <th>@lang('labels.backend.quote.quote.pdf.table.unit_cost')</th>
            <th>@lang('labels.backend.quote.quote.pdf.table.quantity')</th>
            <th>@lang('labels.backend.quote.quote.pdf.table.total')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($quote->inventories as $inventory)
            <tr>
                <td>{{ $inventory->{'name_' . $current_locale} }}</td>
                <td>{{number_format($inventory->pivot->unit_cost, 2)}} {{ $default_currency->code }}</td>
                <td>{{ $inventory->pivot->quantity }}</td>
                <td>{{number_format($inventory->pivot->sub_total, 2)}} {{ $default_currency->code }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div style="clear:both; position:relative;">
        @if($quote->description)
            <div style="position:absolute; left:0pt; width:250pt;">
                <h4>Notes:</h4>
                <div class="panel panel-default">
                    <div class="panel-body">
                        {{ $quote->description }}
                    </div>
                </div>
            </div>
        @endif
        <div style="margin-left: 300pt;">
            <h4>Total:</h4>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td><b>@lang('labels.backend.quote.quote.pdf.table.tax')</b></td>
                    <td>{{number_format(0, 2)}} {{ $default_currency->code }}</td>
                </tr>
                <tr>
                    <td><b>@lang('labels.backend.quote.quote.pdf.table.total')</b></td>
                    <td><b>{{ number_format($quote->amount, 2) }} {{ $default_currency->code }}</b></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
<footer>
    <br />
    <br />
    <div style="margin-left:300pt;">
        <b>@lang('labels.backend.quote.quote.pdf.department')</b> <br />
        <br />
    </div>
</footer>
<!-- Page count -->
</body>
</html>
