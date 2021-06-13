<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="description" content="some description">
    <meta name="keywords" content="keyword 1, keyword 2, keyword 3, keyword 4, ...">
    <title>Clanak</title>
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
        <section role="main" class="clanak">
            <?php 
                include 'connect.php';
                define('UPLPATH', 'images/');
                $id=$_GET['id'];
                $query = "SELECT * FROM vijesti WHERE id='$id'";
                $result = mysqli_query($dbc, $query);
                $row = mysqli_fetch_array($result);?>
            <div class="row">
            <h2 class="category"><?php
            echo "<span>".$row['kategorija']."</span>";
            ?></h2>
            <h1 class="title"><?php
            echo $row['naslov'];
            ?></h1>
            <p>AUTOR:</p>
            <p>OBJAVLJENO: <?php
            echo "<span>".$row['datum']."</span>";
            ?></p>
            </div>
            <section class="slika">
            <?php
            echo '<img src="' . UPLPATH . $row['slika'] . '">';
            ?>
            </section>
            <?php
            echo '<button class="gs">'.$row['kategorija'].'</button>';
            ?>
            <section class="about">
            <p>
            <?php
            echo "<i>".$row['sazetak']."</i>";
            ?>
            </p>
            </section>
            <section class="sadrzaj">
            <p>
            <?php
            echo $row['tekst'];
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

