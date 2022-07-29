<?php  include('student_view/header.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	
  </head>
  <body>
    <div class="container">
      <h2>Student-Registration!</h2>
	<form class="row g-3 needs-validation"  novalidate method="POST">
	
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label"> Name</label>
    <input type="text" class="form-control" name="name" required>
	<?= form_error('name'); ?>
  </div>
  
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">Email</label>
    <div class="input-group has-validation">
      <span class="input-group-text" >@</span>
      <input type="email" class="form-control" name="email" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
	  <?= form_error('email'); ?>
      
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">City</label>
    <input type="text" class="form-control" name="city"  required>
	<?= form_error('city'); ?>
  </div>
  
  <div class="col-md-3">
    <label for="validationCustom04" class="form-label">Country</label>
    <select class="form-select" name="country" required>
      <option selected disabled value="">Choose...</option>
      <option>India</option>
	  <option>Japan</option>
	  <option>South-Korea</option>
	  <option>Russia</option>
    </select>
	<?= form_error('country'); ?>
</div>
  <div class="col-md-3">
    <label for="validationCustom04" class="form-label">State</label>
    <select class="form-select" name="state" required>
      <option selected disabled value="">Choose...</option>
      <option>Punjab</option>
      <option>Haryana</option>
      <option>Delhi</option>
      <option>UP</option>
	  
    </select>
	<?= form_error('state'); ?>
</div>
  
  <div class="col-md-3">
    <label for="validationCustom05" class="form-label">Pincode</label>
    <input type="text" class="form-control  lenthValidate" name="pincode"  required>
	<?= form_error('pincode'); ?>
  </div>
  <div class="col-md-3">
    <label for="validationCustom05" class="form-label">Password</label>
    <input type="password" class="form-control" name="password"  required>
	<?= form_error('password'); ?>
  </div>
  
  <div class="col-md-3">
    <label for="validationCustom05" class="form-label">ConfirmPassword</label>
    <input type="password" class="form-control " name="ConfirmPassword"  required>
	<?= form_error('ConfirmPassword'); ?>
    
  </div>
  <div class="col-md-3">
    <label for="validationCustom05" class="form-label">Phone</label>
    <input type="text" class="form-control" name="phone" id="validationCustom05" required>
	<?= form_error('phone'); ?>
  </div>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label"> D.O.B</label>
    <input type="date" class="form-control" name="dob" required>
	<?= form_error('dob'); ?>
</div>
<div class="col-md-3">
	<label for="validationCustom04" class="form-label">Department</label>
	<select class="form-select"  name="department" required>
	  <option selected value="">Choose...</option>
    <?php foreach($getAllDepartment as $departmentVal) {    ?>
          <option value="<?=  $departmentVal->id ; ?>"><?php echo $departmentVal->department_name;  ?></option>
    <?php }      ?>
  </select>
	<?= form_error('branch'); ?>
	</select>
	<?= form_error('department'); ?>
</div>

  <div class="col-md-3">
    <label for="validationCustom04" class="form-label">Branch</label>
    <select class="form-select"  name="branch" required>
    <option value="">Choose...</option>
    <?php foreach($getAllBranch as $branchVal) {    ?>
          <option value="<?=  $branchVal->id ; ?>"><?php echo $branchVal->branch_name;  ?></option>
    <?php }      ?>
    </select>
	<?= form_error('branch'); ?>
</div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" name="submit" type="submit">Submit form</button>
    <a href='<?php echo base_url ('StudentRegister/login_view'); ?>'>Login</a>
    
  </div>
  
</form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
  
</html>
