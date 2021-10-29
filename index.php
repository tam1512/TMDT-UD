<!doctype html>
<?php require_once("controller/authController.php"); ?>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $title ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="css/maincss.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="wrapper">
  <?php require_once 'view/header.php'; ?> 
  <?php require_once 'view/mineinus-middle.php'; ?> 
  <?php require_once 'view/maincontent.php'; ?> 
  <?php require_once 'view/footer.php'; ?>  
</div>
<script>
function zoomtext(text) {
  navigator.clipboard.writeText("mineinus.com");
  var tooltip = document.getElementById("ipserver");
  tooltip.innerHTML = "Đã Copy IP Server";
}

function outzoomtext() {
  var tooltip = document.getElementById("ipserver");
  tooltip.innerHTML = "mineinus.com";
}
</script>
</body>
</html>