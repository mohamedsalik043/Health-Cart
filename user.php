<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Health-Cart</title>
  <link rel="shortcut icon" href="image/HealthifyMe-Success-Story_Startuptalky.jpg" type="image/x-icon">
  <link rel="stylesheet" href="css/styleuser.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  
<style>
    /* Footer Styling */
/* Compact Footer Styling */
.medicine-info {
  text-align: center;
  padding: 50px 20px;
  background: linear-gradient(213deg, #6a11cb, #2575fc);

  color: white;
}
html,body {
  height:100%;
}

.navbar {
    display: fixed;
    justify-content:space-around; 
    align-items: center;
    background:linear-gradient(223deg,rgba(68, 67, 68, 0.996),rgb(35, 30, 35));
    padding: 10px 19px;
    font-family:Arial, Helvetica, sans-serif;
  } .nav-links {
    list-style-type: none;
    display: flex;
    flex: 2; 
    justify-content:center; 
    margin: 0;
    margin-left: 8px;
    transition: .2s;
  }
  .nav-links li a:hover{
    letter-spacing: 2px;
    color:rgb(247, 196, 247) ;
  }
  .nav-links li {
    margin: 0 20px; 
  }
  
  .nav-links li a {
    text-decoration: none;
    color: white;
    position: relative;
    font-size: 18px;
    padding: 10px 18px;
    transition: background-color 0.3s ease;
  }
  .nav-links a::before{
    content: '';
    position:absolute;
    height: 6px;
    width: 0;
    border-radius: 50%;
    background-color: rgb(247, 196, 247);
    bottom: -1px;
    left: -1px;
    transition: width .5s ease;
  }
  .nav-links a:hover::before {
    width: 100%;
  }
  .nav-links li a:hover {
    background-color: #575757;
    border-radius: 4px;
  }



.medicine-info h2 {
  font-size: 32px;
  margin-bottom: 20px;
  font-weight: bold;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.medicine-container {
  display: flex;
  justify-content: center;
  gap: 20px;
  flex-wrap: wrap;
}


.medicine-card {
  background: rgba(255, 255, 255, 0.1); /* More transparent */
  border-radius: 15px;
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
  padding: 20px;
  width: 270px;
  text-align: center;
  transition: 0.3s ease-in-out;
  backdrop-filter: blur(15px); /* Enhanced blur effect */
  border: 1px solid rgba(255, 255, 255, 0.3);
  position: relative;
  overflow: hidden;
}

.medicine-card::before {
  content: "";
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: radial-gradient(circle, rgba(255, 255, 255, 0.2), transparent);
  transition: 0.5s;
  z-index: 0;
}

.medicine-card:hover::before {
  top: -20%;
  left: -20%;
}

.medicine-card h3 {
  color: #fff;
  font-size: 22px;
  font-weight: bold;
  position: relative;
  z-index: 1;
}

.medicine-card p {
  color: #eaeaea;
  font-size: 16px;
  position: relative;
  z-index: 1;
}

.medicine-card:hover {
  transform: translateY(-10px) scale(1.05);
}


.footer {
    background: #222;
    position: relative;
    bottom: 0;
    width: 100%;

    color: #fff;
    padding: 20px 0;  /* Reduced padding */
    text-align: center;
    font-size: 14px;  /* Smaller font */
}

.footer-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    max-width: 1000px;
    margin: auto;
}

.footer-content, .footer-links, .footer-contact, .footer-social {
    margin: 8px;  /* Reduced margin */
    flex: 1;
    min-width: 180px; /* Slightly smaller sections */
}

.footer h3, .footer h4 {
    margin-bottom: 8px; /* Reduced spacing */
    font-size: 16px; /* Smaller font */
    font-weight: bold;
}

.footer-links ul {
    list-style: none;
    padding: 0;
}

.footer-links ul li {
    margin: 5px 0;
}

.footer-links ul li a {
    text-decoration: none;
    color: #ccc;
    transition: 0.3s;
    font-size: 13px; /* Smaller font */
}

.footer-links ul li a:hover {
    color: #ff7eb3;
}

.footer-contact p {
    font-size: 12px; /* Smaller font */
}

.footer-social .social-icons a {
    display: inline-block;
    margin: 3px;
    color: #ccc;
    font-size: 20px; /* Smaller icons */
    transition: 0.3s;
}

.footer-social .social-icons a:hover {
    color: #ff7eb3;
}

.footer-bottom {
    margin-top: 10px;  /* Reduced spacing */
    border-top: 1px solid #444;
    padding-top: 10px;
    font-size: 12px; /* Smaller font */
}

.location {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

h1 {
    color: #333;
    font-size: 28px;
    margin-bottom: 15px;
}

.msg {
    font-size: 18px;
    color: #555;
}

.location-list {
    list-style: none;
    padding: 0;
    margin: 20px 0;
}

.location-list li {
    background: #007bff;
    color: white;
    margin: 8px 0;
    padding: 10px;
    border-radius: 5px;
    font-size: 18px;
    transition: transform 0.2s ease-in-out;
}

.location-list li:hover {
    transform: scale(1.05);
    background: #0056b3;
}

.note {
    font-size: 16px;
    color: #777;
    margin-top: 20px;
}
</style>
  
</head>
<body>
     
     <nav class="navbar">
    <div class="brand">
      <a href="#">Health-Cart</a>
    </div>
    
    <ul class="nav-links">
      <li><a href="user.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="product.php">Products</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="cart.php" class="cart">Cart</a></li>
      <li><a href="review_page.php">Reviews</a></li>
    



      <li><a href="logout.php">Logout</a></li>
  
    </ul>
  </nav>
  <!--- <div class="search-box">
    <input type="text" placeholder="Search...">
    <button type="submit">Find</button>
  </div> --->

  <div class="suggestions-container">
        <input type="text" id="searchBox" placeholder="Search products..." autocomplete="off">
        <div id="suggestions"></div>
    </div>
  <div class="med">
    <marquee behavior="" direction="" scrollamount="15">
    <a href="https://www.medicalnewstoday.com/" target="_blank">
    <img src="image/thum.jpg" alt="med1">
    </a>
    <a href="https://www.medicalnewstoday.com/articles/can-antidepressants-increase-sudden-cardiac-death-risk" target="_blank">
      <img src="image/n.png" alt="med2">
      <img src="image/n1.jpeg" alt="med">
      <img src="image/n2.jpeg" alt="med3">
      <img src="image/n3.jpg" alt="med4">
      <img src="image/med.jpg" alt="med5">  
    </a>
    </marquee>
  </div>
  <br><br>
  <br>

  <script src="js/search_auto.js"></script>

<!-- Information Section -->
<section class="medicine-info">
        <h2>Essential Medicines You Need to Know</h2>
        <div class="medicine-container">
          <div class="medicine-card">
            <h3>Ibuprofen</h3>
            <p>Common pain reliever and anti-inflammatory medicine.</p>
          </div>

          <div class="medicine-card">
              <h3>Paracetamol</h3>
              <p>Used to treat fever and mild to moderate pain.</p>
          </div>

            <div class="medicine-card">
                <h3>Aspirin</h3>
                <p>Pain reliever, anti-inflammatory, and helps prevent blood clots.</p>
            </div>

            <div class="medicine-card">
                <h3>Amoxicillin</h3>
                <p>A common antibiotic used to treat bacterial infections.</p>
            </div>

            <div class="medicine-card">
                <h3>Loratadine</h3>
                <p>Antihistamine used to treat allergies and hay fever.</p>
            </div>

            <div class="medicine-card">
                <h3>Omeprazole</h3>
                <p>Used to reduce stomach acid and treat acid reflux.</p>
            </div>

            <div class="medicine-card">
                <h3>Metformin</h3>
                <p>Common medication for managing type 2 diabetes.</p>
            </div>

            <div class="medicine-card">
                <h3>Atorvastatin</h3>
                <p>Helps lower cholesterol and reduce heart disease risk.</p>
            </div>

        </div>
    </section>

    <div class="location">
        <h1>Our Product Delivery Locations</h1>
        <p class="msg">We currently deliver to the following locations:</p>

        <ul class="location-list" id="locationList">
        
        </ul>

        <p class="note">We are constantly expanding our delivery network. Stay tuned for updates!</p>
    </div>
    <script>
        
        const locations = [
            { name: "MADURAI", details: "Delivery in 3HR. Free shipping available." },
            { name: "VIRUDHUNAGAR", details: "Delivery in 1HR. Free shipping available." },
            { name: "SAATHUR", details: "Delivery in 2HR. Free shipping available." },
            { name: "SIVAKASI", details: "Delivery in 2HR. Free shipping available." },
            { name: "ALLAMPATTI", details: "Delivery in 2HR. Free shipping available." },
            { name: "ARUPUKKOTTAI", details: "Delivery in 2HR. Free shipping available." },
           
        ];

        // Get the <ul> element
        const locationList = document.getElementById("locationList");

        // Loop through locations and insert them into the list
        locations.forEach(location => {
            let li = document.createElement("li");
            li.textContent = location.name;

            // Create tooltip for extra details
            let tooltip = document.createElement("div");
            tooltip.classList.add("tooltip");
            tooltip.textContent = location.details;

            // Append tooltip to list item
            li.appendChild(tooltip);
            locationList.appendChild(li);
        });
    </script>


<!-- Footer Section -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-content">
            <h3>Health-Cart</h3>
            <p>Don't fear when we are here!!!!</p>
            <br/>            
            <p>Your one-step online pharmacy for all medical needs.</p>
        </div>
        
        <div class="footer-links">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="user.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="product.php">Products</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>

        <div class="footer-contact">
            <h4>Contact Us</h4>
            <p>Email: support@healthcart.com</p>
            <p>Phone: +91 9655339121</p>
        </div>

        <div class="footer-social">
            <h4>Follow Us</h4>
            <div class="social-icons">
                <a href="https://facebook.com/Mohamed Shalik" target="_blank"><i class='bx bxl-facebook'></i></a>
                <a href="#"><i class='bx bxl-twitter'></i></a>
                <a href="https://instagram.com/_mr__prince___07__" target="_blank"><i class='bx bxl-instagram'></i></a>
                <a href="https://www.linkedin.com/in/I.Mohamed Salik" target="_blank"><i class='bx bxl-linkedin'></i></a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2025 Health-Cart. @ All Rights Reserved.</p>
    </div>
</footer>



</body>
</html>
