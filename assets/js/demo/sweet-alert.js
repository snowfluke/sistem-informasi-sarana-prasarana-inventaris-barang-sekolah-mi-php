const flashDataSuccess = $(".flash-data-berhasil").data("berhasil");
const flashDataError = $(".flash-data-gagal").data("gagal");

if (flashDataSuccess) {
  Swal.fire({
    title: "Berhasil",
    text: flashDataSuccess,
    icon: "success",
    allowOutsideClick: false,
    timer: 1500,
  });
}
if (flashDataError) {
  Swal.fire({
    title: "Gagal",
    text: flashDataError,
    icon: "error",
    allowOutsideClick: false,
  });
}

//selesai
$(".selesai").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");

  Swal.fire({
    title: "Konfirmasi Status Peminjaman ?",
    text: "Anda yakin ingin menyelesaikan status peminjaman ini !",
    icon: "warning",
    allowOutsideClick: false,
    showCancelButton: true,
    cancelButtonColor: "#d33",
    confirmButtonColor: "#3085d6",
    cancelButtonText: "Tidak",
    confirmButtonText: "Iya, Selesaikan",
    reverseButtons: true,
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = href;
    }
  });
});

//hapus
$(".btn-hapus").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");

  Swal.fire({
    title: "Konfirmasi Hapus ?",
    text: "Anda yakin ingin menghapus data ini !",
    icon: "warning",
    allowOutsideClick: false,
    showCancelButton: true,
    cancelButtonColor: "#d33",
    confirmButtonColor: "#3085d6",
    cancelButtonText: "Tidak",
    confirmButtonText: "Iya, Hapus",
    reverseButtons: true,
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = href;
    }
  });
});
