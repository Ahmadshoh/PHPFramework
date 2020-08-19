<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Произошло ошибка!</h1>
<p><b>Код ошибки:</b> <?php echo $errno; ?></p>
<p><b>Текст ошибки:</b> <?php echo $errstr; ?></p>
<p><b>Файл ошибки:</b> <?php echo $errfile; ?></p>
<p><b>Строка ошибки:</b> <?php echo $errline; ?></p>
</body>
</html>