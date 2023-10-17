<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload Form</title>
</head>
<body>

<h3>Your file was successfully uploaded!</h3>

<ul>
    <li>name: <?= esc($arquivo->getBasename()) ?></li>
    <li>size: <?= esc($arquivo->getSizeByUnit('kb')) ?> KB</li>
    <li>extension: <?= esc($arquivo->guessExtension()) ?></li>
</ul>

<?php echo '<pre>'; print_r($arquivo);?>

<p><?= anchor('upload', 'Upload Another File!') ?></p>

</body>
</html>