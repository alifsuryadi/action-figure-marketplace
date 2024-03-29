@extends('layouts.app') 

@section('title') 
    Halaman Detail Produk
@endsection


@section('content')
<div class="page-content page-details">
    <!-- breadcrumb -->
    <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
    >
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/index.html">Beranda</a>
                        </li>
                        <li class="breadcrumb-item active">Detail Produk</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- gallery -->
    <section class="store-gallery mb-3" id="gallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 images-thumbnail" data-aos="zoom-in">
                    <transition name="slide-fade" mode="out-in">
                        <!-- :src = variable di vue -->
                        <img
                            :src="photos[activePhoto].url"
                            :key="photos[activePhoto].id"
                            class="main-image"
                            alt=""
                        />
                    </transition>
                </div>
                <div class="col-lg-2">
                    <div class="row">
                        <div
                            class="col-3 col-lg-12 mt-2 mt-lg-0"
                            v-for="(photo, index) in photos"
                            :key="photo.id"
                            data-aos="zoom-in"
                            data-aos-delay="100"
                        >
                            <a href="#" @click="changeActive(index)">
                                <img
                                    :src="photo.url"
                                    class="w-100 thumbnail-image"
                                    style="max-height: 200px"
                                    :class="{active : index == activePhoto}"
                                    alt=""
                                />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- details -->
    <div class="store-details-container" data-aos="fade-up">
        <section class="store-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h1>{{ $product->name }}</h1>
                        <div class="owner">Toko :  {{ $product->user->store_name }}</div>
                        <div class="price">Rp {{ number_format($product->price) }}</div>
                    </div>
                    <div class="col-lg-2" data-aos="zoom-in">

                        @auth
                        <form action="{{ route('detail-add', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <button
                                type="submit"
                                class="btn btn-success btn-block text-white px-4 mb-3"
                                >Tambah ke keranjang
                            </button>        
                        </form>                   

                        @else
                        <a
                            href="{{ route('login') }}"
                            class="btn btn-success btn-block text-white px-4 mb-3"
                            >Masuk untuk belanja</a
                        >
                        @endauth

                    </div>
                </div>
            </div>
        </section>

        <section class="store-description">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        {!! $product->description !!}
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonial -->
        <section class="store-review">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8 mt-3 mb-3">
                        <h4>Ulasan Pelanggan (3)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <ul class="list-unstyled">
                            <li class="media">
                                <img
                                    src="/images/testimoni/icons-testinomial-1.png"
                                    class="rounded-circle mr-3"
                                    alt=""
                                />
                                <div class="media-body">
                                    <h5 class="mt-2 mb-1">Hazza Risky</h5>
                                    <p>
                                        Setelah membeli action figure ini, saya sangat senang dengan 
                                        memutuskan membelinya. Terlepas dari awalnya saya meragukan kesesuaian 
                                        dengan harga yang cukup mahal bagi saya.
                                    </p>
                                </div>
                            </li>
                            <li class="media">
                                <img
                                    src="/images/testimoni/icons-testinomial-2.png"
                                    class="rounded-circle mr-3"
                                    alt=""
                                />
                                <div class="media-body">
                                    <h5 class="mt-2 mb-1">Anna Sukkirata</h5>
                                    <p>
                                        Kualitas action figure ini luar biasa. 
                                        Detailnya halus, dan bahan yang digunakan terasa tahan lama. 
                                        Saya terkesan dengan kualitas pembuatan yang terlihat dari setiap aspek action figure. 
                                    </p>
                                </div>
                            </li>
                            <li class="media">
                                <img
                                    src="/images/testimoni/icons-testinomial-3.png"
                                    class="rounded-circle mr-3"
                                    alt=""
                                />
                                <div class="media-body">
                                    <h5 class="mt-2 mb-1">Dakimu Wangi</h5>
                                    <p>
                                        Saya perlu menambahkan bahwa interaksi dengan 
                                        customer service dari "{{ $product->user->store_name }}" sangat memuaskan. 
                                        Mereka responsif terhadap pertanyaan saya dan memberikan 
                                        informasi yang diperlukan dengan jelas. Pelayanan pelanggan 
                                        yang baik membuat pengalaman berbelanja semakin menyenangkan.
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection 

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
        var gallery = new Vue({
            el: "#gallery",
            mounted() {
                AOS.init();
            },
            data: {
                activePhoto: 0,
                photos: [
                    @foreach ($product->galleries as $gallery )
                    {
                        id: {{ $gallery->id }},
                        url: "{{ Storage::url($gallery->photos) }}",
                    },
                    @endforeach
                ],
            },
            methods: {
                changeActive(id) {
                    this.activePhoto = id;
                },
            },
        });
    </script>
@endpush
