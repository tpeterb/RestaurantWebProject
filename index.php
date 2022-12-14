<?php 
    session_start(); 
    header("Content-Type: text/html; charset=utf-8");
    $mustlogin="";

    if (isset($_GET['logout'])) {
        session_destroy();
        //unset($_SESSION['username']);
        header("location: index.php");
    }
    
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Das Restaurant -Főoldal</title>
</head>
<body>
    <header class="loginBar" name="top">
        <nav class="loginMenu clearfix">
            <ul>
                <?php  if (isset($_SESSION['username'])) : ?>
                    <li><a href="">Bejelentkezve: <?php echo $_SESSION['username']; ?></a></li>
                    <li><a href="index.php?logout='1'" style="color: red">Kijelentkezés</a></li>
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
            <nav class="mainMenu clearfix">
                <label for="toggleMenu" class="showMenuButton">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
                <input type="checkbox" id="toggleMenu">
                <ul>
                    <li class="hasNoSubmenu mainMenuPoint"><a href="#">Főoldal</a></li>
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
                    <?php endif ?>                    <li class="hasSubmenu mainMenuPoint">
                        <a href="galeria.php">Galéria</a>
		            </li>
                    <li class="hasNoSubmenu mainMenuPoint"><a href="kapcsolat.php">Kapcsolat</a></li>
                </ul>
            </nav>
        </header>
        <main class="content">
            <section class="mainContentSection introduction">
                <h2 class="hasBox">bemutatkozás</h2>
                <div class="sectionContent">
                    <div class="sectionContentItem containsImage">
                        <img class="sectionContentItemImage" src="outdoor-dining.jpg" alt="The Restaurant" title="The Restaurant">
                    </div>
                    <div class="sectionContentItem">
                        <p>
                            Gyönyörű környezetben, a debreceni Nagyerdő szívében várjuk kedves vendégeinket. Az étterem télen 120 fő befogadására alkalmas, ez nyáron kiegészül a 80 fős terasszal. Az étteremben egy 20 fős és egy 50 fős különterem található, ahol vállaljuk családi, baráti és céges rendezvények, esküvők, keresztelők teljes körű lebonyolítását. Az étlapunkon tradicionális magyar és nemzetközi gasztronómia ételeiből válogathatnak. Vendégeinknek lehetősége nyílik arra, hogy az egyes ételek elkészítését vagy befejező műveleteit az asztaluknál szemmel kísérjék. Hétköznapokon napi menüt készítünk, amely már kiegészül a speciálisan elkészített napi menükkel is. Ezek az ételek hozzáadott glutént, tejterméket és tojásfehérjét nem tartalmaznak. Az étterem konyhája nem diétás konyhának van minősítve, az ételek nem elkülönített helységben készülnek. A glutént, tejterméket, tojásfehérjét étkezésükben mellőző vendégeinket igyekszünk kiszolgálni.
                        </p>
                    </div>
                </div>
            </section>
            <section class="mainContentSection tableBooking">
                <h2 class="sectionContentItem">foglaljon asztalt online</h2>
                <p class="sectionContentItem">Éttermünkben - főként péntekenként és hétvégén - teltház van. Annak érdekében, hogy egészen biztosan találj helyet nálunk, kérjük, lehetőség szerint foglalj asztalt előre.</p>
                <div class="sectionContentItem tableBookingButtonContainer">
                    <?php  if (isset($_SESSION['username'])) : ?>
                        <a href="reservation.php"><button type="button" class="tableBookingButton"> Lefoglalom!</button></a>
                    <?php endif ?>
                    <?php  if (!isset($_SESSION['username'])) : ?>
                        <a href="login.php?mustlogin='1'"><button type="button" class="tableBookingButton"> Lefoglalom!</button></a>
                    <?php endif ?>
                </div>
            </section>
            <section class="mainContentSection whyUs">
                <h2 class="hasBox">miért minket válasszon</h2>
                <div class="whyUsSlideshow">
                    <div class="whyUsSlideshowPage page1">
                        <div class="slideContent">
                            <h3>Gyönyörű környezet</h3>
                            <p>éttermünk Közép-Európa egyedülálló nyitott okoskertje, a Derecskei Gyümölcsös szomszédságában fekszik, ezért kellemes madárcsicsergés kíséretében ebédelhettek, vacsorázhattok nálunk. A kertet a jövő gyümölcsösének is nevezik, hiszen 200 focipályányi területén automata kormányzású traktorok, okostelefonról működő öntözőberendezések és más technológiai vívmányok dolgoznak, környezetbarát módon. A kertben minden évben több mint félmillió almafa virágzása nyújt csodálatos élményt.</p>
                        </div>
                        <button type="button" class="leftArrow arrow">&#8249;</button>
                        <button type="button" class="rightArrow arrow">&#8250;</button>
                        <div class="buttonContainer">
                            <button type="button" class="page1Button slideshowButton"></button>
                            <button type="button" class="page2Button slideshowButton"></button>
                            <button type="button" class="page3Button slideshowButton"></button>
                        </div>
                    </div>
                    <div class="whyUsSlideshowPage page2">
                        <div class="slideContent">
                            <h3>Házias ízek</h3>
                            <p>A mi Egyedi Ízvilágunk az igényesen kiválogatott hozzávalóknak és a rövid szállitási távolságok miatti friss alapanyagoknak köszönhető. És persze a legkorszerűbb konyhatechnológiával történő szakszerű előállításnak, ettől lesz az ízélmény valóban különleges.</p>
                        </div>
                        <button type="button" class="leftArrow arrow">&#8249;</button>
                        <button type="button" class="rightArrow arrow">&#8250;</button>
                        <div class="buttonContainer">
                            <button type="button" class="page1Button slideshowButton"></button>
                            <button type="button" class="page2Button slideshowButton"></button>
                            <button type="button"class="page3Button slideshowButton"></button>
                        </div>
                    </div>
                    <div class="whyUsSlideshowPage page3">
                        <div class="slideContent">
                            <h3>Bio alapanyagok</h3>
                            <p>Dióhéjban ennyit szerettünk volna megosztani a konyhánkba kerülő húsokról, ahol az előkészítés során arra figyelünk, hogy minél kevesebbet veszítsen az értékes tápanyagaiból. Természetesen nyugodtan kérdezhettek a személyzetünktől is, ha még többet szeretnétek megtudni a Konyha Komfort húsról vagy tekintsétek meg a weboldalunkat!</p>
                        </div>
                        <button type="button" class="leftArrow arrow">&#8249;</button>
                        <button type="button" class="rightArrow arrow">&#8250;</button>
                        <div class="buttonContainer">
                            <button type="button"class="page1Button slideshowButton"></button>
                            <button type="button"class="page2Button slideshowButton"></button>
                            <button type="button"class="page3Button slideshowButton"></button>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mainContentSection customerOpinions">
                <h2>rólunk mondták</h2>
                <div class="opinionContainer">
                    <div class="opinion">
                        <p>"Dióhéjban ennyit szerettünk volna megosztani a konyhánkba kerülő húsokról, ahol az előkészítés során arra figyelünk, hogy minél kevesebbet veszítsen az értékes tápanyagaiból. Természetesen nyugodtan kérdezhettek a személyzetünktől is, ha még többet szeretnétek megtudni a Konyha Komfort húsról vagy tekintsétek meg a weboldalunkat!"</p>
                        <div class="opinionSource">Tóth Róbert, büfétulajdonos</div>
                    </div>
                    <div class="opinion">
                        <p>"A mi Egyedi Ízvilágunk az igényesen kiválogatott hozzávalóknak és a rövid szállitási távolságok miatti friss alapanyagoknak köszönhető. És persze a legkorszerűbb konyhatechnológiával történő szakszerű előállításnak, ettől lesz az ízélmény valóban különleges."</p>
                        <div class="opinionSource">Oláh éva, cégvezető</div>
                    </div>
                    <div class="opinion">
                        <p>"Éttermünk Közép-Európa egyedülálló nyitott okoskertje, a Derecskei Gyümölcsös szomszédságában fekszik, ezért kellemes madárcsicsergés kíséretében ebédelhettek, vacsorázhattok nálunk."</p>
                        <div class="opinionSource">Bessenyei Gábor, fogszakorvos</div>
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
                        <a href="reservation.php"><button class="footerButton" style="width:100%">Asztalfoglalás</button></a>
                    <?php endif ?>
                    <?php  if (!isset($_SESSION['username'])) : ?>
                        <a href="login.php?mustlogin='1'"><button class="footerButton" style="width:100%">Asztalfoglalás</button></a>
                    <?php endif ?>
                    <a href="etlap.php"><button class="footerButton" style="width:100%">Rendelés</button></a>
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
        <div class="cookies">
            <div class="cookieText">Weboldalunkon a felhasználói élmény színvonalának emelése érdekében cookie-kat használunk. Az "Elfogadom" gomb megnyomásával elfogadja ezek használatát.</div>
            <button type="button" class="cookieAcceptButton">Elfogadom</button>
        </div>
    </div>
    <script src="index.js"></script>
</body>
</html>