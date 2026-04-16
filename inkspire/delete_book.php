<?php
    $DBHOST="localhost";
    $DBUSER="inkspire";
    $DBPASSWD="Test@1234";
    $DBNAME="inkspire";
    session_name("inkspire_s");
    session_start();
    $sesion_role_ID=$_SESSION["session_role"];
    $Book_ID=$_REQUEST["bookID"];

    if($sesion_role_ID==1 or $sesion_role_ID==2){
        $conn = new mysqli($DBHOST, $DBUSER, $DBPASSWD, $DBNAME);
        if( !$conn){
            echo ("SORRY NO db connsection!!!!! <br>");
        }else{
            $sql="DELETE FROM books WHERE `books`.`ID` = ".$Book_ID.";";
            $result = mysqli_query($conn, $sql);
            mysqli_close($conn);

            header("Location: Inspire_writhing.php");
            exit();

        }




    }else{
        echo("something happened Wrong");
    }




?>