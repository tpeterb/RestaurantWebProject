<?php
include('server.php');

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: etlap.php");
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="kapcsolat.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Das Restaurant - Étlap</title>
</head>

<body>
	<header class="loginBar" name="top">
		<nav class="loginMenu clearfix">
			<ul>
				<?php if (isset($_SESSION['username'])): ?>
				<li><a href="">Bejelentkezve:
						<?php echo $_SESSION['username']; ?>
					</a></li>
				<li><a href="kapcsolat.php?logout='1'" style="color: red">Kijelentkezés</a></li>
				<?php endif ?>
				<?php if (!isset($_SESSION['username'])): ?>
				<li><a href="login.php">Bejelentkezés</a></li>
				<li><a href="register.php">Regisztráció</a></li>
				<?php endif ?>
			</ul>
		</nav>
		<a href="kosar.php"><i class="fa fa-shopping-cart"></i></a>
	</header>
	<a href="#top" class="navToTheTop"><i class="scrollUpIcon"></i></a>
	<div class="container">
		<header>
			<h1>Das Restaurant</h1>
			<nav class="mainMenu clearfix">
				<label for="toggleMenu" class="showMenuButton">
					<span></span>
					<span></span>
					<span></span>
				</label>
				<input type="checkbox" id="toggleMenu">
				<ul>
					<li class="hasNoSubmenu mainMenuPoint"><a href="index.php">Főoldal</a></li>
					<li class="hasSubmenu mainMenuPoint">
						<a href="">Menü</a>
						<ul class="submenu">
							<li><a href="etlap.php">Étlap</a></li>
							<li><a href="itallap.php">Itallap</a></li>
						</ul>
					</li>
					<?php  if (isset($_SESSION['username'])) : ?>
                        <li class="hasNoSubmenu mainMenuPoint"><a href="reservation.php">Asztalfoglalás</a></li>
                    <?php endif ?>
                    <?php  if (!isset($_SESSION['username'])) : ?>
                        <li class="hasNoSubmenu mainMenuPoint"><a href="login.php?mustlogin='1'">Asztalfoglalás</a></li>
                    <?php endif ?>					<li class="hasSubmenu mainMenuPoint">
						<a href="galeria.php">Galéria</a>
					</li>
					<li class="hasNoSubmenu mainMenuPoint"><a href="">Kapcsolat</a></li>
				</ul>
			</nav>
		</header>
		<main class="content">
			<section class="formSection">
				<div class="formContainer">
					<form method="post" name="contactForm" action="kapcsolat.php">
						<h2>Lépjen velünk kapcsolatba!</h2>
						<div class="row">
							<div class="inputHolder">
								<input type="text" placeholder="Név: *" name="name" autofocus required>
							</div>
						</div>
						<div class="row">
							<div class="inputHolder">
								<input type="email" placeholder="Email: *" name="email" required>
							</div>
						</div>
						<div class="row">
							<div class="inputHolder">
								<textarea required rows="10" name="message"
									placeholder="Kérem, hogy ide írja az üzenetet!"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="submitHolder">
								<button type="submit" class="submitButton" name="email_sender">Küldés!</button>
							</div>
						</div>
					</form>
				</div>
			</section>
			<footer>
				<div class="restaurantData">
					<h4>Das Restaurant elérhetőségei</h4>
					<table>
						<tr>
							<td>Cím:</td>
							<td>4029 Debrecen, Kassai út 26.</td>
						</tr>
						<tr>
							<td>Telefonszám:</td>
							<td>+36 70 123 45 67</td>
						</tr>
						<tr>
							<td>Email-cím:</td>
							<td>dasrestaurant@gmail.com</td>
						</tr>
					</table>
				</div>
				<div class="openingHours">
					<h4>Nyitvatartás</h4>
					<table>
						<tr>
							<td>Hétfő:</td>
							<td>6:00-20:00</td>
						</tr>
						<tr>
							<td>Kedd:</td>
							<td>6:00-20:00</td>
						</tr>
						<tr>
							<td>Szerda:</td>
							<td>6:00-20:00</td>
						</tr>
						<tr>
							<td>Csütörtök:</td>
							<td>6:00-20:00</td>
						</tr>
						<tr>
							<td>Péntek:</td>
							<td>7:00-21:00</td>
						</tr>
						<tr>
							<td>Szombat:</td>
							<td>8:00-22:00</td>
						</tr>
						<tr>
							<td>Vasárnap:</td>
							<td>8:00-22:00</td>
						</tr>
					</table>
				</div>
				<div class="usefulLinks">
					<h4>Hasznos linkek</h4>
					<?php if (isset($_SESSION['username'])): ?>
					<a href="reservation.php"><button class="footerButton"
							style="width:100%">Asztalfoglalás</button></a>
					<?php endif ?>
					<?php if (!isset($_SESSION['username'])): ?>
					<a href="login.php?mustlogin='1'"><button class="footerButton"
							style="width:100%">Asztalfoglalás</button></a>
					<?php endif ?>
					<a href="etlap.php"><button class="footerButton" style="width:100%">Rendelés</button></a>
				</div>
				<div class="followUs">
					<h4>Kövess minket!</h4>
					<div class="iconContainer">
						<a href="https://www.facebook.com/Das-Restaurant-106249918912939" target="_blank"
							class="fa fa-facebook"></a>
						<a href="#" class="fa fa-twitter"></a>
					</div>
				</div>
			</footer>
		</main>
	</div>
</body>

</html>