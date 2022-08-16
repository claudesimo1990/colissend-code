<?php

/**
 * @package App\Repository
 * @author Claude Simo <claudesimo1990@gmail.com>
 * @copyright COLISSEND GMBH
 * @license proprietary
 */

namespace App\Repository;

use App\Models\Reservation;
use App\Models\Transaction;

class TransactionRepository
{
    /**
     * @var Transaction
     */
    private Transaction $transaction;

    /**
     * @param Transaction $transaction
     */
    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * @return mixed
     */
    public function all(): mixed
    {
        return $this->transaction->latest()->paginate(1);
    }

    public function create($response, $reservation)
    {
        $shipping = $response['purchase_units'][0]['shipping'];
        $payer = $response["payer"];
        $payments = $response['purchase_units'][0]['payments']['captures'][0];

        $data = [
            'reservations_id' => $reservation->id,
            'payment_id' => $payments['id'],
            'payment_method' => 'PAYPAL',
            'amount' => $payments['seller_receivable_breakdown']['gross_amount']['value'],
            'paypal_fee' => $payments['seller_receivable_breakdown']['paypal_fee']['value'],
            'net_amount' => $payments['seller_receivable_breakdown']['net_amount']['value'],
            'paypal_client_email' => $payer["email_address"],
            'full_name' => $shipping['name']['full_name'],
            'street' => $shipping['address']['address_line_1'],
            'city' => $shipping['address']['admin_area_2'],
            'postal_code' => $shipping['address']['postal_code'],
            'country_code' => $shipping['address']['country_code'],
            'currency_code' => $payments['amount']['currency_code'],
        ];

        return $this->transaction->create($data);

    }

}
