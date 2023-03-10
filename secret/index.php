<?php
header('Access-Control-Allow-Origin: http://localhost:8083');
header('Access-Control-Allow-Credentials: true');

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
    <title>Secret</title>
    <script>
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
    <h1><i class="serif">????????? Super Secure Password Manager ?????????</i></h1>
    <hr>
    <p>?????????????????? <b>???????????????????????????</b> ?????????????????????????????????????????????<br>
        ID????????????????????????????????????????????????????????????</p>

    <div id="main">
        <?php
        foreach ($_SESSION["id"] as $i => $v) {
        ?>
            <div id="secret[<? echo $i; ?>]" class="secretcol columns">
                <code class="id"><? echo $_SESSION["id"][$i]; ?></code>
                <code class="pw"><? echo $_SESSION["pw"][$i]; ?></code>
                <code class="remarks"><? echo $_SESSION["remarks"][$i]; ?></code>
                <button onclick="toggle('<? echo $i ?>')">Edit</button>
                <form style="display: inline;">
                    <button type="button" onclick="submit();">Del</button>
                    <input type="hidden" name="rm">
                    <input type="hidden" name="idx" value="<? echo $i ?>">
                </form>
            </div>

            <div id="edit[<? echo $i ?>]" class="columns" style="display: none;">
                <form style="display: inline;">
                    <input type="text" class="id" name="id" value="<? echo $_SESSION["id"][$i]; ?>" autocomplete="off">
                    <input type="text" class="pw" name="pw" value="<? echo $_SESSION["pw"][$i]; ?>" autocomplete="off">
                    <input type="text" class="remarks" name="remarks" value="<? echo $_SESSION["remarks"][$i]; ?>" autocomplete="off">
                    <input type="hidden" name="idx" value="<? echo $i ?>">
                    <input type="submit" value="Enter">
                </form>
                <button onclick="toggle('<? echo $i ?>')">Cancel</button>
                <div class="caution">??? ??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</div>
            </div>
        <? } ?>

        <div id="addform" class="columns" style="display: none;">
            <form style="display: inline;">
                <input type="hidden" name="idx" value="<? echo array_key_last($_SESSION["id"]) + 1 ?>">
                <input type="text" class="id" name="id" placeholder="id" autocomplete="off">
                <input type="text" class="pw" name="pw" placeholder="pw" autocomplete="off">
                <input type="text" class="remarks" name="remarks" placeholder="remarks" autocomplete="off">
                <input type="submit" value="Enter">
                <button type="button" onclick="toggleadd()">Cancel</button>
                <div class="caution">??? ??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</div>
            </form>
        </div>
        <button id="addbtn" onclick="toggleadd()">+</button>
    </div>
</body>

</html>