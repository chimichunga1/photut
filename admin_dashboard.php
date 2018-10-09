
        
        <?php require_once("connection.php"); 
        ?>   
<html lang = "en">
    <head>
         <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.8/angular-material.min.css">
            <?php require_once("link.php"); ?>
    </head>
    <style>
table, td, th {
    padding: 5px;
    border: 3px solid black;


}
td {
    text-align: justify;
}
table {
    border-collapse: collapse;
    width: 100%;
}

th {
    text-align: center;a
    background-color: #AD5D5D;
}
h1{
    font-size: 20px;
    font-weight: bold;
}

</style>
    
<?php include('navbar.php'); ?>
    <body ng-app="BlankApp"  ng-cloak>
<br><br><br>

<ng-view></ng-view>



<script type="text/javascript">
history.pushState(null, null, location.href);
window.onpopstate = function() {
  history.go(1);
};
</script>
    </body>
</html>