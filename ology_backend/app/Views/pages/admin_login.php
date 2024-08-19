<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="signup-h1 text-center mt-5">Admin login</h1>
                <p class="signin-p mt-5">Welcome Back to Your Empowering Oasis: Log in to OlogyGirls and Embrace a Supportive Community</p>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 mt-3 mast">
                <label class="form-label" style="color: red;" id="errorMessage" for="typeText"></label>
                <form action="" method="post" id="loginForm">
                    <div class="form-outline mt-3">
                        <input type="email" id="email" name="email" class="form-control" required />
                        <label for="email" class="form-label">EMAIL</label>
                    </div>
                    <div class="form-outline mt-3">
                        <input type="password" id="password" name="password" class="form-control" required />
                        <label class="form-label" for="password">PASSWORD</label>
                    </div>
                    <div onclick="forgetPassword()" class="fp">Forget Password?</div>
                    <button type="submit" name="submit" value="Login" class="signup-btn mt-5">Login</button>
                    <div class="siguuu">New to Ology Girls? <a href="signup">Sign Up</a></div>
                </form>

                <div id="forgetPasswordForm" class="forget-pass" style="visibility: hidden;">
                    <form action="" method="post" id="forgetPassword">
                        <div class="form-outline mt-3">
                            <input type="text" id="typeText" name="email" class="form-control" />
                            <label class="form-label" for="typeText">EMAIL</label>
                        </div>
                        <button type="submit" value="Send New Password" class="signup-btn mt-3">Send New Password</button>
                        <div class="siguuu">New to Ology Girls? <a href="signup">Sign Up</a></div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 grugru"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- <script>
        document.getElementById("forgetPasswordForm").style.visibility = "hidden";

        function forgetPassword() {
            document.getElementById("forgetPasswordForm").style.visibility = "visible";
            document.getElementById("loginForm").style.visibility = "hidden";
        }

        document.getElementById('forgetPassword').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission

            // Get form data
            const formData = new FormData(event.target);

            // Convert form data to a JSON object
            const formDataObject = {};
            formData.forEach((value, key) => {
                formDataObject[key] = value;
            });

            // Send the data to the server using Axios
            
            axios.post(api + '/forgotpassword', formDataObject)
                .then(function (response) {
                    // Handle the success response here
                    if (response.data.status == 2000) {
                        window.location.href = 'signin.php';
                    }
                })
                .catch(function (error) {
                    // Handle errors here
                    console.error(error);
                });
        });

        document.getElementById('loginForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission

            // Get form data
            const formData = new FormData(event.target);

            // Convert form data to a JSON object
            const formDataObject = {};
            formData.forEach((value, key) => {
                formDataObject[key] = value;
            });

            // Send the data to the server using Axios
            
            axios.post(api + '/login', formDataObject)
                .then(function (response) {
                    // Handle the success response here
                    console.log(response.data);
                    localStorage.setItem("user", JSON.stringify(response.data.user));

                    if (response.data.status == 2000) {
                        window.location.href = 'admin-dashboard.php';
                    } else {
                        document.getElementById("errorMessage").innerHTML = "*Invalid Username and Password";
                    }
                })
                .catch(function (error) {
                    // Handle errors here
                    document.getElementById("errorMessage").innerHTML = "*Invalid Username and Password";
                    console.error(error);
                });
        });
    </script> -->

</body>
</html>
