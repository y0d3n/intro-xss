<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice 1</title>
</head>

<body>
    <?php
    if (isset($_GET["name"])) {
        echo "ようこそ、" . $_GET["name"] . "さん。";
    } else { ?>
        名前を入力してください。
        <form>
            <input type="text" name="name">
            <input type="submit" value="Enter">
        </form>
    <? } ?>
</body>

</html>