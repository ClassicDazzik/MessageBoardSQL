<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
</head>
<body>
    <div id="messageDiv"></div>
    <!--div class="sender">
        <p>Sent by <b>Masa</b> at <b>2022-5-4</b></p>
        <div class="message">Juu moi tää on testiviesti jutska</div>
    </div>
    <div class="sender">
        <p></p>
        <div class="message"></div>
    </div-->
    <script>
        function getMessages(){
            const ajax = new XMLHttpRequest()
            ajax.onload = function(){
                const data = JSON.parse(this.responseText)
                console.log(data)
                const msgDiv = document.getElementById("messageDiv")
                data.forEach(message => {
                    const newMessage = document.createElement("p")
                    const messageText = document.createTextNode(message.messag)
                    newMessage.appendChild(messageText)
                    msgDiv.appendChild(newMessage)
                })
            }
            ajax.open("GET","getAllMessages.php")
            ajax.send()
        }

    </script>
</body>
</html>