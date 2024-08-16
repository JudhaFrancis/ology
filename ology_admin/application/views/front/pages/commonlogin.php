
<!-- 20-07-2023 apo panna codeu  -->




<!DOCTYPE php>
<php lang="en">

<body>
    

  


      <div class="container-fluid mb-5">
        <div class="row">
            <h1 class="art-h mt-5 mb-3 text-center">Login</h1>
            <div class="col-lg-12">
               
<div class="text-center">
    <a href="signin">   <button class="btn-sec mt-4" >User login</button></a>  
</div>
            </div>
               
                <div class="text-center">
                    <a href="adminlogin">   <button class="btn-sec mt-4" >Admin login</button></a>  
                </div>
                            
            
        </div>
       </div>


      

    

   

      

    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
  ></script>
  <script>
       localStorage.removeItem("user")
      const user = localStorage.getItem("user");
      if (user) {
        const usernameElement = document.getElementById("username") 
        const emailElement = document.getElementById("email")
        usernameElement.textContent = `Username: ${JSON.parse(user).first_name}`;
        emailElement.textContent = `Email: ${JSON.parse(user).email}`;

      } else {
        console.log("Username not found in localStorage");
      }
  </script>
  <script src="assets/js/script.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</php>