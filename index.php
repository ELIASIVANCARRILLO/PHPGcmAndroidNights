<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="sendPush.php" method="POST">
            <center>
                Enviar un mensaje a:<br>
                <input type="text" name="nombre" id="nombre" required="true"/><br><br>
                Con el contenido:<br>
                <textarea id="content" value="content"></textarea><br>
                <input type="submit" value="enviar"/>
            </center>
        </form>
    </body>
</html>
