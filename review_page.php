<?php
@include 'config_admin.php';

$selected_rating = isset($_GET['filter_rating']) ? (int) $_GET['filter_rating'] : 0;

// Insert new review
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $rating = (int) $_POST['rating'];
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    $sql = "INSERT INTO reviews (username, rating, comment) VALUES ('$username', '$rating', '$comment')";
    mysqli_query($conn, $sql);
    header("Location: " . $_SERVER['PHP_SELF']); // Refresh after submit
    exit;
}

// Fetch reviews with filter
if ($selected_rating > 0) {
    $stmt = $conn->prepare("SELECT * FROM reviews WHERE rating = ? ORDER BY created_at DESC");
    $stmt->bind_param("i", $selected_rating);
    $stmt->execute();
    $reviews = $stmt->get_result();
} else {
    $reviews = mysqli_query($conn, "SELECT * FROM reviews ORDER BY created_at DESC");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Health-Cart Reviews</title>
  <link rel="shortcut icon" href="image/HealthifyMe-Success-Story_Startuptalky.jpg" type="image/x-icon">
  <style>
    body {
      height: 100%;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(213deg,rgb(121, 157, 240), rgb(148, 28, 148));
      padding: 0;
      margin: 0;
      background-repeat: no-repeat;
      background-size: fill;
    }
    .container {
      max-width: 800px;
      margin: 30px auto;
      background: #eee;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    h1, h2 {
      text-align: center;
    }
    form label {
      display: block;
      margin-top: 10px;
    }
    form input, form select, form textarea, form button {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }
    form button {
      background: #2c3e50;
      color: white;
      margin-top: 15px;
      cursor: pointer;
    }
    form button:hover {
      background: #1f2f40;
    }
    .review {
      background: #ddd;
      border-left: 5px solid #2c3e50;
      margin-top: 20px;
      padding: 15px;
      border-radius: 8px;
    }
    .review .user {
      font-weight: bold;
    }
    .stars {
      color: gold;
    }
    .filter-box {
      text-align: center;
      margin: 20px 0;
    }
    .filter-box select {
      padding: 8px;
      border-radius: 5px;
      border: 1px solid #555;
    }
    .back-button {
            margin-top: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            margin-left:50%;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: 0.3s;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
  </style>
</head>
<body>
  <div class="container">
    <h1>LEAVE A REVIEW</h1>
    <form action="" method="POST">
      <label for="username">Name:</label>
      <input type="text" name="username" id="username" required>

      <label for="rating">Rating:</label>
      <select name="rating" id="rating" required>
        <option value="5">⭐⭐⭐⭐⭐</option>
        <option value="4">⭐⭐⭐⭐</option>
        <option value="3">⭐⭐⭐</option>
        <option value="2">⭐⭐</option>
        <option value="1">⭐</option>
      </select>

      <label for="comment">Comment:</label>
      <textarea name="comment" id="comment" rows="4" required></textarea>

      <button type="submit">Submit Review</button>
    </form>

    <div class="filter-box">
      <form method="GET">
        <label for="filter_rating"><strong>Filter by Rating:</strong></label>
        <select name="filter_rating" id="filter_rating" onchange="this.form.submit()">
          <option value="0" <?= $selected_rating == 0 ? 'selected' : '' ?>>All Ratings</option>
          <option value="5" <?= $selected_rating == 5 ? 'selected' : '' ?>>⭐⭐⭐⭐⭐</option>
          <option value="4" <?= $selected_rating == 4 ? 'selected' : '' ?>>⭐⭐⭐⭐</option>
          <option value="3" <?= $selected_rating == 3 ? 'selected' : '' ?>>⭐⭐⭐</option>
          <option value="2" <?= $selected_rating == 2 ? 'selected' : '' ?>>⭐⭐</option>
          <option value="1" <?= $selected_rating == 1 ? 'selected' : '' ?>>⭐</option>
        </select>
      </form>
    </div>

    <h2>User Reviews</h2>
    <?php if (mysqli_num_rows($reviews) > 0): ?>
      <?php while($row = mysqli_fetch_assoc($reviews)): ?>
        <div class="review">
          <div class="user"><?= htmlspecialchars($row['username']) ?> -
            <span class="stars"><?= str_repeat("⭐", $row['rating']) ?></span>
          </div>
          <p><?= nl2br(htmlspecialchars($row['comment'])) ?></p>
          <small><?= date('d M Y, h:i A', strtotime($row['created_at'])) ?></small>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p style="text-align:center;">No reviews found for selected rating.</p>
    <?php endif; ?>
  </div>
  <div class="back-button">
    <button class="btn"><a href="user.php" >← Back</a></button>
</div>
</body>
</html>
