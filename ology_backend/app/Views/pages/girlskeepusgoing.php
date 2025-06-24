<!DOCTYPE php>
<php lang="en">

  <body>
    <section>
      <div class="background-image">
        <div class="container">
          <div class="title text-center" style="padding-top:100px">GIRLS WHO KEEP US GOING</div>
          <div class="row justify-content-between row-reverse-lg" style="padding-top:50px">
            <div class="col-lg-4 align-self-center">
              <div class="girls">
                <img class="girls-week" src="assets/img/Keshika.png" />
              </div>
            </div>
            <div class="col-lg-6 right-all">
              <div class="sub_title text-center">Keshika Manohar</div>
              <div class="paragraph text-align">At the tender age of 12, Keshika discovered her calling. Within a few months she successfully converted it into a fully functioning business. K’s Kitchen, a baking venture has been Keshika’s dream and reality – having self-built it piece by piece.
                <br><br>
                Her love for animals is evident and she spends her free time working for an NGO that rescues and feeds dogs. When she convinced strangers to adopt the pups one random evening, she bagged the job of being their brand ambassador.
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="background-image">
        <div class="container section">
          <div class="row justify-content-between" style="padding-top:50px">
            <div class="col-lg-6 right-all">
              <div class="sub_title text-center">Vinusha mk </div>
              <div class="paragraph text-align">
                In the enchanting world of Chennai, Tamil Nadu, there resides a passionate soul named Vinusha MK, the visionary founder and Pastry Director of Four Seasons Pastry. Her story unfolds as a captivating tapestry woven from the threads of unrivaled talent, an indomitable entrepreneurial spirit, and an abiding love for the art of baking.
                <br><br>
                With her remarkable prowess in the culinary arts and an unyielding entrepreneurial drive, Vinusha has garnered well-deserved recognition for her innovative creations. Her journey commenced at Four Seasons Pastry, driven by a noble vision to craft delectable cakes and confections that would delight the senses.
              </div>
            </div>
            <div class="col-lg-4 align-self-center">
              <div class="girls">
                <img class="girls-week" src="assets/img/Vinusha mk.png" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="background-image">
        <div class="container section">
          <div class="row justify-content-between row-reverse-lg" style="padding-top:50px">
            <div class="col-lg-4 align-self-center">
              <div class=" girls">
                <img class="girls-week" src="assets/img/Jiya.jpg" />
              </div>
            </div>
            <div class="col-lg-6 right-all">
              <div class="sub_title text-center">Jiya Rai</div>
              <div class="paragraph text-align">In the world of aquatic achievements, a remarkable young talent has emerged, and her name is Jiya Rai. Hailing from the vibrant city of Mumbai, this 13-year-old para-athlete has captured hearts and headlines by shattering records in the open waters. Jiya's journey is an inspiring tale woven from the threads of determination, resilience, and a profound love for swimming.
                <br><br>
                Jiya Rai's recent feat, a testament to her extraordinary abilities, made waves around the globe.
              </div>
            </div>
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
    </script>

    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</php>