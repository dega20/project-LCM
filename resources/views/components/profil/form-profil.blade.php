<div class="modal fade" id="editProfilModal" tabindex="-1" role="dialog" aria-labelledby="editProfilModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('profil-perusahaan.profil.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $id ?? '' }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfilModalLabel">Edit Profil Perusahaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_perusahaan">Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan" class="form-control" value="{{ $profil->nama_perusahaan ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="visi">Visi</label>
                        <textarea name="visi" class="form-control">{{ $profil->visi ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="misi">Misi</label>
                        <textarea name="misi" class="form-control">{{ $profil->misi ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="tentang_kami">Tentang Kami</label>
                        <textarea name="tentang_kami" class="form-control">{{ $profil->tentang_kami ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ $profil->alamat ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $profil->email ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" name="telepon" class="form-control" value="{{ $profil->telepon ?? '' }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>