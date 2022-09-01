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

    public function create($response, Order $order)
    {
        $shipping = $response['purchase_units'][0]['shipping'];
        $payer = $response["payer"];
        $payments = $response['purchase_units'][0]['payments']['captures'][0];

        $data = [
            'paymentable_id' => $order->id,
            'payment_method' => 'PAYPAL',
            'amount' => $payments['seller_receivable_breakdown']['gross_amount']['value'],
            'taxe' => 2000,
            'net_amount' => $payments['seller_receivable_breakdown']['net_amount']['value'],
            'client_email' => $payer["email_address"],
            'full_name' => $shipping['name']['full_name'],
            'street' => $shipping['address']['address_line_1'],
            'city' => $shipping['address']['admin_area_2'],
            'postal_code' => $shipping['address']['postal_code'],
            'country_code' => $shipping['address']['country_code'],
            'currency_code' => $payments['amount']['currency_code'],
        ];

        return $this->order->payments()->create($data);

    }

}
