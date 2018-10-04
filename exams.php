        
<!DOCTYPE html>
        <?php require_once("connection.php"); ?>
<html>
<head>
    <title></title>


            <?php require_once("link.php"); ?>

</head>



<?php include('navbar.php'); ?>
<body>
        <div class = "container-fluid">
            <div class = "col-xs-3">
                <div class = 'well'>
                    <ul class = "list-group">
                        <?php
                        $query = mysqli_query($connect, "
                            select * from quiz_table;
                        ");
                        while($fetch = mysqli_fetch_array($query)) {
                            $id = $fetch['quiz_id'];
                            $description = $fetch['quiz_description'];
                        ?>
                        <li class = "list-group-item"> <a href = "exams.php?quiz_id=<?php echo $id; ?>"> <span class = "fa fa-pencil-alt"> </span> Take quiz # <?php echo $id; ?> <strong> <?php echo $description; ?> </strong> </a> </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>

        </div>
</body>
</html>



