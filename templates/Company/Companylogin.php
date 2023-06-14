
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - Company Panel</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <center><div class="card-header">
									<center><div class="card-header"><h1>Login To <Br> Company  Panel</h1></div>
									</div>
                                    <div class="card-body">
									
					
<?php if ( isset( $results['errorMessage'] ) ) { ?>
      <center>  <div class="errorMessage"><?php echo  "<font color='red'>".$results['errorMessage']."</font><br><Br>" ?></div></center>
<?php } ?>
                          				  <form action="Company.php?action=login" method="post">
        <input type="hidden" name="login" value="true" />

                                            <div class="form-floating mb-3">
                                               
            <input type="text" name="adminusername" id="username" placeholder="Your username" required autofocus maxlength="20" class="form-control"/> <label for="username">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                               
            <input type="password" name="adminpassword" id="password" placeholder="Your admin password" required maxlength="20" class="form-control"/> <label for="password">Password</label>
											</div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="?action=signup">Sign Up</a>
                                                
        <div class="buttons">
          <input type="submit" name="login" value="Login" />
        </div>
                                            </div>
                                        </form>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; <?php echo date("Y"); ?></div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>


    
