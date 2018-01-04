<?php
require_once 'controller/config.php';
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
        <title>Portal de Noticias</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <br/>
            <h1 style="text-align: center">Blog de Noticias</h1>
            <div class="alert alert-dark" role="alert">
                <?php
                $mysql = "SELECT * FROM news";
                $result = mysqli_query($conetion, $mysql);

                if (mysqli_num_rows($result)) {
                    while ($res = mysqli_fetch_assoc($result)) {
                        echo "<div class='card'>";
                        echo "<div class='card-header'>";
                        echo "<h2 style='color: black'>" . $res['title'] . "</h2>";
                        echo '</div>';
                        echo '<div class="card-body">';
                        echo "<p class='card-text'>" . $res['text'] . "</p>";
                        echo '</div>';
                        echo '</div>';
                        echo '<br/><br/>';
                    }
                } else {
                    echo 'não encontrou nenhuma noticia';
                }
                ?>

                <button type="button"  class="btn btn-info"><a href="addNews.php" style="color: white">Inserir nova noticia</a></button>

            </div>
    </body>
</html>
