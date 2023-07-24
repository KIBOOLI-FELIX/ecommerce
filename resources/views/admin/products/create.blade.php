@extends('layouts.admin')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3>
                Add Product
                <a href='{{ url('admin/products') }}'
                    class='btn btn-danger btn-sm text-white float-end'>Back</a>
            </h3>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-warning">
                    @foreach($errors->all() as $error )
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <form action='{{ url('admin/products') }}' method='POST' enctype="multipart/form-data">
                @csrf
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">
                            Home
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">
                            SEO Tags
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#contact"
                            type="button" role="tab" aria-controls="contact" aria-selected="false">
                            Details
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image"
                            type="button" role="tab" aria-controls="contact" aria-selected="false">
                            Product Image
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade border p-3 show active" id="home" role="tabpanel"
                        aria-labelledby="home-tab">
                        <div class="mb-3">
                            <label>Category</label>
                            <select name='category_id' class='form-select'>
                                @foreach( $categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Product Name</label>
                            <input type='text' name='name' value="{{old('name')}}" class='form-control' />
                        </div>
                        <div class="mb-3">
                            <label>Product Slug</label>
                            <input type='text' name='slug' value="{{old('slug')}}" class='form-control' />
                        </div>
                        <div class="mb-3">
                            <label>Select Brand</label>
                            <select name='brand' class='form-select'>
                                @foreach( $brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Small Description (500 words)</label>
                            <textarea name='small_description' class='form-control' rows='4'>{{old('small_description')}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>Description (500 words)</label>
                            <textarea name='description' class='form-control' rows='4'>{{old('description')}}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade border p-3" id="profile" role="tabpanel" aria-labelledby="seotag-tab">
                        <div class="mb-3">
                            <label>Meta Title</label>
                            <input type='text' name='meta_title' value="{{old('meta_title')}}" class='form-control' />
                        </div>
                        <div class="mb-3">
                            <label>Meta Description </label>
                            <textarea name='meta_description' class='form-control' rows='4'> {{old('meta_description')}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>Meta Keyword </label>
                            <textarea name='meta_keyword' class='form-control' rows='4'>{{old('meta_keyword')}}</textarea>
                        </div>

                    </div>
                    <div class="tab-pane fade border p-3" id="contact" role="tabpanel" aria-labelledby="details-tab">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Original Price</label>
                                    <input type='number' name='original_price' value="{{old('original_price')}}" class='form-control' />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Selling Price</label>
                                    <input type='number' name='selling_price'  value="{{old('selling_price')}}" class='form-control' />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Quantity</label>
                                    <input type='number' name='quantity' value="{{old('quantity')}}" class='form-control' />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Trending</label>
                                    <input type='checkbox' name='trending' style='height:50px;width:50px'
                                        class='form-check' />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Status</label>
                                    <input type='checkbox' name='status' style='height:50px;width:50px' class='form-check' />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade border p-3" id="image" role="tabpanel" aria-labelledby="image-tab">
                        <div class="mb-3">
                            <label>Upload Product Images</label>
                            <input type='file' name='image[]' multiple class="form-control" />
                        </div>
                    </div>
                    <div>
                        <button type='submit' class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
