<!DOCTYPE php>
<php lang="en">

<body>



  
  

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 ">
            <h1 class="signup-h1 text-center mt-5 ">
                Sign up<br>
to join us
            </h1>
            <p class="signup-p mt-5 ">Join us on this empowering journey and let's create a brighter future together.
<br><br>
We invite you to be a part of our dynamic and inclusive community, where young girls come
together to discover their potential, and make a positive impact. By
joining OlogyGirls, you become a part of a supportive network that celebrates individuality,
fosters growth, and encourages collaboration. Whether you are seeking personal
development opportunities, mentorship, or a platform to share your voice, OlogyGirls offers
a space where you can thrive and make lifelong connections. </p>

                <div class="text-center mast ">

  
             <form action="" method="post" id="registrationForm">
                  <div class="form-outline mt-3 ">
                    <input type="text" id="firstname" name="firstName" class="form-control"  required/>
                    <label class="form-label" for="firstname">FIRST NAME</label>
                  </div>
                  <div class="form-outline mt-3">
                    <input type="text" id="lastname" name="lastName" class="form-control" required />
                    <label class="form-label" for="lastname">LAST NAME</label>
                  </div>
                  <div class="form-outline mt-3">
                    <input type="email" id="email" name="email" class="form-control" required />
                    <label class="form-label" for="email">EMAIL </label>
                  </div>
                  <div class="form-outline mt-3">
                    <input type="number" id="phone" name="phone" class="form-control" required/>
                    <label class="form-label" for="phone">PHONE</label>
                  </div>
                  <div class="form-outline mt-3">
                    <input type="password" id="password" name="password" class="form-control" />
                    <label class="form-label" for="">PASSWORD</label>
                  </div>
                
                </div>
                <div class="row">
                  <div class="col-lg-12">
                     <div class="text-center">
                     <a > <button type="submit" value="Register" class="signup-btn  mt-5">Sign up</button></a>  
                <div class="siguuu mt-5">Already a member? <a href="commonlogin"> login</a></div>
              </div>
              </form>
            </div>
    
          </div>
            </div>
       
    </div>
</div>



  

    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
  ></script>
  <script src="assets/js/script.js"></script>
  <script>
    var user = localStorage.getItem("user")
    if(user!=null){
     document.getElementById("in").textContent="LOGOUT"
    }
    else{
    document.getElementById("in").textContent="LOGIN"
    }
     </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
      <script>
        document.getElementById('registrationForm').addEventListener('submit', function (event) {
          event.preventDefault(); // Prevent the default form submission
      
          // Get form data
          const formData = new FormData(event.target);
      
          // Convert form data to a JSON object
          const formDataObject = {};
          formData.forEach((value, key) => {
            formDataObject[key] = value;
          });
      
          // Send the data to the server using Axios
                              const api = "<?php echo $api;?>";
          axios
            .post(api+'/register', formDataObject)
            .then(function (response) {
              // Handle the success response here
              console.log(response.data);
              if(response.data.status==2000){
                window.location.href = 'signin.php';
              }
            })
            .catch(function (error) {
              // Handle errors here
              console.error(error);
            });
        });
      </script>
      
</body>
</php>
