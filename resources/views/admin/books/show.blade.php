@extends('layouts.stisla.index', ['title' => 'Detail Buku ' . $book->title, 'section_header' => 'Detail Buku ' . $book->title])

@section('content')
<div class="row">
  <div class="col-lg-7">
    <div class="card">
      <table class="table">
        <tr>
          <td style="width: 145px;">Judul Buku</td>
          <td style="width: 10px;">:</td>
          <td class="text-wrap">{{ $book->title }}</td>
        </tr>
        <tr>
          <td>Nomor Buku</td>
          <td>:</td>
          <td class="text-wrap">{{ $book->book_number }}</td>
        </tr>
        <tr>
          <td>Penerbit</td>
          <td>:</td>
          <td class="text-wrap">{{ $book->publisher }}</td>
        </tr>
        <tr>
          <td>Tipe Buku</td>
          <td>:</td>
          <td class="text-wrap">{{ $book->book_type->name }}</td>
        </tr>
        <tr>
          <td>Bahasa</td>
          <td>:</td>
          <td class="text-wrap">{{ $book->languages }}</td>
        </tr>
        <tr>
          <td>Ditambahkan Pada</td>
          <td>:</td>
          <td class="text-wrap">{{ date_format(date_create($book->indonesian_date), 'd-m-Y') }}</td>
        </tr>
      </table>
    </div>
  </div>

  <div class="col-lg-5">
    <div class="card">
      <img src="{{ asset($book->image) }}" class="img-thumbnail" alt="{{ $book->title }}">
    </div>
    <div class="py-4">
      <a href="{{ route('admin.books.index') }}" class="btn btn-primary">Kembali</a>
      <a href="{{ route('admin.books.edit', $book->id) }}" data-id="{{ $book->id }}" class="btn btn-success">Ubah</a>
    </div>

  </div>
</div>
@endsection