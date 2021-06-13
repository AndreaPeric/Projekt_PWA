<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta name="description" content="some description">
    <meta name="keywords" content="keyword 1, keyword 2, keyword 3, keyword 4, ...">
    <title>Kategorija</title>
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
        <?php
            include 'connect.php';
            define('UPLPATH', 'images/');
            $kategorija=$_GET['id'];
        ?>
        <section class="kate">
            <?php
                $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='$kategorija' ";
                $result = mysqli_query($dbc, $query);
                echo "<h1 class='na'>$kategorija</h1>";
                $i=0;
                while($row = mysqli_fetch_array($result)) {
                echo '<article class="kategorija">';
                echo'<div class="article">';
                echo '<div class="us_img">';
                echo '<img src="' . UPLPATH . $row['slika'] . '"';
                echo '</div>';
                echo '<div class="media_body">';
                echo '<h4 class="title">';
                echo '<a href="clanak.php?id='.$row['id'].'">';
                echo $row['naslov'];
                echo '</a></h4>';
                echo '</div></div>';
                echo '</article>';
            }?>
        </section>
        <footer>
            <hr>
            <p>© ANDREA PERIĆ aperic@tvz.hr 2021</p>
            <hr>
        </footer>
    </div>
</body>

</html>