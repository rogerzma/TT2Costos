<?php

	function scriptLink()
	{
		echo "
			<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600,300' rel='stylesheet' type='text/css'>
			<link href='https://www.gob.mx/cms/uploads/image/file/488329/favicon.png' rel='shortcut icon'>
			<link data-turbolinks-track='true' href='https://www.gob.mx/cms/assets/application.css' media='all' rel='stylesheet' />

			<script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			  ga('create', 'UA-42773950-1', 'auto');
			  ga('send', 'pageview');
			</script>

			 <style>
			 a.list-group-item{
				 outline:none;
			 }
				a.list-group-item:hover {
					color:#621132;
					background-color: #D4C19C;
					outline:none;
				}
			</style>
		";
	}

	function menuGob()
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
                    <a href="/" style="padding: 1px 3px 3px 3px;" class="navbar-brand " title="Ir a la página inicial">

                    <div class="logo-main"></div>
                   </a>
                </div>
                <div id="navbarMainCollapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="https://www.gob.mx/tramites" title="Trámites">Trámites </a></li>
                        <li><a href="https://www.gob.mx/gobierno" title="Gobierno">Gobierno</a></li>
                        <li>
                            <form accept-charset="UTF-8" action="/busqueda" method="get"><div style="display:none"><input name="utf8" type="hidden" value="&#x2713;" /></div>
                                <input type="hidden" name="site" value="agricultura">
                                 <button data-v-6394873e="" id="botonbuscar" type="button" class="btn btn-search"><a data-v-6394873e="" href="https://www.gob.mx/busqueda?utf8=✓" target="_blank" id="botbusca"><img data-v-6394873e="" alt="Buscar" src="https://framework-gb.cdn.gob.mx/landing/img/lupa.png"></a></button>

</form>                        </li>
                    </ul>
                </div>
            </div>
        </nav>
		';

		echo '
			 <section >
				<!-- Subnavegacion -->
				<nav class="navbar navbar-inverse sub-navbar fixed-top"
					 >
				  <div class="container">
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#subenlaces">
						<span class="sr-only">Interruptor de Navegación</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href=""></a>
					</div>
					<div class="collapse navbar-collapse" id="subenlaces">
					  <ul class="nav subnav navbar-nav navbar-right">
							  <li class="landing-btn">
									<a href="https://www.gob.mx/inifap/archivo/articulos">
								Blog            </a>
						</li>
					<li class="landing-btn">
									<a href="https://www.gob.mx/inifap/archivo/multimedia">
								Multimedia            </a>
						</li>
					<li class="landing-btn">
									<a href="https://www.gob.mx/inifap/archivo/prensa">
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

				</section>
		';
	}

	function footerN()
	{
		echo '

			 <footer class="main-footer">
	<div class="list-info">
		<div class="container">

				<div class="col-sm-3">
						<img  src="https://framework-gb.cdn.gob.mx/landing/img/logofooter.png" href="/" alt="logo gobierno de méxico" class="logo_footer" style="max-width: 100%; margin-left: -20%; margin-top: 10%;">
						</div>
				<div class="col-sm-3">
					<h2>Enlaces</h2>
					<ul>
					<li><a  href="https://www.gob.mx/participa">Participa</a></li>
					<li><a  href="https://datos.gob.mx/">Datos</a></li>
						<li><a href="https://www.gob.mx/publicaciones" target="_blank" rel="noopener" title="Enlace abre en ventana nueva">Publicaciones Oficiales</a></li>
	                            <li><a class="footer" href="https://sader.gob.mx/transparencia/acceso-la-informacion" id="Transparencia" target="blank" title="Enlace abre en ventana nueva">Portal de Obligaciones de Transparencia</a></li>
						<li><a class="footer" id="Infomex" href="https://www.infomex.org.mx/gobiernofederal/home.action" target="_blank" rel="noopener" title="Enlace abre en ventana nueva">Sistema Infomex</a></li>
						<li><a class="footer" id="INAI" href="http://www.inai.org.mx" target="_blank" rel="noopener" title="Enlace abre en ventana nueva">INAI</a></li>
					</ul>
				</div>
				<div class="col-sm-3">
					<h2>¿Qué es gob.mx?</h2>
					<p>Es el portal único de trámites, información y participación ciudadana. <a href="https://www.gob.mx/que-es-gobmx">Leer más</a></p>
					<ul>

						<li><a href="https://www.gob.mx/temas">Temas</a></li>

						<li><a href="https://www.gob.mx/accesibilidad">Declaración de Accesibilidad</a></li>
						<li><a href="https://www.gob.mx/privacidadintegral">Aviso de privacidad integral</a></li>
            			<li><a href="https://www.gob.mx/privacidadsimplificado">Aviso de privacidad simplificado</a></li>
						<li><a href="https://www.gob.mx/terminos">Términos y Condiciones</a></li>
						<li><a href="https://www.gob.mx/terminos#medidas-seguridad-informacion">Política de seguridad</a></li>
						<li><a class="footer" id="Marco Juridico" href="http://www.ordenjuridico.gob.mx" target="_blank" rel="noopener" title="Enlace abre en ventana nueva">Marco Jurídico</a></li>
						<li><a href="https://www.gob.mx/sitemap">Mapa de sitio</a></li>
					</ul>
				</div>
				<div class="col-sm-3">
					<h2>Contacto</h2>
					<p>Dudas e información a<br>
						<a href="mailto:contacto@inifap.gob.mx">contacto@inifap.gob.mx</a>
						</p>
						<h2>Síguenos en</h2>
					<ul class="list-inline">
						<li>
			              <a id="Facebook" href="https://www.facebook.com/gobmexico" target="_blank" rel="noopener" class="sendEst share-info footer" title="enlace a facebook abre en una nueva ventana">
			                <img alt="Facebook" src="https://framework-gb.cdn.gob.mx/landing/img/facebook.png" />
			              </a>
			            </li>
						<li>
			              <a id="Twitter" href="https://twitter.com/GobiernoMX" target="_blank" rel="noopener" class="sendEst share-info footer" title="Enlace a twitter abre en una nueva ventana">
			                <img alt="Twitter" src="https://framework-gb.cdn.gob.mx/landing/img/twitter.png" />
			              </a>
			            </li>
					</ul>
				</div>
			</div>

		</div>
	</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://framework-gb.cdn.gob.mx/assets/scripts/vendor/modernizr.js"></script>
<script src="https://framework-gb.cdn.gob.mx/assets/scripts/plugins.js"></script>
<script src="https://framework-gb.cdn.gob.mx/assets/scripts/vendor/pace.min.js"></script>

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
