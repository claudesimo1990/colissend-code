<?php

/**
 * @package App\Repository
 * @author Claude Simo <claudesimo1990@gmail.com>
 * @copyright COLISSEND GMBH
 * @license proprietary
 */

namespace App\Repository;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;

class PaymentRepository
{
    /** @var Payment */
    private Payment $payment;
    private Order $order;

    /**
     * @param Payment $payment
     * @param Order $order
     */
    public function __construct(Payment $payment, Order $order)
    {
        $this->payment = $payment;
        $this->order = $order;
    }

    /**
     * @return mixed
     */
    public function all(): mixed
    {
        return $this->payment->latest()->paginate(1);
    }

    public function create($response, Order $order): Model
    {
        $shipping = $response['purchase_units'][0]['shipping'];
        $payer = $response["payer"];
        $payments = $response['purchase_units'][0]['payments']['captures'][0];

        $data = [
            'payment_method' => 'PAYPAL',
            'amount' => $payments['seller_receivable_breakdown']['gross_amount']['value'],
            'taxe' => (($payments['seller_receivable_breakdown']['gross_amount']['value']) - ($payments['seller_receivable_breakdown']['net_amount']['value'])),
            'net_amount' => $payments['seller_receivable_breakdown']['net_amount']['value'],
            'client_email' => $payer["email_address"],
            'full_name' => $shipping['name']['full_name'],
            'street' => $shipping['address']['address_line_1'],
            'city' => $shipping['address']['admin_area_2'],
            'postal_code' => $shipping['address']['postal_code'],
            'country_code' => $shipping['address']['country_code'],
            'currency_code' => $payments['amount']['currency_code'],
        ];

        return $order->payments()->create($data);

    }

}
