@extends('admin.layout.layout')

@section('page-title')

    <h1>Travels</h1>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Posts</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.transactions.index') }}">transactions</a></li>
        </ol>
    </nav>

@endsection

@section('admin')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-uppercase">Toutes les transactions</h5>
                        <table class="table datatable">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">payment_id</th>
                                <th scope="col">somme</th>
                                <th scope="col">TVA</th>
                                <th scope="col">NAP</th>
                                <th scope="col">Nom complet</th>
                                <th scope="col">Monnaie</th>
                                <th scope="col">Date de payment</th>
                                <th scope="col">actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as $transaction)
                                <tr class="text-center">
                                    <td class="text-start">{{ $transaction->payment_id }}</td>
                                    <td class="text-start">{{ $transaction->amount }}</td>
                                    <td class="text-start">{{ $transaction->paypal_fee }}</td>
                                    <td class="text-start">{{ $transaction->net_amount }}</td>
                                    <td class="text-start">{{ $transaction->full_name }}</td>
                                    <td class="text-start">{{ $transaction->currency_code }}</td>
                                    <td class="text-start">{{ formatDate($transaction->created_at) }}</td>
                                    <td class="d-flex justify-content-between">
                                        <a type="button" class="btn btn-info text-white rounded-pill">details</a>
                                        <a type="button" href="#" class="btn btn-success rounded-pill text-white">payer</a>
                                        <a type="button" href="#" class="btn btn-primary rounded-pill text-white">voir le post</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $transactions->links('pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
