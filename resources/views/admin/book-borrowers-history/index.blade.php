@extends('layouts.stisla.index', ['title' => 'Histori Peminjaman Buku', 'section_header' => 'Histori Peminjaman Buku'])

@section('content')
<div class="row">
  <div class="col-lg-12 table-responsive">
    <div class="card px-3 py-3">
      <table class="table table-hovered text-center table-bordered" id="datatable">
        <thead>
          <tr>
            <th>#</th>
            <th>Peminjam</th>
            <th>Buku</th>
            <th>Status</th>
            <th>Disetujui Pada</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($book_users as $book_user)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $book_user->user->name }}</td>
            <td>{{ Str::limit($book_user->book->title, '40', '...') }}</td>
            @if($book_user->status === 1)
            <td class="badge badge-pill badge-success shadow-sm my-2" data-toggle="tooltip" data-placement="top" title="Disetujui">Disetujui</td>
            @else
            <td class="badge badge-pill badge-danger shadow-sm my-2" data-toggle="tooltip" data-placement="top" title="Tidak disetujui">Tidak disetujui</td>
            @endif
            <td>{{ date_format(date_create($book_user->updated_at), 'd-m-Y, H:i') }}</td>
            <td>
              <a href="{{ route('admin.book-borrowers-history.show', $book_user->id) }}" data-id="{{ $book_user->id }}" class="btn btn-sm btn-info swal-show-a">
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

@push('js')
@include('admin.book-borrowers-history._script')
@endpush