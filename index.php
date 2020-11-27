<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ping SMTP Project</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="Md Mehedi Hasan">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <!-- CSS Reset -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <!-- Milligram CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="column column-60 column-offset-20">
                <h2> Project Name: Ping SMTP 2020</h2>
                <p> A sample project to check SMTP </p>

                <?php

                if ($_GET["status"] == "success") {
                    echo "<blockquote>SMTP working well</blockquote>";
                } elseif ($_GET["status"] == "error") {
                    echo "<blockquote>Something wen't wrong, please double check your provided information.</blockquote>";
                }

                ?>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="column column-60 column-offset-20">
                <form method="POST" action="smtp.php">
                    <label for="hostname">Hostname</label>
                    <input type="text" name="hostname">

                    <label for="port">Port</label>
                    <input type="number" name="port">


                    <label for="username">Username</label>
                    <input type="text" name="username">

                    <label for="password">Password</label>
                    <input type="password" name="password">





                    <label for="recipient">Recipient</label>
                    <input type="email" name="recipient">

                    <label for="subject">Subject</label>
                    <input type="text" name="subject">

                    <label for="bodytext">Messages</label>
                    <input type="text" name="bodytext">

                    <button type="submit" name="submit">Ping Now</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
