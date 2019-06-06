<?php
/*** Abdullah Alharbi ***/
session_start();

if ($_SESSION['user_type'] !== 3) {
    header('location:do-sign-out.php');
}
include('tutor-header.php');

if ($_SESSION['approved'] != 1 || $_SESSION['active'] != 1) {
    header('location:awaiting-approval.php');
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MathFellows";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// query to show all customers that booked that specific teacher
$sql = 'SELECT customers.id, customers.firstName, customers.lastName, 
    customers.phone, customers.email, tutors.id, bookings.tutorId, 
    bookings.customerId, bookings.dateBooked FROM customers 
    INNER JOIN bookings ON customers.id=bookings.customerId
    INNER JOIN tutors ON tutors.id=bookings.tutorId
    WHERE tutorId=' . $_SESSION['id'];

$result = $conn->query($sql);
?>

<body>
    <div class="container">
        <?php
        if (isset($_SESSION['msg'])) {
            echo '<div class="acct_msg" style="color: dimgrey">' . $_SESSION['msg'] . '</div>';
            unset($_SESSION['msg']);
        }
        ?>
        <div class="main_text">
            Bookings:
        </div>
        
        <?php
        echo '<table>
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Phone number</th>
                    <th>Email</th>
                    <th>Date booked</th>
                </tr>';
        while($row = $result->fetch_assoc()){
            $fn = $row['firstName'];
            $ln = $row['lastName'];
            $pn = $row['phone'];
            $email = $row['email'];
            $dateBooked = $row['dateBooked'];
            echo '<tr>
                    <td>'.$fn.'</td>
                    <td>'.$ln.'</td>
                    <td>'.$pn.'</td>
                    <td>'.$email.'</td>
                    <td>'.$dateBooked.'</td>
                 </tr>';
        }
        echo '</table>';
        ?>
        <div class="urls so ad">
            <a id="urls" class="url1" href="do-clear.php">Clear bookings</a>
        </div>
        
    </div>
</body>
</html>
<?php $conn->close(); ?>
