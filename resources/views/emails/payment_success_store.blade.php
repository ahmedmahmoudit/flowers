@extends('emails.master')

@section('content')

    <tr>
        <td class="content-block" width="100%">
            <table class="invoice">
                <tr class="left">
                    <td>{{ $name .', ' . $mobile}}<br>{{ __('Invoice') }} #{{ $invoice_id }}<br>{{ $created_at }}</td>
                </tr>
                <tr>
                    <td>
                        <table class="invoice-items" cellpadding="0" cellspacing="0">
                            @foreach($details as $detail)
                                <tr>
                                    <td class="left">
                                        #{{ $detail['id'] . ' - '.$detail['product_name'] }}
                                        <br> {{ __('Quantity') }} {{ $detail['quantity'] }}
                                        <br> {{ __('Delivery Date') }} {{ $detail['delivery_date'] }}
                                        <br> {{ __('Delivery Time') }} {{ $detail['delivery_time'] }}
                                        <br> {{ __('Price') }} {{ $detail['sale_price'] }}
                                    </td>
                                </tr>
                            @endforeach
                                <tr>
                                    <td class="left">
                                        {{ __('Recipient Information') }}
                                        <br>
                                        {{ $recipient_name . ' ' .$recipient_mobile }}
                                    </td>

                                </tr>
                                <tr>
                                    <td class="left">
                                        {{ __('Card Notes') }}
                                        <br>
                                        {{ $card_notes }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        {{ __('Order Notes') }}
                                        <br>
                                        {{ $order_notes }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        {{ __('Address') }}
                                        <br>
                                        {{ $area
                                            . __('Block') . ' '. $block
                                            . __('Street') . ' '. $street
                                            . __('House')  . ' '. $house
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