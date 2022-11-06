<?php 
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
    <link rel="stylesheet" type="text/css" href="galeria.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="lightbox.min.css" rel="stylesheet" type="text/css"/>
    <script src="lightbox-plus-jquery.min.js"></script>
    <title>Das Restaurant - Étlap</title>
</head>
<body>
    <header class="loginBar" name="top">
        <nav class="loginMenu clearfix">
            <ul>
                <?php  if (isset($_SESSION['username'])) : ?>
                    <li><a href="">Bejelentkezve: <?php echo $_SESSION['username']; ?></a></li>
                    <li><a href="galeria.php?logout='1'" style="color: red">Kijelentkezés</a></li>
                <?php endif ?>
                <?php  if (!isset($_SESSION['username'])) : ?>
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
                        <a href="#">Galéria</a>
		            </li>
                    <li class="hasNoSubmenu mainMenuPoint"><a href="kapcsolat.php">Kapcsolat</a></li>
                </ul>
            </nav>
        </header>
        <main class="content">
           <section>
                <h1>Galéria éttermünkről</h1>
                <div class="gallery">
                    <a href="gallery1.jpg" data-lightbox="mygallery"><img src="gallery1-small.jpg"></a>
                    <a href="gallery2.jpg" data-lightbox="mygallery"><img src="gallery2-small.jpg"></a>
                    <a href="gallery3.jpg" data-lightbox="mygallery"><img src="gallery3-small.jpg"></a>
                    <a href="gallery4.jpg" data-lightbox="mygallery"><img src="gallery4-small.jpg"></a>
                    <a href="gallery5.jpg" data-lightbox="mygallery"><img src="gallery5-small.jpg"></a>
                    <a href="gallery6.jpg" data-lightbox="mygallery"><img src="gallery6-small.jpg"></a>
                    <a href="gallery7.jpg" data-lightbox="mygallery"><img src="gallery7-small.jpg"></a>
                    <a href="gallery8.jpg" data-lightbox="mygallery"><img src="gallery8-small.jpg"></a>
                    <a href="gallery9.jpg" data-lightbox="mygallery"><img src="gallery9-small.jpg"></a>
                    <a href="gallery10.jpg" data-lightbox="mygallery"><img src="gallery10-small.jpg"></a>
                    <a href="gallery11.jpg" data-lightbox="mygallery"><img src="gallery11-small.jpg"></a>
                    <a href="gallery12.jpg" data-lightbox="mygallery"><img src="gallery12-small.jpg"></a>
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
</body>
</html>