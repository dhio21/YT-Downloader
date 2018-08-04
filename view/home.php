<!DOCTYPE html>
<html>
<head>
	<title>YT Downloader</title>
	<meta name="theme-color" content="#9c27b0" />
	<link rel="apple-touch-icon" sizes="234x234" href="https://screens.sts.ovh/yt-downloader/favicon.gif">
	<link rel="icon" type="image/gif" href="https://screens.sts.ovh/yt-downloader/favicon.gif">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
	<link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/material-kit.css?v=1.2.1" rel="stylesheet"/>
    <meta property="og:type" content="website">
	<meta property="og:title" content="YT Downloader">
	<meta property="og:url" content="https://ytdl.sts.ovh">
	<meta property="og:image" content="https://screens.sts.ovh/yt-downloader/favicon.gif">
	<meta property="og:description" content="Utilisez YT Downloader pour télécharger depuis Youtube ! Fini les scripts foireur ou les sites avec des pubs intrusive !">
</head>
<body>
    <div class="header-2">
        <nav class="navbar navbar-transparent navbar-absolute">
        	<div class="container">
            	<div class="navbar-header">
            		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                		<span class="sr-only">Toggle navigation</span>
    		            <span class="icon-bar"></span>
    		            <span class="icon-bar"></span>
    		            <span class="icon-bar"></span>
            		</button>
            		<a class="navbar-brand" href="/">YT Downloader</a>
            	</div>

            	<div class="collapse navbar-collapse" id="navigation-example">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="index.php">
                                Accueil
                            </a>
                        </li>
                    </ul>
            	</div>
        	</div>
        </nav>


        <div class="page-header">
            <div class="container">
                <div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
						<h1 class="title">YT Downloader</h1>
	                    <h4>Utilisez YT Downloader pour télécharger depuis Youtube ! Fini les scripts foireur ou les sites avec des pubs intrusive !</h4>
					</div>
					<div class="col-md-10 col-md-offset-1">
						<div class="card card-raised card-form-horizontal">
							<div class="card-content">
								<form method="post" action="download.php">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
						        	        	<input type="text" name="url" placeholder="URL" class="form-control" />
						                	</div>
										</div>
										<div class="col-md-3">
											<select class="selectpicker" data-style="btn btn-primary" title="Format" data-size="7" name="format">
												<option disabled selected>Formats</option>
												<option value="1">Audio</option>
												<option value="2">Vidéo</option>
											</select>
										</div>
										<div class="col-md-3">
											<button id="download" name="download" class="btn btn-primary btn-block">Télécharger !</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
	<script src="./assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="./assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="./assets/js/material.min.js"></script>
	<script src="./assets/js/moment.min.js"></script>
	<script src="./assets/js/nouislider.min.js" type="text/javascript"></script>
	<script src="./assets/js/bootstrap-datetimepicker.js" type="text/javascript"></script>
	<script src="./assets/js/bootstrap-selectpicker.js" type="text/javascript"></script>
	<script src="./assets/js/bootstrap-tagsinput.js"></script>
	<script src="./assets/js/jasny-bootstrap.min.js"></script>
	<script src="./assets/js/material-kit.js?v=1.2.1" type="text/javascript"></script>
	<script src="./assets/js/script.js" type="text/javascript"></script>
</body>
</html>