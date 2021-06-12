<script>
    $(document).ready(function() {

        $('#book-types-create-button').click(function(e) {
            Swal.fire({
                title: "Proses",
                text: "Sedang melakukan proses..",
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
        });

        $(".book-types-swal-show-button").click(function() {
            let id = $(this).data("id");
            let token = $("input[name=_token]").val();
            $.ajax({
                url: "book-types/" + id,
                type: "GET",
                data: {
                    id: id,
                    _token: token
                },
                success: function(data) {
                    let name = data.data.name;
                    let slug = data.data.slug;
                    let description = data.data.description;

                    $("#book_types_name_show").html(name);
                    $("#book_types_slug_show").html(slug);
                    $("#book_types_description_show").html(description);
                },
                error: function(data) {
                    Swal.fire("Gagal!", "Tidak dapat melihat info kategori buku.", "warning");
                }
            });
        });

        $(".book-types-swal-edit-button").click(function() {
            let id = $(this).data("id");
            let token = $("input[name=_token]").val();

            // Injecting an id with relevant data on click for updating on #book-types-swal-update-button
            $("#book-types-swal-update-button").attr("data-id", id);

            $.ajax({
                url: "book-types/" + id + "/edit",
                type: "GET",
                data: {
                    id: id,
                    _token: token
                },
                success: function(data) {
                    let name = data.data.name;
                    let description = data.data.description;

                    $("#name_edit").val(name);
                    $("#description_edit").val(description);
                },
                error: function(data) {
                    Swal.fire("Gagal!", "Tidak dapat melihat info kategori buku.", "warning");
                }
            });
        });


        $("#book-types-swal-update-button").click(function(e) {
            e.preventDefault();
            // Get id injected by .book-types-swal-edit-button
            let id = $("#book-types-swal-update-button").attr("data-id");
            let token = $("input[name=_token]").val();

            let name = $("#name_edit").val();
            let description = $("#description_edit").val();

            $.ajax({
                url: "book-types/" + id,
                type: "PUT",
                data: {
                    id: id,
                    _token: token,
                    name: name,
                    description: description
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
                        location.reload();
                    }, 800)
                },
                error: function(data) {
                    Swal.fire("Gagal!", "Tidak dapat mengubah data.", "warning");
                }
            });
        });

        $(".book-types-swal-delete-button").click(function() {
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
                        url: "book-types/" + id,
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
                            }, 800);
                        },
                        error: function(data) {
                            Swal.fire("Gagal!", "Data gagal dihapus.", "warning");
                        }
                    });
                }
            });
        });
    })
</script>