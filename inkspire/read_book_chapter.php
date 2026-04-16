<?php
    session_name("inkspire_s");
    session_start();
    $Login_Session=FALSE;
    if(isset($_SESSION["session_role"])){
        $Login_Session=TRUE;
    }
    if(isset($_SESSION["session_role"])){
        if($_SESSION["session_role"]=="3"){
            #header("Location: Login.php");
            #exit();
            
        }elseif($_SESSION["session_role"]=="4"){
            #header("Location: Login.php");
            #exit();
            $Login_Session=FALSE;
        }

    }else{
        #header("Location: Login.php");
        #exit();
    }


    $DBHOST="localhost";
    $DBUSER="inkspire";
    $DBPASSWD="Test@1234";
    $DBNAME="inkspire";
    $Book_ID=$_REQUEST["BookID"];
    $BookName=$_REQUEST["BookName"];
    $ChapterID=$_REQUEST["chapterID"];

    #$User_ID=$_SESSION["User_ID"];



    $conn = new mysqli($DBHOST, $DBUSER, $DBPASSWD, $DBNAME);
    if( !$conn){
        echo ("SORRY NO db connsection!!!!! <br>");
    }
    $sql_get_Chapter="SELECT books_chapters.ID, books_chapters.Chapter_Nmbr, books_chapters.Chapter_name, books_chapters.Content, books_chapters.Image_url, login.View_name FROM books_chapters INNER JOIN books ON books_chapters.books_ID=books.ID INNER JOIN login ON books.author_ID=login.ID WHERE books_chapters.ID=".$ChapterID.";" ;
    #$sql = "SELECT books.ID, books.book_name, books.short_description, books.long_descritption, books.author_ID, ganre.ganre_name FROM books JOIN ganre ON books.genre_ID=ganre.ID WHERE books.ID=".$Book_ID.";";
    $result = mysqli_query($conn, $sql_get_Chapter);
    $chapter_info = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $Chapter_Nmbr=$chapter_info[0]["Chapter_Nmbr"];
    $Chapter_name=$chapter_info[0]["Chapter_name"];
    $Content= $chapter_info[0]["Content"];
    $Image_url=$chapter_info[0]["Image_url"];
    #echo(strlen($Image_url));
    $Author_View_Name=$chapter_info[0]["View_name"];
    #$Author_View_Name="VVVVVVVVVVVVVVVVVVVVVV";
    #$booksID=$book[0]["ID"];
    #if($author_ID!=$User_ID){
        #mysqli_free_result($result);
        #mysqli_close($conn);
        #header("Location: Login.php");
        #exit();

    #}
    $hasNextChapter=FALSE;
    $nextChapterNumbr=$Chapter_Nmbr+1;
    $previousChapterNumbr=$Chapter_Nmbr-1;
    $hasPreviuosChapter=FALSE;
    $PreviousChapterID=-1;
    $NextChapterID=-1;
    if($previousChapterNumbr>0){
        $hasPreviuosChapter=TRUE;
        $sql_privChapterID="SELECT ID FROM books_chapters WHERE books_ID=".$Book_ID." AND Chapter_Nmbr=".$previousChapterNumbr.";";
        $result = mysqli_query($conn, $sql_privChapterID);
        $chapter_info = mysqli_fetch_all($result,MYSQLI_ASSOC);
        $PreviousChapterID=$chapter_info[0]["ID"];
        
    }

    $sql_nextChapterID="SELECT ID FROM books_chapters WHERE books_ID=".$Book_ID." AND Chapter_Nmbr=".$nextChapterNumbr.";";
    $result = mysqli_query($conn, $sql_nextChapterID);
    $chapter_info = mysqli_fetch_all($result,MYSQLI_ASSOC);
    #$NextChapterID=$chapter_info[0]["ID"];
    if(isset($chapter_info[0]["ID"]) ){
        $NextChapterID=$chapter_info[0]["ID"];
        echo($NextChapterID);
        $hasNextChapter=TRUE;


    }

    echo($NextChapterID);




    mysqli_free_result($result);
    mysqli_close($conn);




