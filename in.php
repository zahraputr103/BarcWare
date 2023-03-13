<?php 
session_start();
require 'functions.php';

if(isset($_POST['login'])){
    $nisn = $_POST['nisn'];
    $password = $_POST['password'];

    $select = mysqli_query($conn, "SELECT * FROM user WHERE nisn = '$nisn'");
    
    if (mysqli_num_rows($select) == 1){

        $row = mysqli_fetch_array($select);

        if($row['tingkat'] == "admin"){
            if(password_verify($password, $row['password'])){
            $_SESSION["nisn"] = $row ['nisn'];
            $_SESSION["password"] = $row ['password'];
            $_SESSION["tingkat"] = "admin";
        
            header("Location:admin.php");
            }
        } 
        elseif($row['tingkat'] == "siswa"){
            if(password_verify($password, $row['password'])){
            $_SESSION["nisn"] = $row ['nisn'];
            $_SESSION["password"] = $row ['password'];
            $_SESSION["tingkat"] = "siswa";
        
            header("Location:students.php");
            }
        }
        else {
            echo '<script>
                alert("nisn atau Password Salah!!");
                document.location.href="in.php";
            </script>';
        }
    }
}
?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Masuk</title>
  <link rel="stylesheet" type="text/css" href="logincss/style.css">
</head>

<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1><a href="#" rel="dofollow">BARCWARE</a></h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Sign in to your account</span>
              <form id="stripe-login" action="" method="post">
                <div class="field padding-bottom--24">
                  <label for="nisn">NISN</label>
                  <input type="text" name="nisn" id="nisn" placeholder="NISN">
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="password">Password</label>
                  </div>
                  <input type="password" name="password" id="password" placeholder="Password">
                </div>
                <p>Belum punya akun? klik untuk <a href="regist.php">mendaftar</a>!</p>
                <br>
                <div class="field padding-bottom--24">
                  <input type="submit" name="login" value="Login">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>