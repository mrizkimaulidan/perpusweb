<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="create-user-modal" data-backdrop="static" role="dialog"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" id="name_create"
                  placeholder="Masukkan nama lengkap..">
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="role_id">Jabatan</label>
                <select class="form-control" name="role_id" id="role_id_create" style="width: 100%">
                  <option selected>Pilih Jabatan</option>
                  @foreach($roles as $role)
                  <option value="{{ $role->id }}">{{ $role->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email_create" placeholder="Masukkan email..">
              </div>
            </div>

            <div class="col-lg-6">
              <label for="password">Password</label>
              <div class="input-group form-group">
                <input type="password" class="form-control" name="password" id="password_create"
                  placeholder="Masukkan password..">
                <div class="input-group-append">
                  <span class="input-group-text" id="show_password_button">
                    <i class="fas fa-eye-slash" id="font-icon"></i>
                  </span>
                </div>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="address">Alamat Lengkap</label>
                <textarea class="form-control" name="address" id="address_create"
                  placeholder="Masukkan alamat lengkap.." style="height: 100px;"></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="image_create">
                <label class="custom-file-label" for="image" id="custom-file-label">Pilih file..</label>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="text-center">
                <img src="" class="img img-thumbnail shadow" alt="" id="image_preview" height="100" width="100">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cancel-button" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" id="create-user-button">Tambah Pengguna</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>