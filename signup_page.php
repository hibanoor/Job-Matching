<!DOCTYPE html>
<html>
<head>
 <title>Signup Page</title>
 <style type="text/css">
 #container { margin:0 auto; width:100%; }
 #menu { float:top; background-color: #FCDCBE; overflow: auto; white-space: nowrap;}
 #menu a { display: inline-block;
  color: black;
  text-align: center;
  padding: 20px;
  text-decoration: none;}
  #menu a:hover { background-color: #E1DEF2;}

  form {border: 3px solid #f1f1f1; width: 40%; margin: 0 auto}
  * {box-sizing: border-box}

  /* Full-width input fields */
  input[type=text], input[type=password] {width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1; }

    input[type=text]:focus, input[type=password]:focus { background-color: #ddd;
     outline: none; }

     hr { border: 1px solid #f1f1f1;
      margin-bottom: 25px; }

      /* Set a style for all buttons */
      button { background-color: #0E276A;
       color: black;
       padding: 14px 20px;
       margin: 8px 0;
       border: none;
       cursor: pointer;
       width: 100%;
       opacity: 0.9; }

       button:hover { opacity:1; }

       /* Float cancel and signup buttons and add an equal width */
       .cancelbtn, .signupbtn { float: left;
         width: 50%;
         padding: 10px; }

         /* Add padding to container elements */
         .container { padding: 16px; }

         /* Clear floats */
         .clearfix::after { content: "";
         clear: both;
         display: table; }

         #login { float: right; }

       </style>
     </head>

     <body style="background-color:#FFFFFF; background-repeat: round">
      <div id="container">
        <div id="menu">
          <a href="index.php">Home</a>
          <a href="#job options">Job Options</a>
          <a href="#requirements">Requirements</a>
          <a href="recommendation.php">Recommendation</a>
          <a href="#prediction">Prediction</a>
          <a style="float:right;" href="loginpage.php">Login / Sign up</a>
        </div>

        <center><h2></h2></center>

        <form action="signup.php" id="form1" style="border:1px solid #ccc" method="POST" onSubmit="return validate();">
         <div class="container">
           <h1>Sign Up</h1>
           <p>Please fill in this form to create an account.</p>
           <hr>

           <center><?php if (isset($_GET['email'])) {echo "<h4 style='color: #C0392B;'>This email already exists!</h4>";} ?></center>

           <label for="name"><b>Name</b></label>
           <input type="text" placeholder="Enter Name" name="name"  required>

           <label for="email"><b>Email</b><?php if (isset($_GET['email'])) {echo "<span  style='color: #ff0000cc;font-size: 12px;float: right;'>This email already exists.</span>";} ?></label>
           <input type="text" placeholder="Enter Email" name="email" id="email"  required>

           <label for="psw"><b>Password</b><span  style='color: #ff0000cc;font-size: 12px;float: right;' id="divCheckPasswordMatch"></span></label>
           <input type="password" id="password" placeholder="Enter Password" name="psw" required>

           <label for="psw-repeat"><b>Repeat Password</b></label>
           <input type="password" id="confirm_password"  placeholder="Repeat Password" name="psw-repeat" required >

           <label for="address"><b>Address</b></label>
           <input type="text" placeholder="Enter Address" name="address"  required>
           <div id="candidate">

          </div>

           <label>
            <input type="checkbox"  name="employer" style="margin-bottom:15px"> I want to find a job
          </label>

          <label>
            <span id="login">Already a member? <a href="loginpage.php">Log In</a></span>
          </label>

          <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

          <div class="clearfix">
            <input type="submit" id="submit" value = "Sign Up" class="signupbtn">
            <input type="reset" value = "Cancel" style = "background-color: #C0392B; color: white;" class="cancelbtn">
          </div>
        </div>
      </form>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">

      <script type="text/javascript">
      $(function () {
        $("#submit").click(function () {
          var password = $("#password").val();
          var confirmPassword = $("#confirm_password").val();
          if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
          }
          return true;
        });
      });
    </script>


    <script>
      $('#submit').click(function(){
        var emailVal = $('#email').val();
        $.ajax({
          url: 'checkemail.php',
          data: {"email": emailVal},
          type: 'POST',
          dataType: "json",
          success: function (response) {
            /*alert(response.status);*/
          },
          error: function () {
            /*alert("error");*/
          }
        });
      });
    </script>
    <script>
    let checkbox = document.querySelector("input[name=employer]");
    checkbox.checked =false;
    checkbox.addEventListener( 'change', function() {
      if(this.checked) {
        let div = document.getElementById('candidate');  
        let labelSkill = document.createElement(`label`);
        labelSkill.setAttribute(`for`,`Skills`);
        let bold = document.createElement(`b`);
        bold.innerHTML = `Skills`;
        labelSkill.style.display = 'block';

        labelSkill.appendChild(bold);
        
        let inputSkill = document.createElement(`input`);
        inputSkill.setAttribute(`type`,`text`);
        inputSkill.setAttribute(`placeholder`,`Enter Your Skills`);
        inputSkill.setAttribute(`name`,`skills`);
        inputSkill.setAttribute(`required`,`required`);
                
        div.appendChild(labelSkill);
        div.appendChild(inputSkill);
        
        let labelExp   = document.createElement(`label`);;
        labelExp.setAttribute(`for`,`Experience`);
        labelExp.style.display = 'block';
        let bold2 = document.createElement(`b`);
        bold2.innerHTML = `Experience`;
        
        labelExp.appendChild(bold2);
        div.appendChild(labelExp);

        var selectList = document.createElement("select");
        
        selectList.setAttribute(`name`,`experience`);
        selectList.setAttribute(`placeholder`,`Enter years of experience`);
        selectList.setAttribute(`required`,`required`);
        selectList.style.padding = `8px`;
        selectList.style.width = `100%`;
        selectList.setAttribute(`required`,`required`);

        div.appendChild(selectList);

        let array      = [`Experience`,`0 to 3 Years`,`3 to 5 Years`,`More than 5 Years`];
        let array_vals = [``,`1`,`2`,`3`];
        for (var i = 0; i < array.length; i++) {
          var option   = document.createElement(`option`);
          option.value = array_vals[i];
          option.text  = array[i];
          if(i === 0){
            option.selected=  `selected`;
            option.setAttribute(`hidden`,true);
            option.setAttribute(`disabled`,true);
          }
          selectList.appendChild(option);
        }
      } else {
        let div = document.getElementById('candidate');  
        while(div.firstChild){
          div.removeChild(div.firstChild);
        }
      }
    });

</script>

  </body>

  </html>