?>
<html >

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        body {
            font: 0.8em Arial, Helvetica, sans-serife;
            background: #D7E1F2;
            color: #ffffee
        }

        #container {
            width: 1000px;
            margin: 0 auto;
            
            background-image: url('pictures/old_page_11.jpg');
            box-shadow: 0px 3px 20px 0px black;
                /**/
        }

        #header {
            font-size: 2.2 em;
            text-align: center;
            background-image: url('pictures/old_page_11.jpg');
            
            
           
        }

        #nav,
        #aside {
            float: left;
            width: 110px;
            padding: 5px
        }

        #content {
            
            margin: 0 60px;
            padding: 10px
        }

        #aside {
            float: right;
            color: brown
        }

        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            box-shadow: 0px 3px 20px 0px black;
        }

        input[type=password], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            box-shadow: 0px 3px 20px 0px black;
        }

        input[type=submit] {
            width: 100%;
            background-color: #19617E;
            padding: 12px 20px;
            color: white;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 18px;
            box-sizing: border-box;
            box-shadow: 0px 3px 20px 0px black;
            
            cursor: pointer;
        }       

        input[type=submit]:hover {
            background-color: #19617E;
        }


        .title_bar {
            border-radius: 10px;
            height: fit-content;
            display: inline-flex;
            background-color: rgba(10, 65, 88, 0.9);
            -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);
            align-items: center;
            padding: 0 10px;
            margin: 15px 0 0 0;
            justify-content: center;
            align-items: center;
            width: 850px;
            box-shadow: 0px 3px 20px 0px black;
            
            

        }

        .menu-bar {
            border-radius: 25px;
            height: fit-content;
            display: inline-flex;
            background-color: rgba(10, 65, 88, 0.9);
            -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);
            align-items: center;
            padding: 0 10px;
            margin: 25px 0 0 0;
            justify-content: center;
            align-items: center;
            box-shadow: 0px 3px 20px 0px black;





            li {
                list-style: none;
                color: white;
                font-family: sans-serif;
                font-weight: bold;
                padding: 12px 0px;
                margin: 0 8px;
                position: relative;
                cursor: pointer;
                white-space: nowrap;

                &::before {
                    content: " ";
                    position: absolute;
                    top: 0;
                    left: 0;
                    height: 100%;
                    width: 100%;
                    z-index: -1;
                    transition: .2s;
                    border-radius: 25px;
                }

                a {
                    list-style: none;
                    color: white;
                    font-family: sans-serif;
                    font-weight: bold;
                    padding: 12px 16px;
                    margin: 0 8px;
                    position: relative;
                    cursor: pointer;
                    white-space: nowrap;
                    text-decoration: none;

                    &:hover {
                        &::before {
                            background: linear-gradient(to bottom, #e8edec, #d2d1d3);
                            box-shadow: 0px 3px 20px 0px black;
                            transform: scale(1.2);

                        }

                        color: black;
                        text-decoration: none;

                    }


                }

                &:hover {
                    &::before {
                        background: linear-gradient(to bottom, #e8edec, #d2d1d3);
                        box-shadow: 0px 3px 20px 0px black;
                        transform: scale(1.2);
                    }

                    color: black;
                }
            }
        }



        img {
            border-radius: 10px;
            height: fit-content;
            display: inline-flex;
            
            align-items: center;
            
            
            justify-content: center;
            align-items: center;
            
            box-shadow: 0px 3px 20px 0px black;

        }
        h2 {
            margin: 0px;
            padding: 10px;
            text-align: center;
            font-family: "Times New Roman", serife;
            font-size: 2.5em;
            text-shadow: 2px 2px 2px black;
        }
        h3 {
            margin: 0px;
            padding: 0px;
            text-align: center;
            font-family: "Times New Roman", serife;
            font-size: 24px;
            
        }

        #footer {
            clear: both;
            padding: 5px;
            background: white
        }

        h1 {
            margin: 5px;
            font-size: 4em;
            text-align: center;
            color: #698B69;
            font-family: Gabriola, Monotype Corsiva, Cursive;
            text-shadow: 2px 2px 2px black;
        }

        p {
            font-size: 1.5em;
            color: #000000;
            font-family: "Times New Roman", serife;
            text-align: justify
        }
        


        li {
            font-size: 1em;
            color: #000000;
            font-family: "Times New Roman", serife;
            text-align: justify;
            text-shadow: 2px 2px 2px black;
        }

        ul {
            font-size: 1.5em;
            color: #000000;
            font-family: "Times New Roman", serife;
            text-align: justify
        }
        table {
            font-size: 14px;
            border-radius: 10px;
            border-spacing: 0px;
            box-shadow: 0px 3px 20px 0px black;
            text-align: center;
            height: fit-content;
            width: 870px;

        }
        th {
            background: #09515E;
            color: white;
            text-shadow: 0px 1px 1px #2d2020;
            padding: 10px 20px; 
        }
        th, td {
            border-style: solid;
            border-width: 0px 1px 1px 0px;
            border-color: white; 
        }
        th:first-child, td:first-child {
            text-align: left;
        }
        th:first-child {
            border-top-left-radius: 10px;
        }
        th:last-child {
            border-top-right-radius: 10px;
            border-right: none;
        }
        td {
            padding: 10px 20px;
            background: #39919E;

        }
        tr:last-child td:first-child {
            border-radius: 0px 0px 0px 10px;
        }
        tr:last-child td:last-child {
            border-radius: 0px 0px 10px 0px;
        }
        tr td:last-child {
            border-right: none;
        }


    </style>
