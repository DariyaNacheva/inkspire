<?php
    session_name("inkspire_s");
    session_start();
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
    </style>
<title>Login</title>
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
                            if($_SESSION["session_role"]=="3"){
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
                        <font color="#19617E"><?php echo($_SESSION["log_message"]);?></font>
                    </i>
                </h1>
                <div class="title_bar">
                    <h2>
                        <font color="#f0f0f0">Welcome in Inkspire <?php echo($_SESSION["session_user"]);?></font>
                    </h2>
                </div>
                <p> <font color="white">a</font></p>
               
                <img src="pictures/Login_jpg.jpeg" width="100%" height="390">
                
                
                <p> <font color="white">a</font></p>
                <form method="POST" name="logout" action="/inkspire/Logout.php">
                    <br>
                    <input type="submit" name="logout" style="font-size: 24pt;" value="Logout">
                </form> 
                <p></p><br>
                <?php #echo($_SESSION["session_role"]); ?>
                
            </div>
        </div>
    </div>
</body>

</html>