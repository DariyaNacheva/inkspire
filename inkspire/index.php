<?php
    session_name("inkspire_s");
    session_start();
    $Login_Session=FALSE;
    if(isset($_SESSION["session_role"])){
        $Login_Session=TRUE;
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
            font-size: 22px;
            color: #000000;
            font-family: "Times New Roman", serife;
            text-align: justify;
            
        }


        li {
            font-size: 22px;
            color: #000000;
            font-family: "Times New Roman", serife;
            text-align: justify;
            margin: 12px;
            
        }
        li::marker {color: #154c74}

        ul {
            font-size: 22px;
            color: #000000;
            font-family: "Times New Roman", serife;
            text-align: justify;
            margin: 15px;
        }
    </style>

<body fpstyle="1" ocsi="1">
    <div style="direction:ltr; font-family:Tahoma; color:#000000; font-size:10pt; ">
        <div id="container" >
            <div id="header" ><img style="box-shadow: 0px 3px 20px 0px black;" src="pictures/inkspire_title copy.jpg" width="1000">

                <ul class="menu-bar">

                    <li>
                        <a href="#">Welcome</a>
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
                        <font color="#19617E">Welcome to Inkspire WEB Site</font>
                    </i>
                </h1>
                <div class="title_bar">
                    <h2>
                        <font color="#f0f0f0">Presentation of Inspire Web Site</font>
                    </h2>
                </div>
                <p>
                    <font color="#154c74">

                        <b><i>Welcome Dear Writers and Readers !!! <i></b>
                        <br>Our site Inkspire is created for yang and beginner writers. They can create their story, 
                        alone or with friend and share it in this site’s readers community. 
                        The beginner writer can get inspired by other’s stories.</br>

                        </font>


                </p>
                <img style="box-shadow: 0px 3px 20px 0px black;" src="pictures/writing1.jpg" width="100%" height="530">
                <div class="title_bar">
                    <h2>
                        <font color="#f0f0f0">About Writers</font>
                    </h2>
                </div>
                <p><font color="#154c74">
                    <b>
                    <ul>Like a Writer You can:
                        <li><font color="#154c74">Feel free to create content a story for other;</font></li>
                        <li><font color="#154c74">Share Your story with the world in online format;</font></li>
                        <li><font color="#154c74">Take Feedback from readers to understand what impressed readers and what 
                            excited them about your story.</font></li>
                    </ul>
                    </b>
                </font></p>
                <p></p>
                <img style="box-shadow: 0px 3px 20px 0px black;" src="pictures/reading1.jpg" width="100%" height="530">
                <div class="title_bar">
                    <h2>
                        <font color="#f0f0f0">About Readers</font>
                    </h2>
                </div>
                <p></p>
                <p style="color:#154c74 ; font-size: 22px;">
                    <b>If You are a reader:</b> 
                    <br style="margin: 15px;">Inkspire is totally free Web site. You don’t have to pay some money to read site’s story. 
                    If You don’t want to write, you can read the story created by others and send them feedback. 
                    In this manner You will help to Beginner Writer to develop their skill.</br>
                </p>
                <img style="box-shadow: 0px 3px 20px 0px black;" src="pictures/rules_red_pencil.png" width="100%" height="390">
                <div class="title_bar">
                    <h2>
                        <font color="#f0f0f0">Some Rules</font>
                    </h2>
                </div>
                <p><font color="#154c74">
                
                    <ul><b>Although this site is free, there is some rules that must be followed when You use the site:
                        <li><font color="a9291f">It is forbidden to publish stories with racist content!</font></li>
                        <li><font color="a9291f">It is forbidden to publish stories with pornographic content!</font></li>
                        <li><font color="a9291f">It is forbidden to publish stories with content promoting violence and terrorism!</font></li>
                        <li><font color="a9291f">It is forbidden to publish stories with content supporting drug use!</font></li>
                    </b>
                    </ul>
                </font></p>
                <img style="box-shadow: 0px 3px 20px 0px black;" src="pictures/Recomendation.jpg" width="100%" height="390">
                <div class="title_bar">
                    <h2>
                        <font color="#f0f0f0">Recomendations</font>
                    </h2>
                </div>
                <p><font color="#154c74">
                
                    <ul><b>We can give You the next advice like recommendations:
                        <li><font color="154c74">Share your experiences and life experiences in your stories;</font></li>
                        <li><font color="154c74">Write about what will help your readers cope with difficult situations;</font></li>
                        <li><font color="154c74">You are free to use whatever form and genre you want for your story;</font></li>
                        <li><font color="154c74">For your and your readers' help, we have provided you with the opportunity to 
                            specify what type of genre it is when creating your story.</font></li>
                    </b>
                    </ul>
                </font></p>
                <img style="box-shadow: 0px 3px 20px 0px black;" src="pictures/ready_2_start_1.jpg" width="100%" height="390">
                <div class="title_bar">
                    <h2>
                        <font color="#f1eb2c">Ready to start ???</font>
                    </h2>
                </div>
            </div>


                    





                
                
        </div>
    </div>
</body>

</html>