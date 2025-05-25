<?php
$servername = "localhost";
            $username = "root";
            $password = "";
            $database = "guest_it";

            
            $connection = new mysqli($servername, $username, $password, $database);


$fl_name = "";
$apnt_date = "";
$apnt_time = "";
$apnt_service = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $fl_name = $_POST["fl_name"];
  $apnt_date = $_POST["apnt_date"];
  $apnt_time = $_POST["apnt_time"];
  $apnt_service = $_POST["apnt_service"];

  do {
    if (empty($fl_name) || empty($apnt_date) || empty($apnt_time) || empty($apnt_service)) {
      $errorMessage = "All fields are required to fill in";
      break;
    }

    // add appointment to database
    $sql = "INSERT INTO appointments (fl_name, apnt_date, apnt_time, apnt_service)" . 
    "VALUES ('$fl_name', '$apnt_date', '$apnt_time', '$apnt_service')";

    $result = $connection->query($sql);
    if(!$result){
      $errorMessage = "Invalid Query" . $connection->error;
      break;
    }

    $fl_name = "";
    $apnt_date = "";
    $apnt_time = "";
    $apnt_service = "";
    $successMessage = "Appointment added";

    header("location: /GuestIt/appoint.php");
    exit;

  } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="table.css" media="screen">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Client Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
  <div class="flex flex-no-wrap">
    <!-- Sidebar -->
    <div class="w-64 bg-white shadow h-screen">
      <div class="p-6">
        <h1 class="text-gray-900 text-2xl font-bold">Client Dashboard</h1>
        <?php
        if(!empty($errorMessage)){
          echo"
          <div class='button' role='alert'>
        <strong>$errorMessage</strong>
      </div>
          ";
        }
        ?>

      </div>
      
      <ul class="mt-6">
        <li class="py-2 px-6 hover:bg-gray-200"><a href="dashboard.php">Make Appointment</a></li>
        <li class="py-2 px-6 hover:bg-gray-200"><a href="appoint.php">My Appointments</a></li>
        <li class="py-2 px-6 hover:bg-gray-200"><a href="profile.php">Profile</a></li>
        <li class="py-2 px-6 hover:bg-red-100 text-red-600 font-semibold"><a href="index.html">Logout</a></li>
      </ul>
    </div>
    <!-- End Sidebar -->

    <!-- Main Content -->
    <div class="flex-1 p-6">
      <form method="post" class="space-y-4">
  <div>
    <label class="block text-gray-700">Full Name</label>
    <input type="text" name="fl_name" class="w-full mt-1 p-2 border border-gray-300 rounded" value="<?php echo $fl_name;?>">
  </div>
  <div>
    <label class="block text-gray-700">Date</label>
    <input type="date" name="apnt_date" value="<?php echo $apnt_date;?>" class="w-full mt-1 p-2 border border-gray-300 rounded" placeholder = "DD-MM-YYYY">
  </div>
  <div>
    <label class="block text-gray-700">Time</label>
    <input type="time" name="apnt_time" value="<?php echo $apnt_time;?>" class="w-full mt-1 p-2 border border-gray-300 rounded" placeholder="00:00">
  </div>
  <div>
    <label class="block text-gray-700">Service</label>
    <select name="apnt_service" value="<?php echo $apnt_service;?>" class="w-full mt-1 p-2 border border-gray-300 rounded">
      <option value="Consultation">Consultation</option>
      <option value="Follow-up">Follow-up</option>
      <option value="Therapy Session">Therapy Session</option>
    </select>
  </div>
  <?php
  if(!empty($successMessage)){
     echo"
          <div class='button' role='alert'>
        <strong>$successMessage</strong>
      </div>
          ";
  }
  ?>
  <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Book Appointment</button>
</form>

    <!-- End Main Content -->
  </div>
</body>

</html>
