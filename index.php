<?php
include 'db.php';

$sql = <<<SQL
SELECT knihy.id, knihy.nazov, knihy.autor, knihy.pocet_stran, knihy.hodnotenie, knihy.stav, kategoria.nazov AS kategoria
FROM knihy
JOIN kategoria ON knihy.kategoria_id = kategoria.id
ORDER BY knihy.datum_pridania DESC
SQL;
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rozšírená knižnica</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        . form-group{
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Moja rozšírená knižnica</h1>
    <table>
        <tr>
            <th>Názov</th>
            <th>Autor</th>
            <th>Počet strán</th>
            <th>Hodnotenie</th>
            <th>Stav</th>
            <th>Kategória</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row["nazov"]) . "</td>
                        <td>" . htmlspecialchars($row["autor"]) . "</td>
                        <td>" . htmlspecialchars($row["pocet_stran"]) . "</td>
                        <td>" . htmlspecialchars($row["hodnotenie"]) . "</td>
                        <td>" . htmlspecialchars($row["stav"]) . "</td>
                        <td>" . htmlspecialchars($row["kategoria"]) . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Žiadne knihy nenájdené.</td></tr>";
        }
        ?>
    </table>
    <hr>
    <h2>Pridať novú knihu</h2>
    <form action="add.php" method="post">
        <div class="form-group">
            <input type="text" name="nazov" placeholder="Názov knihy" required>
            <input type="text" name="autor" placeholder="Autor knihy">
        </div>
        <div class="form-group">
        <input type="number" name="pocet_stran" placeholder="Počet strán">
        <select name="hodnotenie">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>    
            <option value="5">5</option>
        </select>
        </div>
        <div class="form-group">
        <select name="stav">
            <option value="neprečítané">Neprečítané</option>
            <option value="rozčítané">Rozčítané</option>
            <option value="prečítané">Prečítané</option>
        </select>
        <select name="kategoria_id">
        <option value="1">Fantasy</option>
        <option value="2">Detektívka</option>
        <option value="3">Odborná literatúra</option>
        </select>
        </div>
        <button type="submit">Pridať knihu</button>
    </form>   
    
</body>
</html>