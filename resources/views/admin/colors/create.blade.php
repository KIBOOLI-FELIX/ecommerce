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
                Add Color
                <a href='{{ url('admin/colors') }}'
                    class='btn btn-danger btn-sm text-white float-end'>Back Color</a>
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/colors/store') }}" method='POST'>
                @csrf
                <div class="mb-3">
                    <label>Color Name</label>
                    <input type="text" name="name" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label>Code</label>
                    <input type="text" name="code" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <input type="checkbox" style='height:25px;width:25px' name="status" class="form-check"/>
                    Checked='Visible', Unchecked='Hidden'
                </div>
                <div class="mb-3">
                    <button type='submit' class='btn btn-primary'>Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
