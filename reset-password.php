<?php
    include("bid/config/db_connection.php");
    if(isset($_POST['submit'])){
        
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $sql = '';
        $sql = "SELECT `USER_EMAIL`, `USER_PASSWORD` FROM user_registrations WHERE `USER_EMAIL` = '$email' 
               and `USER_PASSWORD` = '$password'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0){
            $_SESSION['user'] = $email;
            header ( "location: bid/index.php") ;
        }
        else
        {
            echo "Wrong password and email";
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>USER LOGIN</title>
  </head>
  <body>
    <div class = "wrapper-main col-lg-4 ">
        <section class = "section-default">
            <form action="bid/include/reset-request.inc.php" method="post" enctype="multipart/form-data">
                    <h1>Reset your password</h1>
                    <p>To reset your password Enter your Email and go to the link to reset password</p>
                  <div class="form-group">
                        <input name = "email" type="email" class="form-control" id="exampleInputEmail1" placeholder = "Enter Your Email" aria-describedby="emailHelp">
                        <button type = "submit" name = "reset-request-submit">Receive new password by email</button>
                  </div>
                  
            </form>
        </section>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>