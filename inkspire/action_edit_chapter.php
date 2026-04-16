<?php
    $DBHOST="localhost";
    $DBUSER="inkspire";
    $DBPASSWD="Test@1234";
    $DBNAME="inkspire";

    $Book_ID=$_REQUEST["bookID"];
    $Chapter_ID=$_REQUEST["chapterID"];
    $Chapter_Nmbr=$_REQUEST["chapter_number"];
    $Chapter_name=$_REQUEST["chapter_name"];
    $Chapter_content=$_REQUEST["chapter_content"];
    $File_Name=$_FILES["pictures_2_up"]["name"];
    $Old_Image_URL=$_REQUEST["oldURL"];
    $file_len=strlen($File_Name);
    #echo($file_len);

    if($file_len>0){
        $Direktory_image='./chapter_pict/'.$Book_ID.'/'.$Chapter_Nmbr.'/'.$File_Name;
        $Directory_source='./chapter_pict/'.$Book_ID.'/'.$Chapter_Nmbr.'/';
        $imageFileType = strtolower(pathinfo($Direktory_image,PATHINFO_EXTENSION));
        #echo($Directory_source);
        if(is_dir($Directory_source)){
            #echo($Directory_source."exist");
        }else{
            #echo($Directory_source."dosen't exist");
            mkdir($Directory_source, 0777, true);
        }
        if (file_exists($Direktory_image)){
            echo("File already exist");

        }else{
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo ("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            header("Location: https://127.0.0.1/inkspire/Inspire_writhing.php");
            exit();
  
            }else{
                #echo("The file is OK");
                #$check = getimagesize($_FILES["ictures_2_up"]["tmp_name"]);
                #$size = getimagesize($_FILES["pictures_2_up"]["tmp_name"]);
                #echo($size);

                if($successfuly_upload=move_uploaded_file($_FILES["pictures_2_up"]["tmp_name"], $Direktory_image)){
                    if(strlen($Old_Image_URL)>0){
                        unlink($Old_Image_URL);

                    }
                    echo($Direktory_image);
                    #$sql="INSERT INTO `books_chapters` (`ID`,`Chapter_Nmbr`, `Chapter_name`, `Content`, `Image_url`, `books_ID`) VALUES (NULL, '".$Chapter_Nmbr."', '". $Chapter_name."', '".$Chapter_content."', '".$Direktory_image."', '".$Book_ID."')";
                    $sql="UPDATE books_chapters SET Chapter_Nmbr = '".$Chapter_Nmbr."', Chapter_name = '".$Chapter_name."', Content = '".$Chapter_content."', Image_url = '".$Direktory_image."' WHERE ID = ".$Chapter_ID.";";
                    #echo($sql);
                    $conn = new mysqli($DBHOST, $DBUSER, $DBPASSWD, $DBNAME);
                    $result = mysqli_query($conn, $sql);

                    mysqli_close($conn);

                    header("Location: https://127.0.0.1/inkspire/edit_book.php?bookID=".$Book_ID);
                    exit();






                }else{
                    echo("<br>Something went wrong!!!");
                }
                

            }
            echo("File don't exist");

        }






    }else{
        echo("No file selected");
        #$sql="INSERT INTO `books_chapters` (`ID`, `Chapter_Nmbr`, `Chapter_name`, `Content`, `Image_url`, `books_ID`) VALUES (NULL, '".$Chapter_Nmbr."', '".$Chapter_name."', '".$Chapter_content."', '".."', '".$Book_ID."');";
        #echo($sql);
        #$sql="UPDATE books_chapters SET Chapter_Nmbr = '".$Chapter_Nmbr."', Chapter_name = '".$Chapter_name."', Content = '".$Chapter_content."' WHERE ID = ".$Chapter_ID.";";
        $sql="UPDATE `books_chapters` SET `Chapter_Nmbr` = '".$Chapter_Nmbr."', `Chapter_name` = '".$Chapter_name."', `Content` = '".$Chapter_content."' WHERE `books_chapters`.`ID` = ".$Chapter_ID.";";
        $conn = new mysqli($DBHOST, $DBUSER, $DBPASSWD, $DBNAME);
        $result = mysqli_query($conn, $sql);
        #echo($result);
        #echo($Chapter_ID);

        mysqli_close($conn);

        header("Location: https://127.0.0.1/inkspire/edit_book.php?bookID=".$Book_ID);
        exit();


    }

    

    

?>