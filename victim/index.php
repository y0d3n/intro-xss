<?php
session_start();
if (!isset($_SESSION["id"])) {
    $_SESSION["id"] = array('id');
}
if (!isset($_SESSION["pw"])) {
    $_SESSION["pw"] = array('pass');
}
if (!isset($_SESSION["remarks"])) {
    $_SESSION["remarks"] = array('remarks');
}

if (isset($_GET["rm"])) {
    unset($_SESSION["id"][$_GET["idx"]]);
    unset($_SESSION["pw"][$_GET["idx"]]);
    unset($_SESSION["remarks"][$_GET["idx"]]);
} else {
    if (isset($_GET["idx"])) {
        $_SESSION["id"][$_GET["idx"]] = $_GET["id"];
        $_SESSION["pw"][$_GET["idx"]] = $_GET["pw"];
        $_SESSION["remarks"][$_GET["idx"]] = $_GET["remarks"];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Victim</title>
    <script>
        history.pushState('', '', '/');

        function toggleadd() {
            if (document.getElementById("addform").style.display == "none") {
                document.getElementById("addform").setAttribute("style", "display: block");
                document.getElementById("addbtn").innerHTML = "-";
            } else {
                document.getElementById("addform").setAttribute("style", "display: none");
                document.getElementById("addbtn").innerHTML = "+";

            }
        }

        function toggle(n) {
            if (document.getElementById("secret[" + n + "]").style.display == "none") {
                document.getElementById("secret[" + n + "]").setAttribute("style", "display: block;");
                document.getElementById("edit[" + n + "]").setAttribute("style", "display: none;");
            } else {
                document.getElementById("secret[" + n + "]").setAttribute("style", "display: none;");
                document.getElementById("edit[" + n + "]").setAttribute("style", "display: block;");
            }
        }
    </script>
    <style>
        body,
        input {
            text-align: center;
        }

        code {
            display: inline-block;
            background: #f0f5f9;
            border: 1px solid #e6edf3;
            padding: 0.4em 0.5em;
            margin: 0 0.2em;
            overflow-wrap: break-word;
        }

        input::placeholder {
            color: #e6edf3;
        }


        #main {
            margin: 3em;
        }

        .id,
        .pw {
            width: 15em;
        }

        .remarks {
            width: 20em;
        }

        .caution {
            font-size: small;
            color: #f15555;
        }

        .columns {
            padding: 0.5em;
        }

        .serif {
            font-family: serif;
        }
    </style>
</head>

<body>
    <h1><i class="serif">✨✨✨ Super Secure Password Manager ✨✨✨</i></h1>
    <hr>
    <p>このWebアプリケーションは <b>セキュリティが完璧</b> なパスワードマネージャーアプリです。<br>
        IDとパスワードを備考と一緒に保存できます。</p>

    <div id="main">
        <?php
        foreach ($_SESSION["id"] as $i => $v) {
            echo '<div id="secret[' . $i . ']" class="columns"><code class="id">';
            echo $_SESSION["id"][$i];
            echo '</code> <code class="pw">';
            echo $_SESSION["pw"][$i];
            echo '</code> <code class="remarks">';
            echo $_SESSION["remarks"][$i];
            echo '</code> <button onclick="toggle(' . $i .  ')">Edit</button> <form style="display: inline;"><button type="button" onclick="submit();">Del</button><input type="hidden" name="rm"><input type="hidden" name="idx" value="' . $i . '"></form></div>';

            echo '<div id="edit[' . $i . ']" class="columns" style="display: none;"><form style="display: inline;"><input type="text" class="id" name="id" value="';
            echo  $_SESSION["id"][$i];
            echo '"> <input type="text" class="pw" name="pw" value="';
            echo  $_SESSION["pw"][$i];
            echo '"> <input type="text" class="remarks" name="remarks" value="';
            echo  $_SESSION["remarks"][$i];
            echo '" autocomplete="off"> <input type="hidden" name="idx" value="' . $i . '"> <input type="submit" value="Enter"></form> <button onclick="toggle(' . $i . ')">Cancel</button>';
            echo '<div class="caution">※ ここに入力した情報は余裕で漏洩するため、実際のパスワード等の機密情報は入力しないでください。</div></div>';
        }

        ?>
        <div id="addform" class="columns" style="display: none;">
            <form style="display: inline;">
                <input type="hidden" name="idx" value="<? echo array_key_last($_SESSION["id"]) + 1 ?>">
                <input type="text" class="id" name="id" placeholder="id">
                <input type="text" class="pw" name="pw" placeholder="pw">
                <input type="text" class="remarks" name="remarks" placeholder="remarks" autocomplete="off">
                <input type="submit" value="Enter">
                <button type="button" onclick="toggleadd()">Cancel</button>
                <div class="caution">※ ここに入力した情報は余裕で漏洩するため、実際のパスワード等の機密情報は入力しないでください。</div>
            </form>
        </div>
        <button id="addbtn" onclick="toggleadd()">+</button>
    </div>
</body>

</html>