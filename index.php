<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-cosmo.min.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

       	<!-- Content -->
        <section class="wrapper">
        <div class="container">
		
			<div class="row">
		  	  
			  <div class="offset-md-3 col-md-6">
			  
			  <div class="card">
				  <div class="card-body">
				  <div class="media">
					
					  <div class="media-body">
						     <form id="loginForm" class="form-signin">
								  <div class="text-center mb-4">
									<img class="mb-4" src="img/logo.png" alt="" >
									<h1 class="h3 mb-3 font-weight-normal">User Login</h1>
									</div>
                                    
								<div class="form-label-group">
								
                                    
									<input type="email" id="myemail" name="myemail" class="form-control" placeholder="Email address" required autofocus>
									
								  </div>
								<div class="form-label-group">
								
									<input type="text" id="mobile"  name="mobile"  class="form-control" placeholder="mobile Number" required autofocus>
									
								</div>

								  <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
								  <p class="mt-5 mb-3 text-muted text-right">Create New Account <a href="register.php">Here</a></p>
								  </form>
						 
					  </div>
					</div>
				  
				
				  </div>
				</div>

			</div>
		</div>
	</div>
		
		</section>
		
        <script src="js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
		
        <script src="js/bootstrap.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            // this is the id of the form
            $("#loginForm").submit(function(e) {

            var url = "api/login.php"; // the script where you handle the form input.

                $.ajax({
                    type: "POST",
                    async: false,
                    url: url,
                    data: {
                
                email: $("#myemail").val(),
                mobile: $("#mobile").val()
                },
                success: function(res)
                {
                   
                    if ($.trim(res) === 'Login') {
                        window.location = 'twostep.php';
                    }
                    else {
                        alert('Invalid Credentials');
                    }
                },
               
                error: function(xhr, status, error)
                {
                    console.log(error); // show response from the php script.
                }

                });

            e.preventDefault(); // avoid to execute the actual submit of the form.
            });
        </script>
    </body>
</html>
