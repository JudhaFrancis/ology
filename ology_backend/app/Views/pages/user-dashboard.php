<!DOCTYPE php>
<php lang="en">

    <!-- Add your custom CSS styles here -->
    <style>
        /* Custom sidebar styles */
        .sidebar {
            background-color: #333;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 15px;
            text-decoration: none;
            font-size: 18px;
            color: #000;
            display: block;
        }

        .sidebar a:hover {
            background-color: #555;
        }

        /* Main content styles */
        .content {
            padding: 20px;
        }
    </style>

<body>
    <!-- Bootstrap Navbar (for mobile) -->
    


    <!-- <div id="chat-circle" class=" btn-raised">
      <div id="chat-overlay"></div>
      
</div> -->

<!-- <div class="chat-box">
  <div class="chat-box-header">
    ChatBot
    <span class="chat-box-toggle"><i class="material-icons">close</i></span>
  </div>
  <div class="chat-box-body">
    <div class="chat-box-overlay">   
    </div>
    <div class="chat-logs">
      <p class="chat-welc">Hey Welcome to OlogyGirls.  </p>
    <div class="q1">
      Who are we?
    </div>
    <div class="q1">
      What do we do?
    </div>
    <div class="q1">
      How do we empower the community?
    </div>
    <div class="q1">
      How do I participate in the workshop?
    </div>
    <div class="q1">
      Where do these programs happen?
    </div>
    <div class="q1">
      What kind of core areas of personal growth are addressed?
    </div>
    <div class="q1">
      How can I collaborate with OlogyGirls?
    </div>
    </div>chat-log 
  </div>
  <div class="chat-input">      
    <form>
      <input type="text" id="chat-input" placeholder="Send a message..."/>
    <button type="submit" class="chat-submit" id="chat-submit"><i class="material-icons">send</i></button>
    </form>      
  </div>
</div>-->

    <!-- Sidebar and Content Area (for mobile) -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar (for mobile) -->
            <nav class="col-md-3 col-lg-2 d-md-block  sidebbbb">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                      <li class="nav-item nav-term">
                        <a  id="usernameElement" href="javascript:void(0);" class="nav-link" >UserName</a>
                        <a  id="emailElement" href="javascript:void(0);" class="nav-link" >Email</a>
                    </li>
                
                        <li class="nav-item nav-term">
                            <a class="nav-link" href="javascript:void(0);" onclick="showDashboard()">Current Workshops</a>
                        </li>
                        <li class="nav-item nav-term">
                            <a class="nav-link" href="javascript:void(0);" onclick="showProfile()">Past Workshops</a>
                        </li>
                       
                    </ul>
                </div>
            </nav>

            <!-- Main Content Area -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5">
              <h1 class="mt-2 wel-adm">Hey Welcome to OlogyGirls. <br><br>We are a dynamic and safe community that nurtures young girls to blossom into
                confident women, capable of taking charge of their lives and serving as catalysts for positive
                change.  </h1>
                <!-- <h1 class="mt-2">User Dashboard</h1> -->
               <a href="events"> <button type="button" class="btn btn-primary mastrr mt-3" >
                  Join Workshop
              </button></a>
                <div id="dashboardContent" class="mt-5">
                    <!-- Default content for the Dashboard -->
                    <h2 class="mt-2">Current Workshops</h2>
                </div>
                <div id="profileContent" class="mt-5" style="display: none;">
                    <!-- Content for the Profile -->
                    <h2>Past Workshops</h2>
                </div>
                <div id="settingsContent" style="display: none;">
                    <!-- Content for the Settings -->
                    <h2>Settings</h2>
                    <p>Application settings go here.</p>
                </div>
                <div id="reportsContent" style="display: none;">
                    <!-- Content for the Reports -->
                    <h2>Reports</h2>
                    <p>View reports and analytics here.</p>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal Form -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal Form</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Your form content goes here -->
            <form>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- JavaScript for content switching -->
    <script>
          const user = localStorage.getItem("user");
          if (user) {
            const usernameElement = document.getElementById("usernameElement");
            const emailElement = document.getElementById("emailElement");

            usernameElement.innerphp = JSON.parse(user).first_name
            emailElement.innerphp = JSON.parse(user).email
          } else {
            console.log("Username not found in localStorage");
          }

       
        function showDashboard() {
            hideAllContent();
            document.getElementById("dashboardContent").style.display = "block";
        }

        function showProfile() {
            hideAllContent();
            document.getElementById("profileContent").style.display = "block";
        }

        function showSettings() {
            hideAllContent();
            document.getElementById("settingsContent").style.display = "block";
        }

        function showReports() {
            hideAllContent();
            document.getElementById("reportsContent").style.display = "block";
        }

        function hideAllContent() {
            document.getElementById("dashboardContent").style.display = "none";
            document.getElementById("profileContent").style.display = "none";
            document.getElementById("settingsContent").style.display = "none";
            document.getElementById("reportsContent").style.display = "none";
        }
    </script>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</php>



