<?php

	function scriptLink()
	{
		$cadenaHead = ' 
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-HXXJYQTXCE"></script>
		<script>
  			window.dataLayer = window.dataLayer || [];
  			function gtag(){dataLayer.push(arguments);}';
  			
  		$cadenaHead .= "
  			gtag('js', new Date());

  			gtag('config', 'G-HXXJYQTXCE');
		</script>";		
		
		
		 $cadenaHead .= "
			<link rel='stylesheet' type='text/css' href='https://framework-gb.cdn.gob.mx/assets/styles/main.css'>
		";
		
		echo $cadenaHead;
		
	}

	function menuGob()
	{
		echo '
		<nav class="navbar navbar-inverse sub-navbar navbar-fixed-top">
    	<div class="container">
        	<div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#subenlaces">
             	<span class="sr-only">Interruptor de Navegación</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/"></a>
          	</div>
          	<div class="collapse navbar-collapse" id="subenlaces">
            	<ul class="nav navbar-nav navbar-right">
					<li class="landing-btn"><a href="https://www.gob.mx/inifap/archivo/articulos">Blog</a></li>
					<li class="landing-btn"><a href="https://www.gob.mx/inifap/archivo/multimedia">Multimedia</a></li>
					<li class="landing-btn"><a href="https://www.gob.mx/inifap/archivo/prensa">
								Prensa            </a>
						</li>
						<li class="landing-btn">
										<a href="https://www.gob.mx/inifap/archivo/agenda">
									Agenda            </a>
							</li>
					<li class="landing-btn">
									<a href="https://www.gob.mx/inifap/archivo/acciones_y_programas">
								Acciones y programas            </a>
						</li>
					<li class="landing-btn">
									<a href="https://www.gob.mx/inifap/archivo/documentos">
								Documentos            </a>
						</li>
						<li class="landing-btn">
										<a href="https://vun.inifap.gob.mx/portalweb/_Transparencia">
									Transparencia            </a>
							</li>
					<li class="landing-btn">
									<a href="https://www.gob.mx/agricultura/es/#344">
								Contacto            </a>
						</li>
					  </ul>
					</div>
				  </div>
				</nav>
		';
	}

	function footerN()
	{
		echo '
			<script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
		';
	}

	function scriptLinkO()
	{
		echo "
			<link href='https://fonts.googleapis.com/css?family=Montserrat:400,600' rel='stylesheet'>
			<link href='https://framework-gb.cdn.gob.mx/assets/styles/main.css' rel='stylesheet'>
			<link href='https://www.gob.mx/cms/uploads/image/file/488329/favicon.png' rel='shortcut icon'>

			<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-42773950-1', 'auto');
			ga('send', 'pageview');
			</script>

			<style>
				a.list-group-item:hover {
					color:#621132;
					background-color: #D4C19C;
				}
			</style>
		";
	}

	function menuGobO()
	{
		echo '
			<nav class="navbar navbar-inverse navbar-fixed-top navbar">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-target="#navbarMainCollapse" data-toggle="collapse">
							<span class="sr-only">Interruptor de Navegación</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="/" class="navbar-brand" title="Ir a la página inicial"><img alt="gob.mx" src="https://framework-gb.cdn.gob.mx/assets/images/gobmxlogo-2.svg" /></a>
					</div>
					<div id="navbarMainCollapse" class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="https://www.gob.mx/tramites" class="" title="Trámites">Trámites</a></li>
							<li><a href="https://www.gob.mx/gobierno" class="" title="Gobierno">Gobierno</a></li>
							<li><a href="https://www.gob.mx/participa" title="Participación Ciudadana">Participa</a></li>
							<li><a href="http://datos.gob.mx" title="Datos abiertos">Datos</a></li>
							<li>
								<form accept-charset="UTF-8" action="https://www.gob.mx/busqueda" method="get"><input name="utf8" type="hidden" value="&#x2713;" />
									<button id="goSearch" type="submit" class="btn" title="buscar" value="buscar" style="background-color: transparent;">
									<img alt="Búsqueda" width="20" height="20" class="optical-adjust-search" src="https://framework-gb.cdn.gob.mx/assets/search-dark.svg" />
									</button>
								</form>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		';
	}



?>
