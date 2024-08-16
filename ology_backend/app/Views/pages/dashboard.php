<!-- 20-07-2023 apo panna codeu  -->




<!DOCTYPE php>
<php lang="en">

<body>
    

 

  


      <div class="container-fluid des">
        <div class="row">
          
            <div class="col-lg-12">
                <h1 id="username" class="felix contac-h1 mar-1 ">Username: </h1>
                <h1 id ="email" class="felix contac-h1 mar-1 ">Email: </h1>
<div class="text-center">

</div>
            </div>
            
        </div>
       </div>


      

    

   

       


    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
  ></script>
  <script>
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