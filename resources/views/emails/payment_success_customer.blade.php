@extends('emails.master')
@section('style')
    @parent
    <style>

        /* Let's make sure all tables have defaults */
        table td {
            vertical-align: top;
        }

        p, ul, ol {
            margin-bottom: 10px;
            font-weight: normal;
        }
        p li, ul li, ol li {
            margin-left: 5px;
            list-style-position: inside;
        }

        /* -------------------------------------
            LINKS & BUTTONS
        ------------------------------------- */
        a {
            color: #348eda;
            text-decoration: underline;
        }

        .aligncenter {
            text-align: center;
        }

        .alignright {
            text-align: right;
        }


        .alert a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
        }

        .invoice {
            margin: 40px auto;
            text-align: left;
            width: 80%;
        }
        .invoice td {
            padding: 5px 0;
        }
        .invoice .invoice-items {
            width: 100%;
        }
        .invoice .invoice-items td {
            border-top: #eee 1px solid;
        }
        .invoice .invoice-items .total td {
            border-top: 2px solid #333;
            border-bottom: 2px solid #333;
            font-weight: 700;
        }

        @media only screen and (max-width: 640px) {
            body {
                padding: 0 !important;
            }

            h1, h2, h3, h4 {
                font-weight: 800 !important;
                margin: 20px 0 5px !important;
            }

            h1 {
                font-size: 22px !important;
            }

            h2 {
                font-size: 18px !important;
            }

            h3 {
                font-size: 16px !important;
            }

            .invoice {
                width: 100% !important;
            }
        }

    </style>
@endsection
@section('content')


    <tr>
        <td>
            <a style="text-decoration:none; font-family: helvetica, Arial, sans-serif; font-size: 22px; color: #343434; line-height: 26px;" href="#">
                Hello, {{ $name }}
            </a>
        </td>
    </tr>
    <tr>
        <td width="100%" align="left" style="font-size: 15px; line-height: 22px; font-family:helvetica, Arial, sans-serif; color:#666666;">
            <p>{{ __('Your Transaction has been successful') }}</p>
            <p>{{ __('We are processing your order') }}</p>
        </td>
    </tr>

    <tr>
        <td class="content-block aligncenter" width="100%" align="left" style="font-size: 15px; line-height: 22px; font-family:helvetica, Arial, sans-serif; color:#666666;" >
            <table class="invoice">
                <tr>
                    <td>
                        {{ $name }}
                        <br>{{ __('Invoice') }} #{{ $invoiceNo }}
                        <br>{{ __('Delivery date') .' '.$deliveryDate }}
                        <br>{{ __('Delivery time') .' '. $deliveryTime }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="invoice-items" cellpadding="0" cellspacing="0">
                            <tr>
                                <td class="alignright">{{ $amount }} {{ __('KD') }}</td>
                            </tr>
                            <tr class="total">
                                <td class="alignright" width="80%">{{ __('Total') }}</td>
                                <td class="alignright">{{ $amount }} {{ __('KD') }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <!-- Space -->
    <tr><td style="font-size: 0; line-height: 0;" height="10">&nbsp;</td></tr>
    <tr>
        <td width="100%" align="left" style="font-size: 13px; line-height: 18px; font-family:helvetica, Arial, sans-serif; color:#666666;">
            <em>Best Regards, {{ env('ADMIN_NAME') }}</em>
        </td>
    </tr>
    <tr>
        <td width="100%" align="left" style="font-size: 13px; line-height: 18px; font-family:helvetica, Arial, sans-serif; color:#666666; font-weight:bold;">
            {{ env('ADMIN_EMAIL') }}
        </td>
    </tr>

@endsection