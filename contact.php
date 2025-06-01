<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Health-Cart</title>
  <link rel="shortcut icon" href="image/HealthifyMe-Success-Story_Startuptalky.jpg" type="image/x-icon">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

    * {
      font-family: 'Poppins', sans-serif;
      margin: 0; padding: 0;
      box-sizing: border-box;
      outline: none; border: none;
      text-decoration: none;
      
    }

    body {
      height: 100%;
      background: linear-gradient(223deg, rgb(121, 157, 240), rgb(148, 28, 148));
      background-repeat: no-repeat;
      background-size: fill;
    }

    .container {
      max-width: 900px;
      margin: 50px auto;
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
    }

    h1 {
      color: #2c3e50;
      text-align: center;
      margin-bottom: 20px;
    }

    .contact-form {
      display: flex;
      flex-direction: column;
    }

    .contact-form label {
      margin-top: 15px;
      font-weight: bold;
    }

    .contact-form input,
    .contact-form textarea {
      width: 100%;
      padding: 12px;
      margin-top: 8px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }

    .contact-form button {
      margin-top: 20px;
      padding: 12px;
      background-color: #2c3e50;
      color: white;
      font-weight: bold;
      font-size: 16px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .contact-form button:hover {
      background-color: rgb(65, 85, 104);
    }

    .contact-details {
      margin-top: 30px;
      padding: 20px;
      background: #f9f9f9;
      border-radius: 8px;
      line-height: 1.6;
    }

    .contact-details h2 {
      font-size: 20px;
      color: #2c3e50;
      margin-bottom: 10px;
    }

    .contact-details p {
      color: #444;
      font-size: 14px;
    }

    .map {
      margin-top: 20px;
      border-radius: 10px;
      overflow: hidden;
    }

    .header {
      background-color: #373b3d;
      position: sticky;
      top: 0; left: 0;
      z-index: 1000;
    }

    .header .flex {
      display: flex;
      align-items: center;
      padding: 1.5rem 2rem;
      max-width: 1200px;
      height: 30px;
      margin: auto;
    }

    .header .flex .logo {
      margin-right: auto;
      font-size: 1.5rem;
      color: #fff;
      transition: .2s;
    }

    .header .flex .logo:hover {
      color: rgb(160, 235, 160);
      letter-spacing: 2px;
    }

    .header .flex .navbar a {
      margin-left: 2rem;
      font-size: 1.05rem;
      color: #fff;
      transition: .2s;
    }

    .header .flex .navbar a:hover,
    .header .flex .cart:hover {
      color: yellow;
      letter-spacing: 2px;
    }
  </style>
</head>
<body>

<?php @include 'user_header.php' ?>

<div class="container">
  <h1>Contact Us</h1>

  <form class="contact-form" action="https://formspree.io/f/mwplwvlb" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="message">Message:</label>
    <textarea id="message" name="message" rows="5" required></textarea>

    <button type="submit">Send Message</button>
  </form>

  <div class="contact-details">
    <h2>Get in Touch</h2>
    <p><strong>Email:</strong> support@healthcart.com</p>
    <p><strong>Phone:</strong> +91 98765 43210</p>
    <p><strong>Address:</strong> Health-Cart Pvt. Ltd., 2nd Floor, Wellness Tower, MG Road, Chennai, Tamil Nadu - 600001</p>
  </div>

  <div class="map">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3934.067285299492!2d77.94463947450424!3d9.589468779965209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b012cbcd48dd70d%3A0x6a48dcda13ba93a7!2sBurma%20Colony%20St%2C%20Sivagami%20Puram%2C%20Virudhunagar%2C%20Tamil%20Nadu%20626001!5e0!3m2!1sen!2sin!4v1743952498864!5m2!1sen!2sin"
      width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
    </iframe>
  </div>
</div>

<script>
  const form = document.querySelector('.contact-form');
  form.addEventListener('submit', async function (e) {
    e.preventDefault();
    const formData = new FormData(form);
    const response = await fetch(form.action, {
      method: 'POST',
      body: formData,
      headers: {
        'Accept': 'application/json'
      }
    });
    if (response.ok) {
      alert("Thanks for your Support!!");
      form.reset();
    } else {
      alert("Oops! There was a problem. Please try again.");
    }
  });
</script>

</body>
</html>
