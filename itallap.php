<?php 
    session_start(); 

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location: itallap.php");
    }
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="itallap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Das Restaurant - Itallap</title>
</head>
<body>
    <header class="loginBar" name="top">
        <nav class="loginMenu clearfix">
            <ul>
                <?php  if (isset($_SESSION['username'])) : ?>
                    <li><a href="">Bejelentkezve: <?php echo $_SESSION['username']; ?></a></li>
                    <li><a href="itallap.php?logout='1'" style="color: red">Kijelentkezés</a></li>
                <?php endif ?>
                <?php  if (!isset($_SESSION['username'])) : ?>
                    <li><a href="login.php">Bejelentkezés</a></li>
                    <li><a href="register.php">Regisztráció</a></li>
                <?php endif ?>
            </ul>
        </nav>
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
                            <li><a href="#">Itallap</a></li>
                        </ul>
                    </li>
                    <li class="hasNoSubmenu mainMenuPoint"><a href="">Blog</a></li>
                    <li class="hasSubmenu mainMenuPoint">
                        <a href="">Rendezvényszervezés</a>
                        <ul class="submenu">
                            <li><a href="">Esküvőszervezés</a></li>
                            <li><a href="">Céges rendezvények</a></li>
                            <li><a href="">Különleges események</a></li>
                        </ul>
		            </li>
                    <li class="hasNoSubmenu mainMenuPoint"><a href="">Kapcsolat</a></li>
                </ul>
            </nav>
        </header>
        <main class="content">
	    <div class="drinkSelectorContainer">
                <select class="drinkSelector">
                    <option id="chefRec"><a href="">Üdítők</a></option>
                    <option id="starters"><a href=""></a>Ásványvizek</a></option>
                    <option id="soups"><a href=""></a>Rostos levek</a></option>
                    <option id="poultry"><a href=""></a>Röviditalok</a></option>
                    <option id="fish"><a href=""></a>Sörök</a></option>
                    <option id="pork"><a href=""></a>Borok, pezsgők</a></option>
                    <option id="vegan"><a href=""></a>Kávék</a></option>
                </select>
            </div>
            <div class="drinkContainer">
                <div class="drinkSection">
                    <h1>Üdítők</h1>
                    <h2>A felfrissülés felelősei</h2>
                    <div class="drinkList">
                        <div class="drinkItem">
                            <div class="drinkName">Fanta</div>
                            <div class="drinkPrice">300 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Limonádé</div>
                            <div class="drinkPrice">500 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Coca Cola</div>
                            <div class="drinkPrice">350 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Fuze tea barack, zöld</div>
                            <div class="drinkPrice">400 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Kinley Gyömbér</div>
                            <div class="drinkPrice">450 Ft</div>
                        </div>
			<div class="drinkItem">
                            <div class="drinkName">Kinley Tonic</div>
                            <div class="drinkPrice">250 Ft</div>
                        </div>
                    </div>
                </div>
                <div class="drinkSection">
                    <h1>Ásványvizek</h1>
                    <h2>Jobban csúszik tőle az étel</h2>
                    <div class="drinkList">
                        <div class="drinkItem clearfix">
                            <div class="drinkName">Natur Aqua</div>
                            <div class="drinkPrice">200 Ft</div>
                        </div>
                        <div class="drinkItem clearfix">
                            <div class="drinkName">Szentkirályi</div>
                            <div class="drinkPrice">150 Ft</div>
                        </div>
                        <div class="drinkItem clearfix">
                            <div class="drinkName">Kékforrás</div>
                            <div class="drinkPrice">100 Ft</div>
                        </div>
                        <div class="drinkItem clearfix">
                            <div class="drinkName">Aquarius</div>
                            <div class="drinkPrice">150 Ft</div>
                        </div>
                    </div>
                </div>
                <div class="drinkSection">
                    <h1>Rostos levek</h1>
                    <h2>Palackba zárt egészség</h2>
                    <div class="drinkList">
                        <div class="drinkItem">
                            <div class="drinkName">Cappy alma, narancs, ananász</div>
                            <div class="drinkPrice">300 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Sió barack, alma</div>
                            <div class="drinkPrice">350 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Hohes C Classic</div>
                            <div class="drinkPrice">500 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Rauch narancslé</div>
                            <div class="drinkPrice">450 Ft</div>
                        </div>
                    </div>
                </div>
                <div class="drinkSection">
                    <h1>Röviditalok</h1>
                    <h2>A szeszélyes boldogság hírnökei</h2>
                    <div class="drinkList">
                        <div class="drinkItem">
                            <div class="drinkName">Szathmári szilvapálinka</div>
                            <div class="drinkPrice">700 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Kajszibarack-pálinka</div>
                            <div class="drinkPrice">600 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Körtepálinka</div>
                            <div class="drinkPrice">400 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Jägermeister</div>
                            <div class="drinkPrice">900 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Unicum</div>
                            <div class="drinkPrice">1000 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Jim Beam</div>
                            <div class="drinkPrice">900 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Ballantines</div>
                            <div class="drinkPrice">1100 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Jack Daniel's</div>
                            <div class="drinkPrice">700 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Bacardi Carta Blanca</div>
                            <div class="drinkPrice">1200 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Bailey's</div>
                            <div class="drinkPrice">500 Ft</div>
                        </div>
                    </div>
                </div>
                <div class="drinkSection">
                    <h1>Sörök</h1>
                    <h2>A legjobb minőségű árpából</h2>
                    <div class="drinkList">
                        <div class="drinkItem">
                            <div class="drinkName">Dreher</div>
                            <div class="drinkPrice">400 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Stella Artois</div>
                            <div class="drinkPrice">500 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Heineken</div>
                            <div class="drinkPrice">350 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Kőbányai</div>
                            <div class="drinkPrice">200 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Soproni</div>
                            <div class="drinkPrice">300 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Pilsner</div>
                            <div class="drinkPrice">350 Ft</div>
                        </div>
                    </div>
                </div>
                <div class="drinkSection">
                    <h1>Borok, pezsgők</h1>
                    <h2>A borvidékek kincsei</h2>
                    <div class="drinkList">
                        <div class="drinkItem">
                            <div class="drinkName">Tokaji aszú</div>
                            <div class="drinkPrice">600 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Vörösbor</div>
                            <div class="drinkPrice">400 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Egri bikavér</div>
                            <div class="drinkPrice">500 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Egri leányka</div>
                            <div class="drinkPrice">500 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Szürkebarát</div>
                            <div class="drinkPrice">700 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Olaszrizling</div>
                            <div class="drinkPrice">550 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Törley</div>
                            <div class="drinkPrice">400 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Hungária Extra Dry</div>
                            <div class="drinkPrice">600 Ft</div>
                        </div>
                    </div>
                </div>
                <div class="drinkSection">
                    <h1>Kávék</h1>
                    <h2>Élénkítő finomságok</h2>
                    <div class="drinkList">
                        <div class="drinkItem">
                            <div class="drinkName">Espresso</div>
                            <div class="drinkPrice">300 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Ristretto</div>
                            <div class="drinkPrice">250 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Cappuccino</div>
                            <div class="drinkPrice">300 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Tejeskávé</div>
                            <div class="drinkPrice">350 Ft</div>
                        </div>
                        <div class="drinkItem">
                            <div class="drinkName">Jeges kávé</div>
                            <div class="drinkPrice">250 Ft</div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="mainContentSection tableBooking">
                <h2 class="sectionContentItem">foglaljon asztalt online</h2>
                <p class="sectionContentItem">Éttermünkben - főként péntekenként és hétvégén - teltház van. Annak érdekében, hogy egészen biztosan találj helyet nálunk, kérjük, lehetőség szerint foglalj asztalt előre.</p>
                <div class="sectionContentItem tableBookingButtonContainer">
                    <button type="button" class="tableBookingButton">Lefoglalom!</button>
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
                    <button class="footerButton">Asztalfoglalás</button>
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