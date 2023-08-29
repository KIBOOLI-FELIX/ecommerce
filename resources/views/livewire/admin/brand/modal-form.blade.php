    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="AddBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Brands</h5>
                    <button type="button" class="btn-close" wire:click='closeModal' data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent='saveBrand'>
                <div class="modal-body">
                 <div class="mb-3">
                    <label>Select Category</label>
                    <select wire:model.defer='category_id' class='form-control'>
                        <option value=''>--Select Category--</option>
                        @foreach ($categories as $category )
                         <option value='{{$category->id}}'>{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')<small class='text-danger'>{{$message}}</small>@enderror
                  </div>
                  <div class="mb-3">
                    <label>Brand Name</label>
                    <input type='text' wire:model.defer="name" class='form-control'/>
                    @error('name')<small class='text-danger'>{{$message}}</small>@enderror
                  </div>
                  <div class="mb-3">
                    <label>Slug</label>
                    <input type='text'wire:model.defer="slug" class='form-control'/>
                    @error('slug')<small class="text-danger">{{$message}}</small>@enderror
                  </div>
                  <div class="mb-3">
                    <label>Status</label><br>
                    <input type='checkbox' wire:model.defer="status" class='form-check'/> checked=visible Un-checked=hidden
                    @error('status')<small>{{$message}}</small>@enderror
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click='closeModal' data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Brand</button>
                </div>
                </form>
            </div>
        </div>
    </div>

        <!-- brandUpdate Modal -->
    <div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Brands</h5>
                    <button type="button" class="btn-close" wire:click='closeModal' data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent='updateStoreBrand'>
                <div class="modal-body">
                     <div class="mb-3">
                    <label>Select Category</label>
                    <select wire:model.defer='category_id' class='form-control'>
                        <option value=''>--Select Category--</option>
                        @foreach ($categories as $category )
                         <option value='{{$category->id}}'>{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')<small class='text-danger'>{{$message}}</small>@enderror
                  </div>
                  <div class="mb-3">
                    <label>Brand Name</label>
                    <input type='text' wire:model.defer="name" class='form-control'/>
                    @error('name')<small class='text-danger'>{{$message}}</small>@enderror
                  </div>
                  <div class="mb-3">
                    <label>Slug</label>
                    <input type='text'wire:model.defer="slug" class='form-control'/>
                    @error('slug')<small class="text-danger">{{$message}}</small>@enderror
                  </div>
                  <div class="mb-3">
                    <label>Status</label><br>
                    <input type='checkbox' wire:model.defer="status"  class='form-check'/> checked=visible Un-checked=hidden
                    @error('status')<small>{{$message}}</small>@enderror
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click='closeModal' data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Brand</button>
                </div>
                </form>
            </div>
        </div>
    </div>


        <!--delete Modal -->
    <div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Brands</h5>
                    <button type="button" class="btn-close" wire:click='closeModal' data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent='deleteBrand'>
                <div class="modal-body">
                    <h4>Are you sure you want to delete this brand?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click='closeModal' data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes Delete</button>
                </div>
                </form>
            </div>
        </div>
    </div>



