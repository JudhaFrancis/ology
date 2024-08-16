<!DOCTYPE php>
<php>

<body>
    <h1>Payment Form</h1>
    <form id="paymentForm">
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="number" name="amount" placeholder="Amount" required><br>
        <button type="button" onclick="payNow()">Pay Now</button>
    </form>
    <script>
        var user = localStorage.getItem("user")
        if(user!=null){
         document.getElementById("in").textContent="LOGOUT"
        }
        else{
        document.getElementById("in").textContent="LOGIN"
        }
         </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        function payNow() {
            const form = document.getElementById("paymentForm");
            const name = form.elements["name"].value;
            const email = form.elements["email"].value;
            const amount = form.elements["amount"].value * 100; // Amount in paisa

            // Send customer details to your server
            $.post("https://ologygirls.in:3000/create_order", { name, email, amount }, function (data) {
                const options = {
                    key: data.key_id,
                    amount: data.amount,
                    currency: data.currency,
                    name: "OLOGY GIRLS",
                    description: "Payment for Services",
                    image: "https://13.234.78.60/assets/img/ologylogo.png",
                    order_id: data.id,
                    handler: function (response) {
                        // Handle payment success
                        alert("Payment successful! Payment ID: " + response.razorpay_payment_id);
                    },
                    prefill: {
                        name: name,
                        email: email,
                    },
                };
                const rzp = new Razorpay(options);
                rzp.open();
            });
        }
    </script>
</body>
</php>
