@extends('emails.master_old')

@section('content')

    <tr>
        <td class="content-block" width="100%">
            <table class="invoice">
                <tr class="left">
                    <td>{{ $name .', ' . $mobile}}<br>{{ trans('general.invoice') }} #{{ $invoice_id }}<br>{{ $created_at }}</td>
                </tr>
                <tr>
                    <td>
                        <table class="invoice-items" cellpadding="0" cellspacing="0">
                            @foreach($details as $detail)
                                <tr>
                                    <td class="left">
                                        #{{ $detail['id'] . ' - '.$detail['product_name'] }}
                                        <br> <b>{{ trans('general.quantity') }} </b> {{ $detail['quantity'] }}
                                        <br> <b>{{ trans('general.delivery_date') }} </b> {{ $detail['delivery_date'] }}
                                        <br> <b>{{ trans('general.delivery_time') }} </b> {{ $detail['delivery_time'] }}
                                        <br> <b>{{ trans('general.price') }} </b> {{ $detail['sale_price'] }}
                                    </td>¡
                                </tr>
                            @endforeach
                                <tr>
                                    <td class="left">
                                        <b>
                                            {{ trans('general.recipient_information') }}
                                        </b>
                                        <br>
                                        {{ $recipient_name . ' ' .$recipient_mobile }}
                                    </td>

                                </tr>
                                <tr>
                                    <td class="left">
                                        <b>{{ trans('general.card_notes') }}</b>
                                        <br>
                                        {{ $card_notes }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <b>{{ trans('general.order_notes') }}</b>
                                        <br>
                                        {{ $order_notes }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <b>{{ trans('general.address') }}</b>
                                        <br>
                                        {{ $area
                                            . trans('general.block') . ' '. $block
                                            . trans('general.street') . ' '. $street
                                            . trans('general.house')  . ' '. $house
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