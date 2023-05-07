<?php include('conn.php'); ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ERP System</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dosis&family=Inter:wght@300;400;500;600&family=Mochiy+Pop+One&family=Open+Sans&family=Roboto:wght@300;400;500&family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
  <!-- CSS file -->
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div>
    <div class="container-fluid">
      <div class="row">
        <?php include('menu.php'); ?>
        <div class="col-10 view">
          <h2 class="view-title">Invoice Report</h2>
          <div class="table-view">
            <table class="table table-success table-striped">
              <tr>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Customer</th>
                <th>Customer District</th>
                <th>Item Count</th>
                <th>Invoice Amount</th>
              </tr>
              <?php


              if (isset($_POST['submit'])) {

                $f_date = $_POST['fr_Date'];
                $t_date = $_POST['to_date'];


                $query = "SELECT invoice.invoice_no, invoice.date, customer.first_name,customer.district, district.district AS district_name, item_count,invoice.amount
                FROM invoice
                JOIN customer ON invoice.customer = customer.id
                JOIN item
                JOIN district ON customer.district=district.id
                JOIN invoice_master ON invoice.invoice_no = invoice_master.invoice_no
                WHERE invoice.date BETWEEN '$f_date' AND '$t_date'
                GROUP BY invoice.invoice_no";


                $result = mysqli_query($con, $query);

                if (!$result)
                  die("Queary Faild" . mysqli_errno($con));

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td>" . $row['invoice_no'] . "</td>";
                      echo "<td>" . $row['date'] . "</td>";
                      echo "<td>" . $row['first_name'] . "</td>";
                      echo "<td>" . $row['district_name'] . "</td>";
                      echo "<td>" . $row['item_count'] . "</td>";
                      echo "<td>" . $row['amount'] . "</td>";
                      echo "</tr>";
                    }
                }else {
                  echo "No results found";
                }
              }
              ?>
            </table>
          </div>
          <div class="container">
            <div class="row">
              <?php include('reportForm.php'); ?>
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

    <!-- Icon pack links -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>