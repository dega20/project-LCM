<div>
    <button type="button" class="btn btn-sm {{ $id ? 'btn-warning' : 'btn-primary' }}" data-toggle="modal" data-target="#formRole{{ $id ?? '' }}"> 
        @if ($id)
        <i class="fas fa-edit"></i>
        @else
        Role Baru    
        @endif
    </button>
    <div class="modal fade" id="formRole{{ $id ?? '' }}">
        <form action="{{ route('manajemen-user.roles.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $id ?? '' }}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">{{ $id ? 'Form Edit Role' : 'Form Role Baru' }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group my-1">
                <label for="">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $id ? $name : old('name') }}">
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
            </form>
        </div>
        <!-- /.modal -->
</div>