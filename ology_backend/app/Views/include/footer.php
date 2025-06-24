<!-- Footer Content -->
<div class="container foot gal-foo eeeee">
  <div class="row">
    <div class="col-lg-6 col-xl-3 mt-5">
      <img class="f-log" src="<?php echo BASEURL ?>assets/img/lol.png" alt="">
    </div>
    <div class="col-lg-6 col-xl-3 mt-5 ">
      <div class="f-hed">OPENING HOURS</div>
      <p class="f-de">Monday - Sunday: 10am - 5pm</p>
    </div>
    <div class="col-lg-6 col-xl-3 mt-5">
      <div class="f-hed">Address</div>
      <p class="f-de">158 c, 4th floor, 995,<br> 2nd Ave, Anna Nagar West,<br> Chennai, Tamil Nadu 600040</p>
    </div>
    <div class="col-lg-6 col-xl-3 mt-5">
      <div class="f-hed">CONTACT US</div>
      <p class="f-de">+91 91764 68468, <br>+91 90872 11115, 044-47662953<br>ologygirls@ologywomen.com</p>
      <a href="<?php echo BASEURL ?>terms_condition">
        <div class="privacy">Privacy policy</div>
      </a>
      <a href="<?php echo BASEURL ?>terms_condition">
        <div class="privacy">Terms &amp; Conditions</div>
      </a>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12 fo-2">
      <!-- Trigger Button -->
      <a href="#" class="al-img" id="joinNewsletterLink">
        <div class="join_btn">JOIN THE NEWSLETTER</div>
      </a>

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
    </div>

    <div class="row">
      <div class="col-lg-12 fo-2">
        <a href="https://www.facebook.com/ologygirls" target="_blank"><img src="assets/img/ri_facebook-fill.png" alt=""></a>
        <a href="https://www.linkedin.com/company/ology-girls/" target="_blank"><img src="assets/img/ri_linkedin-fill.png" alt=""></a>
        <a href="https://www.instagram.com/ologygirls/?hl=en" target="_blank"><img src="assets/img/Vector.png" alt=""></a>
        <a href="https://m.youtube.com/@OlogyGirls-u3b/videos" target="_blank"><img src="assets/img/youtube-fill.png" alt=""></a>
      </div>
      <p class="foot-bt">© <?php echo date("Y"); ?> Ology Girls, All Rights Reserved</p>
    </div>
  </div>

  <style>
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
      const sections = document.querySelectorAll("section");

      const options = {
        threshold: 0.1 // Trigger when 10% of the section is visible
      };

      const observer = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add("in-view");
            // Stop observing the section after adding the class once
            observer.unobserve(entry.target);
          }
        });
      }, options);

      sections.forEach(section => {
        observer.observe(section);
      });
    });

    var modal = document.getElementById("newsletterModal");

    var btn = document.getElementById("joinNewsletterLink");

    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function(event) {
      event.preventDefault();
      modal.style.display = "block";
    }

    span.onclick = function() {
      modal.style.display = "none";
    }

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>