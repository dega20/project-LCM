<div>
    <button type="button" class="btn btn-sm {{ $id ? 'btn-warning' : 'btn-primary' }}" data-toggle="modal" data-target="#formApply{{ $id ?? '' }}">
        @if ($id)
        <i class="fas fa-edit"></i>
        @else
        Apply Baru
        @endif
    </button>
    <div class="modal fade" id="formApply{{ $id ?? '' }}">
        <form action="{{ route('apply.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $id ?? '' }}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">{{ $id ? 'Edit Apply' : ' Tambah Apply' }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group my-1">
                <label for="">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ $id ? $nama : old('nama') }}">
            </div>
            <div class="form-group my-1">
              <label for="">Email</label>
              <input type="email" name="email" id="email" class="form-control" value="{{ $id ? $email : old('email') }}">
            </div>
              <div class="form-group my-1">
                <label for="">Posisi</label>
                <input type="text" name="posisi" id="posisi" class="form-control" value="{{ $id ? $posisi : old('posisi') }}">
              </div>
              <div class="form-group my-1">
                <label for="">Deskripsi</label>
                <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="{{ $id ? $deskripsi : old('deskripsi') }}">
              </div>
              <div class="form-group my-1">
                <label for="">CV</label>
                <input type="file" name="cv" id="cv" class="form-control">
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
      </div>
      <!-- /.modal -->
</div>