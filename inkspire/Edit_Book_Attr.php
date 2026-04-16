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

    $BookRequestID=$_REQUEST["BookId"];
    
    $DBHOST="localhost";
    $DBUSER="inkspire";
    $DBPASSWD="Test@1234";
    $DBNAME="inkspire";

    $Temp_val="->";


    $conn = new mysqli($DBHOST, $DBUSER, $DBPASSWD, $DBNAME);
    if( !$conn){
       echo ("SORRY NO db connsection!!!!! <br>");
    }
    $sql = "SELECT books.ID, books.book_name, books.short_description, books.long_descritption, ganre.ganre_name FROM books JOIN ganre ON books.genre_ID=ganre.ID WHERE books.ID=".$BookRequestID.";";
    #echo($sql);
    $result = mysqli_query($conn, $sql);
    $book_descrit = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $book_Name = $book_descrit[0]["book_name"];
    $Book_short_descript=$book_descrit[0]["short_description"];
    $Book_long_descript=$book_descrit[0]["long_descritption"];
    $Book_janre_name=$book_descrit[0]["ganre_name"];
    $Temp_val=$Temp_val.$Book_janre_name
    


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
        textarea{
            border-radius: 10px;
            box-shadow: 0px 3px 20px 0px black;
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

        input[type=list]{
            border-radius: 10px;
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
        


    </style>
<title>Edit Book Description</title>
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
                        <font color="#19617E">The road to hell is paved with adverbs</font>
                    </i>
                </h1>
                <img src="pictures/edit_descript.jpg" width="100%" >
                <div class="title_bar">
                    <h2>
                        <font color="#f0f0f0">Complate the form to edit the book!</font>
                    </h2>
                </div>
                
                <p> <font color="white">a</font></p>
                <form method="POST" name="update_book" action=/inkspire/Update_book.php?bookID=<?php echo($BookRequestID);?>>
                    
                    <label for="book_name"><h2>Book Name:</h2></label><br>
                    <input type="text" id="book_name" name="book_name" value="<?php echo($book_Name);?>" style="font-size: 18px;">
                    <br>
                    <p> <font color="white">a</font></p>

                    <label for="short_description"><h2>Short Description:</h2></label><br>
                    <textarea name="short_description" id="short_description" style="width:100%; height:100px; font-size: 18px;"><?php echo($Book_short_descript);?></textarea>
                    
                    <br>
                    <p> <font color="white">a</font></p>
                    <label for="long_description"><h2>Long Description:</h2></label><br>
                    <textarea name="long_description" id="long_description"  style="width:100%; height:220px; font-size: 18px;"><?php echo($Book_long_descript);?></textarea>
                    
                    <br>
                    <p> <font color="white">a</font></p>
                    <label for="ganre"><h2>Ganre:</h2></label><br>
                    <input list="ganres"  class="form-control" name="ganre" style="width:100%; border-radius: 10px; box-shadow: 0px 3px 20px 0px black; font-size: 18px;">
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
                                $sql = "SELECT * FROM ganre";
                                $result = mysqli_query($conn, $sql);
                                $ganres = mysqli_fetch_all($result,MYSQLI_ASSOC);
                                foreach($ganres as $x){
                                    
                                    
                                        echo('<option value="'.$x["ganre_name"].'">');
                                    
                                    
                                    

                                }
                            }

                            mysqli_free_result($result);
                            mysqli_close($conn);


                        ?>
                        
                    </datalist>
                    
                    
                    <br>
                    <p> <font color="white">a</font></p>
                    <input type="submit" name="update_book" style="font-size:22px;" value="Save maded corections">

                    
                   

                    
                    <br>
                    
                </form>
                <?php #echo($Temp_val); ?>

                

                
                <p></p><br>
                
            </div>
        </div>
    </div>
</body>

</html>