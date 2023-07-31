@extends('layouts.admin')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3>
                Edit Product
                <a href='{{ url('admin/products') }}'
                    class='btn btn-danger btn-sm text-white float-end'>Back</a>
            </h3>
        </div>
        <div class="card-body">
            <div class="message">
                @if(session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
            </div>
            @if($errors->any())
                <div class="alert alert-warning">
                    @foreach($errors->all() as $error )
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <form action='{{ url('admin/products/'.$product->id) }}' method='POST'
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color"
                            type="button" role="tab" aria-controls="contact" aria-selected="false">
                            Product Colors
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
                                    <option value="{{ $category->id }}"
                                        {{ $category->id==$product->category_id ?'selected':'' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Product Name</label>
                            <input type='text' name='name' value="{{ $product->name }}" class='form-control' />
                        </div>
                        <div class="mb-3">
                            <label>Product Slug</label>
                            <input type='text' name='slug' value="{{ $product->slug }}" class='form-control' />
                        </div>
                        <div class="mb-3">
                            <label>Select Brand</label>
                            <select name='brand' class='form-select'>
                                @foreach( $brands as $brand)
                                    <option value="{{ $brand->id }}"
                                        {{ $brand->name==$product->brand ?'selected':'' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Small Description (500 words)</label>
                            <textarea name='small_description' class='form-control'
                                rows='4'>{{ $product->small_description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>Description (500 words)</label>
                            <textarea name='description' class='form-control'
                                rows='4'>{{ $product->description }}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade border p-3" id="profile" role="tabpanel" aria-labelledby="seotag-tab">
                        <div class="mb-3">
                            <label>Meta Title</label>
                            <input type='text' name='meta_title' value="{{ $product->meta_title }}"
                                class='form-control' />
                        </div>
                        <div class="mb-3">
                            <label>Meta Description </label>
                            <textarea name='meta_description' class='form-control'
                                rows='4'> {{ $product->meta_description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>Meta Keyword </label>
                            <textarea name='meta_keyword' class='form-control'
                                rows='4'>{{ $product->meta_keyword }}</textarea>
                        </div>

                    </div>
                    <div class="tab-pane fade border p-3" id="contact" role="tabpanel" aria-labelledby="details-tab">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Original Price</label>
                                    <input type='number' name='original_price' value="{{ $product->original_price }}"
                                        class='form-control' />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Selling Price</label>
                                    <input type='number' name='selling_price' value="{{ $product->selling_price }}"
                                        class='form-control' />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Quantity</label>
                                    <input type='number' name='quantity' value="{{ $product->quantity }}"
                                        class='form-control' />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Trending</label>
                                    <input type='checkbox' name='trending'
                                        {{ $product->trending=='1'? 'checked' :'' }}
                                        style='height:50px;width:50px' class='form-check' />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Status</label>
                                    <input type='checkbox' name='status'
                                        {{ $product->status=='1'? 'checked' :'' }}
                                        style='height:50px;width:50px' class='form-check' />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade border p-3" id="image" role="tabpanel" aria-labelledby="image-tab">
                        <div class="mb-3">
                            <label>Upload Product Images</label>
                            <input type='file' name='image[]' multiple class="form-control" />
                        </div>
                        <div>
                            @if($product->productImages)
                                @foreach($product->productImages as $image )
                                    <img src="{{ asset($image->image) }}" class='me-4 border'
                                        style='width:80px;height:80px' alt='image' />
                                    <a
                                        href="{{ url('admin/product-image/'.$image->id.'/delete') }}">Remove</a>
                                @endforeach

                            @else
                                <h5>No Product Image</h5>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade border p-3" id="color" role="tabpanel" aria-labelledby="color-tab">
                        <div class="mb-3">
                            <h4>Add Color</h4>
                            <label>Select Color</label>
                            <hr/>
                            <div class="row">
                                @forelse( $colors as $color )
                                    <div class="col-md-3">
                                        <div class="p-2 border mb-3">
                                            Color:<input type='checkbox' name='colors[{{ $color->id }}]' value="{{ $color->id }}"
                                               />
                                            {{ $color->name }}
                                            <br/>
                                            Quantity:<input type='number' name='colorQuantity[{{ $color->id }}]'
                                                style='width:70px;border:1px solid ' />
                                        </div>
                                    </div>
                                @empty
                                    <h1>No colors available</h1>
                                @endforelse

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th>Color name</th>
                                        <th>Quantity</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product->productColors as $prodColor)
                                    <tr class='product-color-tr'>
                                        @if ($prodColor->color)
                                         <td>{{$prodColor->color->name}}</td>
                                         @else
                                         No Color Found
                                        @endif
                                        <td>
                                            <div class="input-group mb-3" style='width:150px'>
                                                <input type='text' value='{{$prodColor->quantity}}' class='prodColorQty form-control form-control-sm'/>
                                                <button type='button' value='{{$prodColor->id}}' class=' updateColorBtn btn btn-primary btn-sm text-white'>Update</button>
                                            </div>
                                        </td>
                                        <td>
                                            <button type='button' value='{{$prodColor->id}}' class='deleteColorBtn btn btn-danger btn-sm text-white'>Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div>
                        <button type='submit' class="btn btn-primary">Update</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click','.updateColorBtn', function () {
            var product_id="{{$product->id}}"
            var prodColorId=$(this).val()
            var quantity=$(this).closest('.product-color-tr').find('.prodColorQty').val()

            if(quantity <=0)
            {
                alert('Qty Required')
                return false
            }

            var data={
                'product_id':product_id,
                'qty':quantity
            }
            $.ajax({
                type: "PUT",
                url: "/admin/product-color/"+prodColorId,
                data: data,
                success: function (response) {
                    alert(response.message)
                }
            });
        });

        $(document).on('click','.deleteColorBtn',function () {
             var prodColorId=$(this).val()
             var $this=$(this)
             $.ajax({
                type: "DELETE",
                url: "/admin/product-color/"+prodColorId,
                success: function (response) {
                    $this.closest('.product-color-tr').remove();
                    alert(response.message)
                }
             });
        });
    });
</script>
@endsection;
