<?php
session_start();

$username = "";
$email = "";
$errors = array();


$db = mysqli_connect('localhost', 'root', '', 'RestaurantProject');

if (isset($_POST['reg_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($username)) {
    array_push($errors, "Adja meg a felhasznólénevet");
  }
  if (empty($email)) {
    array_push($errors, "Adja meg az email címet");
  }
  if (empty($password_1)) {
    array_push($errors, "Adja meg a jelszót");
  }
  if ($password_1 != $password_2) {
    array_push($errors, "A két jelszó nem egyezik meg");
  }

  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) {
    if ($user['username'] === $username) {
      array_push($errors, "A felhasználónév már létezik");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Az email cím már létezik");
    }
  }


  if (count($errors) == 0) {
    $query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password_1')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    header('location: index.php');
  }
}

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Adja meg a felhasználónevét");
  }
  if (empty($password)) {
    array_push($errors, "Adja meg a jelszavát");
  }

  if (count($errors) == 0) {
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      header('location: index.php');
    } else {
      array_push($errors, "Rossz felhasználónév/jelszó");
    }
  }
}

if (isset($_POST['table_reservation'])) {
  $date = $_POST['date'];
  $people = mysqli_real_escape_string($db, $_POST['people']);
  $username = $_SESSION['username'];
  $get_id_query = "SELECT id FROM users WHERE username='$username'";
  $result = mysqli_query($db, $get_id_query);
  $user = mysqli_fetch_assoc($result);
  $id = $user['id'];

  if (empty($date)) {
    array_push($errors, "Adjon meg egy dátumot");
  }
  if (empty($people)) {
    array_push($errors, "Adja meg a vendégek számát");
  }
  if (empty($id)) {
    array_push($errors, "Jelentkezzen be");
  }
  if (time() + (60 * 60 * 12) > strtotime($date)) {
    array_push($errors, "Asztalfoglalást minimum 12 órával előre szükséges leadni");
  }

  if (count($errors) == 0) {
    $query = "INSERT INTO table_reservation (user_id, people, tr_date) 
  			  VALUES('$id', '$people', '$date')";
    mysqli_query($db, $query);
    $_SESSION['success'] = "1";
  }
}

if (isset($_POST['order_food'])) {
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $date = $_POST['date'];
  //if (empty($rendeles)) {array_push($errors, "Tegyen termékeket a rendelésbe");}
  if (isset($_POST['rendeles'])) {
    $rendeles = explode(',', $_POST['rendeles']);
  }
  $username = $_SESSION['username'];
  $get_id_query = "SELECT id FROM users WHERE username='$username'";
  $result = mysqli_query($db, $get_id_query);
  $user = mysqli_fetch_assoc($result);
  $id = $user['id'];

  if (empty($date)) {
    array_push($errors, "Adjon meg egy dátumot");
  }
  if (empty($phone)) {
    array_push($errors, "Adja meg a telefonszámát");
  }
  if (empty($address)) {
    array_push($errors, "Adja meg a címét");
  }
  if (empty($id)) {
    array_push($errors, "Jelentkezzen be");
  }
  if (empty($_POST['rendeles'])) {
    array_push($errors, "Tegyen termékeket a rendelésbe");
  }
  if (time() + (60 * 60) > strtotime($date)) {
    array_push($errors, "Rendelést minimum 1 órával előre szükséges leadni");
  }

  if (count($errors) == 0) {
    $query = "INSERT INTO orders (user_id, o_address, phone, o_date) 
  			  VALUES('$id', '$address', '$phone', '$date')";
    mysqli_query($db, $query);
    /*
    $get_id_query = "SELECT id FROM orders ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($db, $get_id_query);
    $fetch = mysqli_fetch_assoc($result);
    $id2 = $fetch['id'];
    */
    $id2 = mysqli_insert_id($db);
    for ($n = 0; $n < count($rendeles); $n += 3) {
      $f_name = strval($rendeles[$n]);
      $price = strval($rendeles[$n + 1]);
      $amount = intval($rendeles[$n + 2]);

      $query2 = "INSERT INTO ordered_food (order_id, f_name, price, amount) 
  			  VALUES('$id2', '$f_name', '$price', '$amount')";
      mysqli_query($db, $query2);
    }

    $_SESSION['success'] = "1";
  }

}

if (isset($_POST['email_sender'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];


  if (empty($name)) {
    array_push($errors, "Adja meg a nevét!");
  }
  if (empty($email)) {
    array_push($errors, "Adja meg az emailcímét!");
  }
  if (empty($message)) {
    array_push($errors, "Írjon üzenetet!");
  }

  if (count($errors) == 0) {
    $query = "INSERT INTO email (name, email, message)
  VALUES('$name', '$email', '$message')";
    mysqli_query($db, $query);

  }

}
?>