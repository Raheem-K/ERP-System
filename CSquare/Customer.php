<?php include('conn.php'); ?>
<?php include('func.php'); ?>
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
  <div class="">
    <div class="container-fluid">
      <div class="row">
        <?php include('menu.php'); ?>
        <div class="col-10 view">
          <h2 class="view-title">Customer</h2>
          <div class="table-view">
            <table class="table table-success table-striped ">

              <!-- below functions were called from func.php -->
              <?php cusTableHeading() ?>
              <?php cusTable() ?>

            </table>
          </div>
          <div class="container">
            <div class="row">
              <!-- Below form will collect the data from the user -->
              <form class="row g-3 " method="post">
                <div class="col-md-3">
                  <label for="title" class="form-label">Title</label>
                  <select id="title" name="title" class="form-select">
                    <option selected>Mr</option>
                    <option value="Mr">Mr</option>
                    <option value="Mrs">Mrs</option>
                    <option value="Miss">Miss</option>
                    <option value="Dr">Dr</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label for="firstName" class="form-label">First name *</label>
                  <input type="text" name="firstName" class="form-control " id="firstName" required>
                </div>
                <div class="col-md-3">
                  <label for="middleName" class="form-label">Middle name *</label>
                  <input type="text" name="middleName" class="form-control" id="middleName" required>
                </div>
                <div class="col-md-3">
                  <label for="lastName" class="form-label">Last name *</label>
                  <input type="text" name="lastName" class="form-control" id="lastName" required>
                </div>
                <div class="col-4">
                  <label for="contactNumber" class="form-label">Contact Number *</label>
                  <input type="number" name="telNumber" class="form-control" id="contactNumber" placeholder="01234567891" required>
                </div>
                <div class="col-md-4">
                  <label for="district" class="form-label">District</label>
                  <select id="district" name="district" class="form-select">
                    <option selected>Choose...</option>
                    <option value="1">Ampara</option>
                    <option value="2">Anuradhapura</option>
                    <option value="3">Badulla</option>
                    <option value="4">Batticaloa</option>
                    <option value="5">Colombo</option>
                    <option value="6">Galle</option>
                    <option value="7">Gampaha</option>
                    <option value="8">Hampanthota</option>
                    <option value="9">Jaffna</option>
                    <option value="10">Kaluthara</option>
                    <option value="11">Kandy</option>
                    <option value="12">Kegalle</option>
                    <option value="13">Kilinochi</option>
                    <option value="14">Kurunagala</option>
                    <option value="15">Mannar</option>
                    <option value="16">Matale</option>
                    <option value="17">Matara</option>
                    <option value="18">Moneragala</option>
                    <option value="19">Mullaitivu</option>
                    <option value="20">Nuwa Eliya</option>
                    <option value="21">Polonnaruwa</option>
                    <option value="22">Puttalam</option>
                    <option value="23">Rathnapura</option>
                    <option value="24">Vavuniya</option>
                  </select>
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

  </div>
  <!-- below function will be called from func.php when user submit the above form -->
  <?php insertCustomer(); ?>


  <script>
    const del = document.querySelector('.del-msg')
    const alt = document.querySelector('.message-box')
    const data = document.querySelectorAll('.t_data').textContent

    console.log(data)
    const btn = document.querySelector('.btn-insert')
    btn.addEventListener('click', function() {
      window.location.href = "Customer.php";
    })
  </script>


  <!-- Icon pack links -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <!-- Bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>



</body>
</html>