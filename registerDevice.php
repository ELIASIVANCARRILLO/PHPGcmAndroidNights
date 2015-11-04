<?php
/**
        CREATE TABLE GCM_IDS(
ID INTEGER PRIMARY KEY auto_increment,
NOMBRE VARCHAR(50) NOT NULL,
GCM_ID VARCHAR(200) NOT NULL)
 * 
 */

        $id = $_POST["gcm_id"];
        $nombre = $_POST["nombre"];
	$con = mysql_connect("localhost","root","root");
	mysql_select_db("DB_GcmAndroidNights",$con);
	// change the query depending on your table
	mysql_query("INSERT INTO GCM_IDS(NOMBRE, GCM_ID) VALUES('".$nombre."', '".$id."')");
        
        echo("true")
?>