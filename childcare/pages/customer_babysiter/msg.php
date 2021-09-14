<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Messaging</title>
        <link rel="stylesheet" type="text/css" href="../../css/msgStyle.css">
        <link href="https://fonts.googleapis.com/css?family=Flamenco&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php 
            $babysiterprofile_id = $_POST['profile_id'];
            $babysiter_email_id = $_POST['email_id'];

            session_start();

            $_SESSION['receiver_babysitter_id'] = $babysiterprofile_id;
            $_SESSION['receiver_babysitter_email'] = $babysiter_email_id;
        
        ?>
        
        <div class="clearfix box">
            
            <div id="msgbox" class="msg-box"></div>
            <input type="text" id="content" class="msg-input"><input class="btn" id="btn" type="submit" value="send" onclick="insertdata();">

        </div>
        <script>
            var input = document.getElementById("content");
            input.addEventListener("keyup", function(event) {
              if (event.keyCode === 13) {
               event.preventDefault();
               document.getElementById("btn").click();
              }
            });
        </script>

        <script>
        function drawmsgbox(){
            var req=new XMLHttpRequest();
            
            req.onreadystatechange=function(){
                if(this.readyState==4 && this.status==200){
                    document.getElementById("msgbox").innerHTML=this.responseText;
                }
            }
            req.open("POST","readmsg.php");
            req.send();
        }
        drawmsgbox();
        setInterval(drawmsgbox, 2000);
        function insertdata(){
            var content=document.getElementById("content").value;
            document.getElementById("content").value = '';
            var req=new XMLHttpRequest();
            
            req.onreadystatechange=function(){
                if(this.readyState==4 && this.status==200){
                    console.log("message sent successfully");
                }
            }
            
            var formdata=new FormData();
            formdata.append("content",content);
            
            req.open("POST","updatemsg.php");
            req.send(formdata);
        }
        
        </script>
        
        
    </body>
</html>
