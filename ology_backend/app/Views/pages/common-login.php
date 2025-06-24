<!-- 20-07-2023 apo panna codeu  -->

<!DOCTYPE php>
<php lang="en">

<body>
  <section>
    <div class="background-image">
      <div class="container-fluid mb-5">
        <div class="row align-content-center" style="height:500px">
          <div class="title text-center">Login</div>
          <div class="col-lg-12">
            </div>
            <div class="text-center">
              <a href="http://localhost/ology/ology_new/ology_admin/auth/login"> <button class="btn-sec mt-4">Admin login</button></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <style>
      .background-image {
        position: relative;
        overflow: hidden;
      }

      .background-image::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('<?php echo BASEURL ?>assets/img/pattern_img.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: top;
        opacity: 0.01;
        z-index: 1;
      }

      .container-fluid {
        position: relative;
        z-index: 2;
      }

      .container {
        position: relative;
        z-index: 2;
      }

      section {
        opacity: 0;
        transform: translateY(50px);
        transition: opacity 1s ease-out, transform 1s ease-out;
      }

      section.in-view {
        opacity: 1;
        transform: translateY(0);
      }

      html {
        scroll-behavior: smooth;
      }
    </style>

    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
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
    </script>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</php>