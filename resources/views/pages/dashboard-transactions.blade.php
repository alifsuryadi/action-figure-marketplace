@extends('layouts.dashboard') 

@section('title') 
    Store Dashboard Transaction
@endsection 

@section('content')
<section class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Transactions</h2>
            <p class="dashboard-subtitle">
                Big result start from the small one
            </p>
        </div>
        <!-- Dashboard content -->
        <div class="dashboard-content">
            <!-- Sell & Buy Products -->
            <div class="row mt-3">
                <div class="col-12 mt-2">
                    <ul
                        class="nav nav-pills mb-3"
                        id="pills-tab"
                        role="tablist"
                    >
                        <li class="nav-item" role="presentation">
                            <a
                                class="nav-link active"
                                id="pills-home-tab"
                                data-toggle="pill"
                                href="#pills-home"
                                role="tab"
                                aria-controls="pills-home"
                                aria-selected="true"
                                >Sell Product</a
                            >
                        </li>
                        <li class="nav-item" role="presentation">
                            <a
                                class="nav-link"
                                id="pills-profile-tab"
                                data-toggle="pill"
                                href="#pills-profile"
                                role="tab"
                                aria-controls="pills-profile"
                                aria-selected="false"
                                >Buy Product</a
                            >
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div
                            class="tab-pane fade show active"
                            id="pills-home"
                            role="tabpanel"
                            aria-labelledby="pills-home-tab"
                        >

                        @foreach ($sellTransactions as $transaction)
                        <a
                            href="{{ route('dashboard-transaction-details', $transaction->id) }}"
                            class="card card-list d-block"
                            >
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img
                                            src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                                            alt="Image {{ $transaction->product->name }}"
                                            class="w-50"
                                        />
                                    </div>
                                    <div class="col-md-4">
                                        {{ $transaction->product->name }}
                                    </div>
                                    <div class="col-md-3">{{ $transaction->product->store_name }}</div>
                                    <div class="col-md-3">
                                        {{ $transaction->created_at }}
                                    </div>
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
                        <div
                            class="tab-pane fade"
                            id="pills-profile"
                            role="tabpanel"
                            aria-labelledby="pills-profile-tab"
                        >
                            @foreach ($buyTransactions as $transaction)
                            <a
                                href="{{ route('dashboard-transaction-details', $transaction->id) }}"
                                class="card card-list d-block"
                                >
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <img
                                                src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                                                alt="Image {{ $transaction->product->name }}"
                                                class="w-50"
                                            />
                                        </div>
                                        <div class="col-md-4">
                                            {{ $transaction->product->name }}
                                        </div>
                                        <div class="col-md-3">{{ $transaction->product->store_name }}</div>
                                        <div class="col-md-3">
                                            {{ $transaction->created_at }}
                                        </div>
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
        </div>
    </div>
</section>
@endsection
