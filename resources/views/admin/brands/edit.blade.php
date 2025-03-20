<form id="editable-form" action="{!! route('admin.brands.update', $brand->id) !!}" method="POST" enctype="multipart/form-data">
@csrf
@method('PATCH')
<div class="modal-header">
    <h5 class="modal-title">Edit Brand</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="modal_form">
        <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control">
                <option value="">Select Category</option>
                @foreach (App\Models\Category::pluck('name', 'id') as $key => $category)
                    <option value="{!! $key !!}" {!! $key == $brand->category_id ? 'selected' : '' !!}>{!! $category !!}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Brand Name" value="{!! $brand->name !!}" required>
        </div>
        <div class="form-group">
            <label>Brand Image</label>
            <input type="file" name="image" class="form-control">
            @if($brand->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $brand->image) }}" alt="Brand Image" width="100" class="img-thumbnail">
                </div>
            @endif
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <a href="javascript:;" type="submit" class="btn btn-primary btn-submit" data-id="brands_{!! $brand->id !!}">Save changes</a>
</div>
</form>
