@extends('emails.master')

@section('content')

    <tr>
        <td class="content-block" width="100%">
            <table class="invoice">
                <tr class="">
                    <td>{{ $name .', ' . $mobile}}<br>{{ __('Invoice') }} #{{ $invoice_id }}<br>{{ $created_at }}</td>
                </tr>
                <tr>
                    <td>
                        <table class="invoice-items" cellpadding="0" cellspacing="0">
                            @foreach($details as $val)
                                <tr>
                                    <td>#{{ $details['id'] . ' - '.$details['product_name'] }}</td>
                                    <td class="alignright">
                                        {{ __('Quantity') }} {{ $details['quantity'] }}
                                        <br> {{ __('Delivery Date') }} {{ $details['delivery_date'] }}
                                        <br> {{ __('Delivery Time') }} {{ $details['delivery_time'] }}
                                        <br> {{ __('Price') }} {{ $details['sale_price'] }}
                                    </td>
                                </tr>
                            @endforeach
                                <tr>
                                    <td>{{ __('Recipient Information') }}</td>
                                    <td class="alignright">
                                        {{
                                            $recipient_name
                                            . ' ' .$recipient_mobile
                                        }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ __('Card Notes') }}</td>
                                    <td class="alignright">{{ $card_notes }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('Order Notes') }}</td>
                                    <td class="alignright">{{ $order_notes }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('Address') }}</td>
                                    <td class="alignright">
                                        {{ $area
                                            . __('Block') . $block
                                            . __('Street') . $street
                                            . __('House')  . $house
                                            . ', ' . $country
                                        }}
                                    </td>
                                </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

@endsection