<?php include_once 'header.php'; ?>
   <main>
      <nav class="navbar navbar-dark bg-primary">
          <div class="container">
              <div class="row">
                  <form class="form-inline">
                    <a href="index.php" class="btn btn-outline-dark">Register</a>
                  </form>
              </div>
          </div>
        </nav>
       <div class="container">
           <div class="row">
               <div class="card col-md-5 mt-5 pb-3" style="width: 100%;margin: 0 auto;">
                   <form action="inc/login.php" method="post">
                       <h1>Login</h1>
                          <div class="form-group">
                              <label for="email">Enter your email address</label>
                              <input type="email" name="email_address" class="form-control">
                          </div>
                           <div class="form-group">
                               <label for="password">Enter your password</label>
                               <input type="password" name="password" class="form-control">
                           </div>
                       <button type="submit" name="login" class="btn btn-primary">Login</button>
                   </form>
               </div>
           </div>
       </div>
   </main>
</body>
</html>