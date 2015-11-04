<?php
        
        $nombre = $_POST["nombre"];
        $content = $_POST["content"];
        $sql = "SELECT (GCM_ID) FROM GCM_IDS WHERE NOMBRE='".$nombre."'";
        $GCM_ID = [];
        
        $con = mysql_connect("localhost","root","root") or die(mysql_error());
	mysql_select_db("DB_GcmAndroidNights",$con);

        $result =  mysql_query($sql) or die(mysql_error());  

        $registrationIDs = array();
        $counter = 0;
        while($row = mysql_fetch_array($result)) {
            $registrationIDs[$counter] = $row["GCM_ID"];
            $counter++;
        }
            
        if (count($registrationIDs) > 0) {
            $api_key = "AIzaSyCmNFLZC-3OQPMEvwp1635glTm1Ifr1-is";
            
            $url = 'http://android.googleapis.com/gcm/send';
            $fields = array(
                'registration_ids'  => $registrationIDs,
                'data'              => array( "message" => $content ),
                );
 
            $headers = array('Authorization: key=' . $api_key,'Content-Type: application/json');
 
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt( $ch, CURLOPT_POST, true );
            curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
            $result = curl_exec($ch);
            curl_close($ch);
 
            echo $result;
        } else {
            echo "No hay ningun usuario llamado '".$nombre."', por lo tanto no se envio ningun mensaje.";
        }
        mysql_close();
        
?>