@extends('layouts.stisla.index', ['title' => 'Detail Buku ' . $book->title, 'section_header' => 'Detail Buku ' . $book->title])

@section('content')
<div class="row">
  <div class="col-lg-7">
    <div class="card">
      <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data" id="form_book_update">
        @method('PUT')
        @csrf
        <table class="table">
          <tr>
            <td style="width: 145px;">Judul Buku</td>
            <td style="width: 10px;">:</td>
            <td class="text-wrap">
              <input type="text" class="form-control" name="title" id="title_edit" value="{{ $book->title }}">
            </td>
          </tr>
          <tr>
            <td>Nomor Buku</td>
            <td>:</td>
            <td class="text-wrap">
              <input type="text" class="form-control" name="book_number" id="book_number_edit" value="{{ $book->book_number }}">
            </td>
          </tr>
          <tr>
            <td>Penerbit</td>
            <td>:</td>
            <td class="text-wrap">
              <input type="text" class="form-control" name="publisher" id="publisher_edit" value="{{ $book->publisher }}">
            </td>
          </tr>
          <tr>
            <td>Kategori Buku</td>
            <td>:</td>
            <td class="text-wrap">
              <select class="form-control" name="book_type_id" id="book_type_id_edit">
                @foreach($book_types as $book_type)
                <option value="{{ $book_type->id }}">{{ $book_type->name }}</option>
                @endforeach
              </select>
            </td>
          </tr>
          <tr>
            <td>Bahasa</td>
            <td>:</td>
            <td class="text-wrap">
              <input type="text" class="form-control" name="languages" id="languages_edit" value="{{ $book->languages }}">
            </td>
          </tr>
          <tr>
            <td>Ditambahkan Pada</td>
            <td>:</td>
            <td class="text-wrap">
              <input type="date" class="form-control" name="date_of_added" id="date_of_added_edit" value="{{ $book->date_of_added }}">
            </td>
          </tr>
        </table>
    </div>
  </div>

  <div class="col-lg-5">
    <div class="card">
      <img src="{{ asset($book->image) }}" class="img-thumbnail" alt="{{ $book->title }}" id="image_preview">
    </div>

    <div class="custom-file">
      <input type="file" name="image" class="custom-file-input" id="image_edit">
      <label class="custom-file-label" for="image" id="custom-file-label">Pilih file..</label>
    </div>

    <div class="py-4">
      <a href="{{ route('admin.books.index') }}" class="btn btn-primary">Kembali</a>
      <button type="submit" class="btn btn-success" data-id="{{ $book->id }}" id="book_update_button">Simpan Perubahan</button>
    </div>

    </form>

  </div>
</div>
@endsection

@push('js')
<script>
  $(document).ready(function() {
    flatpickr("#date_of_added_edit", {});

    $('#book_update_button').click(function(e) {
      let id = $(this).data("id");
      let token = $("input[name=_token]").val();
      let book_number = $("#book_number_edit").val();
      let book_type_id = $("#book_type_id_edit").val();
      let title = $("#title_edit").val();
      let publisher = $("#publisher_edit").val();
      let date_of_added = $("#date_of_added_edit").val();
      let languages = $("#languages_edit").val();

      $.ajax({
        url: "{{ route('admin.books.update', $book->id) }}",
        type: "PUT",
        data: {
          id: id,
          _token: token,
          book_number: book_number,
          book_type_id: book_type_id,
          title: title,
          publisher: publisher,
          date_of_added: date_of_added,
          languages: languages
        },
        success: function(data) {
          Swal.fire({
            title: "Berhasil",
            text: "Data berhasil diubah.",
            icon: "success",
            timerProgressBar: true,
            onBeforeOpen: () => {
              Swal.showLoading();
              timerInterval = setInterval(() => {
                const content = Swal.getContent();
                if (content) {
                  const b = content.querySelector("b");
                  if (b) {
                    b.textContent = Swal.getTimerLeft();
                  }
                }
              }, 100);
            },
            showConfirmButton: false
          });
          setTimeout(function() {
            // location.reload();
          }, 500);
        },
        error: function(data) {
          Swal.fire("Gagal!", "Data gagal diubah.", "warning");
        }
      });
    })

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $("#custom-file-label").html(input.files[0].name);
          $('#image_preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
    $("#image_edit").change(function() {
      readURL(this);
    });
  });
</script>
@endpush