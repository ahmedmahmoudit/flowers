@extends('emails.master')

@section('content')
    <!-- Email Body -->
    <tr>
        <td class="body" width="100%" cellpadding="0" cellspacing="0"
            style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #ffffff; border-bottom: 1px solid #edeff2; border-top: 1px solid #edeff2; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0"
                   style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #ffffff; margin: 0 auto; padding: 0; width: 570px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px;">
                <!-- Body content -->
                <tr>
                    <td class="content-cell"
                        style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; padding: 35px;">
                        <h1 style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #2F3133; font-size: 19px; font-weight: bold; margin-top: 0; text-align: right;">
                            {{ trans('general.thanks') }}, {{ $name }}
                        </h1>
                        {{--<p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: right;">--}}
                        {{--تمت عملية الدفع بنجاح--}}
                        {{--</p>--}}

                        <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: right;">
                            We have received your order
                        </p>

                        <div class="table"
                             style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                            <table style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; margin: 30px auto; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
                                <thead style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">

                                <tr>
                                    @foreach($details as $detail)
                                        <th style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; border-bottom: 1px solid #edeff2; padding-bottom: 8px;">
                                            Price
                                        </th>
                                        <th style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; border-bottom: 1px solid #edeff2; padding-bottom: 8px;">
                                            Delivery Time
                                        </th>
                                        <th style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; border-bottom: 1px solid #edeff2; padding-bottom: 8px;">
                                            Delivery Date
                                        </th>
                                        <th style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; border-bottom: 1px solid #edeff2; padding-bottom: 8px;">
                                            Quantity
                                        </th>
                                        <th style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; border-bottom: 1px solid #edeff2; padding-bottom: 8px;">
                                            Store
                                        </th>
                                        <th style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; border-bottom: 1px solid #edeff2; padding-bottom: 8px;">
                                            Product
                                        </th>
                                    @endforeach
                                </tr>


                                </thead>
                                <tbody style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">

                                @foreach($details as $detail)
                                    <tr>
                                        <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; font-size: 15px; line-height: 18px; padding: 10px 0; text-align: center">
                                            {{$detail['sale_price'] . ' '. $currency }}
                                        </td>

                                        <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; font-size: 15px; line-height: 18px; padding: 10px 0;text-align: center">
                                            {{$detail['delivery_time']}}
                                        </td>
                                        <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; font-size: 15px; line-height: 18px; padding: 10px 0;text-align: center">
                                            {{$detail['delivery_date']}}
                                        </td>

                                        <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; font-size: 15px; line-height: 18px; padding: 10px 0;text-align: center">
                                            {{$detail['quantity']}}
                                        </td>

                                        <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; font-size: 15px; line-height: 18px; padding: 10px 0;text-align: center">
                                            {{$detail['store_name']}}
                                        </td>
                                        <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; font-size: 15px; line-height: 18px; padding: 10px 0;text-align: center">
                                            {{$detail['product_name']}}
                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                        </div>

                        <table class="action" align="center" width="100%" cellpadding="0" cellspacing="0"
                               style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; margin: 30px auto; padding: 0; text-align: center; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
                            <tr>
                                <td align="center"
                                    style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                           style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                        <tr>
                                            <td align="center"
                                                style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                <table border="0" cellpadding="0" cellspacing="0"
                                                       style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                    <tr>
                                                        <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                            <a href="{{ $track_link }}" class="button button-blue"
                                                               target="_blank"
                                                               style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-radius: 3px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); color: #ffffff; display: inline-block; text-decoration: none; -webkit-text-size-adjust: none; background-color: #3097d1; border-top: 10px solid #3097d1; border-right: 18px solid #3097d1; border-bottom: 10px solid #3097d1; border-left: 18px solid #3097d1;">
                                                                Track your order
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>
        </td>
    </tr>

@endsection