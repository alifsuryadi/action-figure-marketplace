@extends('layouts.dashboard') 

@section('title') 
    Store Dashboard Product Details
@endsection 

@section('content')
<section class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Shirup Marzan</h2>
            <p class="dashboard-subtitle">Product Details</p>
        </div>
        <!-- Dashboard content -->
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">


                    {{-- Error handling --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error  )
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('dashboard-product-update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input
                                                type="text"
                                                name="name"
                                                class="form-control"
                                                value="{{ $product->name }}"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input
                                                type="number"
                                                name="price"
                                                class="form-control"
                                                value="{{ $product->price }}"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select
                                                name="categories_id"
                                                class="form-control"
                                            >
                                                <option value="" disabled>-- Select Categories --</option>
                                                <option value="{{ $product->categories_id }}" selected>Tidak diganti ({{ $product->category->name }})</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea
                                                name="description"
                                                id="editor"
                                                class="form-control"
                                            >{!! $product->description !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button
                                            type="submit"
                                            class="btn btn-success px-5 btn-block"
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
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">


                                @foreach ($product->galleries as $gallery)

                                <div class="col-md-4 mb-4">
                                    <div class="gallery-container">
                                        <img
                                            src="{{ Storage::url($gallery->photos ?? '') }}"
                                            alt="{{ $gallery->product->name }}"
                                            class="w-100"
                                        />
                                        <a href="{{ route('dashboard-product-gallery-delete', $gallery->id) }}" class="delete-gallery">
                                            <img
                                                src="/images/dashboard/icon-delete.svg"
                                                alt=""
                                            />
                                        </a>
                                    </div>
                                </div>

                                @endforeach

                                <div class="col-12">

                                    <form action="{{ route('dashboard-product-gallery-upload') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="products_id" value="{{ $product->id }}">

                                        {{-- Onchange = auto submit / upload --}}
                                        <input
                                            type="file"
                                            name="photos"
                                            id="file"
                                            style="display: none"
                                            onchange="form.submit()"
                                        />

                                        <button
                                            type="button"
                                            class="btn btn-secondary btn-block mt-2"
                                            onclick="thisFileUpload()"
                                        >
                                            Add Photo
                                        </button>
                                    </form>
                                </div>
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
<script src="https://cdn.ckeditor.com/4.20.0/basic/ckeditor.js"></script>
<script>
    function thisFileUpload() {
        $("#file").click();
    }
</script>
<script>
    CKEDITOR.replace("editor");
</script>
@endpush
