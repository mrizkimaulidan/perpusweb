<!-- Modal -->
<div class="modal fade " id="book-types-create-modal" data-backdrop="static" tabindex="-1" role="dialog"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Kategori Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.book-types.store') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="name">Nama Kategori</label>
                <input type="text" class="form-control" name="name" id="name_create"
                  placeholder="Masukkan nama kategori..">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="name">Deskripsi</label>
                <textarea class="form-control" name="description" id="description_create" cols="30" rows="10"
                  style="height: 100px;" placeholder="Masukkan deskripsi.. (opsional)"></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" id="book-types-create-button">Tambah Kategori
                  Buku</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>