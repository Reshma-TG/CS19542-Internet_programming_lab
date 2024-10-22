<?php
session_start();
include 'db.php'; // Include database connection

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {  // Opening brace for 'if'
    header("Location: login.php"); 
    exit();
}  // Closing brace added here

// Fetch user details from the database using the session user ID
$stmt = $conn->prepare("SELECT * FROM user_details WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]); // Use 'user_id' session variable
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if user details were retrieved successfully
if (!$user) {
    // User not found, redirect to register page
    header("Location: register.php"); // Redirect to register page
    exit();
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize inputs
    $price = filter_input(INPUT_POST, 'hidden_price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    
    // Insert the price into the database
    try {
        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO bus_pass (price) VALUES (:price)");

        // Bind parameters
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);

        // Execute the statement
        $stmt->execute();
        
    } catch (PDOException $e) {
        // Handle any database errors
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9ecef; /* Light gray background */
            font-family: 'Arial', sans-serif; /* Font styling */
            color: #343a40; /* Dark text color */
        }
        .header {
            background-color: #007bff; /* Header background color */
            color: white; /* Header text color */
            padding: 20px 0; /* Padding for header */
            text-align: center; /* Center text */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow effect */
        }
        .container {
            margin-top: 30px; /* Space from top */
            padding: 30px; /* Inner padding */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Subtle shadow */
            background-color: #ffffff; /* White background for the form */
        }
        h4 {
            color: #007bff; /* Heading color */
            margin-bottom: 20px; /* Space below heading */
        }
        .card {
            border: none; /* Remove card borders */
            border-radius: 10px; /* Rounded corners for cards */
            transition: transform 0.2s; /* Smooth hover effect */
        }
        .card:hover {
            transform: translateY(-5px); /* Lift effect on hover */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); /* Deeper shadow on hover */
        }
        .btn-primary {
            background-color: #007bff; /* Primary button background */
            border-color: #007bff; /* Primary button border */
            transition: background-color 0.3s; /* Smooth transition for background */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
            border-color: #0056b3; /* Darker border on hover */
        }
        .btn-danger {
            background-color: #dc3545; /* Danger button background */
            border-color: #dc3545; /* Danger button border */
        }
        .btn-danger:hover {
            background-color: #c82333; /* Darker red on hover */
            border-color: #bd2130; /* Darker red border on hover */
        }
        .section {
            margin-top: 20px; /* Space between sections */
        }
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 15px; /* Reduced padding on small screens */
            }
            h4 {
                font-size: 1.5rem; /* Adjust heading size on small screens */
            }
        }
    </style>

</head>


<body>
    <div class="header">
        <h1>Bus Pass System</h1>
        <a href="home.php" class="btn btn-danger mt-3">Home</a>
        <a href="Register.php" class="btn btn-danger mt-3">Register User</a>
        
        <a href="view_bus_pass.php" class="btn btn-danger mt-3">View Bus pass</a>
	<a href="logout.php" class="btn btn-danger mt-3">Logout</a>



    </div>

    <div class="container">
        <h4>User Details</h4>
        <div class="card mb-3">
            <div class="card-header">
                <h5>User Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Mobile:</strong> <?php echo htmlspecialchars($user['mobile_number']); ?></p>
                        <p><strong>Address:</strong> <?php echo htmlspecialchars($user['address']); ?></p>
                        <p><strong>City:</strong> <?php echo htmlspecialchars($user['city']); ?></p>
                                           </div>
		    <div class="col-md-4">
                        <p><strong>State:</strong> <?php echo htmlspecialchars($user['state']); ?></p>
                        <p><strong>Pincode:</strong> <?php echo htmlspecialchars($user['pincode']); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

 <!-- Apply for Bus Pass Section -->
