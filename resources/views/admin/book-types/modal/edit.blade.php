<!-- Modal -->
<div class="modal fade " id="book-types-edit-modal" data-backdrop="static" tabindex="-1" role="dialog"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ubah Kategori Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST" id="edit-form">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="name">Nama Kategori</label>
                <input type="text" class="form-control" name="name" id="name_edit">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" name="description" id="description_edit"
                  style="height: 100px;"></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" data-id="" class="btn btn-primary" id="book-types-swal-update-button">Ubah
                  Kategori Buku</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>