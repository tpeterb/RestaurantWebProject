<?php 
    //include('server.php');
    session_start(); 

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
    <link rel="stylesheet" type="text/css" href="kosar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Das Restaurant - Főoldal</title>
</head>
<body onload="fillCartTable()">
    <header class="loginBar" name="top">
        <nav class="loginMenu clearfix">
            <ul>
                <?php  if (isset($_SESSION['username'])) : ?>
                    <li><a href="">Bejelentkezve: <?php echo $_SESSION['username']; ?></a></li>
                    <li><a href="etlap.php?logout='1'" style="color: red">Kijelentkezés</a></li>
                <?php endif ?>
                <?php  if (!isset($_SESSION['username'])) : ?>
                    <li><a href="login.php">Bejelentkezés</a></li>
                    <li><a href="register.php">Regisztráció</a></li>
                <?php endif ?>
            </ul>
        </nav>
        <a href="#"><i class="fa fa-shopping-cart"></i></a>
    </header>
    <a href="#top" class="navToTheTop"><i class="scrollUpIcon"></i></a>
    <div class="container">
        <header>
            <h1>Das Restaurant</h1>
            <nav class="mainMenu clearfix" style="z-index: 200;">
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
                    <li class="hasNoSubmenu mainMenuPoint"><a href="">Blog</a></li>
                    <li class="hasSubmenu mainMenuPoint">
                        <a href="galeria.php">Galéria</a>
		            </li>
                    <li class="hasNoSubmenu mainMenuPoint"><a href="kapcsolat.php">Kapcsolat</a></li>
                </ul>
            </nav>
        </header>
        <main class="content">
            <section class="cartContainer">
                <h1>A kosár tartalma:</h1>
                <div class="cartContent">
                    <table class="cartTable">
                        <thead>
                            <tr>
                                <th>Termék neve</th>
                                <th>Mennyiség</th>
                                <th>Ár</th>
                            </tr>
                        </thead>
                        <tbody>
                             <!--<tr>
                                <td>Valami kajának a neve</td>
                                <td>
                                    <div>
                                        <button type="button" class="amountChangerButton">-</button>
                                        <div>12</div>
                                        <button type="button" class="amountChangerButton">+</button>
                                    </div>
                                </td>
                                <td>Egységár Ft</td>
                                <td><i class="fa fa-trash-o"></i></td>
                            </tr>
                            <tr>
                                <td>Valami kajának a neve</td>
                                <td>
                                    <div>
                                        <button type="button" class="amountChangerButton">-</button>
                                        <div>5</div>
                                        <button type="button" class="amountChangerButton">+</button>
                                    </div>
                                </td>
                                <td>Egységár Ft</td>
                                <td><i class="fa fa-trash-o"></i></td>
                            </tr>
                            <tr>
                                <td>Valami kajának a neve</td>
                                <td>
                                    <div>
                                        <button type="button" class="amountChangerButton">-</button>
                                        <div>2</div>
                                        <button type="button" class="amountChangerButton">+</button>
                                    </div>
                                </td>
                                <td>Egységár Ft</td>
                                <td><i class="fa fa-trash-o"></i></td>
                            </tr>
                            <tr class="sumPriceRow">
                                <td></td>
                                <td>Összesen:</td>
                                <td>32000 Ft</td>
                                <td></td>
                            </tr>-->
                        </tbody>
                    </table>
                    <div class="cartButtonContainer">
                        <button type="button" name="clearCartButton" onclick="clearCart()">Kosár ürítése</button>
                        <a href="etlap.php"><button type="button" name="backToMenuButton">Vissza a vásárláshoz</button></a>
                        <?php  if (isset($_SESSION['username'])) : ?>
                            <button type="submit" onclick="writeData()" name="submit" value="submit">Rendelési adatok megadása</button>
                        <?php endif ?>
                        <?php  if (!isset($_SESSION['username'])) : ?>
                            <button type="submit" onclick="login()" name="submit" value="submit">Rendelési adatok megadása</button>
                        <?php endif ?>
                    </div>
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
                    <?php  if (isset($_SESSION['username'])) : ?>
                        <a href="reservation.php"><button class="footerButton">Asztalfoglalás</button></a>
                    <?php endif ?>
                    <?php  if (!isset($_SESSION['username'])) : ?>
                        <a href="login.php?mustlogin='1'"><button class="footerButton">Asztalfoglalás</button></a>
                    <?php endif ?>
                    <button class="footerButton">Rendelés</button>
                </div>
                <div class="followUs">
                    <h4>Kövess minket!</h4>
                    <div class="iconContainer">
                        <a href="https://www.facebook.com/Das-Restaurant-106249918912939" target="_blank" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-twitter"></a> 
                    </div>         
                </div>
            </footer>
        </main>
    </div>
    <script src="kosar.js"></script>
</body>
</html>