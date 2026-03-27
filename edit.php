<?php
include 'config.php';
?>

<?php

    if (isset($_GET['id'])) {

        $singleId = $_GET['id'];

        $query = "SELECT * FROM students WHERE id=$singleId";

        $singleData = mysqli_query($connections, $query);
        $realData = mysqli_fetch_assoc($singleData);

        $id = $realData['id'];
        $name = $realData['name'];
        $roll = $realData['roll'];
        $class = $realData['class'];
        $address = $realData['address'];
        $bloodGroup = $realData['blood'];
        $phone = $realData['phone'];
        $email = $realData['email'];
    }

    else{
        $id = '';
        $name = '';
        $roll = '';
        $class = '';
        $address = '';
        $bloodGroup = '';
        $phone = '';
        $email = '';
    }


if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $class = $_POST['class'];
    $address = $_POST['address'];
    $bloodGroup = $_POST['blood'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $query = "UPDATE students SET name='$name', roll='$roll', class='$class', address='$address', blood='$bloodGroup', phone='$phone', email='$email' WHERE id=$singleId";
    $updateData = mysqli_query($connections, $query); //true-false

    if ($updateData == true) {
        header('location:index.php');
    } else {
        echo "Failed to insert data";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Add New Student</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <form action="" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Student Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>" required>
            </div>
            <div class="mb-3">
                <label for="roll" class="form-label">Student Roll:</label>
                <input type="number" class="form-control" id="roll" name="roll" value="<?php echo $roll ?>" required>
            </div>
            <div class="mb-3">
                <label for="class" class="form-label">Student Class:</label>
                <input type="text" class="form-control" id="class" name="class" value="<?php echo $class ?>" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Student Address:</label>
                <textarea class="form-control" id="address" name="address" required><?php echo $address ?></textarea>
            </div>
            <div class="mb-3">
                <label for="blood" class="form-label">Student Blood Group:</label>
                <select name="blood" id="blood" class="form-control" value="<?php echo $bloodGroup ?>" required>
                    <option value="A+" <?php if($bloodGroup=='A+'){ echo 'selected'; } ?>>A+</option>
                    <option value="A-" <?php if($bloodGroup=='A-'){ echo 'selected'; } ?>>A-</option>
                    <option value="B+" <?php if($bloodGroup=='B+'){ echo 'selected'; } ?>>B+</option>
                    <option value="B-" <?php if($bloodGroup=='B-'){ echo 'selected'; } ?>>B-</option>
                    <option value="AB+" <?php if($bloodGroup=='AB+'){ echo 'selected'; } ?>>AB+</option>
                    <option value="AB-" <?php if($bloodGroup=='AB-'){ echo 'selected'; } ?>>AB-</option>
                    <option value="O+" <?php if($bloodGroup=='O+'){ echo 'selected'; } ?>>O+</option>
                    <option value="O-" <?php if($bloodGroup=='O-'){ echo 'selected'; } ?>>O-</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Student Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Student Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>" required>
            </div>
            <button type="submit" name="submit" id="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>