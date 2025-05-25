
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
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
        <li class="py-2 px-6 hover:bg-gray-200"><a href="appoint.php">My Appointments</a></li>
        <li class="py-2 px-6 bg-gray-200 font-semibold"><a href="profile.php">Profile</a></li>
        <li class="py-2 px-6 hover:bg-red-100 text-red-600 font-semibold"><a href="index.html">Logout</a></li>
      </ul>
    </div>
    <!-- End Sidebar -->

    <!-- Main Content -->
    <div class="flex-1 p-6">
      <h2 class="text-3xl font-semibold mb-6">My Profile</h2>

      <div class="bg-white p-6 rounded shadow-md max-w-xl">
            <form action="update_profile.php" method="POST" class="space-y-4">
      <div>
        <label>Email</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" class="w-full p-2 border rounded" required>
      </div>
      <div>
        <label>Username</label>
        <input type="text" name="userName" value="<?php echo htmlspecialchars($userName); ?>" class="w-full p-2 border rounded" required>
      </div>
      <div>
        <label>New Password (optional)</label>
        <input type="password" name="psw" placeholder="Leave blank to keep current" class="w-full p-2 border rounded">
      </div>
      <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" type="submit">Update Profile</button>
    </form>

    <form action="delete_account.php" method="POST" onsubmit="return confirm('Are you sure you want to delete your account?');" class="mt-6">
      <button type="submit" class="text-red-600 hover:underline">Delete My Account</button>
    </form>
  </div>
</body>
</html>
