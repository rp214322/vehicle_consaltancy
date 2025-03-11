<form id="editable-form" action="{!! route('admin.brands.store') !!}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Add Brand</h5>
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
                  @foreach (App\Models\Category::pluck('name','id') as $key => $category)
                      <option value="{!! $key !!}">{!! $category !!}</option>
                  @endforeach
              </select>
              <div class="invalid-feedback"></div>
          </div>
          <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" class="form-control">
              <div class="invalid-feedback"></div>
          </div>
          <div class="form-group">
              <label>Brand Image (Optional)</label>
              <input type="file" name="image" class="form-control">
              <div class="invalid-feedback"></div>
          </div>
      </div>
  </div>
  <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary btn-submit" data-type="brands">Save changes</button>
  </div>
</form>
