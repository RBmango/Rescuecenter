<!doctype html>
<html>
    
   <head>
       <link rel="stylesheet" href="Style3.css">
       <script src='https://www.google.com/recaptcha/api.js'></script>
        
    


       <script src="man.js"></script>
    </head> 
       
      <body>
          
        <div class="contact-form">
           <h1>Contact US</h1>
           <form action="" method="POST">
            
            <input type="text"  name="name" placeholder="Your Name" required>
            <input type="text"  name="phone" placeholder="Phone No" required>
            <input type="email"  name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" required></textarea>
            
            <div class="g-recaptcha" data-sitekey="6Lc0FKMUAAAAALBcI2HH9atSTly5hm82rHRuaNwa"></div>
           <input type="submit"  name="submit" value="Send Message" class="submit-btn">
        </form>
        
<div class="status">
            <?php
        if(isset($_POST['submit']))
        {
            
            $User_name =$_POST['name'];
            $phone =$_POST['phone'];
            $user_email = $_POST['email'];
            $user_message = $_POST['message'];
            
            $email_from = 'ruqqiya.batool@elev.ga.lbs.se'
            $email_subject="New Form Submission";
            $email_body="Name: $User_name.\n".
                               "Phone No: $phone.\n".
                               "Email id: $User_email.\n".
                               "User Message: $User_message.\n";
                               
                               
            $to_email= "ruqqiya.batool@elev.ga.lbs.se";
            $headers= "From: $email_from \r\n";
            $headers .="Replay-to: $user_email\r\n";
            
            $secretKey= "6Lc0FKMUAAAAAKwUh0TpoJd5heeGSnDMe_n6iHCq";
            $responseKey= $_POST['g-recaptcha-response'];
            $UserIP = $_SERVER['REOMTE_ADDR'];
            $url= "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$UserIP";
            
            $response= file_get_contents($url);
            $response= json_decode($response);
            
            if($response->success)
            {
               mail($to_email,$email_subject,$email_body,$headers);
               echo"Message sent Successfully";
             
            }
            else
            {
            
            echo"<span>Invalid Captcha, Please Try Again</span>";
            
            }
        }
            
        ?>
            
        </div>
         </div>  

 </body>
</html>

