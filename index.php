<?php include_once 'header.php'; ?>
   <main>
      <nav class="navbar navbar-dark bg-primary">
          <div class="container">
              <div class="row">
                  <form class="form-inline">
                    <a href="login_page.php" class="btn btn-success">Login</a>
                  </form>
              </div>
          </div>
        </nav>
       <div class="container">
           <div class="row">
               <div class="card col-md-5 mt-5 pb-3" style="width: 100%;margin: 0 auto;">
                   <form action="inc/signup.php" method="post">
                       <h1>Send a Message</h1>
                          <div class="form-row">
                              <div class="col">
                                  <label for="name">Enter your first name</label>
                                  <input type="text" name="first_name" class="form-control">
                              </div>
                              <div class="col">
                                  <label for="name">Enter your last name</label>
                                  <input type="text" name="last_name" class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="email">Enter your email address</label>
                              <input type="email" name="email_address" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="login_id">Username</label>
                              <input type="text" name="login_id" class="form-control">
                          </div>
                           <div class="form-group">
                               <label for="password">Enter your password</label>
                               <input type="password" name="password" class="form-control">
                           </div>
                       <button type="submit" name="submit" class="btn btn-primary">Register Now</button>
                   </form>
               </div>
           </div>
       </div>
   </main>
</body>
</html>