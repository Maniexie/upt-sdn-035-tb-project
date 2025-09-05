        // Fungsi untuk memformat tanggal
        function tampilkanTanggal() {
            const sekarang = new Date();

            // Opsi format lokal
            const opsiFormat = {
                weekday: 'long',     // Hari (misal: Senin)
                year: 'numeric',
                month: 'long',       // Bulan (misal: September)
                day: 'numeric'
            };

            // Format dengan bahasa Indonesia
            const tanggalFormatted = sekarang.toLocaleDateString('id-ID', opsiFormat);

            // Tampilkan di elemen <p id="tanggal">
            document.getElementById('tanggal').textContent = tanggalFormatted;
        }

       
        tampilkanTanggal();