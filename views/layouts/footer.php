</div>

</div>
</div>


<!-- SIDEBAR -->
<script>
    // Ambil elemen tombol toggle dan sidebar
    const toggleSidebarBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');

    // Event listener untuk tombol toggle sidebar
    toggleSidebarBtn.addEventListener('click', () => {
        // Menambahkan dan menghapus kelas 'sidebar-expanded' saat tombol ditekan
        sidebar.classList.toggle('sidebar-expanded');
    });
</script>


<!-- utilities -->
<script src="<?= BASE_URL ?>assets/js/tanggal.js"></script>
<!-- <script src="<?= BASE_URL ?>assets/js/slider.js"></script> -->
<script src="<?= BASE_URL ?>assets/js/sidebar.js"></script>

<!-- chart js -->
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>

<!-- sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</body>

</html>