<div class="container">
    <h4>Apply for Bus Pass</h4>
    <form action="apply_bus_pass.php" method="POST">
        <div class="row">
            <!-- Column 1 -->
            <div class="col-md-4">
                <!-- Pass Type Dropdown -->
                <div class="form-group">
                    <label for="pass_type">Select Pass Type</label>
                    <select class="form-control" id="pass_type" name="pass_type" required onchange="calculatePrice()">
                        <option value="" disabled selected>Select Pass Type</option>
                        <option value="monthly">General Monthly Pass</option>
                        <option value="student">Students</option>
                        <option value="differently_abled">Differently Abled/Mentally Challenged</option>
                        <option value="senior_citizen">Senior Citizens</option>
                        <option value="government_staff">Government Staffs</option>
                    </select>
                </div>

                <!-- Duration Dropdown -->
                <div class="form-group">
                    <label for="duration">Select Duration</label>
                    <select class="form-control" id="duration" name="duration" required onchange="calculatePrice()">
                        <option value="" disabled selected>Select Duration</option>
                        <option value="1 week">1 Week</option>
                        <option value="2 weeks">2 Weeks</option>
                        <option value="1 month">1 Month</option>
                        <option value="3 months">3 Months</option>
                        <option value="6 months">6 Months</option>
                        <option value="1 year">1 Year</option>
                    </select>
                </div>
            </div>

            <!-- Column 2 -->
            <div class="col-md-4">
                <!-- Route Dropdown -->
                <div class="form-group">
                    <label for="route">Select Route</label>
                    <select class="form-control" id="route" name="route" required onchange="fetchStops(this.value)">
                        <option value="" disabled selected>Select Route</option>
                        <?php
                        // Database connection
                        $conn = new mysqli("localhost", "root", "", "bus_pass_system");
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Fetch routes from bus_route table
                        $route_query = "SELECT route_name FROM bus_route";
                        $route_result = $conn->query($route_query);

                        if ($route_result->num_rows > 0) {
                            while ($row = $route_result->fetch_assoc()) {
                                echo "<option value='" . htmlspecialchars($row['route_name']) . "'>" . htmlspecialchars($row['route_name']) . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <!-- Starting From Dropdown -->
                <div class="form-group">
                    <label for="starting_from">Starting From</label>
                    <select class="form-control" id="starting_from" name="starting_from" required>
                        <option value="" disabled selected>Select Starting Point</option>
                    </select>
                </div>

                <!-- Destination Dropdown -->
                <div class="form-group">
                    <label for="destination">Select Destination</label>
                    <select class="form-control" id="destination" name="destination" required>
                        <option value="" disabled selected>Select Destination</option>
                    </select>
                </div>
            </div>

            <!-- Column 3 -->
            <div class="col-md-4">
                <div class="form-group">
    <label for="start_date">Start Date</label>
    <input type="date" class="form-control" id="start_date" name="start_date" required onchange="updateEndDate()">
</div>

<!-- End Date Input -->
<div class="form-group">
    <label for="end_date">End Date</label>
    <input type="date" class="form-control" id="end_date" name="end_date" required onchange="updateEndDate()>
</div>

                <!-- Calculated Price -->
               <!-- Price Display -->
<div class="form-group">
    <label for="price">Price</label>
    <input type="text" class="form-control" id="price" name="price" readonly>
    <!-- Hidden input to store the calculated price that will be sent to the server -->
    <input type="hidden" id="hidden_price" name="hidden_price" value="">
</div>


            </div>
        </div>
    <div class="row">
        <!-- Calculate Fare Button -->
        <div class="col-md-6">
            <button type="button" class="btn btn-primary btn-block" onclick="calculateFare()">Calculate Fare</button>
        </div>

        <!-- Submit Button -->
        <form method="POST" action="register_action.php">
  <!-- All your form fields go here -->
  <!-- Price input fields are also part of the form -->
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    </div>
</div>
    </form>
</div>        <div class="row">
            <div class="col-md-12">
                <!-- Apply Button -->
                <!-- Calculate Fare Button -->
<div class="form-group">
    
</div>

            </div>
        </div>
    </form>
</div>

<!-- AJAX Script -->
<script>
function calculatePrice() {
        // Example calculation logic (you can replace this with your real logic)
        let distance = 10; // You can fetch this dynamically
        let ratePerKm = 5;  // Example rate
        let calculatedPrice = distance * ratePerKm;

        // Set the calculated price in the input field
        document.getElementById('price').value = calculatedPrice;
        document.getElementById('hidden_price').value = calculatedPrice;
    }

    // Call this function when needed (e.g., when the form loads or a button is clicked)
    window.onload = calculatePrice; 

function calculateFare() {
    const passType = document.getElementById("pass_type").value;
    const duration = document.getElementById("duration").value;
    const route = document.getElementById("route").value;

    // Ensure all selections are made
    if (!passType || !duration || !route) {
        alert("Please select all fields before calculating fare.");
        return;
    }

    // AJAX request to get the fare based on route and pass type
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_fare.php?route_name=" + route + "&pass_type=" + passType + "&duration=" + duration, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                // Display the calculated price
                document.getElementById("price").value = "₹" + response.amount.toFixed(2); // Format as currency
                document.getElementById("hidden_price").value = response.amount.toFixed(2); // Set hidden price for submission
            } else {
                alert(response.message); // Show error message
            }
        }
    };
    xhr.send();
}

function fetchStops(route) {
    if (route === "") {
        document.getElementById("starting_from").innerHTML = "<option disabled selected>Select Starting Point</option>";
        document.getElementById("destination").innerHTML = "<option disabled selected>Select Destination</option>";
        return;
    }

    // AJAX request to get stops
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_stops.php?route_name=" + route, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Parse response
            var stops = JSON.parse(xhr.responseText);
            
            // Update Starting From dropdown
            var startSelect = document.getElementById("starting_from");
            startSelect.innerHTML = "<option disabled selected>Select Starting Point</option>";
            stops.forEach(function(stop) {
                startSelect.innerHTML += "<option value='" + stop + "'>" + stop + "</option>";
            });

            // Update Destination dropdown
            var destSelect = document.getElementById("destination");
            destSelect.innerHTML = "<option disabled selected>Select Destination</option>";
            stops.forEach(function(stop) {
                destSelect.innerHTML += "<option value='" + stop + "'>" + stop + "</option>";
            });
        }
    };
    xhr.send();
}

function updateDates() {
    const duration = document.getElementById("duration").value;
    const startDateInput = document.getElementById("start_date");
    const endDateInput = document.getElementById("end_date");

    // Get the start date
    const startDate = new Date(startDateInput.value);

    // Determine the end date based on duration
    let endDate;
    if (duration === "1 week") {
        endDate = new Date(startDate);
        endDate.setDate(startDate.getDate() + 7);
    } else if (duration === "2 weeks") {
        endDate = new Date(startDate);
        endDate.setDate(startDate.getDate() + 14);
    } else if (duration === "1 month") {
        endDate = new Date(startDate);
        endDate.setMonth(startDate.getMonth() + 1);
    } else if (duration === "3 months") {
        endDate = new Date(startDate);
        endDate.setMonth(startDate.getMonth() + 3);
    } else if (duration === "6 months") {
        endDate = new Date(startDate);
        endDate.setMonth(startDate.getMonth() + 6);
    } else if (duration === "1 year") {
        endDate = new Date(startDate);
        endDate.setFullYear(startDate.getFullYear() + 1);
    }

    // Update the end date input
    endDateInput.value = endDate.toISOString().split("T")[0]; // Format to YYYY-MM-DD
}

// Attach the updateDates function to duration dropdown change event
document.getElementById("duration").addEventListener("change", updateDates);
</script>

<?php
$conn->close();
?>
</body>
</html> 