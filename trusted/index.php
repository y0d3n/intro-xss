<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trusted</title>
    <style>
        body {
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

        #links {
            margin: 3em;
        }

        .link {
            margin: 0.3em;
        }

        .serif {
            color: green;
            font-family: serif;
        }
    </style>
    <script>
        <?php
        if (isset($_GET["exec"])) {
            echo $_GET["script"];
        }
        ?>
    </script>
</head>

<body>
    <h1><i class="serif">🐯🐯🐯 Trusted Site 🐯🐯🐯</i></h1>
    <hr>
    <p>このサイトは「Super Secure Password Manager」からCORSで許可されたページです。<br>
        JavaScriptの実行・共有が出来るWebアプリケーションになっています。</p>

    <form>
        <textarea name="script" id="script" cols="50" rows="15"><?
                                                                if (isset($_GET["script"])) {
                                                                    echo htmlspecialchars($_GET["script"]);
                                                                }
                                                                ?></textarea><br>
        <button type="submit">URL更新</button>
        <button type="submit" name="exec" value=1>実行</button>
    </form>

    <div id="links">
        <a class="link" href='?script=alert%281%29'>alert(1)</a><br>
        <a class="link" href='?script=fetch%28%22http%3A%2F%2Flocalhost%3A8081%22%29%0D%0A++++.then%28%28r%29%3D%3Er.text%28%29%29%0D%0A++++.then%28%28t%29%3D%3Econsole.log%28t%29%29'>演習３ (CORSで許可された異なるオリジンへのfetch)</a><br>
        <a class="link" href='?script=let+c+%3D+fetch%28%22http%3A%2F%2Flocalhost%3A8081%22%2C+%7B%0D%0A++credentials%3A+%27include%27%0D%0A%7D%29%0D%0A++.then%28%28r%29+%3D%3E+r.text%28%29%29%0D%0A++.then%28%28t%29+%3D%3E+new+DOMParser%28%29.parseFromString%28t%2C+%22text%2Fhtml%22%29%29%0D%0A++.then%28%28d%29+%3D%3E+d.querySelectorAll%28%22.secretcol%22%29%29%0D%0A++.then%28%28c%29+%3D%3E+c.forEach%28e+%3D%3E+%7B%0D%0A++++e.querySelectorAll%28%22code%22%29.forEach%28e+%3D%3E+%7B%0D%0A++++++++console.log%28e.innerHTML%29%0D%0A++++++%7D%29%0D%0A++++console.log%28%22------%22%29%0D%0A++%7D%29%29%0D%0A%0D%0A'>おまけ (DOMの内容取得)</a><br>
    </div>
</body>

</html>
