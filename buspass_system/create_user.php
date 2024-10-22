<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create User - Bus Pass System</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa; /* Light background */
      font-family: Arial, sans-serif; /* Font styling */
    }
    .container {
      max-width: 400px; /* Centering and max width */
      margin-top: 50px; /* Space from top */
      padding: 20px; /* Inner padding */
      border-radius: 8px; /* Rounded corners */
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); /* Subtle shadow */
      background-color: #ffffff; /* White background for the form */
    }
    h2 {
      text-align: center; /* Center headings */
      color: #007bff; /* Bootstrap primary color */
    }
    .btn-primary {
      width: 100%; /* Full-width buttons */
      border-radius: 5px; /* Slightly rounded corners */
    }
    .alert {
      display: none; /* Hide alerts initially */
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 class="my-4">Create User</h2>
    <div class="alert alert-success" id="successAlert">User created successfully!</div>
    <div class="alert alert-danger" id="errorAlert">Error during user creation.</div>
    <form id="createUserForm">
      <div class="form-group">
        <label for="mobile_number">Mobile Number:</label>
        <input type="text" class="form-control" id="mobile_number" name="mobile_number" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
      </div>
      <button type="submit" class="btn btn-primary">Create User</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    // Handle form submission
    $('#createUserForm').on('submit', function(e) {
      e.preventDefault();
      
      // Check if password and confirm password match
      const password = $('#password').val();
      const confirmPassword = $('#confirm_password').val();
      if (password !== confirmPassword) {
        alert('Passwords do not match.');
        return;
      }

      // AJAX request to create user
      $.ajax({
        url: 'create_user_action.php', // PHP file to handle creation
        type: 'POST',
        data: $(this).serialize(),
        success: function(response) {
          if (response === 'success') {
            $('#successAlert').show();
            $('#errorAlert').hide();
            $('#createUserForm')[0].reset(); // Reset the form
          } else {
            $('#errorAlert').show();
            $('#successAlert').hide();
          }
        },
        error: function() {
          $('#errorAlert').show();
          $('#successAlert').hide();
        }
      });
    });
  </script>
</body>
</html>
