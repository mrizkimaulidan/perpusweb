@extends('layouts.stisla.index', ['title' => 'Histori Peminjaman Buku', 'section_header' => 'Histori Peminjaman Buku'])

@section('content')
<div class="row">
  <div class="col-lg-12 table-responsive">
    <div class="card px-3 py-3">
      <div class="row">
        <div class="col-lg-12 px-3 py-3 text-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#book-borrowers-history-create-modal">
            Tambah Peminjaman
          </button>
        </div>
      </div>
      <table class="table table-hovered text-center table-bordered" id="datatable">
        <thead>
          <tr>
            <th>#</th>
            <th>Buku</th>
            <th>Status</th>
            <th>Disetujui Pada</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($my_books as $my_book)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $my_book->book->title }}</td>
            @if($my_book->status === 1)
            <td class="text-success text-wrap">Disetujui</td>
            @elseif($my_book->status === 2)
            <td class="text-warning text-wrap">Menunggu</td>
            @else
            <td class="text-danger text-wrap">Tidak Disetujui</td>
            @endif
            <td>{{ $my_book->updated_at }}</td>
            <td>
              <a href="{{ route('anggota.book-borrowers-history.show', $my_book->id) }}" data-id="{{ $my_book->id }}" class="btn btn-sm btn-info swal-show">
                <i class="fas fa-info-circle"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@push('modal')
@include('anggota.book-borrowers-history.modal.create')
@endpush

@push('js')
@include('anggota.book-borrowers-history._script')
@endpush