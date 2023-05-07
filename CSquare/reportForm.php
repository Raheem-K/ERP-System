<!-- This the a form where user will enter 2 dates to fetch data, this form have been used in two other files -->

<form class="row g-3" method="post">

  <div class="col-md-4">
    <label for="fr_Date" class="form-label">From Date *</label>
    <input type="date" min="2021-04-01" max="2021-04-30" name="fr_Date" class="form-control" id="fr_Date" required value="2021-04-01">
  </div>
  <div class="col-md-4">
    <label for="to_date" class="form-label">To Date *</label>
    <input type="date" min="2021-04-01" max="2021-04-30" name="to_date" class="form-control" id="to_date" required value="2021-04-30">
  </div>
  <div class="col-4 center">
    <button type="submit" name="submit" class="btn btn-primary btn-style">Generate Report</button>
  </div>

</form>