<?php
// db.php - Database connection
$servername = "localhost"; // Replace with your server name
$username = "root";        // Replace with your database username
$password = "";            // Replace with your database password
$dbname = "bus_pass_system"; // Replace with your database name

try {
    // Create a connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Start session to manage user login state
session_start();

// Function to log errors
function logError($message) {
    echo "<script>console.error('$message');</script>";
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input to prevent SQL injection
    $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, mobile_number, password FROM users WHERE mobile_number = ?");
    if (!$stmt) {
        logError("Database error: " . $conn->errorInfo()[2]);
        echo json_encode(['error' => 'Database error.']);
        exit();
    }

    // Execute the statement with the mobile number
    $stmt->execute([$mobile]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        // No user found with the provided mobile number
        echo json_encode(['error' => 'No user found with that mobile number.']);
    } else {
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_mobile'] = $user['mobile_number'];

            // Return success response
            echo json_encode(['success' => true]);
        } else {
            // Password mismatch
            echo json_encode(['error' => 'Invalid password.']);
        }
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: Arial, sans-serif;
    }
    .container {
      max-width: 400px;
      margin-top: 100px;
      padding: 20px;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
    }
    .btn-primary, .btn-secondary {
      width: 100%;
    }
    .error-message {
      color: red;
      text-align: center;
    }
    .btn-create {
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h3 class="text-center mb-4">Login</h3>
    <div id="error-message" class="error-message"></div> <!-- Error message display -->
    <form id="loginForm">
      <div class="form-group">
        <label for="login_mobile">Mobile Number:</label>
        <input type="text" class="form-control" id="login_mobile" name="mobile" required>
      </div>
      <div class="form-group">
        <label for="login_password">Password:</label>
        <input type="password" class="form-control" id="login_password" name="password" required>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <!-- Create User button -->
    <button onclick="window.location.href='create_user.php';" class="btn btn-secondary btn-create">Create User</button>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    // AJAX login form submission
    $('#loginForm').on('submit', function(e) {
      e.preventDefault();
      $('#error-message').text(''); // Clear previous error message
      $.ajax({
        url: '', // The current file handles the form submission
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response) {
          if (response.success) {
            window.location.href = 'dashboard.php'; // Redirect on successful login
          } else if (response.error) {
            $('#error-message').text(response.error); // Display error
          }
        },
        error: function(xhr, status, error) {
          console.error("AJAX Error: ", status, error);
          $('#error-message').text('An error occurred. Please try again.');
        }
      });
    });
  </script>
</body>
</html>
