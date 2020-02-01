<html>
   
   <head>
      <style>
         .error {color: #FF0000;}
      </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>PHP form</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Carousel_Image_Slider.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/styles.css">
   </head>
   
   <body>
      <?php
         $firstnameErr = $lastnameErr= $emailErr = $passErr = $phoneErr = "";
         $firstname =$lastname = $email = $pass =$image =$comment = $phone = "";
          
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["firstname"])) {
               $firstnameErr = "Name is required";
            }else {
               $firstname = test_input($_POST["firstname"]);
               if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
                 $firstnameErr = "Only letters and white space allowed";
                                  } 
            }
            if (empty($_POST["lastname"])) {
               $lastnameErr = "Name is required";
            }else {
               $lastname = test_input($_POST["lastname"]);

               if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
                 $lastnameErr = "Only letters and white space allowed";
                                  } 
            }


            
            if (empty($_POST["email"])) {
               $emailErr = "Email is required";
            }else {
               $email = test_input($_POST["email"]);
               
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }
            }
            
            if (empty($_POST["phone"])) {
               $phoneErr = "Enter Phone number";
            }else {
               $phone = test_input($_POST["phone"]);
               if (strlen($phone) != 11) {
                   $phoneErr = "Enter a valid phone number";
               }
            }
            
            if (empty($_POST["comment"])) {
               $comment = "";
            }else {
               $comment = test_input($_POST["comment"]);
            }
            if (empty($_POST["image"])) {
               $image = "";
            }else {
               $image = test_input($_POST["image"]);
            }
            if (empty($_POST["pass"])) {
               $passErr = "pass is required";
            }else {
               $pass = test_input($_POST["pass"]);
               $uppercase = preg_match('@[A-Z]@', $pass);
               $lowercase = preg_match('@[a-z]@', $pass);
               $number    = preg_match('@[0-9]@', $pass);
               $specialChars = preg_match('@[^\w]@', $pass);
               if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 8) {
                $passErr = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character";
            }
            }
         }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
      ?>
  <div class="container">    
     <div class="simple-slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url(https://placeholdit.imgix.net/~text?txtsize=68&amp;txt=Slideshow+Image&amp;w=1920&amp;h=500);"><img src="assets/img/201393.png"></div>
                <div class="swiper-slide" style="background-image:url(https://placeholdit.imgix.net/~text?txtsize=68&amp;txt=Slideshow+Image&amp;w=1920&amp;h=500);"><img src="assets/img/967507-best-linux-wallpapers-2560x1920-download-free.jpg"></div>
                <div class="swiper-slide" style="background-image:url(https://placeholdit.imgix.net/~text?txtsize=68&amp;txt=Slideshow+Image&amp;w=1920&amp;h=500);"><img src="assets/img/ubuntu_gray_black_circle_logo_symbol_33031_2560x1080.jpg"></div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        </div>
    </div> 
    <div class="container">
        <hr> <form method = "post" action = >
        <div>
            <form id="contactForm" method="post" action="<?php 
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-row">
                    <div class="col-12 col-md-6" id="message">
                        <h2 class="h4"><i class="fa fa-envelope"></i>&nbsp;PHP form</h2>
                        <div class="form-group"><label for="from-name">First Name</label><span class="required-input">*</span>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user-o"></i></span></div><input class="form-control" type="text" id="firstname" name="firstname" required="" placeholder="First Name">      <span class = "error"> <?php echo $firstnameErr;?></span></div>
                        </div>
                        <div class="form-group"><label for="from-name">Last Name</label><span class="required-input">*</span>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user-o"></i></span></div><input class="form-control" type="text" id="lastname" name="lastname" required="" placeholder="Last Name">         <span class = "error"> <?php echo $lastnameErr;?></span></div>
                        </div>
                        <div class="form-group"><label for="email">Email</label><span class="required-input">*</span>                  
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope-o"></i></span></div><input class="form-control" type="text" id="email" name="email" required="" placeholder="Email Address"><span class = "error">* <?php echo $emailErr;?></span></div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                <div class="form-group"><label for="from-phone">Phone</label><span class="required-input">*</span>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone"></i></span></div><input class="form-control" type="text" id="from-phone" name="phone" required="" placeholder="Primary Phone"><span class = "error">* <?php echo $phoneErr;?></span></div>
                                </div>
                                <div class="form-group"><label for="from-pass">Password</label><span class="required-input">*</span>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i></span></div><input class="form-control" type="text" id="from-pass" name="pass" required="" placeholder="Password"><span class = "error">* <?php echo $passErr;?></span></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-12 col-lg-6"><label for="image">Image</label><span class="required-input">*</span>
                                <div class="form-group">
                                    <div class="custom-file"><label class="custom-file-label">Upload Image</label><input type="file" class="custom-file-input" id="image"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><label for="from-comments">Comments</label><textarea class="form-control" id="from-comments" name="comments" placeholder="Enter Comments" rows="5"></textarea></div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col"><button class="btn btn-primary btn-block" type="submit">Submit <i class="fa fa-chevron-circle-right"></i></button></div>
                            </div>
                        </div>
                        <hr class="d-flex d-md-none">
                    </div>
                </div>
            </form>
        </div>
    </div>

      
      <?php
         echo "<h2>Your given values are as:</h2>";
         echo $firstname;
         echo "<br>";
         echo $lastname;
         echo "<br>";
         echo $email;
         echo "<br>";
         
         echo $phone;
         echo "<br>";
         echo $image;
         echo "<br>";
         echo $comment;
         echo "<br>";
         
         echo $pass;
      ?>
   <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
    <script src="assets/js/Testimonial-Slider-9.js"></script>
    <script type="text/javascript">

   jQuery(document).bind('keyup', function(event) {

    if (event.keyCode==39) {
      jQuery('a.carousel-control.right').trigger('click');
    }   

    else if(event.keyCode==37){
      jQuery('a.carousel-control.left').trigger('click');
    }

});

</script>
   </body>
</html>