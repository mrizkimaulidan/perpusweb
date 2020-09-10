@extends('layouts.stisla.index', ['title' => 'Daftar Buku', 'section_header' => 'Daftar Buku'])

@section('content')
<div class="row">
  <div class="col-lg-12 table-responsive">
    <div class="card px-3 py-3">
      <div class="row">
        <div class="col-lg-12 px-3 py-3 text-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-book-modal">
            Tambah Buku
          </button>
        </div>
      </div>
      <table class="table table-hovered text-center table-bordered" id="datatable">
        <thead>
          <tr>
            <th>#</th>
            <th>Nomor Buku</th>
            <th>Judul Buku</th>
            <th>Penerbit</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($books as $book)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $book->book_number }}</td>
            <td>{{ Str::limit($book->title, 40, '...') }}</td>
            <td>{{ $book->publisher }}</td>
            <td>
              <a href="{{ route('admin.books.show', $book->id) }}" data-id="{{ $book->id }}" class="btn btn-sm btn-info swal-show-a">
                <i class="fas fa-info-circle"></i>
              </a>
              <button type="submit" data-id="{{ $book->id }}" class="btn btn-sm btn-danger swal-delete-button">
                <i class="fas fa-trash-alt"></i>
              </button>
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
@include('admin.books.modal.create')
@endpush

@push('js')
@include('admin.books._script')
@endpush