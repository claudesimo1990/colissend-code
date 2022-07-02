<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\TransactionRepository;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * @var TransactionRepository
     */
    private $transactionRepository;

    /**
     * @param TransactionRepository $transactionRepository
     */
    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function index()
    {
        $transactions = $this->transactionRepository->all();

        return view('admin.transactions.index', [
            'transactions' => $transactions
        ]);
    }
}
