<?php include( "include/header.php" ) ; ?>

<?php include( "include/sidebar.php" ) ; ?>


 <?php 

    if(isset($_GET['pagex']))
   {
    $root=$_GET['root'];
    $page=$_GET['pagex'];


    include $root.'/'.$page.'.php'; 
   }
   else
   {
      // include 'dashboard.php';
   }
  
   

?>
<?php include( "include/footer.php" ) ; ?>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

<script>
$("select.search").select2();
</script>

