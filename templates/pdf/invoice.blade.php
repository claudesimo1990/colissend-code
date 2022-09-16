<!DOCTYPE html>
<html>
<head>
    <title>Shop-Colissend</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;
    }
    .w-85{
        width:85%;
    }
    .w-15{
        width:15%;
    }
    .logo{
        font-size: 30px;
        font-weight: bold;
        padding-top:30px;
        color: green;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
</style>
<body>
<div class="head-title">
    <h1 class="text-center m-0 p-0"><span class="logo">COLISSEND - </span>Votre facture</h1>
</div>
<div class="add-detail mt-10">
    <div class="w-50 float-left mt-10">
        <p class="m-0 pt-5 text-bold w-100">N° de facture - <span class="gray-color">#{{ $details['invoice_number'] }}</span></p>
        <p class="m-0 pt-5 text-bold w-100">N° de commande - <span class="gray-color">{{ $details['order_number'] }}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Date de la commande - <span class="gray-color">{{ $details['order_date'] }}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Date de livraison - <span class="gray-color">{{ $details['shipped_date'] }}</span></p>
    </div>
    <div class="w-50 float-left logo mt-10">

    </div>
    <div style="clear: both;"></div>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Colissend</th>
            <th class="w-50">Adresse de livraison</th>
        </tr>
        <tr>
            <td>
                <div class="box-text">
                    <p>Herreshagener Straße 6</p>
                    <p>51643 Gummersbach</p>
                    <p>team@colissend.com</p>
                    <p>Contact : 015752804191</p>
                </div>
            </td>
            <td>
                <div class="box-text">
                    <p>{{ $details['name'] }}</p>
                    <p>{{ $details['street'] }}</p>
                    <p>{{ $details['city'] }}</p>
                    <p>{{ $details['email'] }}</p>
                    <p>Contact : {{ $details['phone'] }}</p>
                </div>
            </td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Methode de Payment</th>
            <th class="w-50">Methode livraison</th>
        </tr>
        <tr>
            <td>PAYPAL</td>
            <td>GRATUITE</td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Product Name</th>
            <th class="w-50">Price</th>
            <th class="w-50">Qty</th>
            <th class="w-50">Total</th>
        </tr>
        @foreach($details['products'] as $product)

            <tr align="center">
                <td>{{ $product->name }}</td>
                <td>{{ $product->formatted_price }}</td>
                <td>{{ $product->pivot->quantity }}</td>
                <td>{{ (($product->pivot->price/100) * $product->pivot->quantity) . '€' }}</td>
            </tr>

        @endforeach
        <tr>
            <td colspan="7">
                <div class="total-part">
                    <div class="total-left w-85 float-left" align="right">
                        <p>Total Hors Taxe</p>
                        <p>Tax (18%)</p>
                        <p>Total a Payer</p>
                    </div>
                    <div class="total-right w-15 float-left text-bold" align="right">
                        <p>{{ $details['total']['subTotal'] }} &euro;</p>
                        <p>0 &euro;</p>
                        <p>{{ $details['total']['total'] }} &euro; &euro;</p>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </td>
        </tr>
    </table>
</div>
</html>
