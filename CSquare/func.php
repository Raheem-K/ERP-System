<!-- this file contains few php functions  -->

<?php include('conn.php');


//Below function will fetch data from the Customer table 
function cusTable()
{
    global  $con;
    $sql = "SELECT * FROM `customer`" ;
    // -- JOIN district ON customer.district = district.id";
    $results = mysqli_query($con, $sql);
    $rowNumber = mysqli_num_rows($results);

    if ($rowNumber > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['middle_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['contact_no'] . "</td>";
            echo "<td>" . $row['district'] . "</td>";
            echo "<td> <a href='updateCus.php?id=$row[id]' class='btn btn-update'><ion-icon name='create-outline'></ion-icon></a></td>";
            echo "<td> <a href='deleteCus.php?id=$row[id]' onclick='deletemsg()' class='btn btn-delete'><ion-icon name='trash-outline'></ion-icon></a></td>";
            echo "</tr>";
        }
    }
}

// Below funtion will INSERT data to the customer table
function insertCustomer()
{

    if (isset($_POST['submit'])) {

        $title = $_POST['title'];
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $lastName = $_POST['lastName'];
        $contactNumber = $_POST['telNumber'];
        $district = $_POST['district'];
       
        $query = "INSERT INTO `customer`(`title`, `first_name`, `middle_name`, `last_name`, `contact_no`, `district`) VALUES ('$title','$firstName','$middleName','$lastName',$contactNumber,$district)";
        global  $con;
        $result = mysqli_query($con, $query);

        if (!$result)
            die("Queary Faild" . mysqli_errno($con));
        echo "<script>";
        echo "window.location = 'Customer.php'";
        echo "</script>";
    }
}
// Below funtion will fetch a record based on id and will UPDATE the customer records
function updateCus()
{$id = $_GET['id'];
    if (isset($_POST['submit'])) {
        
        global  $con;
        $title = $_POST['title'];
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $lastName = $_POST['lastName'];
        $contactNumber = $_POST['telNumber'];
        $district = $_POST['district'];


        $query = "UPDATE `customer` SET `title`='$title',`first_name`='$firstName',`middle_name`='$middleName',`last_name`='$lastName',`contact_no`='$contactNumber',`district`=' $district' WHERE id=$id";

        $result = mysqli_query($con, $query);

        if ($result) {
            header("Location: Customer.php");
        } else {
            die("Queary Faild" . mysqli_errno($con));
        }
        echo "<script>";
        echo "window.location = 'Customer.php'";
        echo "</script>";
    }
}

// Below funtion will Display the Table Heading of the Customer table
function cusTableHeading()
{
    echo "<tr>";
    echo "<th>Customer ID</th>";
    echo "<th>Title</th>";
    echo "<th>First Name</th>";
    echo "<th>Middle Name</th>";
    echo "<th>Last Name</th>";
    echo "<th>Contact Number</th>";
    echo "<th>District</th>";
    echo "<th>Update</th>";
    echo "<th>Delete</th> ";
    echo "</tr>";
}


//Below function will fetch data from the Item table 
function ItemTable()
{
    global  $con;
    $sql = "SELECT * FROM `item`";

    $results = mysqli_query($con, $sql);
    $rowNumber = mysqli_num_rows($results);

    if ($rowNumber > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['item_code'] . "</td>";
            echo "<td>" . $row['item_category'] . "</td>";
            echo "<td>" . $row['item_subcategory'] . "</td>";
            echo "<td>" . $row['item_name'] . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
            echo "<td>" . $row['unit_price'] . "</td>";
            echo "<td> <a href='updateItem.php?id=$row[id]'class='btn btn-update'><ion-icon name='create-outline'></ion-icon></a></td>";
            echo "<td> <a href='deleteItem.php?id=$row[id]'class='btn btn-delete'><ion-icon name='trash-outline'></ion-icon></a></td>";
            echo "</tr>";
        }
    }
}

// Below funtion will INSERT data to the Item table
function insertItem()
{
    if (isset($_POST['submit'])) {
        global  $con;
        $i_code = $_POST['i_code'];
        $i_name = $_POST['i_name'];
        $i_cate = $_POST['i_category'];
        $i_subcat = $_POST['i_Subcategory'];
        $i_quan = $_POST['i_quantity'];
        $i_price = $_POST['i_price'];


        $query = "INSERT INTO `item`(`item_code`, `item_category`, `item_subcategory`, `item_name`, `quantity`, `unit_price`) VALUES ('$i_code','$i_cate','$i_subcat','$i_name','$i_quan','$i_price')";

        $result = mysqli_query($con, $query);

        if ($result) {
            // header("Location: item.php");
        } else {
            die("Queary Faild" . mysqli_errno($con));
        }

        echo "<script>";
        echo "window.location = 'item.php'";
        echo "</script>";
    }
}
// Below funtion will fetch a record based on id and will UPDATE the item records
function updatetItem()
{
    $id = $_GET['id'];
    if (isset($_POST['submit'])) {
        global  $con;
        $i_uCode = $_POST['i_code'];
        $i_uName = $_POST['i_name'];
        $i_uCate = $_POST['i_category'];
        $i_uSubcat = $_POST['i_Subcategory'];
        $i_uQuan = $_POST['i_quantity'];
        $i_uPrice = $_POST['i_price'];

        $query = "UPDATE `item` SET `item_code`='$i_uCode',`item_category`='$i_uCate',`item_subcategory`='$i_uSubcat',`item_name`='$i_uName',`quantity`='$i_uQuan',`unit_price`='$i_uPrice' WHERE id=$id";
        $result = mysqli_query($con, $query);

        if ($result) {
            header("Location: item.php");
        } else {
            die("Queary Faild" . mysqli_errno($con));
        }
        echo "<script>";
        echo "window.location = 'item.php'";
        echo "</script>";
    }
}
// Below funtion will Display the Table Heading of the item table
function itemTableHeading()
{
    echo "<tr>";
    echo "<th>Item ID</th>";
    echo "<th>Item Code</th>";
    echo "<th>Item Category</th>";
    echo "<th>Item Subcategory</th>";
    echo "<th>Item Name</th>";
    echo "<th>Quantity</th>";
    echo "<th>Unit Price</th> ";
    echo "<th>Update</th>";
    echo "<th>Delete</th>";
    echo "</tr>";
}
?>