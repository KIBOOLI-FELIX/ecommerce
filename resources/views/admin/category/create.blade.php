@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Add Category
                    <a href='{{url('admin/category')}}' class='btn btn-primary btn-sm text-white float-end'>Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/category/store')}}" enctype="multipart/form-data" method='POST'>
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Name</label>
                            <input type='text' name='name' value="{{ old('name') }}" class='form-control'/>
                            @error('name')<small class='text-danger'>{{$message}}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Slug</label>
                            <input type='text' name='slug' value="{{ old('slug') }}" class='form-control'/>
                            @error('slug')<small class='text-danger'>{{$message}}</small>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Description</label>
                            <textarea  name='description' class='form-control' rows='3'>{{ old('description') }}</textarea>
                             @error('description')<small class='text-danger'>{{$message}}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Image</label>
                            <input type='file' name='image' class='form-control'/>
                            @error('image')<small class='text-danger'>{{$message}}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Status</label><br>
                            <input type='checkbox' name='status' class='form-check'/>
                        </div>
                        <div class="col-md-12">
                            <h4>SEO Tags</h4>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Meta Title</label>
                            <input type='text' name='meta_title' value="{{ old('meta_title') }}" class='form-control'/>
                            @error('meta_title')<small class='text-danger'>{{$message}}</small>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Meta Keyword</label>
                            <textarea name='meta_keyword' class='form-control' row='3'>{{ old('meta_keyword') }}</textarea>
                            @error('meta_keyword')<small class='text-danger'>{{$message}}</small>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Meta Description</label>
                            <textarea name='meta_description' class='form-control' row='3'>{{ old('meta_description') }}</textarea>
                             @error('meta_description')<small class='text-danger'>{{$message}}</small>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                             <button type= 'submit' class='btn btn-primary float-end'>Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- <script src="{{asset('js/jquery-3.7.0.min.js')}}"></script>
<script>
 $(document).ready(function(){
    alert('Hi')
 })
</script> --}}



