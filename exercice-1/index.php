<?php
$table = 0;
$anzahl = 0;
if (isset($_GET['table']) && isset($_GET['anzahl'])) {
    $table = (int)$_GET['table'];
    $anzahl = (int)$_GET['anzahl'];
}

$message = 'Les ' . $anzahl . ' premières valeurs de la table des matières de ' . $table;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>test</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            width: 25%;
        }

        label {
            margin-top: 10px;
        }
        table {
            width: 90%;
        }
        th {
            background: beige;
        }
        tr:nth-child(2n+1) td{
            background: bisque;
        }
        td {
            padding: 0.3em;
        }
    </style>
</head>
<body>
<h1><?= $message; ?></h1>

<form action="index.php" method="get">
    <label for="chiffreUn">Table</label>
    <input type="text" name="table" id="chiffreUn" value="0">
    <label for="chiffreDeux">Nombre de valeures</label>
    <input type="text" name="anzahl" id="chiffreDeux" value="0">
    <input type="submit" value="additionner">
</form>

<table>

    <tr>
        <th>&nbsp;</th>
        <?php for ($j = 1; $j <= $table; $j++): ?>
            <th><?= $j; ?></th>
        <?php endfor; ?>
    </tr>
    <?php for ($i = 1; $i <= $anzahl; $i++): ?>
        <tr>
            <th><?= $i ?></th>
            <?php for ($j = 1; $j <= $table; $j++): ?>
                <td><?= $i . ' * ' . $j . ' = ' . $i * $j; ?></td>
            <?php endfor; ?>
        </tr>
    <?php endfor; ?>
</table>
</body>
</html>
