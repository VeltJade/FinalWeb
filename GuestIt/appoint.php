<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="table.css" media="screen">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Appointments</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
  <div class="flex flex-no-wrap">
    <!-- Sidebar -->
    <div class="w-64 bg-white shadow h-screen">
      <div class="p-6">
        <h1 class="text-gray-900 text-2xl font-bold">Client Dashboard</h1>
      </div>
      <ul class="mt-6">
        <li class="py-2 px-6 hover:bg-gray-200"><a href="dashboard.php">Make Appointment</a></li>
        <li class="py-2 px-6 bg-gray-200 font-semibold"><a href="appoint.php">My Appointments</a></li>
        <li class="py-2 px-6 hover:bg-gray-200"><a href="profile.php">Profile</a></li>
        <li class="py-2 px-6 hover:bg-red-100 text-red-600 font-semibold"><a href="index.html">Logout</a></li>
      </ul>
    </div>
    <!-- End Sidebar -->

    <!-- Main Content -->
    <div class="flex-1 p-6">
      <h2 class="text-3xl font-semibold mb-6">My Appointments</h2>

      <br><table class="table1">
          <thead>
            <tr>
            <th>Appointment ID</th>
            <th>Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Service</th>
            <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
             $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "guest_it";

            
            $connection = new mysqli($servername, $username, $password, $database);
            if($connection->connect_error){
                die("Connection Failed" . $connection->connect_error);
            }

            $sql  = "SELECT  * FROM appointments";
            $result = $connection->query($sql);

            if(!$result){
                die("Invalid Query: " . $connection->error);
            }
            while($row = $result->fetch_assoc()){
                echo "<tr>
                <td>$row[apnt_id]</td>
                <td>$row[fl_name]</td>
                <td>$row[apnt_date]</td>
                <td>$row[apnt_time]</td>
                <td>$row[apnt_service]</td>
                <td>
                <a class='button' href='/GuestIt/delete.php?apnt_id=$row[apnt_id]'>Delete</a>
                <a class='button' href='/GuestIt/edit.php?apnt_id=$row[apnt_id]'>Update</a>
            </td>
                
                </tr>";
            }
            ?>       
            
          </tbody>
      </table>
  </div>
</body>
</html>