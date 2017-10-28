<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>eServices</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css"/>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="assets/css/style.css"/>
        <style>
            body {
                /*background: url(assets/images/bg.jpg) no-repeat center center fixed; */
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        </style>
        
    </head>
    <body>
		<br>
        <div class="container">
            
            <div class="row">
                <div class="col-md-8">
                    <img src="img/Logo-ALB.png">
                </div>
                <div class="col-md-4">
                    <address>
                        <strong>Al Barr Premier & Al Barr Agency</strong><br>
                        No. 600 Jalan Serunai 11, <br>
                        Taman Saleng, <br>
                        81400 Senai, Johor.<br>
                        No Talian : 07-590 0372<br>
						No Fax : 07-598 4605<br>
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">

                    <div class="page-header">
                        <h1>Selamat Datang ke Albarr eServices</h1>
                    </div>
                </div>
                
                <div class="col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Log in</h3>
                        </div>
                        <div class="panel-body">
                        	<div class="form-container">
								<form method="post" action="login_process.php">
                                    <div class="form-group">
                                        <label for="username">Nama Pengguna</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Nama Pengguna">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Katalaluan</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Katalaluan">
                                    </div>
                                    <div class="form-group">
                                    	<label for="branch">Cawangan</label>
                                    	<select id="branch" name="branch" class="form-control">
                                          <option value="">--Sila Pilih--</option>
                                          <option value="Senai">Senai</option>
                                          <option value="Larkin">Larkin</option>
                                        </select>
                                    </div>
                                    <p>
                                    	<button type="submit" class="btn btn-primary">Masuk</button>
                                    </p>
                                </form>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        
        <script>
            $(function(){
                $('input:text').first().focus();
            });
        </script>
    </body>
</html>
