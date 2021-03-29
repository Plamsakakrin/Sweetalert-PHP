<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweetalert+PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">

                <h1>Sign in</h1>
                <hr>
                <form action="" method="post">
                    <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" require placeholder="username">
                <label for="password" class="form-label">PassWord</label>
                <input type="password" name="password" class="form-control" require placeholder="password">
                
                <br>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="level" value="admin" require>
                    <label for="admin" class="form-check-label">Admin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="level" value="member" require>
                    <label for="member" class="form-check-label">Member</label>
                </div>
                
                <br><br>
               <button type="submit" class="btn btn-success">Sign In</button>
            </form>
        </div>
        </div>
    </div>
   
<?php

    echo'
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    ';

    if(isset($_POST['username']) && isset($_POST['password'])){
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['level'] = $_POST['level'];

        if ($_SESSION['level'] == 'admin'){
            $username = $_POST['username'];
            $password = $_POST['password'];

            if($username == 'admin' && $password == '1234'){
                header('Location: admin.php');
            }else{
                echo'<script>
                       setTimeout(function(){
                           swal({
                               title: "Admin Login Error!",
                               text: "Username or Password is not correct try agin.",
                               type: "warning"
                           }, function() {
                               window.location = "index.php";
                           })
                       }, 1000);
                </script>
                ';
            }
        }else{
            // member
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($username == 'member' && $password =='1234'){
                header('Location: member.php');
            }else{
                echo'<script>
                       setTimeout(function(){
                           swal({
                               title: "Member Login Error!",
                               text: "Username or Password is not correct try agin.",
                               type: "warning"
                           }, function() {
                               window.location = "index.php";
                           })
                       }, 1000);
                </script>
                ';
            }

        }
    }

?>
</body>
</html>