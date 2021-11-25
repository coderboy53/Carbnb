<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carbnb - Car Rentals</title>
    <link href="booking_confirm_style.css" rel="stylesheet" />
</head>

<body>
    <main class="main">
        <?php include('assets/navbar.php') ?>
        <div class="center">
            <h1>Confirm your booking details</h1><br>
            <div class="cards">
                <div class="card-content" id="car-details">
                    <h4>Car name: Swift</h4><br>
                    <h4>Vehicle no: TN 84 AX 0424</h4><br>
                    <h4>Company name: Maruti Suzuki</h4><br>
                </div>
                <div class="card-content" id="owner-details">
                    <h4>Owner name: Susindhar</h4><br>
                    <h4>Owner email: susindhar.av2020@vitstudent.ac.in</h4><br>
                    <h4>Owner Phone No: 9361166234</h4><br>
                </div>
                <div class="card-content" id="booking-details">
                    <h4>Date of booking: 25-11-2021</h4><br>
                    <h4>Amount: ₹2000</h4><br>
                    <h4>Duration: 2 days</h4><br>
                </div>
            </div>
            <div class='confirm'>
                <input type="submit" value="Confirm Order">
            </div>
        </div>

    </main>
</body>

</html>