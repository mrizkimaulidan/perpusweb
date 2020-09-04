<!-- Modal -->
<div class="modal fade" id="book-borrowers-history-create-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Peminjaman Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" id="book_borrowers_history_create_modal">
          @csrf
          <input type="hidden" name="user_id" id="user_id_create" value="{{ Auth::user()->id }}">
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="user_id">Buku</label>
                <select class="form-control" name="book_id" id="book_id_create">
                  <option value="">Pilih Buku</option>
                  @foreach($books as $book)
                  <option value="{{ $book->id }}">{{ $book->title }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <label for="date_start">Dari Tanggal</label>
              <div class="input-group">
                <input type="date" class="form-control" name="date_start" id="date_start_create">
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2"><i class="far fa-calendar-alt"></i></span>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <label for="date_end">Sampai Tanggal</label>
              <div class="input-group">
                <input type="date" class="form-control" name="date_end" id="date_end_create">
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2"><i class="far fa-calendar-alt"></i></span>
                </div>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="notes">Keterangan</label>
                <textarea class="form-control" name="notes" id="notes_create" rows="3"></textarea>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Tambah Data Peminjam Buku</button>
      </div>
      </form>
    </div>
  </div>
</div>