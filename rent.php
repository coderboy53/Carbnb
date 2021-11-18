<!DOCTYPE html>
<html lang = 'en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Carbnb - Car Rentals</title>
    <link href="rent_style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
   <main class ='main'>
   <!-- Edit NavBar at assets/navbar.php -->
   <?php include('assets/navbar.php') ?>
     <!-- Page content begins here -->
     <div class = 'center'>
       <h1>Choose that car you dreamed about.</h1>
       <br><br>
       <div class="dropdown">
          <select name="location" id="locat">
            <option value="select" selected disabled hidden>Location</option>
            <option value="klk">Kolkata</option>
            <option value="chn">Chennai</option>
            <option value="mmb">Mumbai</option>
            <option value="dlh">Delhi</option>
          </select>
          <input type = "text" id = "searchbox" name = "Search" placeholder="Search Car">
          <input class = "dates" id="f_date" type = "text" placeholder = "From date" onfocus = "(this.type='date')" onblur= "(this.type='text')">
          <input class = "dates" id="t_date" type = "text" placeholder = "To date" onfocus = "(this.type='date')" onblur= "(this.type='text')">
       </div>
       <div class = 'search'>
         <input type="submit" value="Find a car">
       </div>
     </div>  
   </main>
  </body>
</html>
