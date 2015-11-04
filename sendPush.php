<?php
        
        $nombre = $_POST["nombre"];
        $content = $_POST["content"];
        $sql = "SELECT (GCM_ID) FROM GCM_IDS WHERE NOMBRE='".$nombre."'";
        $GCM_ID = "APA91bGIU75h44XmnWwLj8ckFvQZTR-V8Edw2vWjRG12VP2XDpXMaLYwQxw_FCGU906BYXJvfq6TtCXefq9sRcC-IbxpMOFPmN11LYK3r1plLvLCsSnnaqfvyHVlwHNgBcKR3nZPwVrG4NmPPxo6ifEHP74xaxNaAg";
   /**     
        $con = mysqli("localhost","root","root","DB_GcmAndroidNights");
        if ($con->connect_error) {
            //die("Connection failed: " . $con->connect_error);
            echo("error");
        } 

        $result = mysql_query($sql, $con);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $GCM_ID = $row["GCM_ID"];
            }*/
            
            $api_key = "AIzaSyCmNFLZC-3OQPMEvwp1635glTm1Ifr1-is";
            $registrationIDs = array($GCM_ID);
            
            $url = 'https://android.googleapis.com/gcm/send';
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
      /*  } else {
            echo "0 results";
        }
        $conn->close();
*/
        
?>