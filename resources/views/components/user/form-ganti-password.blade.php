<div>

<!-- Modal -->
<div class="modal fade" id="formGantiPassword" tabindex="-1" aria-labelledby="formGantiPasswordLabel" aria-hidden="true">
  <form action="{{ route('manajemen-user.users.ganti-password') }}" method="POST">
    @csrf
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formGantiPasswordLabel">Form Ganti Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group my-1">
          <label for="">Password Lama</label>
          <input type="password" class="form-control" id="old_password" name="old_password" required>
          @error('old_password')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group my-1">
          <label for="">Password Baru</label>
          <input type="password" class="form-control" id="password" name="password" required>
          @error('password')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group my-1">
          <label for="">Confirm Password</label>
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
          @error('password_confirmation')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Ganti password</button>
      </div>
    </div>
  </div>
</form>
</div>
</div>