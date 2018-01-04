<?php
require_once 'controller/config.php';
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Portal de noticias</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link href="css/signin.css" rel="stylesheet">
        <?php
        if (isset($_POST['user'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $query = "SELECT * FROM user WHERE user =  '$user' and password= '$pass'";
            $result = mysqli_query($conetion, $query);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['user'] = $user;
            } else {
                echo "<div align='center' class='alert alert-danger' role='alert'><h3>Usuario ou Senha Invalido(s)!</h3></div>";
                echo "<meta http-equiv='refresh' content='2;URL=addNews.php'>";
            }
        } elseif (isset($_POST['title'])) {
            $title = $_POST['title'];
            $text = $_POST['text'];
            $query = "INSERT INTO news(title, text) VALUES('$title', '$text')";
            if (mysqli_query($conetion, $query)) {
                echo 'Noticia Inserida!';
            } else {
                echo 'Noticia não inserida';
            }
        }
        ?>
    </head>
    <body>

        <?php if (isset($_SESSION['user'])) { ?>
        <div class="container">
            <a href="logout.php" class="btn btn-secondary">Logout</a>
            <a href="index.php" class="btn btn-info">Go Back</a>
            
        </div>
        
        <div class="card text-center">
            <div class="card-header">
                <h2>Criar nova Noticia</h2>
            </div>
            <div class="container2">
                <div class="card-body" >
                    <form action="addNews.php" method="post">
                        <tr>

                        <div class="form-group">
                            <label for="tit">Title:</label>
                            <input class="form-control" rows="5" id="tit" name="title" type="text"/>
                        </div>

                        </tr>
                        <tr>

                        <div class="form-group">
                            <label for="comment">Text:</label>
                            <textarea class="form-control" name="text" rows="5" id="comment"></textarea>
                        </div>

                        <br/>
                        </tr>
                        <button class="btn btn-success" type="submit">Enviar Noticia</button>
                    </form>
                </div>
            </div>
        </div>



    <?php } else { ?>

        <div class="container2">

            <form action="addNews.php" method="post">
                <h2 class="form-signin-heading">Entrar no Blog de Noticias</h2>
                <label for="inputUser" class="sr-only">Login</label>
                <input type="text" id="inputUser" class="form-control" placeholder="Login" name="user" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass"required>
                <br/>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                <a href="index.php">Voltar para o portal de Noticias!</a>
            </form>

        </div> <!-- /container -->

    <?php } ?>
</body>
</html>
