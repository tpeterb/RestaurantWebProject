<?php
session_start();

$username = "";
$email    = "";
$errors = array(); 

$db = mysqli_connect('localhost', 'root', '', 'RestaurantProject');  

if (isset($_POST['reg_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($username)) { array_push($errors, "Adja meg a felhasznólénevet"); }
  if (empty($email)) { array_push($errors, "Adja meg az email címet"); }
  if (empty($password_1)) { array_push($errors, "Adja meg a jelszót"); }
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
  	}else {
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

  if (empty($date)) { array_push($errors, "Adjon meg egy dátumot"); }
  if (empty($people)) { array_push($errors, "Adja meg a vendégek számát"); }
  if (empty($id)) { array_push($errors, "Jelentkezzen be"); }
  if (time()+(60*60*12) > strtotime($date)) { array_push($errors, "Asztalfoglalást minimum 12 órával előre szükséges leadni"); }

  if (count($errors) == 0) {
  	$query = "INSERT INTO table_reservation (user_id, people, tr_date) 
  			  VALUES('$id', '$people', '$date')";
  	mysqli_query($db, $query);
  	header('location: index.php');
  }
}


?>