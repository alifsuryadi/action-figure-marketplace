@extends('layouts.app') 

@section('title') 
    Store Cart Page 
@endsection


@section('content')
<div class="page-content page-cart">
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
                            <a href="/index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Table -->
    <section class="store-cart">
        <div class="container">
            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-12 table-responsive">
                    <table class="table table-borderless table-cart">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name &amp; Seller</th>
                                <th>Price</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                                $totalPrice = 0;
                            @endphp

                            @foreach ($carts as $cart )

                            <tr>
                                <td style="width: 20%">

                                    @if ($cart->product->galleries)
                                    <img
                                        src="{{ Storage::url($cart->product->galleries->first()->photos) }}"
                                        class="cart-image"
                                        alt="Image {{ $cart->product->slug }}"
                                    />
                                    @endif

                                </td>
                                <td style="width: 35%">
                                    <div class="product-title">
                                        {{ $cart->product->name }}
                                    </div>
                                    <div class="product-subtitle">
                                        by {{ $cart->product->user->store_name }}
                                    </div>
                                </td>
                                <td style="width: 35%">
                                    <div class="product-title">${{ number_format($cart->product->price)  }}</div>
                                    <div class="product-subtitle">USD</div>
                                </td>
                                <td style="width: 20%">
                                    <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-remove-cart">
                                            Remove
                                        </button>
                                    </form>

                                </td>
                            </tr>    

                            @php
                                $totalPrice += $cart->product->price;
                            @endphp
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Garis -->
            <div class="row" data-aos="fade-up" data-aos-delay="150">
                <div class="col-12">
                    <hr />
                </div>
                <div class="col-12">
                    <h2 class="mb-4">Shipping Details</h2>
                </div>
            </div>


            <!-- Shipping details -->
            <form action="{{ route('checkout') }}" id="locations"  enctype="multipart/form-data" method="POST">
            @csrf
                {{-- Tampung total price --}}
                <input type="hidden" name="total_price" value="{{ $totalPrice }}">

                <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address_one">Addres 1</label>
                            <input
                                type="text"
                                class="form-control"
                                id="address_one"
                                name="address_one"
                                placeholder="Exp: Jln. Sudirman"
                                value="{{ $user->address_one }}"
                            />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address_two">Addres 2</label>
                            <input
                                type="text"
                                class="form-control"
                                id="address_two"
                                name="address_two"
                                placeholder="Exp: Blok B2 No. 34"
                                value="{{ $user->address_two }}"
                            />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="provinces_id">Province</label>

                            {{-- jika data ada --}}
                            <select
                                name="provinces_id"
                                id="provinces_id"
                                class="form-control"
                                v-if="provinces"
                                v-model="provinces_id"
                            >
                                <option value="" disabled>-- Select Province --</option>
                                {{-- @{{  }} = pake @ untuk membedakan variable vue dan blade --}}
                                <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>  
                            </select>

                            {{-- JIka tidak ada data --}}
                            <select v-else class="form-control">
                                <option value="" disabled>-- Select Province --</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="regencies_id">City</label>
                            {{-- jika data ada --}}
                            <select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies" v-model="regencies_id">
                                <option value="" disabled>-- Select City --</option>
                                <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option> 
                            </select>

                            {{-- JIka tidak ada data --}}
                            <select v-else class="form-control">
                                <option value="" disabled>-- Select City --</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="zip_code">Postal Code</label>
                            <input
                                type="number"
                                class="form-control"
                                id="zip_code"
                                name="zip_code"
                                placeholder="Exp: 123999"
                                value="{{ $user->zip_code }}"
                            />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input
                                type="text"
                                class="form-control"
                                id="country"
                                name="country"
                                placeholder="Exp: Indonesia"
                                value="{{ $user->country }}"
                            />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number">Mobile</label>
                            <input
                                type="tel"
                                class="form-control"
                                id="phone_number"
                                name="phone_number"
                                placeholder="Exp: +628 2020 1111"
                                value="{{ $user->phone_number }}"
                            />
                        </div>
                    </div>
                </div>

                <!-- Garis -->
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12">
                        <h2 class="mb-2">Payment Informations</h2>
                    </div>
                </div>

                <!-- Payment informations -->
                <div class="row" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-4 col-md-2">
                        <div class="product-title">$0</div>
                        <div class="product-subtitle">Country Tax</div>
                    </div>
                    <div class="col-4 col-md-3">
                        <div class="product-title">$0</div>
                        <div class="product-subtitle">Product Insurance</div>
                    </div>
                    <div class="col-4 col-md-2">
                        <div class="product-title">$0</div>
                        <div class="product-subtitle">Ship to your location</div>
                    </div>
                    <div class="col-4 col-md-2">
                        <div class="product-title text-success">${{ number_format($totalPrice)}}</div>
                        <div class="product-subtitle">Total</div>
                    </div>
                    <div class="col-8 col-md-3">
                        <button
                            type="submit"
                            class="btn btn-success mt-4 px-4 btn-block"
                            >
                            Checkout Now
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection


@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var locations = new Vue({
            el: "#locations",
            mounted() {
                AOS.init();
                this.getProvincesData();
            },
            data: {
                provinces : null,
                regencies : null,
                provinces_id : null,
                regencies_id : null
            },
            methods: {
                getProvincesData(){
                    var self = this;
                    axios.get('{{ route('api-provinces') }}')
                        .then(function (response) {
                            self.provinces = response.data;
                        })
                },

                getRegenciesData(){
                    var self = this;
                    axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
                        .then(function (response) {
                            self.regencies = response.data;
                        })
                },
            },

            watch : {
                provinces_id : function (val, oldVal){
                    this.regencies_id = null;
                    this.getRegenciesData();
                }
            }
        });
    </script>
@endpush
