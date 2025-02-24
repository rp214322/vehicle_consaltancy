<form id="editable-form" action="{!! route('admin.inquiries.update',array($inquiry->id)) !!}" method="POST">
    @csrf
    @method('PATCH')
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">View Inquiry </h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="modal_form">
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control" value="{{ $inquiry->email }}" readonly>
        </div>
        <div class="form-group">
            <lable>Description</lable>
            <textarea name="description" cols="30" rows="10" class="form-control" readonly>{{ $inquiry->description }}</textarea>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
    </form>
