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
                Slider List
                <a href='{{ url('admin/sliders/create') }}'
                    class='btn btn-primary btn-sm text-white float-end'>Add Slider</a>
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sliders as $slider)
                        <tr>
                            <td>{{ $slider->id }}</td>
                            <td>{{ $slider->title }}</td>
                            <td>{{ $slider->description }}</td>
                            <td>
                                <img src='{{ asset($slider->image) }}' width='50px' />
                            </td>
                            <td>{{ $slider->status? 'Visible' : 'Hidden' }}
                            </td>
                            <td class='d-flex'>

                                    <a href="{{ url('admin/sliders/'.$slider->id.'/edit') }}"
                                        class="btn btn-primary btn-sm btn-success">
                                        Edit
                                    </a>
                                <form method='POST'
                                    action='{{ url('admin/sliders/'.$slider->id.'/delete') }}'>
                                    @csrf
                                    @method('DELETE')
                                    <button type='submit'
                                        onclick="return confirm('Do You really want to delete this item?')"
                                        class="btn btn-primary btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@include('message.timeout')
@endsection
     {{-- <form method='POST'>
                                     @csrf
                                    @method('PUT')
                                    <button type='submit' href="{{ url('admin/sliders/'.$slider->id.'/edit') }}"
                                        class="btn btn-primary btn-sm btn-success">
                                        Edit
                                    </button>
                                </form> --}}
