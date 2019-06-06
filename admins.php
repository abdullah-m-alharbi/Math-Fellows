<?php
/*** Abdullah M ***/
session_start();

if ($_SESSION['user_type'] !== 1) {
    header('location:do-sign-out.php');
}
include('root-admin-header.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MathFellows";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM admins WHERE rootAdmin=0";
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
        <div class="urls so ad">
            <a id="urls" class="url1" href="create-new-admins.php">Create new admins</a>
        </div>
        <div class="instructions_msg">
            Admins:
        </div>
        <?php 
        echo '<table>
                <tr>
                    <th>Username</th>
                    <th>Action</th>
                </tr>';
                
        while ($row = $result->fetch_assoc()){
            $un = $row['username'];
            $id = $row['id'];
            echo '
                <tr>
                    <td>'.$un; 
            echo                '</td>
                <td><form action="do-delete-admin.php" method="post"><input type="submit" name="'.$id;
            echo '" value="Delete account"></form></td>
                </tr>';   
        }
        echo '</table>';
        ?>
    </div>
</body>
</html>
<?php $conn->close(); ?>