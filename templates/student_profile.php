<?php require_once('../connection.php'); ?>
<?php require_once('dataTables.php'); ?>

<div class="container">

    <br>














<script type="text/javascript">
    $(document).ready( function () {
    $('#teacher_table').DataTable({
          "columns": [
                null,
                null,
                { "searchable": false },
              
            ] 
    });
} );
</script>




</div>