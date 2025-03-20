<form id="editable-form" action="{!! route('admin.users.update', [$user->id]) !!}" method="POST">
@csrf
@method('PATCH')
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Edit User </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="modal_form">
        <div class="form-group">
            <lable>First Name</lable>
            <input type="text" name="first_name" class="form-control" value="{!! $user->first_name !!}">
        </div>
        <div class="form-group">
            <lable>Last Name</lable>
            <input type="text" name="last_name" class="form-control" value="{!! $user->last_name !!}">
        </div>
        <div class="form-group">
            <lable>Phone</lable>
            <input type="number" name="phone" class="form-control" value="{!! $user->phone !!}">
        </div>
        <div class="form-group">
            <lable>Email</lable>
            <input type="email" name="email" class="form-control" value="{!! $user->email !!}">
        </div>
        <div class="form-group">
            <lable>password</lable>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <lable>Confirm Password</lable>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
        <div class="form-group">
            <label>Date of Birth</label>
            <input type="date" name="dob" class="form-control" value="{!! $user->dob ? $user->dob->format('Y-m-d') : '' !!}">
        </div>
        <div class="form-group">
            <label>Country</label>
            <select class="form-control select2" name="country" id="countrySelect">
                <option value="">Select Country</option>
                <option value="IN" {{ $user->country == 'IN' ? 'selected' : '' }}>India</option>
                <option value="CA" {{ $user->country == 'CA' ? 'selected' : '' }}>Canada</option>
            </select>
        </div>
        <div class="form-group">
            <label>State/Province</label>
            <select class="form-control select2" name="state" id="stateSelect">
                <option value="">Select State</option>
            </select>
        </div>
        <div class="form-group">
            <label>Address</label>
            <textarea name="address" class="form-control">{!! $user->address !!}</textarea>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <a href="javascript:;" type="submit" class="btn btn-primary btn-submit"
        data-id="users_{!! $user->id !!}">Save changes</a>
</div>
</form>
