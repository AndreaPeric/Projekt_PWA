<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="description" content="some description">
    <meta name="keywords" content="keyword 1, keyword 2, keyword 3, keyword 4, ...">
    <title>Skripta</title>
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
        <section role="main">
                <?php
                    include 'connect.php';
                    if (isset($_POST['Prihvati'])) {
                        $slika = $_FILES['slika']['name'];
                        $naslov=$_POST['naslov'];
                        $sazetak=$_POST['sazetak'];
                        $sadrzaj=$_POST['sadrzaj'];
                        $kategorija=$_POST['kategorija'];
                        $datum=date('d.m.Y.');
                        if(isset($_POST['arhiva'])){
                            $arhiva=1;
                        }else{
                            $arhiva=0;
                        }
                        $target_dir = 'images/'.$slika;
                        move_uploaded_file($_FILES["slika"]["tmp_name"], $target_dir);

                        $query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES ('$datum', '$naslov', '$sazetak', '$sadrzaj', '$slika',
                        '$kategorija', '$arhiva')";
                        $result = mysqli_query($dbc, $query) or die('Error querying databese.');
                        mysqli_close($dbc); 
                    }
                ?>
            <div class="row">
                <p class="category"><?php
                echo $kategorija;
                ?></p>
                <h1 class="title"><?php
                echo $naslov;
                ?></h1>
                <p class="aio">AUTOR:</p>
                <p class="aio">OBJAVLJENO:</p>
            </div>
            <section class="slika">
                <?php
                echo "<img src='images/$slika' class='sslika'>";
                ?>
            </section>
            <section class="about">
                <p>
                <?php
                echo $sazetak;
                ?>
                </p>
            </section>
            <section class="sadrzaj">
                <p>
                <?php
                echo $sadrzaj;
                ?>
                </p>
            </section>
        </section>
        <footer>
            <hr>
            <p>© ANDREA PERIĆ aperic@tvz.hr 2021</p>
            <hr>
        </footer>
    </div>
</body>
</html>
