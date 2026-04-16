<?php
    session_name("inkspire_s");
    session_start();
    $username="no user";
    $password="no_pass";
    if(isset($_REQUEST['login'])){
        $username=$_REQUEST['lname'];
        #echo("<br>");
        $password=$_REQUEST['lpassword'];

    }else{
        $username="no user";
        $password="no_pass";


    }
    #echo($_REQUEST)
    $DBHOST="localhost";
    $DBUSER="inkspire";
    $DBPASSWD="Test@1234";
    $DBNAME="inkspire";
    $SessionUser="Guest";
    $SessionRole=4;
    $SessionUserID=-1;

    #$conn = mysqli_connect($DBHOST, $DBUSER, $DBPASSWD, $DBNAME); #new $mysqli($DBHOST, $DBUSER, $DBPASSWD, $DBNAME);
    #$mysqli = new mysqli($DBHOST, $DBUSER, $DBPASSWD, $DBNAME);
    $conn = new mysqli($DBHOST, $DBUSER, $DBPASSWD, $DBNAME);
    if( !$conn){
        echo ("SORRY NO db connsection!!!!! <br>");
    }
    $sql = "SELECT * FROM login";
    $result = mysqli_query($conn, $sql);
    $users = mysqli_fetch_all($result,MYSQLI_ASSOC);
    print_r($users);
    $true_log = FALSE;
    foreach($users as $x){
        if($x["username"]==$username){
            if($x["password"]==$password){
                echo("<br>");
                print_r($x["username"]);
                echo("<br>");
                $true_log=TRUE;
                $SessionUser=$x["username"];
                $SessionRole=$x["ID_role"];
                $SessionUserID=$x["ID"];


            }
            

        }

        #print_r($x["username"]);
        #echo("<br>");

    }
    #relase result
    mysqli_free_result($result);

    #close connection
    mysqli_close($conn);







?>
<html>
    <head>
    </head>
    <body>
        <?php 
            if($true_log){
                $_SESSION["log_message"] = "Successfully Log in $username!!!";
                $_SESSION["session_user"] = $SessionUser;
                $_SESSION["session_role"] = $SessionRole;
                $_SESSION["User_ID"] = $SessionUserID;
            }else{
                $_SESSION["log_message"] = '<font color="red">Your Log in failed!!! You can surf like a Guest!</font>';
                $_SESSION["session_user"] = $SessionUser;
                $_SESSION["session_role"] = $SessionRole;
            }
            header("Location: /inkspire/Loging2.php");
            exit;
           
        
        
        ?>
        <h1>Username: <?php echo($SessionUser); ?></h1>
        <h1>Password: <?php echo($SessionRole); ?></h1>
    </body>
</html>