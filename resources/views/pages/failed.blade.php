@extends('layouts.success')

@section('title')
    Store Failed Page
@endsection

@section('content')
    <div class="page-content page-success">
        <section class="section-success" data-aos="zoom-in">
        <div class="container">
            <div class="row align-items-center row-login justify-content-center">
            <div class="col-lg-6 text-center">
                <img src="/images/success.svg" class="mb-4" alt="" />
                <h2 class="text-danger font-weight-bold">Transaksi Failed!</h2>
                <p>
                Silahkan memilih produk yang mau di beli terlebih dahulu, agar bisa kami proses secepat mungkin!
                </p>
                <div>
                <a href="/" class="btn btn-success w-50 mt-4"
                    >Pergi Belanja</a
                >
                <a href="/dashboard" class="btn btn-signup w-50 mt-2"
                    >Dashboard Saya</a
                >
                </div>
            </div>
            </div>
        </div>
        </section>
    </div>
@endsection