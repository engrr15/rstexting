<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<script type="text/javascript" src="http://rsstexting.com/webnotification/WebNotifications.js"></script>
<script type="text/javascript">
    

    function showNotification() {
        if (WebNotifications.areSupported()){
            if (WebNotifications.currentPermission() === WebNotifications.permissions.granted) {
                //handle different events
                //setTimeout( Notify, 5000 );
                //setInterval(Notify, 5000)
                Notify();
            }
        }
    }
    
    function Notify(){
        var notif = WebNotifications.new('Twilio notification ', '<?php echo $_REQUEST['msg'];?> # <?php echo $_REQUEST['mobileno'];?>', 'http://rsstexting.com/webnotification/notify.png', null, null);
                //handle different events
                
                notif.addEventListener("show", Notification_OnEvent);
                notif.addEventListener("click", Notification_OnEvent);
                notif.addEventListener("close", Notification_OnEvent);
                
    }

    function Notification_OnEvent(event) {
        //A reference to the Notification object
        //var notif = event.currentTarget;
        //document.getElementById("msgs").innerHTML += "<br>Notification <strong>'" + notif.title + "'</strong> received event '" + event.type + "' at " + new Date().toLocaleString();
    }
</script>
</head>
<body onload="showNotification();">
</body>
</html>
