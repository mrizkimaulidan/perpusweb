<!-- Modal -->
<div class="modal fade" id="book-detail-show-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Info Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <img class="img img-thumbnail justify-content-center" src="" alt="" id="image_detail_show" height="100" width="100">
        </div>
        <table class="table" id="show-user-table">
          <tr>
            <td>Judul Buku</td>
            <td>:</td>
            <td id="title_detail_show"></td>
          </tr>
          <tr>
            <td>Nomor Buku</td>
            <td>:</td>
            <td id="book_number_detail_show"></td>
          </tr>
          <tr>
            <td>Penerbit</td>
            <td>:</td>
            <td id="publisher_detail_show"></td>
          </tr>
          <tr>
            <td>Tipe Buku</td>
            <td>:</td>
            <td id="book_type_id_detail_show"></td>
          </tr>
          <tr>
            <td>Bahasa</td>
            <td>:</td>
            <td id="languages_detail_show"></td>
          </tr>
          <tr>
            <td>Ditambahkan Pada</td>
            <td>:</td>
            <td id="date_of_added_detail_show"></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>