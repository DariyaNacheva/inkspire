<?php
    session_name("inkspire_s");
    session_start();
    $Login_Session=FALSE;
    if(isset($_SESSION["session_role"])){
        $Login_Session=TRUE;
    }
    if(isset($_SESSION["session_role"])){
        if($_SESSION["session_role"]=="3"){
            header("Location: Login.php");
            exit();
        }elseif($_SESSION["session_role"]=="4"){
            header("Location: Login.php");
            exit();
        }

    }else{
        header("Location: Login.php");
        exit();
    }


    $DBHOST="localhost";
    $DBUSER="inkspire";
    $DBPASSWD="Test@1234";
    $DBNAME="inkspire";
    $Book_ID=$_REQUEST["bookID"];
    $User_ID=$_SESSION["User_ID"];



    $conn = new mysqli($DBHOST, $DBUSER, $DBPASSWD, $DBNAME);
    if( !$conn){
        echo ("SORRY NO db connsection!!!!! <br>");
    }
    $sql = "SELECT books.ID, books.book_name, books.short_description, books.long_descritption, books.author_ID, ganre.ganre_name FROM books JOIN ganre ON books.genre_ID=ganre.ID WHERE books.ID=".$Book_ID.";";
    $result = mysqli_query($conn, $sql);
    $book = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $BookName=$book[0]["book_name"];
    $ShortDescription=$book[0]["short_description"];
    $LongDescription= $book[0]["long_descritption"];
    $author_ID=$book[0]["author_ID"];
    $ganre_name=$book[0]["ganre_name"];
    $booksID=$book[0]["ID"];
    if($author_ID!=$User_ID){
        mysqli_free_result($result);
        mysqli_close($conn);
        header("Location: Login.php");
        exit();

    }




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
            background: rgb(255, 255, 255);
            box-shadow: 0px 3px 20px 0px black;
                /**/
        }

        #header {
            font-size: 2.2 em;
            text-align: center;
            background: rgb(249, 251, 248);
            
           
        }

        #nav,
        #aside {
            float: left;
            width: 110px;
            padding: 5px
        }

        #content {
            background: white;
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
            border-radius: 4px;
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
<title>Edit Book</title>
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
                        <font color="#19617E">Words are a lens to focus one’s mind.</font>
                    </i>
                </h1>
                <img src="pictures/Witing_chapter_small.jpg" width="100%" height="390">
            
                <div class="title_bar">
                    <h2>
                        <font color="#f0f0f0"><?php echo($BookName); ?></font>
                    </h2>
                </div>
                <p> </p>
                <h2><i>
                        <font color="#19617E" style="align-items: left;">Ganre: </font>
                    </i>
                </h2>
                <p>
                    <h3>
                        <font color="#8d2915" style="align-items: left;"><b><?php echo($ganre_name); ?></b> </font>
                    </h3>
                </p>

                
                <h2><i>
                        <font color="#19617E" >Short Description: </font>

                </i></h2>
          
                    
                        <?php
                            echo('<p style="white-space: pre-wrap; color: #154c74; font-weight: bold; font-style: italic; font-size: 24px; line-height: 31px;">'.$ShortDescription.'<p>');
                        ?>


                <h2><i>
                        <font color="#19617E" >Long Description: </font>

                
                
                </i></h2>
          

                        <?php
                            echo('<p style="white-space: pre-wrap; color: #154c74; font-weight: bold; font-style: italic; font-size: 24px; line-height: 31px;">'.$LongDescription.'<p>');
                        ?>

                        
                <form method="POST" name="EditBookAttr" action='/inkspire/Edit_Book_Attr.php?BookId=<?php echo($Book_ID); ?>&BookName=<?php echo($BookName); ?>'>
                    <br>
                    <input type="submit" name="logout" style="font-size: 24px;" value="Edit Book Description">
                </form> 
                <p> <font color="white"> a</font></p>

                <div class="title_bar">
                    <h2>
                        <font color="#f0f0f0">Book's Chapters</font>
                    </h2>
                </div>

                



                <p> <font color="white"> a</font></p>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Number</th>
                        <th>Chapter name</th>
                        <th>Image URL</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    

                

                <?php
                    $sql="SELECT * FROM books_chapters WHERE books_ID=$Book_ID;";
                    #echo($sql);
                    $result = mysqli_query($conn, $sql);
                    $chapters = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    #echo($users);
                    #echo("<br>");
                    foreach($chapters as $x){
                        echo("<tr>");

                        echo("<td>");
                        echo($x["ID"]);
                        echo("</td>");

                        echo("<td>");
                        echo($x["Chapter_Nmbr"]);
                        echo("</td>");

                        echo("<td>");
                        echo($x["Chapter_name"]);
                        echo("</td>");

                        echo("<td>");
                        echo($x["Image_url"]);
                        echo("</td>");

                        echo("<td>");
                        #$url_string=''
                        echo('<a href="/inkspire/edit_book_chapter.php?chapterID='.$x["ID"].'&BookID='.$booksID.'&BookName='.$BookName.'">Edit</a>');
                        echo("</td>");

                        echo("<td>");
                        #$url_string=''
                        echo('<a href="/inkspire/delete_book_chapter.php?chapterID='.$x["ID"].'&BookID='.$booksID.'">Delete</a>');
                        echo("</td>");



                        echo("</tr>");
                        
                    }
                    mysqli_free_result($result);
                    mysqli_close($conn);


                ?>
                </table>
               
                
                
                
                <p> <font color="white">a</font></p>
                <form method="POST" name="EditBookAttr" action='/inkspire/Add_new_chapter.php?BookId=<?php echo($Book_ID); ?>&BookName=<?php echo($BookName); ?>'>
                    <br>
                    <input type="submit" name="add_new_chapter" style="font-size: 24px;" value="Add new chapter">
                </form> 
                <p></p><br>
                
            </div>
        </div>
    </div>
</body>

</html>