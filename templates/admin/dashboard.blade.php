@extends('admin.layout.layout')

@section('page-title')

    <h1>Dashboard</h1>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
        </ol>
    </nav>

@endsection

@section('admin')

    <stats-component></stats-component>

@endsection
