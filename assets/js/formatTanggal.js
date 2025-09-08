function formatTanggalIndonesia(tanggal) {
  const bulan = [
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember",
  ];
  const [tahun, bulanIndex, hari] = tanggal.split("-");
  return `${hari} ${bulan[bulanIndex - 1]} ${tahun}`;
}
