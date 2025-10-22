<div>
    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#formRoleUser-{{ $user->id }}">
        <i class="fas fa-edit"></i> Kelola Role
    </button>
    <div class="modal fade" id="formRoleUser-{{ $user->id }}">
        <form action="{{ route('manajemen-user.role_user.store') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Kelola Role untuk {{ $user->name }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group my-1">
                        <label for="role_id">Pilih Role</label>
                        <select name="role_id" id="role_id" class="form-control">
                            <option value="">--Pilih Role--</option>
                            @foreach ($allRoles as $role)
                                <option value="{{ $role->id }}" @if($user->roles->contains($role->id)) selected @endif>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>