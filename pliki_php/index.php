<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Moje pliki</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>MOJE PLIKI</h1>
    </header>

    <main>
        <h3>Aktualny katalog:</h3>
        <p><?php echo getcwd(); ?></p>

        <h3>ZAWARTOŚĆ KATALOGU</h3>
        <table>
            <tr>
                <th>Nazwa</th>
                <th>Typ</th>
            </tr>
            <?php
            $katalog = "dokumenty";
            if (is_dir($katalog)) {
                $pliki = scandir($katalog);
                foreach ($pliki as $plik) {
                    if ($plik != "." && $plik != "..") {
                        $sciezka = $katalog . "/" . $plik;
                        $typ = "";
                        
                        if (is_file($sciezka)) {
                            $typ = "PLIK";
                        } elseif (is_dir($sciezka)) {
                            $typ = "KATALOG";
                        }

                        echo "<tr>";
                        echo "<td>$plik</td>";
                        echo "<td>$typ</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>
        </table>
    </main>

</body>
</html>