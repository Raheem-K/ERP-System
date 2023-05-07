<?php include('conn.php'); ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ERP System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dosis&family=Inter:wght@300;400;500;600&family=Mochiy+Pop+One&family=Open+Sans&family=Roboto:wght@300;400;500&family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div>
    <div class="container-fluid">
      <div class="row">
        <?php include('menu.php'); ?>
        <div class="col-10 view">
          <h2 class="view-title"> Item Report</h2>
          <div class="table-view">
            <table class="table table-success table-striped">
              <tr>
                <th>Item Name</th>
                <th>Item Category</th>
                <th>Item Sub Category</th>
                <th>Item Quantity</th>
              </tr>
              
              <?php
              //  SQL query that fetch records from the item table , "item_category", and "item_subcategory" tables and calculates the total quantity of each item.
              $query = "SELECT item_name, item_category.category AS item_cate,item_subcategory.sub_category AS item_subcate, SUM(quantity) as total_quantity 
              FROM item 
              JOIN item_category ON item.item_category=item_category.id
              JOIN item_subcategory ON item.item_subcategory=item_subcategory.id
              GROUP BY item_name, item_category, item_category.category, item_subcategory, item_subcategory.sub_category
              ORDER BY item_category.category;";

              $result = mysqli_query($con, $query);

              if (!$result)
                die("Queary Faild" . mysqli_errno($con));
              if (mysqli_num_rows($result) > 0) {

                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['item_name'] . "</td>";
                    echo "<td>" . $row['item_cate'] . "</td>";
                    echo "<td>" . $row['item_subcate'] . "</td>";
                    echo "<td>" . $row['total_quantity'] . "</td>";
                    echo "</tr>";
                  }
              }else {
                echo "NO RECORDS ";
              }

              ?>
            </table>
          </div>
          <div class="container">
            <div class="row">
            </div>
          </div>
        </div>
      </div>

    </div>
    <script>
      const del = document.querySelector('.del-msg')
      const alt = document.querySelector('.message-box')

      function deletemsg() {
        alt.classList.toggle('hidden')

      }
    </script>




    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>