<?php
// Include the database connection file
include 'db.php';

// Fetch all users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Example</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center">Users List</h2>
        <!-- Table to display users -->
        <table class="table">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>DoB</th>
                    <th>Gender</th>
                    <th>College</th>
                    <th>Department</th>
                    <th>Course</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['dob']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['college']; ?></td>
                        <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['course']; ?></td>
                        <td>
                        <?php if ($row['status']): ?>
                            <span class="badge badge-success py-2">Active</span>
                        <?php else: ?>
                            <span class="badge badge-secondary py-2">Inactive</span>
                        <?php endif; ?>
                        </td>

                        <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="User Actions">
                            <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                        </div>
                    </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <!-- Link to add a new user -->
        <a href="create.php" class="btn btn-primary">Add New User</a>
    </div>

    <!-- Bootstrap JS (optional, for certain Bootstrap features like dropdowns) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
