@extends('layouts.print') 

@section('title') 
    Cetak
@endsection 

@section('content')
<section class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <!-- Dashboard content -->
        <div class="dashboard-content" id="transactionDetails">
            <div class="card">
                <div class="card-body">
                    <div class="container mb-5 mt-3">
                        <div class="row d-flex align-items-baseline">
                            <div class="col-xl-9">
                                <p style="color: #7e8d9f; font-size: 20px">
                                    Invoice >> <strong>ID: #{{ $transaction->code }}</strong>
                                </p>
                            </div>
                            <hr />
                        </div>

                        <div class="container">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <i>
                                        <img src="/images/dashboard-store-logo.svg" alt="" width="50px">
                                    </i>
                                    
                                    <p class="pt-0"> {{ Auth::user()->store_name }}  </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-8">
                                    <ul class="list-unstyled">
                                        <li class="text-muted">
                                            Untuk :
                                            <span style="color: #28a745"
                                                >{{ $transaction->transaction->user->name }}</span
                                            >
                                        </li>
                                        <li class="text-muted">
                                            {{ $transaction->transaction->user->address_one }}, 
                                            {{ App\Models\Regency::find($transaction->transaction->user->regencies_id)->name }}
                                        </li>
                                        <li class="text-muted">
                                            {{ App\Models\Province::find($transaction->transaction->user->provinces_id)->name }}, 
                                            {{ $transaction->transaction->user->country }}
                                        </li>
                                        <li class="text-muted">
                                            <i class="fas fa-phone"></i>
                                            {{ $transaction->transaction->user->phone_number }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xl-4">
                                    <p class="text-muted">Invoice</p>
                                    <ul class="list-unstyled">
                                        <li class="text-muted">
                                            <i
                                                class="fas fa-circle"
                                                style="color: #28a745"
                                            ></i>
                                            <span class="fw-bold">ID:</span
                                            >#123-456
                                        </li>
                                        <li class="text-muted">
                                            <i
                                                class="fas fa-circle"
                                                style="color: #28a745"
                                            ></i>
                                            <span class="fw-bold">Creation Date: </span>
                                            {{ $transaction->created_at->format('Y-m-d') }}
                                        </li>
                                        <li class="text-muted">
                                            <i
                                                class="fas fa-circle"
                                                style="color: #28a745"
                                            ></i>
                                            <span class="me-1 fw-bold"
                                                >Status:</span
                                            ><span
                                                class="badge  text-black fw-bold"
                                            >

                                            @if ($transaction->transaction->transaction_status == 'SUCCESS')
                                                <div class="text-success">
                                                    {{ $transaction->transaction->transaction_status }}
                                                </div>  
                                            @elseif ($transaction->transaction->transaction_status == 'PENDING')
                                                <div class=" text-warning">
                                                    {{ $transaction->transaction->transaction_status }}
                                                </div>
                                            @else
                                                <div class="text-danger">
                                                    {{ $transaction->transaction->transaction_status }}
                                                </div>
                                            @endif
                                                
                                            </span
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="row my-2 mx-1 justify-content-center">
                                <table
                                    class="table table-striped table-borderless"
                                >
                                    <thead
                                        style="background-color: #28a745"
                                        class="text-white"
                                    >
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Produk</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>{{ $transaction->product->name }}</td>
                                            <td>1</td>
                                            <td>Rp {{ number_format($transaction->product->price) }}</td>
                                            <td>Rp {{ number_format($transaction->transaction->total_price)  }}</td>
                                        </tr>
                                        {{-- <tr>
                                            <th scope="row">2</th>
                                            <td>Web hosting</td>
                                            <td>1</td>
                                            <td>$10</td>
                                            <td>$10</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Consulting</td>
                                            <td>1 year</td>
                                            <td>$300</td>
                                            <td>$300</td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-xl-8">
                                    <p class="ms-3">
                                        Tambahkan catatan tambahan dan informasi pembayaran
                                    </p>
                                </div>
                                <div class="col-xl-3">
                                    <ul class="list-unstyled">
                                        <li class="text-muted ms-3">
                                            <span class="text-black me-4"
                                                >SubTotal </span
                                            >Rp {{ number_format($transaction->transaction->total_price)  }}
                                        </li>
                                        <li class="text-muted ms-3 mt-2">
                                            <span class="text-black me-4"
                                                >Pajak(0%)</span
                                            >Rp {{ number_format($transaction->transaction->total_price)  }}
                                        </li>
                                    </ul>
                                    <p class="text-black float-start">
                                        <span class="text-black me-3">
                                            Total Pembayaran </span
                                        ><span style="text-black font-size: 25px"
                                            >Rp {{ number_format($transaction->transaction->total_price)  }}</span
                                        >
                                    </p>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-xl-10">
                                    <p>Terima kasih atas pembelian Anda</p>
                                </div>
                                {{-- <div class="col-xl-2">
                                    <button
                                        type="button"
                                        class="btn btn-primary text-capitalize"
                                        style="background-color: #28a745"
                                    >
                                        Pay Now
                                    </button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 

@push('addon-script')
<script src="https://kit.fontawesome.com/a659457a61.js" crossorigin="anonymous"></script>
<script type="text/javascript">
    window.print();
</script>
@endpush

