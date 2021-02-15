

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
<?php include( "include/footer.php" ) ;?>

