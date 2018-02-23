</body>
<script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript" src="../assets/DataTables/data/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
<script type="text/javascript" src="../assets/DataTables/data/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/DataTables/data/js/dataTables.jqueryui.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#tanggal").datepicker({
      dateFormat:'yy-mm-dd',
    });
  });

  $(document).ready(function(){
    $("#tanggal1").datepicker({
      dateFormat:'yy-mm-dd',
    });
  });

  $(document).ready(function(){
    $("#tanggal3").datepicker({
      dateFormat:'yy-mm-dd',
    });
  });

  $(document).ready(function(){
    $("#tanggal4").datepicker({
      dateFormat:'yy-mm-dd',
    });
  });

  $(document).ready(function(){
    $("#pegawai").DataTable();
  });

  $(function () {
    $("#sad").DataTable();
  });
</script>
</html>