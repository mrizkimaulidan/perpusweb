@extends('layouts.stisla.index', ['title' => 'Daftar Kategori Buku', 'section_header' => 'Daftar Kategori Buku'])

@section('content')
<div class="row">
  <div class="col-lg-12 table-responsive">
    @include('layouts.utilities.flash-message')
    <div class="card px-3 py-3">
      <div class="row">
        <div class="col-lg-12 px-3 py-3 text-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#book-types-create-modal">
            Tambah Kategori Buku
          </button>
        </div>
      </div>
      <table class="table table-hovered text-center table-bordered" id="datatable">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($book_types as $book_type)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td class="book-types-name-index">{{ $book_type->name }}</td>
            <td>{{ $book_type->description }}</td>
            <td class="btn-group" role="group">
              <button type="submit" data-toggle="modal" data-target="#book-types-show-modal"
                data-id="{{ $book_type->id }}" class="btn btn-sm btn-info book-types-swal-show-button">
                <i class="fas fa-info-circle"></i>
              </button>
              <button type="submit" data-toggle="modal" data-target="#book-types-edit-modal"
                data-id="{{ $book_type->id }}" class="btn btn-sm btn-success book-types-swal-edit-button">
                <i class="fas fa-edit"></i>
              </button>
              <form action="{{ route('admin.book-types.destroy', $book_type->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-sm btn-danger book-types-swal-delete-button">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </form>
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
@include('admin.book-types.modal.create')
@include('admin.book-types.modal.show')
@include('admin.book-types.modal.edit')
@endpush

@push('js')
@include('admin.book-types._script')
@endpush