@extends('layouts.dashboard') @section('title') Account Settings @endsection
@section('content')
<section class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">My Account</h2>
            <p class="dashboard-subtitle">Update your current profile</p>
        </div>
        <!-- Dashboard content -->
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">

                    <form action="{{ route('dashboard-settings-redirect', 'dashboard-settings-account') }}" id="locations"  enctype="multipart/form-data" method="POST">
                        @csrf

                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Your Name</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="name"
                                                name="name"
                                                value="{{ $user->name }}"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email"
                                                >Your Email</label
                                            >
                                            <input
                                                type="email"
                                                class="form-control"
                                                id="email"
                                                name="email"
                                                value="{{ $user->email }}"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address_one"
                                                >Addres 1</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="address_one"
                                                name="address_one"
                                                value="{{ $user->address_one }}"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address_two"
                                                >Addres 2</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="address_two"
                                                name="address_two"
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
                                            <label for="zip_code"
                                                >Postal Code</label
                                            >
                                            <input
                                                type="number"
                                                class="form-control"
                                                id="zip_code"
                                                name="zip_code"
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
                                                value="{{ $user->phone_number }}"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button
                                            type="submit"
                                            class="btn btn-success px-5"
                                        >
                                            Save Now
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
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
