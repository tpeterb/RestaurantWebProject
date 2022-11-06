<?php include('server.php') ?>
<?php 
/*
    if(isset($_GET['arr'])) {
        $rendeles = strval($_GET['arr']);
        
    }*/
    if(isset($_COOKIE['arr'])) {
        $rendeles = strval($_COOKIE['arr']);
        
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Rendelés</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Rendelés</h2>
  </div>
	 
  <form method="post" action="order.php">

  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Kiszállítási cím</label>
  		<input type="text" name="address" >
  	</div>
      <div class="input-group">
  		<label>Telefonszám</label>
  		<input type="tel" name="phone" placeholder="20-123-4567" pattern="[0-9]{2}-[0-9]{3}-[0-9]{4}" required >
  	</div>
  	<div class="input-group">
  		<label>Dátum</label>
  		<input type="datetime-local" name="date">
  	</div>
    <?php 
        echo "<input type='hidden' name='rendeles' value='".$rendeles."'/>";
    ?>
  	<div class="input-group">
  		<button type="submit" class="btn" name="order_food">Rendelés!</button>
  	</div>
  </form>
</body>
</html>