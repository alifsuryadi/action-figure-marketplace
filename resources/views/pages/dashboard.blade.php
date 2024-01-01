@extends('layouts.dashboard') 

@section('title') 
    Store Dashboard 
@endsection


@section('content')
<section class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Dashboard</h2>
            <p class="dashboard-subtitle">Look what you have made today!</p>
        </div>
        <!-- Dashboard content -->
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Customer</div>
                            <div class="dashboard-card-subtitle">{{ number_format($costumer) }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Revenue</div>
                            <div class="dashboard-card-subtitle">${{ number_format($revenue) }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Transaction</div>
                            <div class="dashboard-card-subtitle">
                                {{ number_format($transaction_count) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent transactions -->
            <div class="row mt-3">
                <div class="col-12 mt-2">
                    <h5 class="mb-3">Recent Transactions</h5>

                    @foreach ($transaction_data as $transaction)
                    <a
                        href="{{ route('dashboard-transaction-details', $transaction->id) }}"
                        class="card card-list d-block"
                    >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    {{-- ?? kosongkan jika tidak ada --}}
                                    <img
                                        src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                                        alt="Image {{ $transaction->product->name ?? '' }}"
                                        class="w-50"
                                    />
                                </div>
                                <div class="col-md-4">{{ $transaction->product->name ?? '' }}</div>
                                <div class="col-md-3">{{ $transaction->transaction->user->name ?? '' }}</div>
                                <div class="col-md-3">{{ $transaction->created_at ?? '' }}</div>
                                <div class="col-md-1 d-none d-md-block">
                                    <img
                                        src="/images/dashboard/dashboard-arrow-right.svg"
                                        alt="arrow right"
                                    />
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
