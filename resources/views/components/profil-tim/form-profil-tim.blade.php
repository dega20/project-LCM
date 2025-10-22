<div>
    <button type="button" class="btn btn-sm {{ $id ? 'btn-warning' : 'btn-primary' }}" data-toggle="modal" data-target="#formProfilTim{{ $id ?? '' }}">
        @if ($id)
        <i class="fas fa-edit"></i>
        @else
        Profil Tim Baru    
        @endif
    </button>
    <div class="modal fade" id="formProfilTim{{ $id ?? '' }}">
        <form action="{{ route('profil-perusahaan.profil-tim.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $id ?? '' }}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">{{ $id ? 'Edit Profil Tim' : ' Tambah Profil Tim' }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group my-1">
                <label for="">Nama</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $id ? $name : old('name') }}">
              </div>
              <div class="form-group my-1">
                <label for="">Posisi</label>
                <input type="text" name="position" id="position" class="form-control" value="{{ $id ? $position : old('position') }}">
              </div>
              <div class="form-group my-1">
                <label for="">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $id ? $email : old('email') }}">
              </div>
              <div class="form-group my-1">
                <label for="">Nomor</label>
                <input type="tel" name="phone" id="phone" class="form-control" value="{{ $id ? $phone : old('phone') }}">
              </div>
              <div class="form-group my-1">
                <label for="">Foto</label>
                <input type="file" name="photo" id="photo" class="form-control">
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </form>
      </div>
      <!-- /.modal -->
</div>