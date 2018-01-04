<?php
require_once 'config.php';

if(isset($_POST['update'])) {
    
    $id = mysqli_real_escape_string($conetion, $_POST['id']);
    $title = mysqli_real_escape_string($conetion, $_POST['titulo']);
    $text = mysqli_real_escape_string($conetion, $_POST['texto']);
    
    if (empty($title) || (empty($text))) {
        if (empty($title)) {
            echo 'O campo está vazio!';
        }
        if (empty($text)) {
            echo 'O campo está vazio!';
        }
    } else {
        
        $result = mysqli_query($conetion, "UPDATE products SET title='$title', text='$text' WHERE id=$id");      
//        die('modificado');
        header("location:../index.php");
    }
}
?>
<?php

$id = $_GET['id'];
$query = "SELECT * FROM news WHERE id='$id'";
$result = mysqli_query($conetion, $query);
while ($res = mysqli_fetch_array($result)) {
    $title = $res['title'];
    $text = $res['text'];
}
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
    </head>
    <body>

        <div class="container">
            <a href="logout.php" class="btn btn-secondary">Logout</a>
            <a href="index.php" class="btn btn-info">Go Back</a>
            <a href="editNews.php" class="btn btn-info">Edit News</a>

        </div>

        <div class="card text-center">
            <div class="card-header">
                <h2>Editar Noticia</h2>
            </div>
            <div class="container2">
                <div class="card-body" >
                    <form action="editNewsControl.php" method="post">
                        <tr>
                            <label for="tit">Title:</label>
                            <input class="form-control" rows="5" id="tit" name="titulo" value="<?php echo $title; ?>" type="text"/>
                        </tr>
                        <tr>                    
                            <label for="comment">Text:</label>
                            <textarea class="form-control" name="texto"  rows="5" id="comment"><?php echo $text; ?></textarea>                                          
                        <br/>
                        </tr>
                        <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?></td>
                        
                        <td><input type="submit" class="btn btn-success" name="update" value="UPDATE"></td>
                        
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
