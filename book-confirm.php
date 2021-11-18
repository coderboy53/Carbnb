<!DOCTYPE html>
<html lang = 'en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Carbnb - Car Rentals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="book_confirm_style.css" rel="stylesheet"/>
  </head>
  <body>
   <main class ='main'>
     <!-- Edit NavBar at assets/navbar.php -->
     <?php include('assets/navbar-log-session.php') ?>
     <!-- Page content begins here -->
     <div class = "body">
      <div class = "about">
        <h1>Order Confirmed</h1>
        <br>
        <br>
        <p> Your order has been confirmed! Find the details below, and contact the owner to discuss more details. Happy Renting! :) </p>
        <div class = "row">
            <div class = "col-12">
                <div class="card">
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-6">Car</dt>
                            <dd class="col-6">Tata Indica R8</dd>
                            <dt class="col-6">Owner</dt>
                            <dd class="col-6">Mr. John Smith</dd>
                            <dt class="col-6">Dates</dt>
                            <dd class="col-6">17th Feb 2022 - 19th Feb 2022</dd>
                            <dt class="col-6">Estimated Cost*</dt>
                            <dd class="col-6">Rs. 5000</dd>
                            <dt class="col-6">Owner Contact</dt>
                            <dd class="col-6">+91 9876543210</dd>
                            <dt class="col-6">Owner Address</dt>
                            <dd class="col-6">B1 Green Apartment, Anna Nagar, Chennai - 600012.</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <p id = "tac">*The final costs is subject to the state of the vehicle after rental period. Please check the main features of the car and note the dents/fixes that was already in place. The final rate is to be negotiated with the owner from here on out, according to the Owner's discretion in providing add-on packages. Inform us regarding any suspicious activity as and when it applies. We will guide you to the nearest help center.</p>
      </div> 
     </div>
   </main>
  </body>
</html>