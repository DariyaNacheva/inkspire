<?php
    $DBHOST="localhost";
    $DBUSER="inkspire";
    $DBPASSWD="Test@1234";
    $DBNAME="inkspire";
    session_name("inkspire_s");
    session_start();
    $sesion_role_ID=$_SESSION["session_role"];
    $Book_ID=$_REQUEST["BookID"];
    $Chapter_ID=$_REQUEST["chapterID"];
    

    if($sesion_role_ID==1 or $sesion_role_ID==2){
        $conn = new mysqli($DBHOST, $DBUSER, $DBPASSWD, $DBNAME);
        if( !$conn){
            echo ("SORRY NO db connsection!!!!! <br>");
        }else{
            $sql="SELECT Image_url FROM books_chapters WHERE ID=".$Chapter_ID.";";
            $result = mysqli_query($conn, $sql);
            $chapter = mysqli_fetch_all($result,MYSQLI_ASSOC);
            $URL_file=$chapter[0]["Image_url"];
            unlink($URL_file);
            #echo($URL_file);


            $sql="DELETE FROM books_chapters WHERE `books_chapters`.`ID` = ".$Chapter_ID.";";
            $result = mysqli_query($conn, $sql);
            mysqli_close($conn);

            header("Location: edit_book.php?bookID=".$Book_ID);
            exit();

        }




    }else{
        echo("something happened Wrong");
    }




?>