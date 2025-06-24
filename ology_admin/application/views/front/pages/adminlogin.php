



<!DOCTYPE php>
<php lang="en">

<body>
    

  

      <div class="container-fluid ">
        <div class="row">
            <div class="col-lg-12 ">
                <h1 class="signup-h1 text-center mt-5 ">
                   Admin login
                </h1>
                <p class="signin-p mt-5 ">Welcome Back to Your Empowering Oasis: Log in to OlogyGirls and Embrace a Supportive Community </p>
            </div>
        </div>
        <div class=" row text-center">
                <div class="col-lg-3">

                </div>

                <div class="col-lg-6 mt-3 mast">
                  <label class="form-label" style="color: red;" id="errorMessage" for="typeText"></label>

                  <form action="" method="post" id="loginForm" style="margin-bottom: 157px;">
                    <div class="form-outline mt-3">
                    <input type="email" id="email"  name="email" class="form-control"  required/>
                    <label for="email" class="form-label" >EMAIL</label>
                  </div>
      
                  <div class="form-outline mt-3">
                    <input type="password" id="password" name="password" class="form-control"  required/>
                    <label class="form-label" for="password">PASSWORD</label>
                  </div>
                    <div onclick="forgetPassword()" class="fp">Forget Password?</div>
    
                    <a >   <button type="submit" name="submit" value="Login" class="signup-btn  mt-5">Login</button></a>  

                    <div class="siguuu">New to Ology Girls? <a href="signup"> Sign Up</a></div>
                  </form>
                  <div class="forget-pass">
                  <form action="" method="post" id="forgetPassword" >
                    <div class="form-outline mt-3">
                      <input type="text" id="typeText" name="email" class="form-control" />
                      <label class="form-label"  for="typeText">EMAIL</label>
                    </div>
                      <a > <button type="submit" value="Register"  class="signup-btn  mt-3">Send New Password</button></a>  
                    <a href="signup">  <div class="siguuu">New to Ology Girls? Sign Up</div></a>
                  </div>
                </form>
              </div>
                  
                </div>

                
                <div class="col-lg-3 grugru">

                </div>

                </div>
            
        
    </div>
    
    <!-- <div class="container-fluid mob">
      <div class="row">
          <div class="col-lg-12 ">
              <h1 class="signup-h1 text-center mt-5 ">
                  login
              </h1>
              <p class="signin-p mt-3 ">Welcome Back to Your Empowering Oasis: Log in to OlogyGirls and Embrace a Supportive Community </p>
          </div>
      </div>
                  <div class=" row text-center">
              <div class="col-lg-3">

              </div>

              <div class="col-lg-6 mt-3 mast">
              <form action="" method="post" id="loginForm">
                <div class="form-outline mt-3">
                  <input type="text" id="typeText" name="email" class="form-control" />
                  <label class="form-label"  for="typeText">EMAIL</label>
                </div>
                <div class="form-outline mt-3">
                  <input type="password" id="typeText" name="password" id="password" class="form-control" />
                  <label class="form-label"  for="typeText">PASSWORD</label>
                </div>
               

                  <div onclick="forgetPassword()" class="fp">Forget Password?</div>
                  <a > <button type="submit" value="Register"  class="signup-btn  mt-3">Login</button></a>  
                <a href="./signup.php">  <div class="siguuu">New to Ology Girls? Sign Up</div></a>
              </div>
            </form>

            <form action="" method="post" id="forgetPassword" class="forgrt-pass">
              <div class="form-outline mt-3">
                <input type="text" id="typeText" name="email" class="form-control" />
                <label class="form-label"  for="typeText">EMAIL</label>
              </div>
                <a > <button type="submit" value="Register"  class="signup-btn  mt-3">Send New Password</button></a>  
              <a href="./signup.php">  <div class="siguuu">New to Ology Girls? Sign Up</div></a>
            </div>
          </form>
              <div class="col-lg-3 text-center">
            <img class="" src="./assets/img/grgrgr3 1-mb.png" alt="">
              </div>

              </div> -->
          
      
  

 
 

        

              <script>
    var user = localStorage.getItem("user")
    if(user!=null){
     document.getElementById("in").textContent="LOGOUT"
    }
    else{
    document.getElementById("in").textContent="LOGIN"
    }
     </script>
  <script>
    document.getElementById("forgetPassword").style.visibility = "hidden";

  function forgetPassword(){
    document.getElementById("forgetPassword").style.visibility = "visible";
    document.getElementById("loginForm").style.visibility = "hidden";
    document.getElementById('forgetPassword').addEventListener('submit', function (event) {
      event.preventDefault(); // Prevent the default form submission
  
      // Get form data
      const formData = new FormData(event.target);
  
      // Convert form data to a JSON object
      const formDataObject = {};
      formData.forEach((value, key) => {
        formDataObject[key] = value;
      });
  
      // Send the data to the server using Axios
      axios
        .post('https://ologygirls.in:3000/forgotpassword', formDataObject)
        .then(function (response) {
          // Handle the success response here
          if(response.data.status==2000){
            window.location.href = 'signin';
          }
        })
        .catch(function (error) {
          // Handle errors here
          console.error(error);
        });
    });

  }

    document.getElementById('loginForm').addEventListener('submit', function (event) {
      event.preventDefault(); // Prevent the default form submission
  
      // Get form data
      const formData = new FormData(event.target);
  
      // Convert form data to a JSON object
      const formDataObject = {};
      formData.forEach((value, key) => {
        formDataObject[key] = value;
      });
  
      // Send the data to the server using Axios
      axios
        .post('https://ologygirls.in:3000/login', formDataObject)
        .then(function (response) {
          // Handle the success response here
          console.log(response.data);
          localStorage.setItem("user",JSON.stringify(response.data.user))

          if(response.data.status==2000){
            if(response.data.role=="admin"){
              window.location.href = 'admin-dashboard.php';
            }else{
              window.location.href = 'user-dashboard.php';
            }
          }else{
             document.getElementById("errorMessage").innerphp="*Invalid Username and Password"
          }
        })
        .catch(function (error) {
          // Handle errors here
          document.getElementById("errorMessage").innerphp="*Invalid Username and Password"

          console.error(error);
        });
    });
    
  </script>

    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
  ></script>


  <script src="assets/theme/js/script.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</php>
