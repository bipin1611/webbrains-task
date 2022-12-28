@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Customer Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1> Hello {{ \Auth::guard('customer')->user()->full_name }}</h1>
                    {{ __('You are logged in as Customer!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
