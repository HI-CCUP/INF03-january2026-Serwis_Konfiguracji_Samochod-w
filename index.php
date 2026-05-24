<?php
$conn = mysqli_connect("localhost","root","","samochody");

if(!$conn){
    die("Błąd połączenia z bazą danych ". mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styl.css?v=2">
    <title>Konfigurator samochodów</title>
</head>
<body>
    <header>
        <h1>Serwis konfiguracji samochodów</h1>
    </header>

    <nav>
        <h2>Samochody</h2>
        <h2>Konfigurator</h2>
        <h2>Kontakt</h2>
    </nav>

    <main>
        <section class="left" id="left">
            <table>
                <?php
                    $sql = 'SELECT marka, model, cena, nazwa, doplata FROM `pojazdy` join kolory on pojazdy.kolor=kolory.id where model = "alfa"';
                    $sql_query = mysqli_query($conn, $sql);
                    if($sql_query){
                         while($row = mysqli_fetch_assoc($sql_query)){
                             echo "<tr><td>" . $row['marka'] . "</td>";
                             echo "<td>" . $row['model'] . "</td>";
                             echo "<td>" . $row['nazwa'] . "</td>";
                             echo "<td>" . $row['doplata'] + $row['cena'] . "</td></tr>";

                         }
                    }
                ?>
            </table>
        </section>

        <section class="middle" id="middle">

        <?php
            $sql1 = mysqli_query($conn,"SELECT marka, model, cena FROM `pojazdy` ORDER BY RAND() limit 2;");

            if(!$sql1){
                die("Błąd połącxzenia z bazą dzanych". mysqli_connect_error());
            }else{
                $rekord1 = mysqli_fetch_assoc($sql1);
                $rekord2 = mysqli_fetch_assoc($sql1);
            }

            
        ?>
            <table>
                <tr>
                    <th colspan="2">Konfiguracja</th>
                    <th colspan="1">Cena</th>

                </tr>
                <tr >
                    <td colspan="4"><img src="a1.jpg" alt="Konfiguracja 1"></td>
                </tr>
                <tr>
                    <td>Marka</td>
                    <td><?php echo $rekord1['marka']?></td>
                    <td rowspan="2"><?php echo $rekord1['cena']?></td>
                </tr>
                <tr>
                    <td>Model</td>
                    <td><?php echo $rekord1['model']?></td>
                </tr>
                <tr>
                    <td colspan="4"><img src="a2.jpg" alt="KOnfiguracja 2"></td>
                </tr>
                <tr>
                    <td>Marka</td>
                    <td><?php echo $rekord1['marka']?></td>
                    <td rowspan="2"><?php echo $rekord2['cena']?></td>
                </tr>
                <tr>
                    <td>Model</td>
                    <td><?php echo $rekord1['model']?></td>
                </tr>
            </table>
        </section>

        <section class="right" id="right">
            <h3>111 222 444</h3>
            <img src="a3.png" alt="Samochód">
        </section>
    </main>

    <footer>
        <p>Stronę wykonał: Maciej Zawada</p>
    </footer>
</body>
</html>

<?php
mysqli_close($conn);
?>