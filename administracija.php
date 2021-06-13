<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta name="description" sadrzaj="some description">
    <meta name="keywords" sadrzaj="keyword 1, keyword 2, keyword 3, keyword 4, ...">
    <title>Administracija</title>
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
        <?php
            session_start();
            include 'connect.php';
            $uspjesnaPrijava = false;
            $admin =false;
            $msg= '';
            define('UPLPATH', 'images/');
            if (isset($_POST['prijava'])) {
                $kor_ime = $_POST['kor_ime'];
                $sifra = $_POST['pass'];
                $sql = "SELECT korisnicko_ime,lozinka,razina FROM korisnik WHERE korisnicko_ime = ?";
                $stmt = mysqli_stmt_init($dbc);

                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, 's', $kor_ime);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                }
                mysqli_stmt_bind_result($stmt, $korisnik,$lozinka,$razina);
                mysqli_stmt_fetch($stmt);

                if (password_verify($sifra, $lozinka) && mysqli_stmt_num_rows($stmt) > 0) {
                    $uspjesnaPrijava = true;
                    $_SESSION['$username'] = $kor_ime;
                    $_SESSION['$level'] = $razina;
                    if($razina == 1) {
                        $admin = true;
                    }
                    else {
                        $admin = false;
                    }
                
                }
                else {
                    $uspjesnaPrijava = false;
                    $msg='Korisničko ime ne postoji.<br><a href="registracija.php"> Registriraj te se!</a>';
                }
            }
            if(isset($_POST['delete'])){
                $id=$_POST['id'];
                $query = "DELETE FROM vijesti WHERE id=$id ";
                $result = mysqli_query($dbc, $query);
            }
            if(isset($_POST['update'])){
            $slika = $_FILES['slika']['name'];
            $naslov=$_POST['naslov'];
            $sazetak=$_POST['sazetak'];
            $sadrzaj=$_POST['sadrzaj'];
            $kategorija=$_POST['kategorija'];
            if(isset($_POST['arhiva'])){
                $arhiva=1;
            }else{
                $arhiva=0;
            }
            $target_dir = 'images/'.$slika;
            move_uploaded_file($_FILES["slika"]["tmp_name"], $target_dir);
            $id=$_POST['id'];
            $query = "UPDATE vijesti SET naslov='$naslov', sazetak='$sazetak', tekst='$sadrzaj',
            slika='$slika', kategorija='$kategorija', arhiva='$arhiva' WHERE id=$id ";
            $result = mysqli_query($dbc, $query);
            }
        ?>
            <?php
                if (($uspjesnaPrijava == true && $admin == true) || (isset($_SESSION['$username'])) && $_SESSION['$level'] == 1) {
                    $query = "SELECT * FROM vijesti";
                    $result = mysqli_query($dbc, $query);
                    while($row = mysqli_fetch_array($result)) {
                        echo '<h2 class="admin">Promijenite sadržaj </h2>';
                        include 'connect.php';
                        $query = "SELECT * FROM vijesti";
                        $result = mysqli_query($dbc, $query);
                        $i=0;
                        while($row = mysqli_fetch_array($result)) {
                            echo '<div class="forma">';
                            echo '<form enctype="multipart/form-data" action="" method="POST">
                            <div class="form-item">
                            <label for="naslov">Naslov vjesti:</label>
                            <div class="form-field">
                            <input type="text" name="naslov" class="form-field-textual" value="'.$row['naslov'].'">
                                </div>
                                </div>
                                <div class="form-item">
                                <label for="sazetak">Kratki sadržaj vijesti (do 50 znakova):</label>
                                <div class="form-field">
                                <textarea name="sazetak" id="" cols="30" rows="10" class="formfield-textual">'.$row['sazetak'].'</textarea>
                                </div>
                                </div>
                                <div class="form-item">
                                <label for="sadrzaj">Sadržaj vijesti:</label>
                                <div class="form-field">
                                <textarea name="sadrzaj" id="" cols="30" rows="10" class="formfield-textual">'.$row['tekst'].'</textarea>
                                </div>
                                </div>
                                <div class="form-item">
                                <label for="slika">Slika:</label>
                                <div class="form-field">
                            14
                                <input type="file" class="input-text" id="slika" value="'.$row['slika'].'" name="slika"/> <br><img src="' . UPLPATH .$row['slika'] . '" width=100px>
                                </div>
                                </div>
                                <div class="form-item">
                                <label for="kategorija">Kategorija vijesti:</label>
                                <div class="form-field">
                                <select name="kategorija" id="" class="form-field-textual" value="'.$row['kategorija'].'">
                                <option value="u.s.">U.S.</option>
                                <option value="world">World</option>
                                </select>
                                </div>
                                </div>
                                <div class="form-item">
                                <label>Spremiti u arhivu:
                                <div class="form-field">';
                                if($row['arhiva'] == 0) {
                                echo '<input type="checkbox" name="arhiva" id="arhiva"/> Arhiviraj?';
                                } 
                                else {
                                echo '<input type="checkbox" name="arhiva" id="arhiva" checked/> Arhiviraj?';}
                                echo '</div>
                                </label>
                                </div>
                                </div>
                                <div class="form-item">
                                <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'">
                                <button type="reset" value="Poništi">Poništi</button>
                                <button type="submit" name="update" value="Prihvati">Izmjeni</button>
                                <button type="submit" name="delete" value="Izbriši">Izbriši</button>
                                </div>
                                </form>';
                                echo '</div class>';
                        }
                    }

                    } 
                    else if ($uspjesnaPrijava == true && $admin == false) {
                    echo '<br><br><p>Bok ' . $korisnik . '! Uspješno ste prijavljeni, ali niste administrator.</p>';
                    } 
                    else if (isset($_SESSION['$username']) && $_SESSION['$level'] == 0) {
                        echo '<br><br><p>Bok ' . $_SESSION['$username'] . '! Uspješno ste prijavljeni, ali niste administrator.</p>';
                    } 
                    else if ($uspjesnaPrijava == false) {
                        ?>
                        <!-- Forma za prijavu -->
                        <section role="main" class="forma">
                            <h1 class="unos">Prijava</h1>
                            <form enctype="multipart/form-data" action="" method="POST" name="forma">
                                <label for="content">Korisničko ime:</label>
                                <div class="form-field">
                                    <input type="text" name="kor_ime" id="kor_ime" class="formfield-textual">
                                    <span id="porukakor_ime" class="bojaPoruke"></span>
                                </div>
                                <div class="form-item">
                                    <label for="pphoto">Lozinka: </label>
                                    <div class="form-field">
                                        <input type="password" name="pass" id="pass" class="formfield-textual">
                                        <span id="porukaPass" class="bojaPoruke"></span>
                                    </div>
                                </div>
                                <br>
                                <div class="form-item">
                                    <button type="submit" value="Prijava" name="prijava" id="prijava">Prijava</button>
                                    <?php echo '<br><br><span>'.$msg.'</span><br/>'; ?>
                                </div>
                            </form>
                        </section>
                        <script type="text/javascript">
                            document.getElementById("prijava").onclick = function(event) {
                            var slanjeForme = true;
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

                            // Provjera lozinke
                            var poljePass = document.getElementById("pass");
                            var pass = document.getElementById("pass").value;
                            if (pass.length == 0 ) {
                                slanjeForme = false;
                                poljePass.style.border="1px dashed red";
                                document.getElementById("porukaPass").style.color="red";
                                document.getElementById("porukaPass").innerHTML="<br>Lozinke nije točna!<br>";
                            } 
                            else {
                                poljePass.style.border="1px solid green";
                                document.getElementById("porukaPass").innerHTML="";
                            }

                            if (slanjeForme != true) {
                                event.preventDefault();
                            }
                            };

                        </script>
                <?php }?>
    </div>
    <div class="center">
        <br>
        <footer>
            <hr>
            <p>© ANDREA PERIĆ aperic@tvz.hr 2021</p>
            <hr>
        </footer>
    </div>
</body>
</html>
<?php
mysqli_close($dbc);
?>

