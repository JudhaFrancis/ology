
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css"rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>
<body >


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <div class="floating_btn">
    <a target="_blank" href="https://api.whatsapp.com/send?phone=919176468468&text=Hi, i want to get details about workshop">
      <div class="contact_icon">
        <i class="fa fa-whatsapp my-float"></i>
      </div>
    </a>
  </div>

<!-- 
  <div class="loader-container">
    <div class="loader"></div>
  </div> -->

<div id="chat-circle" class=" btn-raised">
        <div id="chat-overlay"></div>
	</div>
  
  <div class="chat-box">
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
      </div><!--chat-log -->
    </div>
    <div class="chat-input">      
      <form>
        <input type="text" id="chat-input" placeholder="Send a message..."/>
      <button type="submit" class="chat-submit" id="chat-submit"><i class="material-icons">send</i></button>
      </form>      
    </div>
  </div>
  
  
  
  


  <div class="des">
  <div class="overlay" id="overlay" style="display: none;"></div>
 
  <!--  This is the php code for the newsletter popup -->
<div id="newsletter-popup" class="news-pop"  style="display: none; position: fixed; top: 85%; left: 25%; transform: translate(-50%, -50%); padding: 20px; border-radius: 10px; width: 772.775px; z-index: 1;">
  
  <img src="<?php echo BASEURL ?>assets/img/newsletter-bg.png" class="des" alt="Background Image" style="width: 772.775px;; height: auto;">

  <div style="position: absolute; top: 50%; left: 30%; transform: translate(-50%, -50%); text-align: center;">
    <button id="close-button" style="position: absolute; top: -20px; right: -521px; background-color: transparent; color: #AD2821; font-size: 32px; border: none; cursor: pointer; ">&times;</button>
    <h2 class="new-pop">we have a Newsletter!!</h2>
    <form action="" method="post"  id="registrationForm">
    <input type="email" id="email-input" name="email" placeholder="Email" style="display: flex;
    width: 374.339px;
    align-items: center;
    background: none;
    border-radius: 12px;
border: 2.5px solid #000;
">
    <button type="submit" class="news-send"  id="send-button" style="width: 113px;
    height: 44px;
    transform: rotate(0.47deg);
    flex-shrink: 0; background: url(assets/img/pop-btn.png) no-repeat; color: white; border: none; border-radius: 5px; cursor: pointer; 
    position: absolute;
    left: 113% !important;
    top: 41% !important;">Send</button>
    </form>

  </div>
</div>
</div>


<div class="mob">
  <div class="overlay" id="overlay1" style="display: none;"></div>
 
  <!--  This is the php code for the newsletter popup -->
<div id="newsletter-popup1" class="newspop"  style="display: none; position: fixed; top: 50%; left: 45%; transform: translate(-50%, -50%); padding: 20px; border-radius: 10px; width: 345px; z-index: 1;">
  
  <img src="<?php echo BASEURL ?>assets/img/mobile-news-letter.png" class="mob" alt="Background Image" style="width: 345px;
  height: 216px;;

  justify-content: center;
  align-items: center;">
  <div style="position: absolute; top: 37%; left: 55%; transform: translate(-50%, -50%); text-align: center;">
    <button id="close-button1" style="position: absolute; top: -20px; right: -140px; background-color: transparent; color: #AD2821; font-size: 32px; border: none; cursor: pointer; ">&times;</button>
    <h2 class="new-pop1">we have a Newsletter!!</h2>

    <form action="" method="post" id="registrationForm">

    <div class="form-outline mt-3">
      <!-- <input type="text" id="typeText" name="email" class="form-control" style="width: 197.492px;"/>
      <label class="form-label" for="typeText" style="z-index: 2;">EMAIL</label> -->
      <input type="email" id="email" name="email" class="form-control" required />
      <label class="form-label"  style="z-index: 2;" for="email">EMAIL </label>
    </div><br>
     <button type="submit" class="news-send"  id="send-button" style="width: 113px;
    height: 44px;
    transform: rotate(0.47deg);
    flex-shrink: 0; background: url(assets/img/pop-btn.png) no-repeat; color: white; border: none; border-radius: 5px; cursor: pointer; 
    position: absolute;
    left: 22% !important;
   ">Send</button>

</form>

  </div>
</div>
</div>



<!-- <div id="myOverlay" class="overlay">
  <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
  <div class="overlay-content">
    <form action="/action_page.php">
      <h1 class="h1 mb-5 text-white">Search</h1>
      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

      <ul id="myUL">
        <li><a href="#">Adele</a></li>
        <li><a href="#">Agnes</a></li>
      
        <li><a href="#">Billy</a></li>
        <li><a href="#">Bob</a></li>
      
        <li><a href="#">Calvin</a></li>
        <li><a href="#">Christina</a></li>
        <li><a href="#">Cindy</a></li>
      </ul>
    </form>
  </div>
</div> -->


  
    <nav class="navbar navbar-expand-xl navbar-light ">
        <div class="container p-4">
          <a class="navbar-brand" href="<?php echo BASEURL ?>home"><img src="<?php echo BASEURL ?>assets/img/ologylogo.png"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <!-- <a href="./about.php"><li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  href="./about.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">ABOUT</a>
                
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item mb-2" href="./about.php">Our story</a></li>
                <li><a class="dropdown-item mb-2"  href="./career.php">Career</a></li>
                <li><a class="dropdown-item"  href="./notice-board.php">Noticeboard</a></li>
                </ul>
              </li>
            </a> -->
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
                <a class="nav-link" href="<?php echo BASEURL ?>blog">BLOG</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo BASEURL ?>contact">CONTACT</a>
              </li>
              <li class="log">
                <a id="in" class="nav-link text-white" href="<?php echo BASEURL ?>common-login">LOGIN</a>
              </li>

          
            </ul>
          </div>
        </div>
      </nav>