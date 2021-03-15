<!-- jQuery -->
<script src="<?= $url; ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= $url; ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= $url; ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= $url; ?>assets/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?= $url; ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= $url; ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= $url; ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= $url; ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Select2 -->
<script src="<?= $url; ?>assets/plugins/select2/js/select2.full.min.js"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $("#example2").DataTable({
            "responsive": true,
            "autoWidth": false,
            "ordering": false,
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "info": false,
        });
        $("#example3").DataTable({
            "responsive": true,
            "autoWidth": false,
            "ordering": false,
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "info": false,
        });
        // $('#example2').DataTable({
        //   "paging": true,
        //   "lengthChange": false,
        //   "searching": false,
        //   "ordering": true,
        //   "info": true,
        //   "autoWidth": false,
        //   "responsive": true,
        // });

        //Initialize Select2 Elements
        $('.select2').select2();
        //Initialize Select2 Elements
        $('.select2bs4').select2({
        theme: 'bootstrap4'
        });
    });
</script>

<script type="text/javascript">
    function startTime() {
        var today = new Date();
        var hr = today.getHours();
        var min = today.getMinutes();
        var sec = today.getSeconds();
        ap = (hr < 24) ? "" : "";
        hr = (hr == 0) ? 24 : hr;
        hr = (hr > 24) ? hr - 24 : hr;
        //Add a zero in front of numbers<10
        hr = checkTime(hr);
        min = checkTime(min);
        sec = checkTime(sec);
        document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;

        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        var curWeekDay = days[today.getDay()];
        var curDay = today.getDate();
        var curMonth = months[today.getMonth()];
        var curYear = today.getFullYear();
        var date = curWeekDay + ", " + curDay + " " + curMonth + " " + curYear + " - Jam : ";
        document.getElementById("date").innerHTML = date;
        var time = setTimeout(function() {
            startTime()
        }, 500);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    function timeIndonesia(tanggal) {
        a = new Date(tanggal);
        D1 = a.getDay();
        D2 = a.getDate();
        M = a.getMonth();
        Y = a.getFullYear();
        var hari = Array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
        var bulan = Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

        return hari[D1] + "," + D2 + " " + bulan[M] + " " + Y;
    }

    function konfirmasi() {
        tanya = confirm("Yakin menghapus data ini ?");
        if (tanya == true) return true;
        else return false;
    }
</script>