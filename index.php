<?php
session_start();

?>

<html>
        <style = "text/css">
                .welcome
                {
                        font-size:22px;
                        font-family:Georgia;
                        top:20%;
                        left:35%;
                        color:red;
                        
                }
        </style>
        
        <head>
                <meta name="google-signin-client_id" content="663823076896-fq2lo49gjjimiat7cd8p1s4vq5frjf2h.apps.googleusercontent.com">
                <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer ></script>
        </head>
        <body>
               
                
                <script>
                
                function logout(){
                    var auth2 = gapi.auth2.getAuthInstance();
                    auth2.signOut();
                        
                        jQuery.ajax({
                                url:'logout.php',
                                success:function(result){
                                        window.location.href="index.php";
                                }
                               
                        });
                   
                    
                }
                
                function onLoad(){
                       gapi.load('auth2',function (){
                              gapi.auth2.init();
                       }); 
                }
                function logoutScreen(){
                        
                         gapi.load('auth2',function (){
                              gapi.auth2.init();
                       }); 
                        
                        let userProfile = gapi.auth2.currentUser.get().getBasicProfile();
                        document.write("<br><p class = 'welcome' >Hello " + userProfile.getName() + " <a href='javascript:void(0)' onclick='logout()'>Logout</a></p>");
                        console.log("hello");
                                
                        }
                
                function gmailLogIn(userInfo){
                        var userProfile=userInfo.getBasicProfile();
                        
                       
                        
                        
                        jQuery.ajax({
                                url:'login_check.php',
                                type:'post',
                                data:'user_id='+userProfile.getId()+'&name='+userProfile.getName(),
                                success:function(result){
                                       
                                        window.location.href="index.php";
                                }
                               
                                
                        });
                        
                         document.write("<br><p class = 'welcome' >Hello " + userProfile.getName() + " <a href='javascript:void(0)' onclick='logout()'>Logout</a></p>");
                        
                       
                }
                </script>
                
                <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                
                
                 <?php
                if(isset($_SESSION['USER_ID'])){
                        
                echo "<a href='javascript:void(0)' onclick='logout()'>Logout</a><br>";
                echo "<div class = 'welcome'> <script> logoutScreen(); </script>  </div>";
                        
                               
                        
                }else{
                        
                        echo "<div class='g-signin2' data-onsuccess='gmailLogIn'> </div>";
                       
                }
                ?>
        </body>
</html>

