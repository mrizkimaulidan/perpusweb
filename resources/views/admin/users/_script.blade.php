<script>
  $(document).ready(function() {

    $("#create-user-button").click(function(e) {
      let token = $("input[name=_token]").val();
      let name = $("#name_create").val();
      let role_id = $("#role_id_create").val();
      let email = $("#email_create").val();
      let password = $("#password_create").val();
      let address = $("#address_create").val();
      let status = 0;

      $.ajax({
        url: "users",
        type: "POST",
        data: {
          _token: token,
          name: name,
          role_id: role_id,
          email: email,
          password: password,
          address: address,
          status: status
        },
        success: function(data) {
          Swal.fire({
            title: "Berhasil",
            text: "Data berhasil ditambahkan.",
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
          }, 500)
        },
        error: function(data) {
          Swal.fire({
            title: "Berhasil",
            text: "Data berhasil ditambahkan.",
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
          }, 500)
        }
      })
    });

    $(".swal-delete-button").click(function() {
      Swal.fire({
        title: "Hapus?",
        text: "Data tidak akan bisa dikembalikan.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
        cancelButtonText: "Batal"
      }).then(result => {
        if (result.value) {
          let id = $(this).data("id");
          let token = $("input[name=_token]").val();

          $.ajax({
            url: "users/" + id,
            type: "DELETE",
            data: {
              id: id,
              _token: token
            },
            success: function(data) {
              Swal.fire({
                title: "Berhasil",
                text: "Data berhasil dihapus.",
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
              }, 500);
            },
            error: function(data) {
              Swal.fire("Gagal!", "Data gagal dihapus.", "warning");
            }
          });
        }
      });
    });

    $(".swal-show-button").click(function() {
      let id = $(this).data("id");
      let token = $("input[name=_token]").val();

      $.ajax({
        url: "users/" + id,
        type: "GET",
        data: {
          id: id,
          _token: token
        },
        success: function(data) {
          let role_id = data.data.role_id;
          let user_number = data.data.user_number;
          let name = data.data.name;
          let image = data.data.image;
          let email = data.data.email;
          let address = data.data.address;
          let url = "{{ asset('') }}";

          if (role_id === 1) {
            role_id = "Admin Perpustakaan";
          } else if (role_id === 2) {
            role_id = "Operator Perpustakaan";
          } else {
            role_id = "Anggota Perpustakaan";
          }

          $("#user_number_show").html(user_number);
          $("#name_show").html(name);
          $("#email_show").html(email);
          $("#address_show").html(address);
          $("#image_show").attr("src", url + image);
          $("#role_id_show").html(role_id);
        },
        error: function(data) {
          Swal.fire("Gagal!", "Tidak dapat melihat info pengguna.", "warning");
        }
      });
    });

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
    $("#image_create").change(function() {
      readURL(this);
    });

    $("#show_password_button").click(function() {
      if ($("#password_create").prop("type") === "password") {
        $("#password_create").prop("type", "text");
        $("#font-icon").removeClass("fas fa-eye-slash").addClass("fas fa-eye");
      } else {
        $("#password_create").prop("type", "password");
        $("#font-icon").removeClass("fas fa-eye").addClass("fas fa-eye-slash");
      }
    });
  });
</script>