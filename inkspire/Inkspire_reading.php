<?php
    session_name("inkspire_s");
    session_start();
    $Login_Session=FALSE;
    $SessionUserTemp="Guest";
    $SessionRoleTemp=4;
    if(isset($_SESSION["session_role"])){
        $Login_Session=TRUE;
    }
    if(isset($_SESSION["session_role"])){
        if($_SESSION["session_role"]=="3"){
            #header("Location: Login.php");
            #exit();
        }

    }else{
        #header("Location: Login.php");
        #exit();
        $_SESSION["session_user"] = $SessionUserTemp;
        $_SESSION["session_role"] = $SessionRoleTemp;

    }

    $DBHOST="localhost";
    $DBUSER="inkspire";
    $DBPASSWD="Test@1234";
    $DBNAME="inkspire";


    $conn = new mysqli($DBHOST, $DBUSER, $DBPASSWD, $DBNAME);
    if( !$conn){
        echo ("SORRY NO db connsection!!!!! <br>");
    }
    $sql = "SELECT books.ID, books.book_name, login.View_name, books.short_description, ganre.ganre_name FROM books JOIN ganre ON books.genre_ID=ganre.ID JOIN login ON books.author_ID=login.ID ;";
    $sql2="SELECT * FROM ganre";

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
<title>Login</title>
</head>

<body fpstyle="1" ocsi="1">
    <div style="direction:ltr; font-family:Tahoma; color:#000000; font-size:10pt; ">
        <div id="container" >
            <div id="header" ><img style="box-shadow: 0px 3px 20px 0px black;" src="pictures/inkspire_title copy.jpg" width="100%">

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
                            }elseif($_SESSION["session_role"]=="3" || $_SESSION["session_role"]=="4"){
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
                        <font color="#19617E">Books are a uniquely portable magic</font>
                    </i>
                </h1>
                <img src="pictures/Reading_2.png" width="100%" >
                <div class="title_bar">
                    <h2>
                        <font color="#f0f0f0">Search for writing stories.</font>
                    </h2>
                </div>
                <p> <font color="white">a</font></p>
                <br>
                <form method="POST" name="SearchBook" action="/inkspire/Search_for_Books.php">
                <font color="#09515E">
                <label for="search_name" ><h2>Insert searching words: </h2></label><br>
                    <input type="text" id="search_name" name="search_name" value="" style="font-size: 22px;">
                    <br>
                    
                    <input type="checkbox" id="byAuthor" name="byAuthor" value="byAuthor" style="font-size: 22px;">
                    <label for="byAuthor" style="font-size: 22px;"> <b>By Author</b></label> 
                    <input type="checkbox" id="byName" name="byName" value="byName" style="font-size: 22px;">
                    <label for="byName" style="font-size: 22px;"> <b>By Name</b></label>
                    <input type="checkbox" id="byDescription" name="byDescription" value="byDescription" style="font-size: 22px;">
                    <label for="byName" style="font-size: 22px;"> <b>By Description</b></label>
                    
                    <br> <font color="white">a</font></p><br>
                    <label for="byGanre" style="font-size: 22px;"> <b>By Ganre:</b></label>
                    <input list="ganres"  class="form-control" name="ganre" style="width:60%; border-radius: 10px; box-shadow: 0px 3px 20px 0px black; font-size: 22px;">
                    <datalist id="ganres">
                        <?php
                            #$DBHOST="localhost";
                            #$DBUSER="inkspire";
                            #$DBPASSWD="Test@1234";
                            #$DBNAME="inkspire";
                            #$conn = new mysqli($DBHOST, $DBUSER, $DBPASSWD, $DBNAME);
                            if( !$conn){
                                echo ("SORRY NO db connsection!!!!! <br>");
                            }else{
                                #$sql = "SELECT * FROM ganre";
                                $result = mysqli_query($conn, $sql2);
                                $ganres = mysqli_fetch_all($result,MYSQLI_ASSOC);
                                foreach($ganres as $x){
                                    
                                    
                                        echo('<option value="'.$x["ganre_name"].'">');
                                    
                                    
                                    

                                }
                            }

                            #mysqli_free_result($result);
                            #mysqli_close($conn);


                        ?>
                        
                    </datalist>
                    
                    <br>
                </font>


                    <p> <font color="white">a</font></p>
                

                    <input type="submit" name="search" style="font-size: 24px;" value="Start searching for the book">
                </form> 
                <p></p><br>
                <h1><i>
                        <font color="#19617E">Once you learn to read, you will be forever free</font>
                    </i>
                </h1>


                <div class="title_bar">
                    <h2>
                        <font color="#f0f0f0">All publicated writing stories.</font>
                    </h2>
                </div>
                <p> <font color="white"> a</font></p>
                <table>
                    <tr>
                        <th >ID</th>
                        <th>Book Name</th>
                        <th>Author</th>
                        <th>Ganre</th>
                        <th>Raed</th>
                        
                    </tr>
                    

                

                <?php
                    $result = mysqli_query($conn, $sql);
                    $books = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    #echo($users);
                    #echo("<br>");
                    foreach($books as $x){
                        echo("<tr>");

                        echo("<td>");
                        echo($x["ID"]);
                        echo("</td>");

                        echo("<td>");
                        echo($x["book_name"]);
                        echo("</td>");

                        echo("<td>");
                        echo($x["View_name"]);
                        echo("</td>");

                        echo("<td>");
                        echo($x["ganre_name"]);
                        echo("</td>");

                        echo("<td>");
                        #$url_string=''
                        echo('<a href="/inkspire/read_book.php?bookID='.$x["ID"].'">Read</a>');
                        echo("</td>");

                        #echo("<td>");
                        #$url_string=''
                        #echo('<a href="/inkspire/delete_book.php?bookID='.$x["ID"].'">Delete</a>');
                        #echo("</td>");



                        echo("</tr>");
                        
                    }
                    mysqli_free_result($result);
                    mysqli_close($conn);


                ?>
                </table>
                <h1><i>
                        <font color="#19617E">"If you don’t like to read, you haven’t found the right book." – J.K. Rowling</font>
                    </i>
                </h1>
               
                
                
                
                
                
            </div>
        </div>
    </div>
</body>

</html>