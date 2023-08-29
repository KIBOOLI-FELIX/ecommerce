<div>
    @include('livewire.admin.brand.modal-form')
    <div class="row">
        <div class="col-md-12">
            <div class="message">
                @if(session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>
                        Brands List
                        <a class='btn btn-primary btn-sm float-end' data-bs-toggle="modal"
                            data-bs-target="#AddBrandModal" href="#">Add Brands</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class=" table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $brands as $brand )
                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>
                                        @if($brand->category)
                                            {{ $brand->category->name }}
                                        @else
                                            No Category
                                        @endif

                                    </td>
                                    <td>{{ $brand->slug }}</td>
                                    <td>{{ $brand->status==1?'Visible':'Hidden' }}
                                    </td>
                                    <td>
                                        <a href="#" wire:click="updateBrand({{ $brand->id }})" class="btn btn-success"
                                            data-bs-toggle="modal" data-bs-target="#updateBrandModal">Edit</a>
                                        <a href="#" wire:click="destroyBrand({{ $brand->id }})" data-bs-toggle="modal"
                                            data-bs-target="#deleteBrandModal" class='btn btn-danger'>Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#AddBrandModal').modal('hide');
            $('#updateBrandModal').modal('hide');
            $('#deleteBrandModal').modal('hide');
            setTimeout(() => {
                $('.message').hide()
            }, 5000);
        })

    </script>
@endpush
