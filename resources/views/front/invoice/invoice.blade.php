<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .invoice-box {
            width: 190mm; /* Set width to fit A4 size with some margins */
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
            margin: auto;
            page-break-inside: avoid; /* Prevent page breaks inside the invoice box */
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .invoice-header img {
            width: 150px; /* Adjusted for a smaller size */
            display: inline-block;
        }

        .invoice-header .details {
            text-align: right;
            font-size: 80%;
            line-height: 1.2;
            color: #555;
        }

        .invoice-header .details p {
            margin: 2px 0;
        }

        h1 {
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            font-weight: normal;
            margin: 20px 0;
            font-size: 24px; /* Adjusted font size for better fit */
            letter-spacing: 1px;
        }

        .address-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .address-section .from-address {
            text-align: left; /* Align the text to the left for the "From" address */
        }

        .address-section .to-address {
            text-align: right; /* Align the text to the right for the "To" address */
        }

        .from-address p, .to-address p {
            font-size: 14px;
            color: #555;
            margin: 2px 0;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .invoice-table th,
        .invoice-table td {
            padding: 8px;
            text-align: center;
            font-size: 12px; /* Smaller font size for table content */
            border: 1px solid #ddd;
        }

        .invoice-table th {
            background-color: #f5eadc;
            font-weight: bold;
        }

        .invoice-summary {
            margin-top: 20px;
            float: right;
            width: 200px; /* Reduced width to fit better */
            text-align: right;
        }

        .invoice-summary p {
            margin: 5px 0;
            font-size: 14px;
        }

        .invoice-summary .total,
        .invoice-summary .grand-total {
            font-weight: bold;
        }

        .total-in-words {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #555;
            width: 100%;
            font-weight: bold;
        }

        .signature {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .signature .sig-block {
            font-size: 14px;
        }

        .signature .sig-block .line {
            width: 200px;
            border-top: 1px solid #333;
            margin: 10px 0;
        }

        .footer {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            font-size: 12px;
            color: #555;
            bottom: 0;
            left: 0;
            position: fixed;
        }

        .footer p {
            margin: 5px 0;
        }

        .custom-table {
            width: 100%;
            margin: 20px 0;
            font-size: 80%;
            line-height: 0;
        }

        .custom-table td {
            padding: 0px;
        }

        .custom-table th {
            padding: 10px;
        }

        .left-align {
            text-align: left;
            width: 50%;
        }

        .right-align {
            text-align: right;
            width: 50%;
        }

        .custom-table p {
            margin: 0;
            line-height: 1.5;
        }

        .custom-table strong {
            color: #333;
        }


    </style>
</head>
<body>
<div class="invoice-box">
    <div class="invoice-header">
        <img src="{{$imageSrc}}" alt="{{$generalSettingView->site_name}}">
        <div class="details">
            <p>Date: {{$order->created_at->format('d/m/Y')}}</p>
            <p>Invoice# {{$order->order_code}}</p>
            <p>Payment Status: {{ucfirst($order->payment_status)}}</p>
            <p>Website: {{Env('APP_URL')}}</p>
        </div>
    </div>

    <h1>INVOICE</h1>

    <table class="custom-table">
        <tbody>
        <tr>
            <td class="left-align"><p><strong>From:</strong></p></td>
            <td class="right-align"><p><strong>To:</strong> {{$order->name}}</p></td>
        </tr>
        <tr>
            <td class="left-align"><p><strong>{{$generalSettingView->site_name}}</strong></p></td>
            <td class="right-align"><p><strong>Address:</strong> {{$order->address}}</p></td>
        </tr>
        <tr>
            <td class="left-align"><p><strong>Address:</strong>{{$generalSettingView->address}}</p></td>
            <td class="right-align"><p><strong>Contact Number:</strong> {{$order->mobile}}</p></td>
        </tr>
        <tr>
            <td class="left-align"><p><strong>Contact Number:</strong> {{$generalSettingView->mobile}}</p></td>
            <td class="right-align"><p><strong>Email:</strong> {{$order->email}}</p></td>
        </tr>
        <tr>
            <td class="left-align"><p><strong>Email:</strong> {{$generalSettingView->email}}</p></td>
            <td class="right-align"><p><strong>Payment Method:</strong> {{ucfirst($order->payment_method)}}</p></td>
        </tr>
        </tbody>
    </table>


    <table class="invoice-table">
        <tr>
            <th>DESCRIPTION</th>
            <th>PRICE</th>
            <th>VARIANT</th>
            <th>QTY.</th>
            <th style="text-align: right;">AMOUNT</th>
        </tr>
        @php
            $totalWithoutDiscount = 0;
            $totalDiscount = 0;
        @endphp
        @foreach($order->orderDetails as $orderDetail)
            @php
                $product = \App\Models\Product::find($orderDetail->product_id);
                if ($orderDetail->discount_type == 2) {
                    $newDiscount = ($orderDetail->price * ($orderDetail->discount / 100));
                } else {
                    $newDiscount = $orderDetail->discount;
                }
                $totalPrice = $orderDetail->price+$newDiscount;
                $totalWithoutDiscount +=  $totalPrice * $orderDetail->qty;
                $totalDiscount += $newDiscount * $orderDetail->qty;
            @endphp
            <tr>
                <td>{{ $orderDetail->product->name }}</td>
                <td>
                    @if($orderDetail->discount > 0)
                        <del style="color: red">Tk. {{ number_format($orderDetail->price+$newDiscount, 2) }}</del><br>
                    @endif
                    Tk. {{ number_format($orderDetail->price, 2) }}
                </td>
                <td>
                    @php
                        $sizeName = $orderDetail->size->name ?? null;
                        $colorName = $orderDetail->color->name ?? null;
                    @endphp
                    @if($sizeName || $colorName)
                        @if($sizeName) {{ $sizeName }} @endif
                        @if($sizeName && $colorName) / @endif
                        @if($colorName) {{ $colorName }} @endif
                    @else
                        N/A
                    @endif
                </td>
                <td>{{ $orderDetail->qty }}</td>
                <td style="text-align: right;">
                    @if($orderDetail->discount > 0)
                        <del style="color: red">Tk. {{ number_format($totalPrice * $orderDetail->qty, 2) }}</del><br>
                    @endif
                    Tk. {{ number_format($orderDetail->price * $orderDetail->qty, 2) }}
                </td>
            </tr>
        @endforeach
    </table>
    @php
        $grandTotalWithDiscount = $totalWithoutDiscount - $totalDiscount + $order->shipping_cost;
    @endphp
    <div class="invoice-summary">
        <p><strong>Sub Total:</strong> Tk. {{ number_format($totalWithoutDiscount, 2) }}</p>
        <p>Discount: Tk. {{ number_format($totalDiscount, 2) }}</p>
        @if($order->shipping_cost > 0)
            <p>Shipping cost: Tk. {{ number_format($order->shipping_cost, 2) }}</p>
        @else
            <p>Shipping cost: Shipping is free</p>
        @endif
        <hr>
        <p class="grand-total"><strong>Grand Total:</strong> Tk. {{ number_format($grandTotalWithDiscount, 2) }}</p>
    </div>

    <div class="signature">
        <div class="sig-block">
            <p>SIGNATURE</p>
            <div class="line"></div>
            <p>{{$generalSettingView->site_name}}</p>
        </div>
        <div class="sig-block"></div>
    </div>


    @if($order->payment_status == 'paid')
        <div class="total-in-words" style="margin-top: 0 !important;">
            <img src="{{$paidImageSrc}}" alt="{{$generalSettingView->site_name}}" style="height: 100px">
        </div>
    @else
        <div class="total-in-words" style="margin-top: 0 !important;">
            <img src="{{$unpaidImageSrc}}" alt="{{$generalSettingView->site_name}}" style="height: 100px">
        </div>
    @endif
    <div class="total-in-words">
        Total (in words): {{ convert_number($grandTotalWithDiscount) }} Taka Only
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <p><strong>Terms and Conditions:</strong> Payment is due within 15 days. Please make checks payable to {{$generalSettingView->site_name}} Clothing Store.</p>
        <p><strong>Return & Refund Policy:</strong> Returns are accepted within 3 days of purchase. Items must be in original condition with tags attached. Refunds will be issued to the original payment method within 7-10 business days of receiving the returned item.</p>
        <p>If you have any questions, feel free to contact us at <strong>{{$generalSettingView->mobile}}</strong> or <strong>{{$generalSettingView->email}}</strong>.</p>
    </div>
</div>
</body>
</html>
