<?php
    $DBHOST="localhost";
    $DBUSER="inkspire";
    $DBPASSWD="Test@1234";
    $DBNAME="inkspire";
    session_name("inkspire_s");
    session_start();
    if(isset($_REQUEST["update_book"])){
        #echo("------------------");
        $BookIDRequest=$_REQUEST["bookID"];
        $BookIDRequest=trim($BookIDRequest,'"');
        #echo($BookIDRequest);
        #echo("<p>");
        #echo(var_dump($BookIDRequest));
        #echo("<p>");
        $userID=$_SESSION["User_ID"];
        $Book_Name=$_REQUEST["book_name"];
        $Short_Descr=$_REQUEST["short_description"];
        $Long_Descr=$_REQUEST["long_description"];
        $Book_Ganre=$_REQUEST["ganre"];
        $Ganre_ID=1;
        echo($userID.", ".$Book_Name.", ".$Short_Descr.", ".$Long_Descr.", ".$Book_Ganre.", ".$BookIDRequest);
        $conn = new mysqli($DBHOST, $DBUSER, $DBPASSWD, $DBNAME);
        if( !$conn){
            echo ("SORRY NO db connsection!!!!! <br>");
        }else{
            $sql = "SELECT * FROM ganre";
            $result = mysqli_query($conn, $sql);
            $ganres = mysqli_fetch_all($result,MYSQLI_ASSOC);
            foreach($ganres as $x){
                if($x["ganre_name"]==$Book_Ganre){
                    $Ganre_ID=$x["ID"];
                }
            }



            $sql="UPDATE books SET book_name = '".$Book_Name."', short_description = '".$Short_Descr."', long_descritption = '".$Long_Descr."', genre_ID = '".$Ganre_ID."' WHERE ID = ".$BookIDRequest.";";
            $result = mysqli_query($conn, $sql);
            
            mysqli_close($conn);

            header("Location: Inspire_writhing.php");
            exit();

        }




    }else{
        echo("something happened Wrong");
    }




?>