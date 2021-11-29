<!DOCTYPE html>
<html lang = 'en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Carbnb - Car Rentals</title>
    <link href="css/regist_car_style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
   <main class ='main'>
     <!-- Edit NavBar at assets/navbar.php -->
     <?php include('assets/navbar.php') ?>
     <!-- Page content begins here -->
     <div class = 'center'>
       <div id= "carform">
         <br>
         <br>
         <h1 class = "formhead">Car Details</h1>
         <br>
         <br>
         <form>
           <input type="text" id = "license" pattern="^[A-Z]{2}[ -][0-9]{1,2}(?: [A-Z])?(?: [A-Z]*)? [0-9]{4}$" placeholder="Vehicle Registration Number" title=" Eg: TN 22 BM 0919"><br>
           <select id="opts">
             <option id="defopt" selected disabled hidden>No of seats</option>
             <option class="opt" id="four">Four seater</option>
             <option class="opt" id="five">Five seater</option>
             <option class="opt" id="six">Six seater</option>
             <option class="opt" id="seven">Seven seater</option>
             <option class="opt" id="nine">Nine seater</option>
           </select><br>
           <select id="company">
             <option id="defopt" selected disabled hidden>Company</option> 
             <option class="opt">Hyundai</option>
             <option class="opt">Maruti Suzuki</option>
             <option class="opt">Tata</option>
             <option class="opt">Honda</option>
             <option class="opt">Toyota</option>
             <option class="opt">Mahindra</option>
             <option class="opt">Mercedes</option>
             <option class="opt">Tata</option>
             <option class="opt">Volkswagen</option>
           </select><br>
           <input type = "text" id = "model" placeholder="Enter Car model"><br>
           <input type = "text" id = "age" pattern="^[0-9]?[1-9]" placeholder="Enter Car age"><br>
           <select name="location" id="locat">
            <option value="select" selected disabled hidden>Location</option>
            <option value="klk">Kolkata</option>
            <option value="chn">Chennai</option>
            <option value="mmb">Mumbai</option>
            <option value="dlh">Delhi</option>
          </select><br><br>
          <input type="submit" value="Register">
         </form>
         <br>
         <br>
         <p>2021 © Carbnb. All rights reserved.<br><br></p>
       </div>
     </div>  
   </main>
  </body>
</html>