<title>Read Book</title>
</head>

<body fpstyle="1" ocsi="1">
    <div style="direction:ltr; font-family:Tahoma; color:#000000; font-size:10pt; ">
        <div id="container" >
            <div id="header" ><img style="box-shadow: 0px 3px 20px 0px black;" src="pictures/inkspire_title copy.jpg" width="1000">

                <ul class="menu-bar">

                    <li>
                        <a href="index.php">Welcome</a>
                    </li>
                    <li>
                        <a href="mind_map.php">Mind maps</a>
                    </li>
                    <li>
                        <a href="Inspire_writhing.php">Write</a>
                    </li>
                    <li>
                        <a href="Inkspire_reading.php">Read</a>
                    </li>
                    <li>
                        <a href="#">Comming soon</a>
                    </li>
                    <li>
                        <?php
                            if(!$Login_Session){
                                echo('<a href="Login.php">Login</a>');
                            }elseif($_SESSION["session_role"]=="3"){
                                echo('<a href="Login.php">Login</a>');
                            }else{
                                echo('<a href="Logout.php">Logout</a>');
                            }

                        ?>
                    </li>




                </ul>
            </div>



            <div id="nav"> </div>
            <div id="aside"></div>

            <div id="content">

                <h1><i>
                        <font color="#19617E"><?php echo($BookName); ?></font>
                    </i>
                </h1>
                
            
                
                    <h3>
                        <font color="#8d2915" style="align-items: left;"><b><i>Written by <?php echo($Author_View_Name); ?></i></b> </font>
                    </h3>
                
                <h2><br> </h2>

                <?php
                    if(strlen($Image_url)>0){
                        echo('<img src="'.$Image_url.'" width="100%" >');

                    } 
                  
                ?>
                
                
                
                
                <div class="title_bar">
                    <h2>
                        <font color="#f0f0f0">Chapter <?php echo($Chapter_Nmbr); ?></font>
                    </h2>
                </div>
                <p> </p>
                

                
                <h2><i>
                        <font color="#19617E" ><?php echo($Chapter_name); ?> </font>

                </i></h2>
          
                    
                        <?php
                            echo('<p style="white-space: pre-wrap; color: #154c74; font-weight: bold; font-style: italic; font-size: 24px; line-height: 31px;">'.$Content.'<p>');
                        ?>


                
                
                
                </i></h2>
                <?php
                    if($hasPreviuosChapter){

                        $form_Privious='<form method="POST" name="PriviousChapter" action="read_book_chapter.php?chapterID='.$PreviousChapterID.'&BookID='.$Book_ID.'&BookName='.$BookName.'"><input type="submit" name="prevous_chapter" style="font-size: 24px;" value="Prevous Chapter"></form>';
                        echo($form_Privious);

                    }
                    if($hasNextChapter){

                        $form_next='<form method="POST" name="NextChapter" action="read_book_chapter.php?chapterID='.$NextChapterID.'&BookID='.$Book_ID.'&BookName='.$BookName.'"><input type="submit" name="next_chapter" style="font-size: 24px;" value="Next Chapter"></form>';
                        echo($form_next);

                    }
                ?>



                <p> <font color="white"> </font></p>
                
                    

                

               
                
               
                
                
                
                <p> <font color="white"> </font></p>
                
                <p></p><br>
                
            </div>
        </div>
    </div>
</body>

</html>