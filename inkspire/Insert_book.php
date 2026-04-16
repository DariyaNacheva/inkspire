<?php
    $DBHOST="localhost";
    $DBUSER="inkspire";
    $DBPASSWD="Test@1234";
    $DBNAME="inkspire";
    session_name("inkspire_s");
    session_start();
    if(isset($_REQUEST["create_new_book"])){
        $userID=$_SESSION["User_ID"];
        $Book_Name=$_REQUEST["book_name"];
        $Short_Descr=$_REQUEST["short_description"];
        $Long_Descr=$_REQUEST["long_description"];
        $Book_Ganre=$_REQUEST["ganre"];
        #echo($userID.", ".$Book_Name.", ".$Short_Descr.", ".$Long_Descr.", ".$Book_Ganre);
        $conn = new mysqli($DBHOST, $DBUSER, $DBPASSWD, $DBNAME);
        if( !$conn){
            echo ("SORRY NO db connsection!!!!! <br>");
        }else{
            $sql = "SELECT ID FROM `ganre` WHERE ganre_name='".$Book_Ganre."';";
            #echo($sql);
            $result = mysqli_query($conn, $sql);
            $x = mysqli_fetch_all($result,MYSQLI_ASSOC);
            $ganreID=$x[0]["ID"];
            #echo($ganreID);
            $sql="INSERT INTO `books` (`ID`, `book_name`, `author_ID`, `short_description`, `long_descritption`, `genre_ID`) VALUES (NULL, '".$Book_Name."', '".$userID."', '".$Short_Descr."', '".$Long_Descr."', '".$ganreID."')";
            #echo($sql);
            #mysqli_free_result($result);
            $result = mysqli_query($conn, $sql);
            #mysqli_free_result($result);
            mysqli_close($conn);

            #header("Location: https://127.0.0.1/inkspire/Inspire_writhing.php");
            header("Location: Inspire_writhing.php");
            exit();

        }




    }else{
        echo("something happened Wrong");
    }




?>