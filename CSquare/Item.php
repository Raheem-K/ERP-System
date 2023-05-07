<?php include('conn.php'); ?>
<?php include('func.php'); ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
  <div class="container-fluid">
    <div class="row">
      <?php include('menu.php'); ?>
      <div class="col-10 view">
        <h2 class="view-title">Item</h2>
        <div class="table-view">
          <table class="table table-success table-striped">
            <!-- below functions were called from func.php -->
            <?php itemTableHeading() ?>
            <?php ItemTable() ?>
          </table>

        </div>
        <div class="container">
          <div class="row">
            <!-- Below form will collect the data from the user -->
            <form class="row g-3" method="post">
              <div class="col-md-3">
                <label for="i_code" class="form-label">Item Code *</label>
                <input type="text" name="i_code" class="form-control" id="i_code" required>
              </div>
              <div class="col-md-3">
                <label for="i_name" class="form-label">Item Name *</label>
                <input type="text" name="i_name" class="form-control" id="i_name" required>
              </div>
              <div class="col-md-3">
                <label for="i_category" class="form-label">Item Category</label>
                <select id="i_category" name="i_category" class="form-select">
                  <option selected>Select Category</option>
                  <option value="1">Printers</option>
                  <option value="2">Laptops</option>
                  <option value="3">Gadgets</option>
                  <option value="4">Ink bottels</option>
                  <option value="5">Cartridges</option>
                </select>
              </div>
              <div class="col-3">
                <label for="i_Subcategory" class="form-label">Item Subcategory</label>
                <select id="i_Subcategory" name="i_Subcategory" class="form-select">
                  <option selected>Select Subcategory</option>
                  <option value="1">HP</option>
                  <option value="2">Dell</option>
                  <option value="3">Lenovo</option>
                  <option value="4">Acer</option>
                  <option value="5">Samsung</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="i_quantity" class="form-label">Quantity *</label>
                <input type="number" name="i_quantity" class="form-control" id="i_quantity" placeholder="" required>
              </div>
              <div class="col-md-4">
                <label for="i_price" class="form-label">Unit Price *</label>
                <input type="number" step="any" name="i_price" class="form-control" id="i_price" placeholder="" required>
              </div>
              <div class="col-4 center">
                <button type="submit" name="submit" class="btn btn-primary btn-style">Save Record</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- below function will be called from func.php when user submit the above form -->
  <?php insertItem() ?>




  <script>
    const btn = document.querySelector('.btn-insert')
    btn.addEventListener('click', function() {
      window.location.href = "Item.php";
    })
  </script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>