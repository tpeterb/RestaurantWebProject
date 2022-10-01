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
    <link rel="stylesheet" type="text/css" href="etlap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Das Restaurant - Étlap</title>
</head>
<body>
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
            <div class="foodSelectorContainer">
                <select class="foodSelector">
                    <option id="chefRec"><a href="#">Konyhafőnök ajánlata</a></option>
                    <option id="starters"><a href=""></a>Előételek</a></option>
                    <option id="soups"><a href=""></a>Levesek</a></option>
                    <option id="poultry"><a href=""></a>Szárnyasból készült ételek</a></option>
                    <option id="fish"><a href=""></a>Halételek</a></option>
                    <option id="pork"><a href=""></a>Sertéshúsból készült ételek</a></option>
                    <option id="vegan"><a href=""></a>Vegetáriánus ételek</a></option>
                    <option id="desserts"><a href=""></a>Desszertek</a></option>
                    <option id="salads"><a href=""></a>Saláták</a></option>
                </select>
            </div>
            <div class="foodContainer">
                <div class="foodSection">
                    <h1>Konyhafőnök ajánlata</h1>
                    <h2>Séfünk kedvencei</h2>
                    <div class="foodList">
                        <div class="foodItem">
                            <div class="foodName">Kucsmagomba krémleves</div>
                            <div class="foodPrice">1500 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Marhalábszár pörkölt tojásos galuskával</div>
                            <div class="foodPrice">2500 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Roston sült csirkecombfilé fűszeres tejfölös lilahagymával, baconnal és sajttal gratinírozva, medvehagymás burgonyapürével</div>
                            <div class="foodPrice">2400 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Zöldfűszeres tejfölben pácolt csirkemell</div>
                            <div class="foodPrice">2000 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Narancsos kacsa rózsaborsos-citrusos mangópürével</div>
                            <div class="foodPrice">2300 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Padlizsántorony grillezett kecskesajttal</div>
                            <div class="foodPrice">2200 Ft</div>
                        </div>
                    </div>
                </div>
                <div class="foodSection">
                    <h1>Előételek</h1>
                    <h2>Megjön tőlük az étvágy</h2>
                    <div class="foodList">
                        <div class="foodItem clearfix">
                            <div class="foodName">Tatár beefsteak friss zöldségekkel</div>
                            <div class="foodPrice">2000 Ft</div>
                        </div>
                        <div class="foodItem clearfix">
                            <div class="foodName">Cézár saláta chilis csirkemell csíkokkal és parmezán sajttal</div>
                            <div class="foodPrice">2100 Ft</div>
                        </div>
                        <div class="foodItem clearfix">
                            <div class="foodName">Tatár beefsteak vegyes zöldséggel, bivalytejföllel, pirítóssal</div>
                            <div class="foodPrice">2400 Ft</div>
                        </div>
                        <div class="foodItem clearfix">
                            <div class="foodName">Padlizsánkrém friss kerti zöldségekkel, baguette</div>
                            <div class="foodPrice">1800 Ft</div>
                        </div>
                        <div class="foodItem clearfix">
                            <div class="foodName">Hízott libamáj zsírjával</div>
                            <div class="foodPrice">1500 Ft</div>
                        </div>
                    </div>
                </div>
                <div class="foodSection">
                    <h1>Levesek</h1>
                    <h2>Hosszú lével készült finomságok</h2>
                    <div class="foodList">
                        <div class="foodItem">
                            <div class="foodName">Kucsmagomba krémleves</div>
                            <div class="foodPrice">1500 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Marhagulyás</div>
                            <div class="foodPrice">1600 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Cheddarsajtkrémes csirkeraguleves</div>
                            <div class="foodPrice">1400 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Házi tyúkhúsleves</div>
                            <div class="foodPrice">1700 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Hideg gyümölcsleves</div>
                            <div class="foodPrice">1300 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Mentás málnakrémleves</div>
                            <div class="foodPrice">1400 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Hideg kókusztejes mangóleves</div>
                            <div class="foodPrice">1500 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Sült vargánya krémleves</div>
                            <div class="foodPrice">1600 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Füstölt csülkös káposztás bableves</div>
                            <div class="foodPrice">1800 Ft</div>
                        </div>
                    </div>
                </div>
                <div class="foodSection">
                    <h1>Szárnyasból készült ételek</h1>
                    <h2>A baromfiudvar házias ízei</h2>
                    <div class="foodList">
                        <div class="foodItem">
                            <div class="foodName">Ropogós csirkemell falatok füstölt sonkás tészta ágyon</div>
                            <div class="foodPrice">2500 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Csirkemell torony Coleslaw salátával és steak burgonyával</div>
                            <div class="foodPrice">2300 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Barnavajas citromos csirkemell steak friss kevert salátával</div>
                            <div class="foodPrice">2400 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Tanyasi csirke rántva</div>
                            <div class="foodPrice">1700 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Barnacukorral karamellizált libamájas csirkemell</div>
                            <div class="foodPrice">1800 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Rozé kacsamell grillezett almával és camemberttel</div>
                            <div class="foodPrice">2000 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Házi sajttal-sonkával töltött pulykamell</div>
                            <div class="foodPrice">1500 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Tanyasi csirkemell csíkok cornflakes bundában</div>
                            <div class="foodPrice">1600 Ft</div>
                        </div>
                    </div>
                </div>
                <div class="foodSection">
                    <h1>Halételek</h1>
                    <h2>A vizek csodái</h2>
                    <div class="foodList">
                        <div class="foodItem">
                            <div class="foodName">Fogas sült fokhagymás burgonyapürével</div>
                            <div class="foodPrice">2500 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Füstölt sóval sült BBQ lazac steak kapros-tejszínes burgonyával</div>
                            <div class="foodPrice">2200 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Harcsapaprikás túrós metélt</div>
                            <div class="foodPrice">1900 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Bőrén sült lazac steak zöldséges pirított spagettivel</div>
                            <div class="foodPrice">2000 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Harcsafilé bakonyi gombamártásban, töpörtyűs túrós csuszával</div>
                            <div class="foodPrice">1900 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Fogasfilé rántva vajas petrezselymes burgonyával, tartármártással</div>
                            <div class="foodPrice">2200 Ft</div>
                        </div>
                    </div>
                </div>
                <div class="foodSection">
                    <h1>Sertéshúsból készült ételek</h1>
                    <h2>Saját nevelésű sertésből</h2>
                    <div class="foodList">
                        <div class="foodItem">
                            <div class="foodName">Körmös pacal</div>
                            <div class="foodPrice">2200 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Malacsült roppanós májhurkával</div>
                            <div class="foodPrice">2200 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Velővel töltött sovány karaj</div>
                            <div class="foodPrice">2000 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Omlós tarjapecsenye</div>
                            <div class="foodPrice">2500 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Hajdúsági töltött káposzta</div>
                            <div class="foodPrice">1700 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Rózsaborsos bélszín steak, igazi barna mártással, zöldség rőzsével, édesburgonya hasábbal</div>
                            <div class="foodPrice">2300 Ft</div>
                        </div>
                    </div>
                </div>
                <div class="foodSection">
                    <h1>Vegetáriánus ételek</h1>
                    <h2>Ínycsiklandozó, húsmentes fogások</h2>
                    <div class="foodList">
                        <div class="foodItem">
                            <div class="foodName">Ropogós saláta pirított zöldségekkel</div>
                            <div class="foodPrice">1300 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Lepcsánka sült zöldségekkel</div>
                            <div class="foodPrice">1500 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Spenótós-sajtkrémes palacsinta rántva</div>
                            <div class="foodPrice">1600 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Grillezett pekándiós padlizsán házi sajttal</div>
                            <div class="foodPrice">2000 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Római köményes zöldséges tempura</div>
                            <div class="foodPrice">1700 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Túrós csusza</div>
                            <div class="foodPrice">1700 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Vargányás-zöldséges rizottó</div>
                            <div class="foodPrice">1200 Ft</div>
                        </div>
                    </div>
                </div>
                <div class="foodSection">
                    <h1>Desszertek</h1>
                    <h2>Az étlap koronája</h2>
                    <div class="foodList">
                        <div class="foodItem">
                            <div class="foodName">Aranygaluska</div>
                            <div class="foodPrice">1000 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Rákóczi túrós</div>
                            <div class="foodPrice">600 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Mákos guba</div>
                            <div class="foodPrice">700 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Palacsinta</div>
                            <div class="foodPrice">200 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Almás sütemény</div>
                            <div class="foodPrice">100 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Meggyes pite</div>
                            <div class="foodPrice">150 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Somlói galuska</div>
                            <div class="foodPrice">800 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Sajttorta</div>
                            <div class="foodPrice">500 Ft</div>
                        </div>
                    </div>
                </div>
                <div class="foodSection">
                    <h1>Saláták</h1>
                    <h2>A főételek hűséges kísérői</h2>
                    <div class="foodList">
                        <div class="foodItem">
                            <div class="foodName">Csirkemell saláta</div>
                            <div class="foodPrice">1000 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Cézár saláta</div>
                            <div class="foodPrice">1100 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Paradicsomsaláta</div>
                            <div class="foodPrice">300 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Uborkasaláta</div>
                            <div class="foodPrice">400 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Házi csalamádé</div>
                            <div class="foodPrice">500 Ft</div>
                        </div>
                        <div class="foodItem">
                            <div class="foodName">Vegyes saláta</div>
                            <div class="foodPrice">300 Ft</div>
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