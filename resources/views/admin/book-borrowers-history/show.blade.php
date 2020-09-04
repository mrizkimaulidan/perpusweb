@extends('layouts.stisla.index', ['title' => 'Detail Histori ' . $book_user->user->name, 'section_header' => 'Detail Histori ' . $book_user->user->name])

@section('content')
<div class="row">
  <div class="col-lg-7">
    <div class="card">
      <form action="" method="POST" class="book_borrower_form">
        @csrf
        @method('PUT')
        <table class="table">
          <tr>
            <td style="width: 145px;">Peminjam</td>
            <td style="width: 10px;">:</td>
            <td class="text-wrap"><button type="button" class="btn btn-info" data-toggle="modal" data-id="{{ $book_user->user->id }}" data-target="#user-detail-show-modal" id="user-swal-show-button">{{ $book_user->user->name }}</button></td>
          </tr>
          <tr>
            <td>Judul Buku</td>
            <td>:</td>
            <td>
              <button type="button" class="btn btn-info" data-toggle="modal" data-id="{{ $book_user->book->id }}" data-target="#book-detail-show-modal" id="book-swal-show-button">{{ $book_user->book->title }}</button>
            </td>
          </tr>
          <tr>
            <td>Dari Tanggal</td>
            <td>:</td>
            <td class="text-wrap">{{ date_format(date_create($book_user->date_start), 'd-m-Y') }}</td>
          </tr>
          <tr>
            <td>Sampai Tanggal</td>
            <td>:</td>
            <td class="text-wrap">{{ date_format(date_create($book_user->date_end), 'd-m-Y') }}</td>
          </tr>
          <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td class="text-wrap">{{ $book_user->notes }}</td>
          </tr>
          <tr>
            <td>Status</td>
            <td>:</td>
            @if($book_user->status === 1)
            <td class="text-success text-wrap">Disetujui</td>
            @else
            <td class="text-danger text-wrap">Tidak disetujui</td>
            @endif
          </tr>
        </table>
    </div>
  </div>

  <div class="col-lg-5">
    <div class="card">
      <img src="{{ asset($book_user->book->image) }}" class="img-thumbnail" alt="{{ $book_user->book->name }}">
    </div>
    <div class="py-4">
      <a href="{{ route('admin.book-borrowers-history.index') }}" class="btn btn-primary">Kembali</a>
      <button type="submit" class="btn btn-success" data-id="{{ $book_user->id }}" id="book-approved-button">Setujui</button>
      <button type="submit" class="btn btn-danger" data-id="{{ $book_user->id }}" id="book-not-approved-button">Tidak menyetujui</button>
    </div>

    </form>

  </div>
</div>
@endsection

@push('modal')
@include('admin.book-borrowers-history.modal.user.show');
@include('admin.book-borrowers-history.modal.book.show')
@endpush

@push('js')
<script>
  $(document).ready(function() {
    $("#book-swal-show-button").click(function() {
      let id = $(this).data("id");
      let token = $("input[name=_token]").val();

      $.ajax({
        url: "{{ route('admin.json-book.show', $book_user->book->id) }}",
        type: "GET",
        data: {
          id: id,
          _token: token
        },
        success: function(data) {
          let image = data.data.image;
          let title = data.data.title;
          let book_number = data.data.book_number;
          let publisher = data.data.publisher;
          let book_type_name = data.data.book_type_name;
          let languages = data.data.languages;
          let date_of_added = data.data.date_of_added;
          let url = "{{ asset('') }}";

          $("#image_detail_show").attr("src", url + image);
          $("#title_detail_show").html(title);
          $("#book_number_detail_show").html(book_number);
          $("#publisher_detail_show").html(publisher);
          $("#book_type_id_detail_show").html(book_type_name);
          $("#languages_detail_show").html(languages);
          $("#date_of_added_detail_show").html(date_of_added);
        },
        error: function(data) {
          Swal.fire("Gagal!", "Tidak dapat melihat info buku.", "warning");
        }
      });

    });

    $("#book-approved-button").click(function(e) {
      e.preventDefault();
      Swal.fire({
        title: 'Setuju?',
        text: "Data peminjaman akan disetujui.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.value) {
          let id = $(this).data("id");
          let token = $("input[name=_token]").val();

          $.ajax({
            url: "{{ route('admin.json-book.approved', $book_user->id) }}",
            type: "PUT",
            data: {
              id: id,
              _token: token
            },
            success: function(data) {
              Swal.fire({
                title: "Berhasil",
                text: "Berhasil menyetujui peminjaman.",
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
                location.reload();
              }, 800);
            },
            error: function(data) {
              Swal.fire("Gagal!", "Gagal.", "warning");
            }
          })

        }
      })

    });

    $("#book-not-approved-button").click(function(e) {
      e.preventDefault();
      Swal.fire({
        title: 'Tidak menyetujui?',
        text: "Data peminjaman tidak akan disetujui.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.value) {
          let id = $(this).data("id");
          let token = $("input[name=_token]").val();

          $.ajax({
            url: "{{ route('admin.json-book.not-approved', $book_user->id) }}",
            type: "PUT",
            data: {
              id: id,
              _token: token
            },
            success: function(data) {
              Swal.fire({
                title: "Berhasil",
                text: "Berhasil tidak menyetujui peminjaman.",
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
                location.reload();
              }, 800);
            },
            error: function(data) {
              Swal.fire("Gagal!", "Gagal.", "warning");
            }
          })

        }
      })
    });




    $("#user-swal-show-button").click(function() {
      let id = $(this).data("id");
      let token = $("input[name=_token]").val();

      $.ajax({
        url: "{{ route('admin.json-user.show', $book_user->user->id) }}",
        type: "GET",
        data: {
          id: id,
          _token: token
        },
        success: function(data) {
          let image = data.data.image;
          let user_number = data.data.user_number;
          let name = data.data.name;
          let role_type_name = data.data.role_type_name;
          let email = data.data.email;
          let address = data.data.address;
          let url = "{{ asset('') }}";

          $("#image_detail_show").attr("src", url + image);
          $("#user_number_detail_show").html(user_number);
          $("#name_detail_show").html(name);
          $("#role_id_detail_show").html(role_type_name);
          $("#email_detail_show").html(email);
          $("#address_detail_show").html(address);
        },
        error: function(data) {
          console.log(0);
          console.log(data);
        }
      });
    });
  });
</script>
@endpush