@extends('layouts.admin') 

@section('title') 
    Transaction
@endsection

@section('content')
<section class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Transaction</h2>
            <p class="dashboard-subtitle">
                Edit Transaction
            </p>
        </div>
        <!-- Dashboard content -->
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">

                    {{-- Error handling --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            
                            {{-- Multipart = supaya bisa upload data --}}
                            <form action="{{ route('transaction.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                {{-- Aktifkan form dengan csrf--}}
                                <div class="row">

                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Transaction Status</label>
                                            <select name="transaction_status" class="form-control" required>
                                                <option value="{{ $item->transaction_status }}"  selected>{{ $item->transaction_status  }}</option>
                                                <option value="" disabled>----------------</option>
                                                <option value="SUCCESS">SUCCESS</option>
                                                <option value="PENDING">PENDING</option>
                                                <option value="CANCELLED">CANCELLED</option>
                                                

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Total Price</label>
                                            <input type="number" name="total_price" class="form-control" required value="{{ $item->total_price }}" >
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5 mt-2">
                                            Save Now
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.20.0/basic/ckeditor.js"></script>
    <script>
    CKEDITOR.replace("editor");
    </script>
@endpush