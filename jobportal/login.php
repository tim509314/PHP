<?php include_once('header.php'); ?>
  <div class="container-sm" style="margin-top: 1rem">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Candidates</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Employers</button>
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
          <input type="hidden" name="identity" value="candidates">
          <button type="submit" class="btn btn-primary">Submit</button>
          <div id="emailHelp" class="form-text"><p>or <a href="../jobportal/register.php">sign up</a> with another email?</p></div>
        </form>
      </div>
    </div>
    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
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
  </div>


<?php include_once('footer.php'); ?>