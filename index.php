<?php
$capitales = [
    'belgique' => [
        'capitale' => 'bruxelles',
        'drapeau' => 'https://upload.wikimedia.org/wikipedia/commons/9/92/Flag_of_Belgium_%28civil%29.svg'
    ],
    'france' => [
        'capitale' => 'paris',
        'drapeau' => 'https://upload.wikimedia.org/wikipedia/commons/c/c3/Flag_of_France.svg'
    ],
    'allemagne' => [
        'capitale' => 'berlin',
        'drapeau' => 'https://upload.wikimedia.org/wikipedia/commons/b/ba/Flag_of_Germany.svg'
    ],
    'united kingdom' => [
        'capitale' => 'london',
        'drapeau' => 'https://upload.wikimedia.org/wikipedia/commons/a/ae/Flag_of_the_United_Kingdom.svg'
    ],
    'united states' => [
        'capitale' => 'washington d.c.',
        'drapeau' => 'https://upload.wikimedia.org/wikipedia/commons/a/a4/Flag_of_the_United_States.svg'
    ],
    'corée du nord' => [
        'capitale' => 'pyongyang',
        'drapeau' => 'https://upload.wikimedia.org/wikipedia/commons/5/51/Flag_of_North_Korea.svg'
    ],
];
$selected = '';
if (isset($_GET['select'])) {
    $selected = $_GET['select'];
    if (in_array($selected, array_keys($capitales))) {
        $info = $capitales[$selected];
    } else {
        $message = 'Is not in database';
    }
}
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
    </style>
</head>
<body>
<h1>Stadt, Land, Fluss!!!</h1>

<form action="index.php" method="get">
    <label for="">Choix du pays</label>
    <select name="select">
        <?php foreach ($capitales as $key => $capitale): ?>
            <option value="<?= $key; ?>" <?= ($selected == $key)? 'selected=selected':'' ?>><?= mb_strtoupper($key) ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit">
</form>
<?php if (in_array($selected, array_keys($capitales))): ?>
    <?php if ($selected === ''): ?>
        <p>
            Sélectionner un Pays.
        </p>
    <?php else: ?>
        <p>
            La capitale de <?= ucwords($selected); ?> est <?= ucwords($capitales[$selected]['capitale']); ?>
        </p>
        <?php if ($capitales[$selected]['drapeau']): ?>
            <img src="<?= $capitales[$selected]['drapeau']; ?>" alt="Drapeau de <?= strtoupper($selected); ?>"
                 width="500px">
        <?php endif; ?>
    <?php endif; ?>
<?php else: ?>
    <p>Ce pays n'est pas dans la liste</p>
<?php endif; ?>
</body>
</html>
