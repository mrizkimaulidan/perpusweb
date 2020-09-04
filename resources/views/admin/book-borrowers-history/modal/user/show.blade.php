<!-- Modal -->
<div class="modal fade" id="user-detail-show-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Info Pengguna</h5>
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
            <td>Nomor Anggota</td>
            <td>:</td>
            <td id="user_number_detail_show"></td>
          </tr>
          <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td id="name_detail_show"></td>
          </tr>
          <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td id="role_id_detail_show"></td>
          </tr>
          <tr>
            <td>Email</td>
            <td>:</td>
            <td id="email_detail_show"></td>
          </tr>
          <tr>
            <td>Alamat Lengkap</td>
            <td>:</td>
            <td id="address_detail_show"></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>