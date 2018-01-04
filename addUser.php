<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Adicionar Usuario</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link href="css/signin.css" rel="stylesheet">
    </head>
    <body>
        <div class="container2">
            <h1>Cadastrar Usuario</h1>
            <form action="controller/addUserControl.php" method="post">
                <div class="form-group">
                    <label for="exampleInputLogin">Login</label>
                    <input type="text" name="login" class="form-control" id="exampleInputLogin" aria-describedby="loginHelp" placeholder="Enter with login">
                    <small id="loginHelp" class="form-text text-muted">We'll never share your Login with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="pass"class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a href="index.php"class="btn btn-primary">Go Back</a>
            </form>
            
        </div>
    </body>
</html>
