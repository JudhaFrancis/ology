<!DOCTYPE php>
<php lang="en">

  <style>
    /* Base styling for alert boxes */
    .alert {
      padding: 15px;
      margin-top: 10px;
      border-radius: 8px;
      font-size: 16px;
      position: fixed;
      top: 20px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 9999;
      width: 90%;
      max-width: 500px;
      opacity: 0;
      transition: opacity 0.5s ease, transform 0.5s ease;
      display: none;
    }

    /* Alert success styling */
    .alert-success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Alert error styling */
    .alert-error {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Show alert with slide-in and fade-in effect */
    .alert.show {
      display: block;
      opacity: 1;
      transform: translateY(0);
    }

    /* Slide-in effect */
    .alert.slide-in {
      transform: translateY(-20px);
    }

    /* Responsive Design */
    @media (max-width: 576px) {
      .alert {
        width: 100%;
        max-width: none;
        left: 0;
        transform: none;
      }
    }

    /* Icon styling inside alerts */
    .alert .icon {
      display: inline-block;
      width: 24px;
      height: 24px;
      margin-right: 10px;
      vertical-align: middle;
      font-size: 20px;
    }

    .alert-success .icon {
      color: #155724;
    }

    .alert-error .icon {
      color: #721c24;
    }

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
  </head>

  <body>
    <section>
      <div class="background-image">
        <div class="section container">
          <div class="row">
            <div class="col-12 mb-3 text-center">
              <div class="sub_title" style="padding-top:100px">Engage with OlogyGirls: Elevate Your Voice and Forge Meaningful Connections</div>
            </div>
            <div class="col-12 text-center mb-3">
              <img class="mt-2" src="assets/img/tele 1-mob.png" alt="">
              <div class="paragraph">We value your voice and are eager to hear from you. Whether you have questions, ideas, or simply want to share your thoughts, this is the place to reach out. Our dedicated team is here to support and empower you on your journey. Connect with us today and become a part of the OlogyGirls community, where inspiration and growth thrive.</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="background-image">
        <div class="container">
          <form id="contactFormMob">
            <div class="row justify-content-center">
              <div class="col-lg-8 mb-3">
                <input style="background-clip: text;" type="text" id="name-mob" class="form-control" name="name" placeholder="YOUR NAME" required />
              </div>
              <div class="col-lg-8 mb-3">
                <input style="background-clip: text;" type="email" id="email-mob" class="form-control" name="email" placeholder="YOUR EMAIL" required />
              </div>
              <div class="col-lg-8 mb-3">
                <input style="background-clip: text;" type="text" id="phone-mob" class="form-control" name="phone" placeholder="YOUR PHONE NUMBER" required />
              </div>
              <div class="col-lg-8 mb-3">
                <select style="background-clip: text;" class="form-select" id="enquiry-mob" name="enquiry" required>
                  <option value="" disabled selected>ENQUIRE FOR</option>
                  <option value="Courses">Courses</option>
                  <option value="Events">Events</option>
                  <option value="Other">Other</option>
                </select>
              </div>
              <div class="col-lg-8 mb-3">
                <textarea style="background-clip: text;" id="message-mob" class="form-control" name="message" placeholder="YOUR MESSAGE" required></textarea>
              </div>
              <div class="col-lg-12 text-center felix">
                <button type="button" class="btn-sec mt-3 mb-3" onclick="submitForm()">Send info</button>
              </div>
            </div>
          </form>

          
            </div>
          </div>
    </section>

    <script>
      async function submitForm() {
        // Try to retrieve the desktop form first
        let form = document.getElementById('contactFormMob');

        // If the desktop form doesn't exist, try to retrieve the mobile form
        if (!form) {
          form = document.getElementById('contactForm');
        }
        const formData = new FormData(form);

        // Convert formData to a plain object
        const data = {};
        formData.forEach((value, key) => {
          data[key] = value;
        });

        // Define API endpoint
        const apiUrl = "<?php echo BASEURL; ?>/contactSendMail"; // Replace with your API endpoint

        try {
          // Send form data to API
          const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
          });

          // Parse the JSON response
          const responseData = await response.json();

          // Create alert element
          const alert = document.createElement('div');
          alert.classList.add('alert');

          if (response.ok) { // Status code 200
            alert.classList.add('alert-success');
            alert.innerText = 'Form submitted successfully.';
          } else if (response.statusCode === 400) { // Status code 400
            alert.classList.add('alert-error');
            alert.innerText = 'Please Fill your Data.';
          } else { // Other status codes
            alert.classList.add('alert-error');
            alert.innerText = responseData.message || 'An error occurred. Please try again later.';
          }

          document.body.appendChild(alert);
          alert.classList.add('show'); // Show the alert

          // Hide alert after 3 seconds
          setTimeout(() => {
            alert.classList.remove('show');
            setTimeout(() => alert.remove(), 500); // Remove alert after transition
          }, 3000);

          if (response.ok) {
            form.reset(); // Reset form after successful submission
          }
        } catch (error) {
          console.error('Error:', error);
          const alert = document.createElement('div');
          alert.classList.add('alert', 'alert-error');
          alert.innerText = 'An unexpected error occurred. Please try again later.';
          document.body.appendChild(alert);
          alert.classList.add('show');
          setTimeout(() => {
            alert.classList.remove('show');
            setTimeout(() => alert.remove(), 500);
          }, 3000);
        }
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

  </body>

  </html>