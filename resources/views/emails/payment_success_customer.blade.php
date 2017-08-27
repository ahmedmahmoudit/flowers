@extends('emails.master')

@section('content')

    <tr>
        <td>
            <h1 class="left">
                Hello, {{ $name }}
            </h1>
        </td>
    </tr>
    <tr>
        <td>
            <p class="left">{{ __('Your transaction has been successful') }}</p>
            <p class="left">{{ __('We have received your order') }}</p>
        </td>
    </tr>

    <tr>
        <td class="content-block aligncenter">
            <table class="invoice">

                <tr>
                    <td class="left">
                        {{ $name }}
                        <br>{{ __('Invoice') }} #{{ $invoice }}
                        <br>{{ __('Delivery Date') .' '.$delivery_date }}
                        <br>{{ __('Delivery Time') .' '. $delivery_time }}
                    </td>
                </tr>

                <tr>
                    <td>
                        <table class="invoice-items" cellpadding="0" cellspacing="0">
                            <tr>
                                <td class="left"></td>
                                <td class="right">{{ $amount }} {{ __('KD') }}</td>
                            </tr>
                            <tr class="total">
                                <td class="right" width="80%">{{ __('Total') }}</td>
                                <td class="right">{{ $amount }} {{ __('KD') }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>
        </td>
    </tr>

@endsection