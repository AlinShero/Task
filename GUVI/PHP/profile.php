<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>profile view</h1>
        <div class="container">
            <?php include 'config.php'
            include 'login.php'?>
            <div class="right">
                <?php
                $query = "SELECT id,name,email,dob,mobile,gender from test WHERE email='$mail' AND password='$pass'";
                $result = mysqli_query($link, $query);
                if (mysqli_num_rows($result) > 0) {
                    ?>
                    <h3>Employee List</h3>
                    <table class="emplist">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date Of Birth</th>
                                <th>Contact</th>
                                <th>Gender</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['dob'] ?></td>
                                    <td><?= $row['mobile'] ?></td>
                                    <td><?= $row['gender'] ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            <tr>
                                <td>
                                    <form action="index.html">
                                    <button type="submit" class="submit-btn">Log Out</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
 
                    <?php
                } else {
                    echo 'Record Not found';
                }
                ?>
            </div>
        </div>
    </body>
</body>
</html>