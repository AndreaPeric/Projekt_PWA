<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="description" content="some description">
    <meta name="keywords" content="keyword 1, keyword 2, keyword 3, keyword 4, ...">
    <title>Unos</title>
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
        <div class="forma">
            <h1 class="unos">Unesite vijest</h1>
            <form method="POST" enctype="multipart/form-data" action="skripta.php" name="forma">
                <div class="form-item">
                    <span id="porukaNaslov" class="bojaPoruke"></span>
                    <label for="naslov">Naslov vijesti</label>
                    <div class="form-field">
                        <input type="text" id="naslov" name="naslov" class="form-field-textual">
                    </div>
                </div><br>

                <div class="form-item">
                    <span id="porukaSazetak" class="bojaPoruke"></span>
                    <label for="sazetak">Kratki sadržaj vijesti (do 50
                        znakova)</label>
                    <div class="form-field">
                        <textarea name="sazetak" id="sazetak" cols="30" rows="10" class="formfield-textual"></textarea>
                    </div>
                </div><br>

                <div class="form-item">
                    <span id="porukaSadrzaj" class="bojaPoruke"></span>
                    <label for="sadrzaj">Sadržaj vijesti</label>
                    <div class="form-field">
                        <textarea name="sadrzaj" id="sadrzaj" cols="30" rows="10" class="form-field-textual"></textarea>
                    </div>
                </div><br>

                <div class="form-item">
                    <span id="porukaSlika" class="bojaPoruke"></span>
                    <label for="slika">Slika: </label>
                    <div class="form-field">
                        <input type="file" id="slika" accept="image/jpg,image/gif" class="input-text" name="slika" />
                    </div>
                </div><br>

                <div class="form-item">
                    <span id="porukaKategorija" class="bojaPoruke"></span>
                    <label for="kategorija">Kategorija vijesti</label>
                    <div class="form-field">
                        <select name="kategorija" id="kategorija" class="form-field-textual">
                        <option value="" disabled selected>Odabir kategorije</option>
                            <option value="u.s.">U.S.</option>
                            <option value="world">World</option>
                        </select>
                    </div>
                </div><br>

                <div class="form-item">
                    <label>Spremiti u arhivu:
                        <div class="form-field">
                            <input type="checkbox" name="arhiva" id="arhiva">
                        </div>
                    </label>
                </div><br>

                <div class="form-item">
                    <button type="reset" value="Poništi">Poništi</button>
                    <button type="submit" name="Prihvati" value="Prihvati" id="prihvati">Prihvati</button>
                </div>
            </form>

            <!--JavaScript-->
            <script type="text/javascript">
                document.getElementById("prihvati").onclick = function(event) {
                    var slanjeForme= true;

                    //Naslov
                    var poljeNaslov = document.getElementById("naslov");
                    var naslov= document.getElementById("naslov").value;
                    if (naslov.length < 5 || naslov.length > 30) {
                        slanjeForme = false;
                        poljeNaslov.style.border="1px dashed red";
                        document.getElementById("porukaNaslov").style.color="red";
                        document.getElementById("porukaNaslov").innerHTML="Naslov vijesti mora imati između 5 i 30 znakova!<br>";
                    }
                    else {
                        poljeNaslov.style.border="1px solid green";
                        document.getElementById("porukaNaslov").innerHTML=""; 
                    }

                    //Kratki sadržaj
                    var poljeSazetak = document.getElementById("sazetak");
                    var sazetak = document.getElementById("sazetak").value;
                    if (sazetak.length < 10 || sazetak.length > 100) {
                        slanjeForme = false;
                        poljeSazetak.style.border="1px dashed red";
                        document.getElementById("porukaSazetak").style.color="red";
                        document.getElementById("porukaSazetak").innerHTML="Kratki sadržaj mora imati između 10 i 100 znakova!<br>";
                    }
                    else {
                        poljeSazetak.style.border="1px solid green";
                        document.getElementById("porukaSazetak").innerHTML="";
                    }

                    //Sadržaj
                    var poljeSadrzaj = document.getElementById("sadrzaj");
                    var sadrzaj = document.getElementById("sadrzaj").value;
                    if (sadrzaj.length == 0) {
                        slanjeForme = false;
                        poljeSadrzaj.style.border="1px dashed red";
                        document.getElementById("porukaSadrzaj").style.color="red";
                        document.getElementById("porukaSadrzaj").innerHTML="Sadržaj mora biti unesen!<br>";
                    }
                    else {
                        poljeSadrzaj.style.border="1px solid green";
                        document.getElementById("porukaSadrzaj").innerHTML="";
                    }

                    //Slika
                    var poljeSlika = document.getElementById("slika");
                    var slika = document.getElementById("slika").value;
                    if (slika.length == 0) {
                        slanjeForme = false;
                        poljeSlika.style.border="1px dashed red";
                        document.getElementById("porukaSlika").style.color="red";
                        document.getElementById("porukaSlika").innerHTML="Slika mora biti unesena!<br>";
                    }
                    else {
                        poljeSlika.style.border="1px solid green";
                        document.getElementById("porukaSlika").innerHTML="";
                    }

                    //Kategorija
                    var poljeKategorija = document.getElementById("kategorija");
                    if (document.getElementById("kategorija").selectedIndex ==0) {
                        slanjeForme = false;
                        poljeKategorija.style.border="1px dashed red";
                        document.getElementById("porukaKategorija").style.color="red";
                        document.getElementById("porukaKategorija").innerHTML="Kategorija mora biti odabrana!<br>";
                    }
                    else {
                        poljeKategorija.style.border="1px solid green";
                        document.getElementById("porukaKategorija").innerHTML="";  
                    }

                    if (slanjeForme != true) {
                        event.preventDefault();
                    }
                }
            </script>
        </div>
        <footer>
            <hr>
            <p>© ANDREA PERIĆ aperic@tvz.hr 2021</p>
            <hr>
        </footer>
    </div>
</body>
</html>
