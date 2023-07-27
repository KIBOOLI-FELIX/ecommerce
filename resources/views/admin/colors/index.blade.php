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
                Colors
                <a href='{{ url('admin/colors/create') }}'
                    class='btn btn-primary btn-sm text-white float-end'>Add Color</a>
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Color Name</th>
                        <th>Color Code</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($colors as $color )
                        <tr>
                            <td>{{ $color->id }}</td>
                            <td>{{ $color->name }}</td>
                            <td>{{ $color->code }}</td>
                            <td>{{ $color->status? 'Visible':'Hidden' }}
                            </td>
                            <td class='d-flex'>
                                <a href="{{ url('admin/colors/'.$color->id.'/edit') }}"
                                    class="btn btn-primary btn-sm btn-success">
                                    Edit
                                </a>
                                <form method='POST'
                                    action='{{ url('admin/colors/'.$color->id.'/delete') }}'>
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
