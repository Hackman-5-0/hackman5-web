<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>

<!-- form for google docs -->
<!-- <form 
  method="POST" 
  action="https://script.google.com/macros/s/AKfycbx8Xl2qsl4hUuIfE63L3wOfdZEeIHcL86wg7nLoTM3TPNeCDmlg5Mhg9GOVAgpLaIWJ/exec"
>
  <input name="Email" type="email" placeholder="Email" required>

  <input name="PHONE" type="email" placeholder="Email" required>
  <input name="Name" type="text" placeholder="Name" required>
  <button type="submit">Send</button>
</form> -->


<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Registration</p>

                <form class="mx-1 mx-md-4">


                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="team_name" class="form-control" />
                      <label class="form-label" for="form3Example1c">Team Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="name" class="form-control" />
                      <label class="form-label" for="form3Example1c">Your Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="email" class="form-control" />
                      <label class="form-label" for="form3Example3c">Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="phone" class="form-control" />
                      <label class="form-label" for="form3Example4c">Phone</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="number" min="1" max="3" id="team_size" class="form-control" />
                      <label class="form-label" for="form3Example4cd">Team Size</label>
                    </div>
                  </div>

                  <!-- <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div> -->

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="button" onclick="makePayment()" class="btn btn-primary btn-lg" value="Register">
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<script>



function makePayment(){

  // var name = $("#name").val();
  const team_name=document.getElementById('team_name').value;
  const name=document.getElementById('name').value;
  const email=document.getElementById('email').value;
  const phone=document.getElementById('phone').value;
  const team_size=document.getElementById('team_size').value;
  let paymentid;

  // console.log(team_name);
  // console.log(phone);
  // console.log(document.getElementById('email').value);
  
  
  console.log(name);

  if(team_size > 0 && team_size<4){
    var options = {
    "key": "rzp_live_SNuGTvcFhUHMYy", // Enter the Key ID generated from the Dashboard
    "amount": team_size * 25000, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Hackman 5.0",
    "description": "",
    "image": "https://example.com/your_logo",
    //"order_id": "order_IluGWxBm9U8zJ8", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
      paymentid = response.razorpay_payment_id; 
        alert("Registration succesfull");
        //add the google sheets api
        window.location = "index.html";
    },
    "prefill": {
        "name": name,
        "email": email,
        "contact": phone
    },
    "theme": {
        "color": "#3399cc"
    }
  };
  var rzp1 = new Razorpay(options);
  rzp1.open();
  rzp1.on('payment.failed', function (response){
        // alert(response.error.code);
        alert(response.error.description);
        window.location = "register.php";
        // alert(response.error.source);
        // alert(response.error.step);
        // alert(response.error.reason);
        // alert(response.error.metadata.order_id);
        // alert(response.error.metadata.payment_id);
});
  }else{
    alert("The Team size varies from 1 to 3. Please adjust your team accordingly")
    window.location = "register.php";
  }

}


// var options = {
//     "key": "rzp_live_SNuGTvcFhUHMYy", // Enter the Key ID generated from the Dashboard
//     "amount": "100", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
//     "currency": "INR",
//     "name": "Hackman 5.0",
//     "description": "Test Transaction",
//     "image": "https://example.com/your_logo",
//     //"order_id": "order_IluGWxBm9U8zJ8", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
//     "handler": function (response){


//         alert(response.razorpay_payment_id);
//         alert(response.razorpay_order_id);
//         alert(response.razorpay_signature)
//     },
//     "prefill": {
//         "name": "Rahul Kumar",
//         "email": "hello@gmail.com",
//         "contact": "hat"
//     },
//     "notes": {
//         "address": "Razorpay Corporate Office"
//     },
//     "theme": {
//         "color": "#3399cc"
//     }
// };
// var rzp1 = new Razorpay(options);
// rzp1.on('payment.failed', function (response){
//         alert(response.error.code);
//         alert(response.error.description);
//         alert(response.error.source);
//         alert(response.error.step);
//         alert(response.error.reason);
//         alert(response.error.metadata.order_id);
//         alert(response.error.metadata.payment_id);
// });
// document.getElementById('rzp-button1').onclick = function(e){
//     rzp1.open();
//     e.preventDefault();
// }
</script>

</body>



</html>