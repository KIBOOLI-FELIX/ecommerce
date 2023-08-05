@extends('layouts.admin')

@section('content')
<div class="col-md-12">
    <div class="message">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
    </div>
    <div class="card">
        <div class="card-header">
            <h3>
                Edit Slider
                <a href='{{ url('admin/sliders') }}'
                    class='btn btn-danger btn-sm text-white float-end'>Back to Slider</a>
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/sliders/'.$slider->id) }}" method='POST' enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title" value="{{$slider->title}}" class="form-control"/>
                     @error('title')<small class='text-danger'>{{$message}}</small>@enderror
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description"  class="form-control" rows="3">{{$slider->description}}</textarea>
                      @error('description')<small class='text-danger'>{{$message}}</small>@enderror
                </div>
                <div class="mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control"/>
                    <img src='{{ asset($slider->image) }}' width='50px' />
                    @error('image')<small class='text-danger'>{{$message}}</small>@enderror
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <input type="checkbox" {{$slider->status?'checked':''}}style='height:25px;width:25px' name="status" class="form-check"/>
                    Checked='Visible', Unchecked='Hidden'
                      @error('status')<small class='text-danger'>{{$message}}</small>@enderror
                </div>
                <div class="mb-3">
                    <button type='submit' class='btn btn-primary'>Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection