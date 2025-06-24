<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ology</title>

  <!-- Google tag (gtag.js) -->
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo BASEURL ?>assets\img\Untitled design.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?php echo BASEURL ?>assets\img\Untitled design.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo BASEURL ?>assets\img\Untitled design.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo BASEURL ?>assets\img\Untitled design.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo BASEURL ?>assets\img\Untitled design.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo BASEURL ?>assets\img\Untitled design.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?php echo BASEURL ?>assets\img\Untitled design.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo BASEURL ?>assets\img\Untitled design.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo BASEURL ?>assets\img\Untitled design.png">
  <link rel="icon" type="image/png" sizes="192x192" href="<?php echo BASEURL ?>assets\img\Untitled design.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo BASEURL ?>assets\img\Untitled design.png">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo BASEURL ?>assets\img\Untitled design.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo BASEURL ?>assets\img\Untitled design.png">

  <link rel="stylesheet" href="<?php echo BASEURL ?>assets/css/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>

<body>

  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <div class="floating_btn">
    <a target="_blank" href="https://api.whatsapp.com/send?phone=919176468468&text=Hi, i want to get details about workshop">
      <div class="contact_icon">
        <i class="fa fa-whatsapp my-float"></i>
      </div>
    </a>
  </div>
  
  <nav id="navbar" class="navbar navbar-expand-xl navbar-light" style="--mdb-navbar-box-shadow:none; padding-top:0px;padding-bottom:0px;transition: top 0.1s;">
    <div class="container p-2">
      <div class="row" style="text-align: center;">
        <div class="col-auto">
          <a class="navbar-brand" style="display: inline;" href="<?php echo BASEURL ?>home"><img src="<?php echo BASEURL ?>assets/img/ologylogo.png" style="width:60%;"></a>
        </div>
          <div class="col-auto" style="align-self: center;">
          <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="text-align: end;padding-left: 75px;">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="col-auto collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto nav-container">
            <li class="nav-item">
              <a class="nav-link text-center" href="<?php echo BASEURL ?>about"> Our story</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-center" href="<?php echo BASEURL ?>workshop"> The Finishing School</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo BASEURL ?>event">EVENTS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-center" href="<?php echo BASEURL ?>galleries">Photo Booth</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo BASEURL ?>blog">BLOGS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo BASEURL ?>contact">CONTACT</a>
            </li>
          </ul>
        </div>
        <div class="col-auto">
          <ul class="navbar-nav ms-auto d-none d-xl-inline-block">
            <li class="log">
              <a id="in" class="nav-link text-white" href="<?php echo BASEURL ?>common-login">LOGIN</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <!-- Modal Structure -->
  <div id="newsletterModal" class="modal">
    <div class="modal_box">
      <div class="modal-content" style="border-radius: 0px 12px 12px 12px;background-color: #a1b5b4">
        <div class="row">
          <div class="col-4" style="align-content:center;text-align:center;">
            <img src="<?php echo BASEURL ?>assets/img/ologylogo.png" style="width:60%;">
          </div>
          <div class="col-8">
            <span class="close join_btn" style="top:-40px;right:-40px;padding:0px 14px;margin-top:0px;border-radius:50px">&times;</span>
            <h2 style="color:fff;">Subscribe to Our Newsletter</h2>
            <p style="color:fff;">Join our mailing to receive the latest news and updates about OlogyGirls</p>
          </div>
        </div>
      </div>

      <div class="modal-content" style="border-radius:12px;">
        <form action="<?= BASEURL; ?>/newsletter" method="post" id="newsletterForm">
          <div class="form-group" style="padding-bottom:15px;">
            <input type="text" class="form-control" style="border-radius: 0px 12px 12px 12px;padding: .6rem .7rem;border-color: #a1b5b4" name="name" id="name" placeholder="Enter your name" required>
          </div>
          <div class="form-group" style="padding-bottom:15px;">
            <input type="email" class="form-control" style="border-radius: 0px 12px 12px 12px;padding: .6rem .7rem;border-color: #a1b5b4" name="email_id" id="email_id" placeholder="Enter your email" required>
          </div>
          <div class="form-group" style="display: flex; justify-content: center;">
            <div class="form-group" style="display: flex; justify-content: center;">
              <button id="subscribe" type="submit" class="join_btn" style="margin-top:0px;">
                <i class="far fa-envelope" style="padding-right:10px"></i>SUBSCRIBE NOW!
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <style>
    #navbar {
      transition: top 0.3s ease, background-color 0.3s ease, backdrop-filter 0.3s ease, box-shadow 0.3s ease;
    }

    .navbar-fixed {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
      backdrop-filter: blur(10px);
      background-color: rgba(238, 240, 224, 0.8);
    }

    .navbar-relative {
      position: relative;
      box-shadow: none;
      backdrop-filter: none;
      background-color: transparent;
    }

    .navbar>.container {
      display: flex;
      flex-wrap: inherit;
      align-items: center;
      justify-content: space-evenly;
    }

    @media (max-width: 1199px) {
      .navbar>.container {
        display: flex;
        flex-wrap: inherit;
        align-items: center;
        justify-content: flex-start;
      }
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 1050;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      backdrop-filter: blur(2px);
      background-color: rgba(238, 240, 224, 0.8);
    }

    .modal_box {
      margin-top: 10%;
    }

    @media (max-width: 1400px) {
      .modal_box {
        margin-top: 15%;
      }
    }

    @media (max-width: 1200px) {
      .modal_box {
        margin-top: 20%;
      }
    }

    @media (max-width: 992px) {
      .modal_box {
        margin-top: 25%;
      }
    }

    @media (max-width: 768px) {
      .modal_box {
        margin-top: 30%;
      }
    }

    @media (max-width: 576px) {
      .modal_box {
        margin-top: 40%;
      }
    }

    .modal-content {
      background-color: #fff;
      margin: 2% auto;
      padding: 20px;
      border-radius: 5px;
      width: 60%;
    }

    @media (max-width: 575px) {
      .modal-content {
        width: 75%;
      }
    }

    /* Close button */
    .close {
      color: #a62124;
      ;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #e4b744;
      text-decoration: none;
      cursor: pointer;
    }
  </style>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Make sure BASEURL is correctly defined and accessible in the script
      var baseURL = "<?php echo BASEURL; ?>";

      // Check if the current URL path matches the homepage
      if (window.location.href === baseURL + "home") {
        setTimeout(function() {
          var modal = document.getElementById('newsletterModal');
          if (modal) {
            modal.style.display = "block"; // Show the modal
          }
        }, 5000); // 5000 milliseconds = 5 seconds
      }
    });

    // Close the modal when the close button is clicked
    document.addEventListener("click", function(event) {
      if (event.target.classList.contains("close")) {
        var modal = document.getElementById('newsletterModal');
        if (modal) {
          modal.style.display = "none";
        }
      }
    });
  </script>





  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Get the current page URL
      const currentUrl = window.location.href;

      // Define specific paths to match and their corresponding link classes using PHP BASEURL
      const pathToNavLinkMap = {
        '<?php echo BASEURL ?>about': 'about',
        '<?php echo BASEURL ?>workshop': 'workshop',
        '<?php echo BASEURL ?>event': 'event',
        '<?php echo BASEURL ?>event_details': 'event',
        '<?php echo BASEURL ?>galleries': 'galleries',
        '<?php echo BASEURL ?>gallery': 'galleries',
        '<?php echo BASEURL ?>blog': 'blog',
        '<?php echo BASEURL ?>blog_details': 'blog',
        '<?php echo BASEURL ?>contact': 'contact'
      };

      // Check if currentUrl matches any specific paths
      Object.keys(pathToNavLinkMap).forEach(path => {
        if (currentUrl.startsWith(path)) {
          // Find the corresponding link with a matching href and add 'active' class
          const activeLink = document.querySelector(`a[href="${path}"]`);
          if (activeLink) {
            activeLink.classList.add('active');
          }
        }
      });
    });
  </script>

  <script>
    window.onscroll = function() {
      scrollFunction();
    };

    function scrollFunction() {
      var navbar = document.getElementById("navbar");
      if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
        navbar.classList.add('navbar-fixed');
        navbar.classList.remove('navbar-relative');
      } else {
        navbar.classList.add('navbar-relative');
        navbar.classList.remove('navbar-fixed');
      }
    }
  </script>
  <script>
    // Show/hide the chat box when the chat circle is clicked
    document.getElementById("chat-circle").addEventListener("click", function() {
      document.querySelector(".chat-box").style.display = "block";
    });

    // Hide the chat box when the close button is clicked
    document.querySelector(".chat-box-toggle").addEventListener("click", function() {
      document.querySelector(".chat-box").style.display = "none";
    });

    // Handle form submission (prevent default and handle message sending)
    document.querySelector("#chat-submit").addEventListener("click", function(event) {
      event.preventDefault();
      let userInput = document.querySelector("#chat-input").value;

      if (userInput.trim() !== "") {
        // Display the user's message in the chat logs
        let userMessage = document.createElement("div");
        userMessage.className = "user-message";
        userMessage.innerText = userInput;
        document.querySelector(".chat-logs").appendChild(userMessage);

        // Clear the input field
        document.querySelector("#chat-input").value = "";

        // Here you can add your logic to handle the message sending to the server or bot
      }
    });
  </script>