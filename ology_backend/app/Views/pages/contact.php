<!-- 20-07-2023 apo panna codeu  -->




<!DOCTYPE php>
<php lang="en">



      <div class="container-fluid des">
        <div class="row">
            <div class="col-lg-3">
                <img  class="p-5" src="assets/img/tele 1.png" alt="">
            </div>
            <div class="col-lg-7">
                <h1 class="felix contac-h1 mar-1 ">Engage with OlogyGirls: Elevate Your Voice and Forge Meaningful Connections</h1>
<div class="text-center">

    <p class="gal-p p-5">We value your voice and are eager to hear from you. Whether you have questions, ideas, or
      simply want to share your thoughts, this is the place to reach out. Our dedicated team is
      here to support and empower you on your journey.
</div>
            </div>
            <div class="col-lg-2">
                <!-- <img   class="p-3 mt-5" src="./assets/img/art elements-06.png " alt=""> -->
            </div>
        </div>
       </div>


       <div class="container-fluid mob">
        <div class="row">
            <div class="col-lg-3">
              <h1 class="felix contac-h1 mar-1 ">Engage with OlogyGirls: Elevate Your Voice and Forge Meaningful Connections</h1>
            </div>
            <div class="col-lg-7 text-center">
              <img  class="mt-2" src="assets/img/tele 1-mob.png" alt="">
<div class="text-center">

    <p class="gal-p ">We value your voice and are eager to hear from you. Whether you have questions, ideas, or simply want to share your thoughts, this is the place to reach out. Our dedicated team is here to support and empower you on your journey. Connect with us today and become a part of the OlogyGirls community, where inspiration and growth thrive.

  </div>
            </div>
            <div class="col-lg-2">
                <!-- <img   class="p-3 mt-5" src="./assets/img/art elements-06.png " alt=""> -->
            </div>
        </div>
       </div>
       
      
       <div class="container-fluid dost-he des">
        <div class="row">
           
            <div class="col-lg-5 dost-he">
                <input class="in-con " type="text" id="first-name" name="Name" placeholder="YOUR NAME">
              
            </div>
            <div class="col-lg-1">

            </div>
            <div class="col-lg-6 dost-he">
                
                <input class="in-con2 " type="text" id="first-name" name="Email" placeholder="YOUR EMAIL">
            </div>
        </div>
        <div class="row mt-5">
           
            <div class="col-lg-5 dost-he">
                <input class="in-con" type="text" id="first-name" name="Phone Number" placeholder="PHONE NUMBER">
              
            </div>
            <div class="col-lg-1">
                
            </div>
            <div class="col-lg-6 dost-he">
                <div  >
                <select class="in-con3" id="cars" name="cars" >
                    <option value="" disabled selected >ENQUIRE FOR</option>
                    <option value="volvo">Courses</option>
                    <option value="saab">Events</option>
                    <option value="fiat">Other</option>
                   
                  </select>
                </div>
              
            </div>
           
        </div>
        <div class="row mt-5">
            <div class="col-lg-12 text-center felix">
                <textarea class="in-context mb-3" type="text" id="first-name" name="Message" placeholder="YOUR MESSAGE"></textarea>
                <a >   <button class="con-btn  mt-5">Send info</button></a>   
            </div>
          
        </div>
       </div>


       <div class="container-fluid dost-he mob">
        <div class="row">
           
            <div class="col-lg-5 dost-he">
              <div class="form-outline mt-3">
                <input type="text" id="typeText" class="form-control" />
                <label class="form-label" for="typeText">YOUR NAME</label>
              </div>
              
            </div>
            <div class="col-lg-1">

            </div>
            <div class="col-lg-6 dost-he">
                
              <div class="form-outline mt-3">
                <input type="text" id="typeText" class="form-control" />
                <label class="form-label" for="typeText">YOUR EMAIL</label>
              </div>
            </div>
        </div>
        <div class="row ">
           
            <div class="col-lg-5 dost-he">
              <div class="form-outline mt-3">
                <input type="text" id="typeText" class="form-control" />
                <label class="form-label" for="typeText">YOUR PHONE NUMBER</label>
              </div>
              
            </div>
            <div class="col-lg-1">
                
            </div>
            <div class="col-lg-6  mt-3">
                <div  >
                  <select class="select">
                    <option value="" disabled selected >ENQUIRE FOR</option>
                    <option value="Courses">Courses</option>
                    <option value="Events">Events</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
              
            </div>
           
        </div>
        <div class="row ">
            <div class="col-lg-12 text-center felix">
              <div class="form-outline mt-3">
                <input type="text" id="typeText" class="form-control" />
                <label class="form-label" for="typeText">MESSAGE</label>
              </div>
              <div class="mt-5">
              <a>   <button class="btn-sec ">Send info</button></a>   
            </div>
            </div>
          
        </div>

        <div class="row">
          <dic class="col-lg-12 text-center mt-5">
            <img src="assets/img/school girl22 3-mob.png" alt="">
          </dic>
        </div>
       </div>


      



  
   
        

  <script>
    var user = localStorage.getItem("user")
    if(user!=null){
     document.getElementById("in").textContent="LOGOUT"
    }
    else{
    document.getElementById("in").textContent="LOGIN"
    }
     </script>

    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
  ></script>
  <script src="assets/js/script.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</php>