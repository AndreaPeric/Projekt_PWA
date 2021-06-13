<?php
                include "connect.php";
                $msg= '';
                $registriranKorisnik = false;
                $reg ='';
                if (isset($_POST['slanje'])) {
                    $ime = $_POST['ime'];
                    $prezime = $_POST['prezime'];
                    $kor_ime = $_POST['kor_ime'];
                    $lozinka = $_POST['pass'];
                    $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
                    $razina = 0;
                    
                    $sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
                    $stmt = mysqli_stmt_init($dbc);
                    if (mysqli_stmt_prepare($stmt, $sql)) {
                        mysqli_stmt_bind_param($stmt, 's', $kor_ime);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                     }
                    if(mysqli_stmt_num_rows($stmt) > 0){
                        $msg='Korisničko ime već postoji!';}
                    else{
                     $sql = "INSERT INTO korisnik (ime, prezime,korisnicko_ime, lozinka,razina)VALUES (?, ?, ?, ?, ?)";
                     $stmt = mysqli_stmt_init($dbc);
                     if (mysqli_stmt_prepare($stmt, $sql)) {
                     mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $kor_ime,$hashed_password, $razina);
                     mysqli_stmt_execute($stmt);
                     $registriranKorisnik = true;
                     if($registriranKorisnik == true) {
                        $reg= '<br><p>Korisnik je uspješno registriran!</p>';
                        } 
                        else {
                            $reg = '<br><p class="error">Registracija nije uspijela!</p>';  
                        }
                     }
                    }
                    mysqli_close($dbc);    
                }
                ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="UTF-8">
        <meta name="description" sadrzaj="some description">
        <meta name="keywords" sadrzaj="keyword 1, keyword 2, keyword 3, keyword 4, ...">
        <title>Registracija</title>
    </head>

    <body>
        <div class="center">
            <header>
                <div class="new">
                    <h1>Newsweek</h1>
                    <p class="vri"><?php echo date('D,F j,Y');?></p>
                </div>
                <nav>
                <ul>
                    <li>
                        <a href="index.php" class="">Početna</a>
                    </li>
                    <li>
                        <a href="kategorija.php?id=u.s." class="">U.S.</a>
                    </li>
                    <li>
                        <a href="kategorija.php?id=world" class="">World</a>
                    </li>
                    <li>
                        <a href="unos.php" class="">Unos</a>
                    </li>
                    <li>
                        <a href="administracija.php" class="">Administracija</a>
                    </li>
                </ul>
            </nav>
            </header>
            <section role="main" class="forma">
                <h1 class="unos">Registracija</h1>
                <form enctype="multipart/form-data" action="" method="POST" name="forma">
                    <div class="form-item">
                        <span id="porukaIme" class="bojaPoruke"></span>
                        <label for="title">Ime: </label>
                        <div class="form-field">
                        <input type="text" name="ime" id="ime" class="form-fieldtextual">
                        </div>
                        </div>
                        <div class="form-item">
                        <span id="porukaPrezime" class="bojaPoruke"></span>
                        <label for="about">Prezime: </label>
                        <div class="form-field">
                        <input type="text" name="prezime" id="prezime" class="formfield-textual">
                        </div>
                        </div>
                        <div class="form-item">
                        <span id="porukakor_ime" class="bojaPoruke"></span>

                        <label for="content">Korisničko ime:</label>
                        <div class="form-field">
                        <input type="text" name="kor_ime" id="kor_ime" class="formfield-textual">
                        <?php echo '<br><span class="error">'.$msg.'</span><br/>'; ?>
                        </div>
                        </div>
                        <div class="form-item">
                        <span id="porukaPass" class="bojaPoruke"></span>
                        <label for="pphoto">Lozinka: </label>
                        <div class="form-field">
                        <input type="password" name="pass" id="pass" class="formfield-textual">
                        </div>
                        </div>
                        <div class="form-item">
                        <span id="porukaPassRep" class="bojaPoruke"></span>
                        <label for="pphoto">Ponovite lozinku: </label>
                        <div class="form-field">
                        <input type="password" name="passRep" id="passRep"
                        class="form-field-textual">
                        </div>
                        </div>
                        <br>
                        <div class="form-item">
                        <button type="submit" value="Prijava" name="slanje" id="slanje">Prijava</button>
                        <?php echo '<br><span class="bojaPoruke">'.$reg.'</span><br/>'; ?>
                    </div>
                </form>
            </section>
            <script type="text/javascript">
                document.getElementById("slanje").onclick = function(event) {

                var slanjeForme = true;

                // Ime korisnika mora biti uneseno
                var poljeIme = document.getElementById("ime");
                var ime = document.getElementById("ime").value;
                if (ime.length == 0) {
                slanjeForme = false;
                poljeIme.style.border="1px dashed red";
                document.getElementById("porukaIme").style.color="red";
                document.getElementById("porukaIme").innerHTML="<br>Unesite ime!<br>";
                } else {
                poljeIme.style.border="1px solid green";
                document.getElementById("porukaIme").innerHTML="";
                }
                // Prezime korisnika mora biti uneseno
                var poljePrezime = document.getElementById("prezime");
                var prezime = document.getElementById("prezime").value;
                if (prezime.length == 0) {
                slanjeForme = false;
                poljePrezime.style.border="1px dashed red";
                document.getElementById("porukaPrezime").style.color="red";
                document.getElementById("porukaPrezime").innerHTML="<br>Unesite Prezime!<br>";
                } else {
                poljePrezime.style.border="1px solid green";
                document.getElementById("porukaPrezime").innerHTML="";
                }

                // Korisničko ime mora biti uneseno
                var poljekor_ime = document.getElementById("kor_ime");
                var kor_ime = document.getElementById("kor_ime").value;
                if (kor_ime.length == 0) {
                slanjeForme = false;
                poljekor_ime.style.border="1px dashed red";
                document.getElementById("porukakor_ime").style.color="red";
                document.getElementById("porukakor_ime").innerHTML="<br>Unesite korisničko ime!<br>";
                } else {
                poljekor_ime.style.border="1px solid green";
                document.getElementById("porukakor_ime").innerHTML="";
                }

                // Provjera podudaranja lozinki
                var poljePass = document.getElementById("pass");
                var pass = document.getElementById("pass").value;
                var poljePassRep = document.getElementById("passRep");
                var passRep = document.getElementById("passRep").value;
                if (pass.length == 0 || passRep.length == 0 || pass != passRep) {
                    slanjeForme = false;
                    poljePass.style.border="1px dashed red";
                    poljePassRep.style.border="1px dashed red";
                    document.getElementById("porukaPass").style.color="red";
                    document.getElementById("porukaPass").innerHTML="<br>Lozinke nisu iste!<br>";
                    document.getElementById("porukaPassRep").style.color="red";
                    document.getElementById("porukaPassRep").innerHTML="<br>Lozinke nisu iste!<br>";
                } 
                else {
                    poljePass.style.border="1px solid green";
                    poljePassRep.style.border="1px solid green";
                    document.getElementById("porukaPass").innerHTML="";
                    document.getElementById("porukaPassRep").innerHTML="";
                }

                if (slanjeForme != true) {
                    event.preventDefault();
                }
            };
            </script>   
        <br>
        <footer>
            <hr>
            <p>© ANDREA PERIĆ aperic@tvz.hr 2021</p>
            <hr>
        </footer>
        </div>
    </body>
</html>