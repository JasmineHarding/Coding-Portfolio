<?php
    //Connect  to Database
    $hostname = "localhost";
    $username= "ecpi_user";
    $password = "Password1";
    $dbname = "cis224_midterm";
    $conn = mysqli_connect($hostname, $username, $password, $dbname);

    //Establish variables to support add/edit/delete
    $addressNo = -1;
    $first = "";
    $last = "";
    $street = "";
    $city = "";
    $state = "";
    $zip = "";


    //Variables to determine the type of operation
    $add = false;
    $edit = false;
    $update = false;
    $delete = false;

    if (isset($_POST['address_no'])){
        $addressNo = $_POST['address_no'];
        $add  = isset($_POST['add']);
        $update = isset($_POST['update']);
        $edit = isset($_POST['edit']);
        $delete = isset($_POST['delete']);
    }

    if($add) {
        //Need to add a new user
        $first = $_POST['first'];
        $last = $_POST['last'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];

        $addQuery = "INSERT INTO
            addresses (First, Last, Street, City, State, Zip)
            VALUES ('$first', '$last', '$street', '$city', '$state', '$zip')";
        mysqli_query($conn, $addQuery);

        //Clear the fields
        $addressNo = -1;
        $first = "";
        $last = "";
        $street = "";
        $city = "";
        $state = "";
        $zip = "";
    }
    else if ($edit) {
        //Get the user information
        $selQuery = "SELECT * FROM addresses WHERE AddressNo = $addressNo";
        $result = mysqli_query($conn, $selQuery);
        $addresses = mysqli_fetch_assoc($result);

        //Fill in the values to allow for edit
        $first = $addresses['First'];
        $last = $addresses['Last'];
        $street = $addresses['Street'];
        $city = $addresses['City'];
        $state = $addresses['State'];
        $zip = $addresses['Zip'];
    }
    else if ($update) {
        //Update values submitted
        $first =$_POST['first'];
        $last = $_POST['last'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];

        $updQuery = "UPDATE addresses SET
            First = '$first', Last = '$last',
            Street = '$street', City = '$city',
            State = '$state', Zip = '$zip'
            WHERE AddressNo = $addressNo";
        mysqli_query($conn, $updQuery);

        //Clear the fields
        $addressNo = -1;
        $first = "";
        $last = "";
        $street = "";
        $city = "";
        $state = "";
        $zip = "";
    }
    else if ($delete) {
        //Need to delete the selected user
        $delQuery = "DELETE FROM addresses WHERE AddressNo = $addressNo";
        mysqli_query($conn, $delQuery);
        $addressNo =-1;
    }

    //Query for all users
    $query = "SELECT * FROM addresses";
    $result = mysqli_query($conn, $query);
?>
<style>
    table {
        border-spacing: 5px;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 15px;
        text-align: center;
    }
    th {
        background-color:lightskyblue;
    }
    tr:nth-child(even) {
        background-color:whitesmoke;
    }
    tr:nth-child(odd) {
        background-color:lightgray;
    }
</style>
<html>
    <head>
        <title>Jasmine Harding Midterm</title>
    </head>

    <body>
        <h2>Address Info:</h2>
        <table>
            <tr style="font-size:large;">
                <th>Address #</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Street Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th></th>
                <th></th>
            </tr>

            <?php while($row = mysqli_fetch_array($result)):;?>
                <tr>
                <td><?php echo $row["AddressNo"];?></td>
                    <td><?php echo $row["First"];?></td>
                    <td><?php echo $row["Last"];?></td>
                    <td><?php echo $row["Street"];?></td>
                    <td><?php echo $row["City"];?></td>
                    <td><?php echo $row["State"];?></td>
                    <td><?php echo $row["Zip"];?></td>
                    <td>
                        <form method='POST'>
                            <input type="submit" value="Edit" name="edit">
                            <input type ="hidden"
                                value="<?php echo $row["AddressNo"]; ?>"
                                name="address_no">
                        </form>
                    </td>
                    <td>
                        <form method='POST'>
                            <input type="submit" value="Delete" name="delete">
                            <input type="hidden"
                                value="<?php echo $row["AddressNo"]; ?>"
                                name="address_no">
                        </form>
                    </td>
                </tr>
            <?php endwhile;?>
        </table>
        <form method='POST'>
            <input type="hidden" value="<?php echo $addressNo; ?>" name="address_no">
            <h3>Enter your First name: <input type="text" name="first"
                value="<?php echo $first; ?>"></h3>
            <h3>Enter your Last: <input type="text" name="last"
                value="<?php echo $last; ?>"></h3>
            <h3>Enter your Street Address: <input type="text" name="street"
                value="<?php echo $street; ?>"></h3>
            <h3>Enter your City: <input type="text" name="city"
                value="<?php echo $city; ?>"></h3>
            <h3>Enter your State: <input type="text" name="state"
                value="<?php echo $state; ?>"></h3>
            <h3>Enter your Zip: <input type="text" name="zip"
                value="<?php echo $zip; ?>"></h3>
            <?php if (!$edit): ?>
                <input type="submit" value="Add Address" name="add">
            <?php else: ?>
                <input type="submit" value="Update Address" name="update">
            <?php endif; ?>
        </form>
    </body>
</html>
                