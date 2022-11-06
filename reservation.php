<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Asztalfoglalás</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <?php
  echo '<link rel="stylesheet" type="text/css" href="style.css?'.filemtime('style.css').'">';

  ?>


</head>
<body>
  <div class="header">
    <h2>Asztalfoglalás</h2>
  </div>
  <?php  if (!isset($_SESSION['success'])) : ?>
    <form method="post" action="reservation.php">
      <?php include('errors.php'); ?>
      <div class="input-group">
        <label style="display:inline; margin-right:20px">Asztal mérete</label>
        <select class="btn" name="people">
            <option value=2>2 személyes</option>
            <option value=4>4 személyes</option>
            <option value=6>6 személyes</option>
            <option value=8>8 személyes</option>
            <option value=10>10 személyes</option>
            <option value=12>12 személyes</option>
            <option value=16>16 személyes</option>
            <option value=20>20 személyes</option>
            <option value=30>30 személyes</option>
          </select>
      </div>
      <div class="input-group">
        <label>Dátum</label>
        <input type="datetime-local" name="date"> 
      </div>
      <div class="input-group">
        <button type="submit" class="btn" name="table_reservation">Foglalás!</button>
      </div>
    </form>  
  <?php endif ?>
  <?php  if (isset($_SESSION['success'])) : ?>
    <div class="content">
      <div class="success">Sikeres Asztalfoglalás! </div>
    </div>
  <?php
    echo '<script type="text/JavaScript"> 
                      function navigate() {
                        window.location.href = "index.php";
                      }
                      setTimeout(navigate, 3000);
                      </script>';
    unset($_SESSION['success']);
  ?>
  <?php endif ?>
  

  
</body>
</html>