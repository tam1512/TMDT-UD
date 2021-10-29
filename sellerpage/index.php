<?php 
require_once '../controller/authController.php';
if(!isset($_SESSION['ID']))
{
    header("location: ../index.php");
}
date_default_timezone_set('Asia/Ho_Chi_Minh');
$regdate = $_SESSION['regdate'];
$lastlogin = $_SESSION['lastlogin'];
$classacount = new account();

//echo time();
//echo date("d-m-Y H:i:s",time())
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $title ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/maincss.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<script>
var edit = true;
function inputToggle(e) 
{
  e.preventDefault();
  $(':input').prop('readonly', edit = !edit);
  /*document.getElementById("edit-email-btn").style.visibility = "hidden";*/
  document.getElementById("account-btn").innerHTML = "Lưu";
  document.getElementById("account-btn").onclick = "";
  document.getElementById("account-btn").className = "btn btn-success";
  document.getElementById("account-btn").type="submit"; 
}
</script>
<body>

<div class="wrapper">
  <?php require_once 'view/header.php'; ?> 
  <section style="background-color: #eee;">
  <div class="container-fluid py-3" style="padding: 0">
  <div class="row">
      <?php 
      require_once("account/leftpanel.php");
      if(!isset($_GET['page']))
      {
      require_once("account/profile.php");
      }    
      if(isset($_GET['page']))
      {
          if($_GET['page']=="them-san-pham")
          {
          require_once("view/quanlysanpham/new.php");
          }
      }
      ?>

  </div>
</section>
</div>
</body>
</html>