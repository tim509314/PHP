<?php 
include_once('header.php');
?>

<div class="container-sm" style="margin-top: 1rem">
<div class="badge bg-danger text-wrap" style="width: 6rem;">
  For Employers
</div>
    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top: 1rem">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Login</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Register</button>
      </li>
    </ul>
  </div>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
      <div class="container-sm" style="margin-top: 1rem">
      <form action="function.php?op=checkLogin" method="post">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
          </div>
          <input type="hidden" name="identity" value="employers">
          <button type="submit" class="btn btn-primary">Submit</button>
          <div id="emailHelp" class="form-text"><p>or <a href="../jobportal/register.php">sign up</a> with another email?</p></div>
        </form>
      </div>
    </div>
    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
      <div class="container-sm" style="margin-top: 1rem">
        <form action="function.php?op=register" method="post">
          <div class="mb-3">
            <label for="InputFullName" class="form-label">Full name</label>
            <input type="text" class="form-control" id="InputFullName" name="full_name">
          </div>
          <div class="mb-3">
            <label for="InputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="InputEmail" name="email">
          </div>
          <div class="mb-3">
            <label for="InputPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="InputPassword" name="password">
          </div>
          <div class="mb-3">
            <label for="ConfirmPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="ConfirmPassword" name="confirm_password">
          </div>
          <div class="mb-3">
            <label for="InputCompanyName" class="form-label">Company Name</label>
            <input type="text" class="form-control" id="InputCompanyName" name="company">
          </div>
          <div class="mb-3">
            <label for="InputContactNo" class="form-label">Contact No.</label>
            <input type="int" class="form-control" id="InputContactNo" name="contact_no">
          </div>
          <input type="hidden" name="identity" value="employers">
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>

<?php include_once('footer.php'); ?>