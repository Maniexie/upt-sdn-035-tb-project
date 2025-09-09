const formatTanggalIndonesia = (tanggal) => {
  const [tahun, bulanIndex, hari] = tanggal.split("-");
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
  return `${hari} ${bulan[bulanIndex - 1]} ${tahun}`;
};

const getNamaHariIndonesia = (tanggal) => {
  const hariInggris = new Date(tanggal).toLocaleString("id-ID", {
    weekday: "long",
  });
  const hariIndonesia = {
    Senin: "Senin",
    Selasa: "Selasa",
    Rabu: "Rabu",
    Kamis: "Kamis",
    Jumat: "Jumat",
    Sabtu: "Sabtu",
    Minggu: "Minggu",
  };
  return hariIndonesia[hariInggris] || hariInggris;
};
