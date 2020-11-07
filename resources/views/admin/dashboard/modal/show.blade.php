<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Log Login Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @forelse($login_logs as $key => $login_log)
        @if($key % 1 === 0)
        <hr>
        @endif
        <ul>
          <li>Nama : {{ $login_log->user->name }}</li>
          <li>IP : {{ $login_log->last_login_ip }}</li>
          <li>Pukul : {{ date_format(date_create($login_log->last_login_time), 'H:i') }}</li>
          <li>Tanggal : {{ date_format(date_create($login_log->last_login_date), 'd-m-Y') }}</li>
        </ul>
        @if($key % 1 !== 0)
        <hr>
        @endif
        @empty
        <li class="list-group-item text-danger font-weight-bold text-uppercase text-center">Data tidak ada!</li>
        @endforelse
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>