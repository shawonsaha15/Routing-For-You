<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Contact us form </title>
    <link rel="stylesheet" href="contactus.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   
<body>



  <div class="container">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">North South University</div>
          <div class="text-two">Plot # 15, Bashundhara, Dhaka 1229</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">+880-2-55668200</div>
          <div class="text-two">Fax: +880-2-55668202 </div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">routingforyou.cse299@gmail.com</div>
          <div class="text-two">rfy.contact@gmail.com</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">For any queries or feedback</div>
        <p>Contact us for any queries or user experience issues please contact us. We appreciate every feedback from our users. ROUTE SAFELY! </p>
      <form action="#">
        <div class="input-box">
          <input type="text" placeholder="Enter your name">
        </div>
        <div class="input-box">
          <input type="text" placeholder="Enter your email">
        </div>
        <div class="input-box message-box">
          <textarea placeholder="Enter your message"></textarea>
        </div>
        <div class="button">
          <input type="button" button onclick="myFunction()" value="Send Now" >
          <!--<button onclick="myFunction()">Send Now</button>
<p id="demo"></p> -->
          

          <script>
            function myFunction() {
                var x;
                var r = confirm("Press OK to send the message");
                if (r == true) {
                 x = "You pressed OK!";
             }
                else {
                 x = "You pressed Cancel!";
             }
             document.getElementById("demo").innerHTML = x;
        }
        </script>

        




        </div>
      

      </form>
      

    </div>
   

    </div>
    <?php include('./view/footer.php'); ?>

  </div>

</body>
</html>

