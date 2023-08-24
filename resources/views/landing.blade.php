@extends('layouts.app')

@section('content')
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="Cache-contro, max-age=604800" content="public">
	<title> Miyunta </title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,900;1,700&display=swap" rel="stylesheet">

	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"> -->
	
	<!-- include VueJS first -->
	<script src="https://unpkg.com/vue@latest"></script>

	<!-- use the latest vue-select release -->
	<script src="https://unpkg.com/vue-select@latest"></script>
	<link rel="stylesheet" href="https://unpkg.com/vue-select@latest/dist/vue-select.css">

	<link rel="shortcut icon" href="img/favicon-miyunta.jpg">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://unpkg.com/@popperjs/core@2"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js">	</script>
	
	<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
	
	<script src="https://www.google.com/recaptcha/api.js?onload=onReCaptcha&render=explicit" async defer></script>

</head>

<body>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title font-weight-bolder" id="exampleModalLabel">Términos y Condiciones</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
			<div id="terminos-condiciones">
				1. DATOS DE IDENTIFICACIÓN
				Usted está visitando el Portal dMiyunta (el “Sitio Web o la Aplicación”), de titularidad de EMPRESA MARKET NEXUS, con R.U.C. N°20143229816, ambas con domicilio en (“Miyunta”).
				<br>
				2. ACCESO Y ACEPTACIÓN DEL USUARIO
				Estos Términos y Condiciones regulan el acceso y utilización por parte del Usuario de los servicios y facilidades que ofrece el Sitio Web o la Aplicación. La condición de “Usuario” es adquirida por la mera navegación y/o utilización del Sitio Web o la Aplicación.
				<br>
				El Usuario puede acceder y navegar por el Sitio Web o la Aplicación libremente sin necesidad de registrarse y/o suscribirse. Sin embargo, en algunos casos se requerirá del registro y/o suscripción para acceder a los servicios suministrados por Miyunta o por terceros, a través del Sitio Web o la Aplicación, los cuales pueden estar sujetos a condiciones específicas.
				<br>
				Asimismo, el acceso y navegación por el Sitio Web y la Aplicación por parte del Usuario implica la aceptación sin reservas de todas las disposiciones incluidas en los presentes Términos y Condiciones.
				<br>
				3. MODIFICACIÓN DE LOS TÉRMINOS Y CONDICIONES
				Miyunta se reserva expresamente el derecho a modificar, actualizar o ampliar en cualquier momento los presentes Términos y Condiciones.
				<br>
				Cualquier modificación, actualización o ampliación producida en los presentes Términos y Condiciones será inmediatamente publicada siendo responsabilidad del Usuario revisar los Términos y Condiciones vigentes al momento de la navegación.
				<br>
				En caso de que el Usuario no estuviera de acuerdo con las modificaciones mencionadas, podrá optar por no hacer uso de los servicios ofrecidos por Miyunta a través del Sitio Web o la Aplicación.
				<br>
				4. SERVICIOS OFRECIDOS POR EL SITIO WEB O LA APLICACIÓN
				El Sitio Web o la Aplicación ofrecen una plataforma a la que los Usuarios pueden acceder para conocer información y/o noticias de actualidad, tanto nacionales como internacionales. El Usuario también tiene la posibilidad de generar y crear contenido en el Sitio Web o la Aplicación y compartir dichos contenidos a través de redes sociales u otras plataformas, conforme a los estipulado en el numeral 8 de estos Términos y Condiciones.
				<br>
				Los Usuarios reconocen haber proporcionado voluntariamente sus datos personales, de conformidad con nuestra Política de Privacidad, a fin de poder disfrutar de los servicios ofrecidos por el Sitio Web o la Aplicación.
				<br>
				5. USO DEL SITIO WEB O LA APLICACIÓN
				Los servicios que se ofrecen a través del presente Sitio Web o Aplicación se encuentran disponibles sólo para aquellas personas que puedan celebrar contratos legalmente vinculantes de acuerdo a lo establecido por la ley aplicable. Al acceder al Sitio Web o la Aplicación, el Usuario declara ser mayor de 18 años de edad y encontrarse facultado a asumir obligaciones vinculantes con respecto a cualquier tipo de responsabilidad que se produzca por el uso del Sitio Web o la Aplicación.
				<br>
				El Usuario se compromete a utilizar el Sitio Web o la Aplicación de conformidad con la Ley, los presentes Términos y Condiciones, la moral, las buenas costumbres y el orden público. En este sentido, la utilización por parte del Usuario del Sitio Web o la Aplicación se realizará de conformidad con las siguientes directivas:
				<br>
				El Usuario se obliga a no utilizar el Sitio Web o la Aplicación con fines o efectos ilícitos o contrarios al contenido de los presentes Términos y Condiciones, lesivos de los intereses o derechos de terceros, o que de cualquier forma pueda dañar, inutilizar, deteriorar la plataforma o impedir un normal disfrute del Sitio Web o la Aplicación por otros Usuarios.
				El Usuario se compromete expresamente a no destruir, alterar, inutilizar o, de cualquier otra forma, dañar los datos, programas o documentos electrónicos y demás que se encuentren en el Sitio Web o la Aplicación.
				El Usuario se compromete a no obstaculizar el acceso a otros Usuarios mediante el consumo masivo de los recursos informáticos a través de los cuales Miyunta presta el servicio, así como a no realizar acciones que dañen, interrumpan o generen errores en dichos sistemas o servicios.
				El Usuario se compromete a no intentar penetrar o probar la vulnerabilidad de un sistema o de una red propia del Sitio Web o la Aplicación, así como quebrantar las medidas de seguridad o de autenticación del mismo.
				El Usuario se compromete a hacer un uso adecuado de los contenidos que se ofrecen en el Sitio Web o la Aplicación y a no emplearlos para incurrir en actividades ilícitas, así como a no publicar ningún tipo de contenido ilícito.
				El Usuario se compromete a no utilizar el Sitio Web o la Aplicación para, a modo de referencia, más no limitativo, enviar correos electrónicos masivos (spam) o correos electrónicos con contenido amenazante, abusivo, hostil, ultrajante, difamatorio, vulgar, obsceno o injurioso. Asimismo, se compromete a no utilizar un lenguaje ilícito, abusivo, amenazante, obsceno, vulgar, racista, ni cualquier lenguaje que se considere inapropiado, ni anunciar o proporcionar enlaces a sitios que contengan materia ilegal u otro contenido que pueda dañar o deteriorar la red personal o computadora de otro Usuario.
				Miyunta se reserva la potestad de determinar a su libre criterio, cuándo se produce la vulneración de cualquiera de los preceptos enunciados en el presente apartado por parte de los contenidos publicados por algún Usuario, así como la potestad de eliminar dichos contenidos del Sitio Web o la Aplicación.
				<br>
				En el caso en que un Usuario infrinja lo establecido en el presente apartado, Miyunta procederá a realizar alguna de las siguientes acciones, dependiendo de la gravedad o recurrencia de la infracción:
				<br>
				1° Amonestación al Usuario.2° Suspensión temporal de la cuenta del Usuario.3° Cancelación definitiva de la cuenta del Usuario.4° Acciones por responsabilidades civiles o penales.
				<br>
				6. REGISTRO Y RESPONSABILIDAD POR CONTRASEÑAS
				El Usuario podrá navegar por el Sitio Web o la Aplicación sin necesidad de registrarse en una cuenta. Sin embargo, en algunos casos se requerirá del registro y/o suscripción para acceder al Sitio Web o la Aplicación.
				<br>
				La cuenta de Usuario no debe incluir el nombre de otra persona con la intención de hacerse pasar por esa persona, ni ser ofensivo, vulgar, obsceno o contrario a la moral y las buenas costumbres.
				<br>
				Los Usuarios registrados y/o suscritos contarán con una clave personal o contraseña con la cual podrán acceder a su cuenta personal. Cada Usuario es responsable de su propia contraseña, y deberá mantenerla bajo absoluta reserva y confidencialidad, sin revelarla o compartirla, en ningún caso, con terceros. Cada Usuario es responsable de todas las acciones realizadas mediante el uso de su contraseña. Toda acción realizada a través de la cuenta personal de un Usuario se presume realizada por el Usuario titular de dicha cuenta.
				<br>
				En el caso de que un Usuario identificara que un tercero conociera y usara su contraseña y su cuenta personal, deberá notificarlo de manera inmediata a Miyunta.
				<br>
				Miyunta no será responsable de cualquier daño relacionado con la divulgación del nombre de un Usuario o de su contraseña, o del uso que cualquier persona dé al nombre de un Usuario o contraseña.
				<br>
				Miyunta puede solicitar el cambio de un nombre de Usuario y contraseña cuando considere que la cuenta ya no es segura, o si se recibe alguna queja o denuncia respecto al nombre de un Usuario que viole derechos de terceros.
				<br>
				Las comunicaciones concernientes a la administración de la contraseña pueden ser enviadas a contacto@peruid.pe<br>
				7. PROPIEDAD INTELECTUAL
				Todos los derechos de propiedad intelectual del Sitio Web o la Aplicación y de sus contenidos y diseños pertenecen a Miyunta o, en su caso, a terceras personas. En aquellos casos en que sean propiedad de terceros, Miyunta cuenta con las licencias necesarias para su utilización.
				<br>
				Quedan expresamente prohibidas la reproducción, distribución, transformación, comunicación pública, puesta a disposición o cualquier modo de utilización, de la totalidad o parte de los contenidos del Sitio Web o la Aplicación, en cualquier soporte y por cualquier medio técnico, sin la autorización dMiyunta. El Usuario se compromete a respetar los derechos de propiedad intelectual de titularidad dMiyunta y de terceros.
				<br>
				Asimismo, queda expresamente prohibida la utilización o reproducción de cualquier marca registrada, nombre o logotipo que figure en el Sitio Web o la Aplicación sin la autorización previa y por escrito dMiyunta, así como la utilización del software que opera el Sitio Web o la Aplicación con excepción de aquellos usos permitidos bajo estos Términos y Condiciones.
				<br>
				Finalmente, quedan igualmente prohibidas a título enunciativo las siguientes prácticas:
				<br>
				La presentación de una página del Sitio Web o la Aplicación en una ventana que no pertenezca a Miyunta, mediante la técnica denominada "framing" a no ser que se cuente con la autorización previa y por escrito dMiyunta.
				La inserción de una imagen difundida en el Sitio Web o la Aplicación en una página no perteneciente a Miyunta, mediante la técnica denominada "inline linking", si ello no cuenta con la autorización previa y por escrito dMiyunta.
				8. CONTENIDO GENERADO POR EL USUARIO
				Existen determinadas secciones en las que el Usuario puede crear o generar contenido, como las zonas de comentarios, blogs, conversaciones en foros, entre otros. En dichas situaciones el Usuario podrá cargar videos, audios, gráficos, imágenes, producir textos, entre otros, (“Contenido Generado por el Usuario” o “CGU”).
				<br>
				El Usuario se compromete a cumplir las directivas de Uso del Sitio Web o la Aplicación contenidas en el numeral 5 de los presentes Términos y Condiciones. En específico, el Usuario se compromete a no utilizar el Sitio Web o la Aplicación para incluir contenido amenazante, abusivo, hostil, ultrajante, difamatorio, vulgar, obsceno o injurioso. Asimismo, se compromete a no utilizar un lenguaje ilícito, abusivo, amenazante, obsceno, vulgar, racista, ni cualquier lenguaje que se considere inapropiado.
				<br>
				El Usuario declara ser titular originario de todos los derechos de propiedad intelectual sobre el CGU. Sin embargo, al cargar dicho contenido en el Sitio Web o la Aplicación, el Usuario otorga a Miyunta una autorización o licencia no exclusiva, libre de pago de regalías, ilimitada e irrevocable y que aplica globalmente sobre todos los derechos, títulos e intereses del CGU, a fin de que Miyunta pueda utilizarlo, incluyendo, entre otros, el derecho a reproducirlo, modificarlo, crear trabajos derivados, editarlo, adaptarlo, traducirlo, distribuirlo, comercializarlo, ponerlo a disposición del público y cualquier forma de utilización, a través de cualquier medio, sea a través del Sitio Web o la Aplicación, como de medios no electrónicos.
				<br>
				Cabe indicar que la autorización brindada a Miyunta no es exclusiva, razón por la cual el Usuario puede continuar utilizando el CGU en cualquier medio e incluso permitir a otros que lo utilicen, siempre que tal uso no perjudique e interfiera con la autorización y derechos que el Usuario le otorga a Miyunta.
				<br>
				De igual forma, el Usuario reconoce y acepta que otros Usuarios de los Sitios Web o Aplicaciones dMiyunta visualicen, descarguen, enlacen y accedan al CGU y utilicen dichos contenidos de acuerdo con las posibilidades que el Sitio Web o la Aplicación ofrecen, de conformidad con lo establecido en el numeral 5 de este documento y siempre que no tengan uso comercial.
				<br>
				Miyunta no garantiza la veracidad, exactitud, exhaustividad y actualidad del CGU en el Sitio Web o la Aplicación. En cualquier caso, el Usuario será el único responsable de las manifestaciones falsas, inexactas o difamatorias que realice y de los perjuicios que pudiera causar al Sitio Web o la Aplicación o a terceros por la información que facilite.
				<br>
				Miyunta no se hace responsable por el CGU y traslada toda responsabilidad sobre éstos a cada Usuario proveedor de dichos contenidos.
				<br>
				9. ENLACES DE TERCEROS
				En el supuesto de que en el Sitio Web o la Aplicación se dispusieran enlaces o hipervínculos hacia otros sitios de Internet, Miyunta declara que no ejerce ningún tipo de control sobre dichos sitios y contenidos. En ningún caso Miyunta asumirá responsabilidad alguna por los contenidos de algún enlace perteneciente a una web ajena, ni garantizará la disponibilidad técnica, calidad, fiabilidad, exactitud, veracidad, validez y constitucionalidad de cualquier material o información contenida en los hipervínculos u otros lugares de Internet.
				<br>
				Estos enlaces se proporcionan únicamente para informar al Usuario sobre la existencia de otras fuentes de información sobre un tema concreto, y la inclusión de un enlace no implica la aprobación de la página web enlazada por parte dMiyunta.
				<br>
				10. LIMITACIÓN DE RESPONSABILIDAD E INDEMNIDAD
				Salvo que así lo establezca la legislación aplicable de obligado cumplimiento, el uso que el Usuario haga del Sitio Web o la Aplicación o de todas las funcionalidades que el Sitio Web o la Aplicación ofrecen, incluyendo cualquier contenido, publicación o herramienta, se ofrece “tal cual” y “según su disponibilidad” sin declaraciones o garantías de ningún tipo, tanto explícitas como implícitas, incluidas entre otras, las garantías de comerciabilidad, adecuación a un fin particular y no incumplimiento. Miyunta no garantiza que el Sitio Web o la Aplicación sea siempre seguro o esté libre de errores, ni que funcione siempre sin interrupciones, retrasos o imperfecciones.
				<br>
				Miyunta no se hace responsable de los posibles daños o perjuicios en el Sitio Web o la Aplicación que se puedan derivar de interferencias, omisiones, interrupciones, virus informáticos, averías o desconexiones en el funcionamiento operativo del sistema electrónico, de retrasos o bloqueos en el uso de este sistema electrónico causados por deficiencias o sobrecargas en el sistema de Internet o en otros sistemas electrónicos, así como también de daños que puedan ser causados por terceras personas mediante intromisiones ilegítimas fuera del control dMiyunta.
				<br>
				Asimismo, Miyunta no se hace responsable por la calidad, utilidad e idoneidad de los productos, servicios o facilidades ofrecidas al Usuario a través del Sitio Web o la Aplicación, y no responderá por las posibles reclamaciones que se pudieran formular relacionadas con este extremo.
				<br>
				11. DATOS DE CARÁCTER PERSONAL
				Los distintos tratamientos de datos personales que Miyunta realiza a través del Sitio Web o la Aplicación, así como las finalidades de dichos tratamientos, serán detallados específicamente en la Política de Privacidad del Sitio Web o la Aplicación a la que el Usuario podrá acceder a través del siguiente enlace: Políticas de Privacidad.
				<br>
				12. COMUNICACIONES
				El Usuario acepta expresamente que la dirección de correo electrónico consignada en el formulario de registro y/o suscripción será el medio de contacto oficial entre el Sitio Web o la Aplicación y el Usuario, siendo absoluta responsabilidad de este último verificar que dicho correo electrónico esté siempre activo y funcional para poder recibir todas las comunicaciones procedentes del Sitio Web o la Aplicación.
				<br>
				Los mensajes o comunicaciones del Sitio Web o la Aplicación a los Usuarios sólo pueden provenir de las páginas o cuentas oficiales de éste en redes sociales u otros medios. En caso se detectará que algún Usuario está enviando comunicaciones o realizando publicaciones en nombre del Sitio Web o la Aplicación, Miyunta iniciará las acciones correctivas y legales pertinentes a fin de proteger al resto de Usuarios de posibles riesgos de confusión.
				<br>
				De otro lado, toda comunicación que el Usuario desee dirigir al Sitio Web o la Aplicación deberá realizarla a través de la siguiente dirección de correo electrónico: csalas@comercio.com.pe
				<br>
				13. FUERZA MAYOR
				Miyunta no será responsable por cualquier retraso o falla en el rendimiento o la interrupción en la prestación de los servicios que pueda resultar directa o indirectamente de cualquier causa o circunstancia más allá de su control razonable, incluyendo, pero sin limitarse a fallas en los equipos o las líneas de comunicación electrónica o mecánica, robo, errores del operador, clima severo, terremotos o desastres naturales, huelgas u otros problemas laborales, guerras, o restricciones gubernamentales.
				<br>
				14. LIBRO DE RECLAMACIONES
				Conforme a lo establecido en el Código de Protección y Defensa del Consumidor, Ley N° 29571, el Sitio Web o la Aplicación pone a disposición del Usuario un Libro de Reclamaciones virtual a fin de que éste pueda registrar sus quejas o reclamos formales sobre los servicios ofrecidos a través del Sitio Web o la Aplicación. El Libro de Reclamaciones virtual puede ser encontrado en el siguiente enlace: http://gec.pe/libro/inicio/miyunta
				<br>
				15. AUTORIDADES Y REQUERIMIENTOS LEGALES
				Miyunta coopera con las autoridades competentes y con terceros para garantizar el cumplimiento de las leyes en materia de protección de derechos de propiedad intelectual, prevención del fraude, protección al consumidor y otras materias.
				<br>
				Miyunta podrá revelar la información personal del Usuario del Sitio Web o la Aplicación bajo requerimiento de las autoridades judiciales o gubernamentales competentes, en la medida en que discrecionalmente lo entienda necesario, para efectos de investigaciones conducidas por ellas, cuando se trate de investigaciones de carácter penal o de fraude, o las relacionadas con piratería informática, la violación de derechos de autor, infracción de derechos de propiedad intelectual u otra actividad ilícita o ilegal que pueda exponer al Sitio Web o la Aplicación o a <br>sus Usuarios a cualquier responsabilidad legal.
				<br>
				Asimismo, Miyunta se reserva el derecho de comunicar información sobre sus Usuarios a otros Usuarios, a entidades o a terceros, cuando haya motivos suficientes para considerar que la actividad de un Usuario sea sospechosa de intentar o cometer un delito o intentar perjudicar a otras personas. Este derecho será utilizado por Miyunta a su entera discreción cuando lo considere apropiado o necesario para mantener la integridad y seguridad del Sitio Web o la Aplicación y la de sus Usuarios, para hacer cumplir los presentes Términos y Condiciones, y a efectos de cooperar con la ejecución y cumplimiento de la ley.
				<br>
				16. INEXISTENCIA DE SOCIEDAD O RELACIÓN LABORAL
				La participación de un Usuario en el Sitio Web o la Aplicación no constituye ni crea contrato de sociedad, de representación, de mandato, como así tampoco relación laboral alguna entre dicho Usuario y Miyunta.
				<br>
				17. CESIÓN DE POSICIÓN CONTRACTUAL
				Los Usuarios autorizan expresamente la cesión de estos Términos y Condiciones y de su información personal en favor de cualquier persona que (i) quede obligada por estos Términos y Condiciones y/o (ii) que sea el nuevo responsable del banco de datos que contenga su información personal. Luego de producida la cesión, Miyunta no tendrá ninguna responsabilidad con respecto de cualquier hecho que ocurra partir de la fecha de la cesión. El nuevo responsable asumirá todas y cada una de las obligaciones dMiyunta establecidas en los presentes Términos y Condiciones y en la Política de Privacidad respecto al tratamiento, resguardo y conservación de la información personal de los usuarios del Sitio Web o la Aplicación.
				<br>
				18. LEY APLICABLE Y JURISDICCIÓN
				Los presentes Términos y Condiciones se rigen por la ley peruana y cualquier disputa que se produzca con relación a la validez, aplicación o interpretación de los mismos, incluyendo la Política de Privacidad, será resuelta en los tribunales del Cercado de Lima.
				<br>
				Fecha de última actualización: 07/07/2020.
			</div> 
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-warning font-weight-bolder" data-dismiss="modal">Acepto los Términos y Condiciones</button>
	      </div>
	    </div>
	  </div>
	</div>



	<div class="container" id="indexVm">

	    <div class="row">
	      <div class="col-lg-10 col-xl-10 mx-auto">

	      	<div class="row mt-5">
	      		<div class="col-lg-5">
	      			<img src="img/logo-miyunta-color.png" class="img-logo" alt="Logo App Mi Yunta">
	      		</div>
	      		<div class="col-lg-7">
	      			<h2 class="upper-title text-right text-uppercase text-light">¿Lo necesitas?</h2>
					<h2 class="card-subtitle text-right text-uppercase">¡¡Lo tienes!!</h2>
					<h6 class="indications text-right">¡¡Tus Mejores Ofertas Financieras!!</b></h6>
	      		</div>
	      	</div>

	        <div class="card card-signin flex-row my-3">

	          <div class="card-img-left d-none d-md-flex col-lg-5">
	             <!-- Background image for card set in CSS! -->
	          </div>

	          <div class="card-body">
	            <form class="form-signin" action="mailSend.php" method="post">

	              <div class="form-label-group">
	                <input v-model="inputDNI" type="tel" name="inputDNI" id="inputDNI" class="form-control" placeholder="Ingresa tu DNI" maxlength="8" required autofocus>
	                <label for="inputDNI">Ingresa tu DNI</label>
	              </div>

	              <div class="form-label-group">
	                <input v-model="nombres" type="text" name="inputNombre" id="inputNombre" class="form-control input-mayusculas" placeholder="Ingresa tu Nombre Completo" required>
	                <label for="inputNombre">Ingresa tu Nombre Completo</label>
	              </div>

	              <div class="form-label-group">
	                <input v-model="inputPhone" type="phone" name="inputPhone" id="inputPhone" class="form-control" placeholder="Ingresa tu Celular" required>
	                <label for="inputPhone">Ingresa tu Celular</label>
	              </div>

	              <div class="form-label-group">
	                <input v-model="inputEmail" type="email" name="inputEmail" id="inputEmail" class="form-control input-mayusculas" placeholder="Ingresa tu Correo" required>
	                <label for="inputEmail">Ingresa tu Correo</label>
	              </div>

	              <div class="form-label-group">

				    <!--<label for="tipoPrest">Selecciona tu Oferta Financiera</label>-->
	              </div>

	              <hr class="my-4">

	              <div class="containr mx-4">
	              	<label class="chk-box-style mb-3">Declaro haber leído y aceptado los <a data-toggle="modal" data-target="#exampleModal" class="text-danger font-weight-bolder">Términos y Condiciones</a> del Servicio
					  <input type="checkbox" v-model="aceptarTc">
					  <span class="checkmark"></span>
					</label>
	              </div>

	              <br>

	              <!-- <div class="form-label-group">
	                <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" required>
	                <label for="inputConfirmPassword">Confirm password</label>
	              </div> -->

				<div class="g-recaptcha" data-sitekey="6Le3Iq8ZAAAAAPzR-KjKU4eY6wYnFAm_H-87OSlC" >
				</div>
	            <br>

				  <a href="javascript:void(0)" class="btn btn-lg btn-warning btn-block text-uppercase" v-on:click="EnviarFormulario">Quiero un prestamo ya</a>

	              <!-- Button trigger modal -->
				  <!-- <button hidden="hidden" type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">Launch demo modal</button> -->

	            </form>
	          </div>
	        </div>
	      </div>
	    </div>
	</div>

	<footer id="sticky-footer" class="py-4 text-black-50">
      <div class="container text-center">
        <div class="row">

          <div class="col-lg-4 h-100 text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="https://www.facebook.com/Miyuntaperu/">
                <i class="fab fa-facebook fa-1x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="mailto:informes@marketnexusperu.com">
                <i class="fas fa-envelope fa-1x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://www.facebook.com/Miyuntaperu/">
                <svg height="15" viewBox="-21 -21 682.66669 682.66669" width="15" xmlns="http://www.w3.org/2000/svg"><path d="m604.671875 0h-569.375c-19.496094.0117188-35.30078125 15.824219-35.296875 35.328125v569.375c.0117188 19.496094 15.824219 35.300781 35.328125 35.296875h306.546875v-247.5h-83.125v-96.875h83.125v-71.292969c0-82.675781 50.472656-127.675781 124.222656-127.675781 35.324219 0 65.679688 2.632812 74.527344 3.808594v86.410156h-50.855469c-40.125 0-47.894531 19.066406-47.894531 47.050781v61.699219h95.9375l-12.5 96.875h-83.4375v247.5h162.796875c19.507813.003906 35.324219-15.804688 35.328125-35.3125 0-.003906 0-.007812 0-.015625v-569.375c-.007812-19.496094-15.824219-35.30078125-35.328125-35.296875zm0 0"/></svg>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="mailto:informes@marketnexusperu.com">
                <?xml version="1.0" encoding="iso-8859-1"?>
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="18" width="18"
					 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
				<g>
					<g>
						<polygon points="339.392,258.624 512,367.744 512,144.896 		"/>
					</g>
				</g>
				<g>
					<g>
						<polygon points="0,144.896 0,367.744 172.608,258.624 		"/>
					</g>
				</g>
				<g>
					<g>
						<path d="M480,80H32C16.032,80,3.36,91.904,0.96,107.232L256,275.264l255.04-168.032C508.64,91.904,495.968,80,480,80z"/>
					</g>
				</g>
				<g>
					<g>
						<path d="M310.08,277.952l-45.28,29.824c-2.688,1.76-5.728,2.624-8.8,2.624c-3.072,0-6.112-0.864-8.8-2.624l-45.28-29.856
							L1.024,404.992C3.488,420.192,16.096,432,32,432h448c15.904,0,28.512-11.808,30.976-27.008L310.08,277.952z"/>
					</g>
				</svg>

              </a>
            </li>
          </ul>
          <small style="color: black;" class="font-weight-bolder">Calle Las Orquídeas 444 Piso 7, San Isidro</small>
        </div>

        <div class="col-lg-4 h-100 text-lg-center my-auto">
            <small class="text-danger">Copyright &copy; <a href="http://www.agilesolutions.pe" class="footer-links">Agile Solutions</a></small>
          </div>

        <div class="col-lg-4 h-100 text-lg-right my-auto">
            <small>
				<a data-toggle="modal" data-target="#exampleModal" style="color: black;" class="font-weight-bolder">Politica de Privacidad</a><br>
				<a data-toggle="modal" data-target="#exampleModal" style="color: black;" class="font-weight-bolder">Términos y Condiciones</a>
            </small>
        </div>

        </div>
      </div>
    </footer>
</body>
</html>

<script>
Vue.component('v-select', VueSelect.VueSelect);

var index= new Vue({
	el:"#indexVm",
	data: function(){
		return {
			origen: "MiYunta",
			urlPrestamoApi:'http://144.91.121.248:8090/prestamo/public/api/prestamos-list-api',
			/* http://144.91.121.248:8090/api/prestamos-list-api */
			urlCrearSolicitudApi:'http://144.91.121.248:8090/prestamo/public/api/create-solicitud-api',
			/* http://144.91.121.248:8090/api/create-solicitud-api */
			inputDNI:'',
			inputPhone:'',
			inputEmail:'',
			inputMonto:0,
			nombres:'',
			tipoPrest:null,
			listaPrestamo: [],
			aceptarTc: true,
			captcha: false,
			placeholder: {
				type: String,
				default: "Sele"
			},
		}
	}, computed: {
	
	}, mounted() {
		let vm=this;
		vm.CargarTipoPrestamo();
		// axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
			var onReCaptcha = function() {
		    if (grecaptcha.getResponse().length !== 0) {
		        console.log("Lo que sea");
		        vm.captcha = true;
		    }
		};

	}, methods: {
		Clean: function(){
			let vm=this;
			vm.inputDNI=null;
			vm.inputEmail=null;
			vm.inputPhone=null;
			vm.inputMonto=0;
			vm.tipoPrest=null;
			vm.nombres=null
		},
		/*onReCaptcha: function() {
			    if (grecaptcha.getResponse().length !== 0) {
			    var btSubmit = document.getElementById("bt-submit");
			    btSubmit.disabled = false;
			    console.log("Lo que sea");		    
			};
		}, */

		ValidarFormulario: function() {
			let vm=this;

			if (!vm.captcha) {
				throw "Debe completar el Captcha";
			}

			if (!vm.aceptarTc) {
				throw "Debe aceptar los Términos y Condiciones";
			}

			if(!vm.tipoPrest){
				throw "Debe seleccionar un tipo de prestamo";
			}
			
			if(!vm.inputDNI){
				throw "Debe ingresar su DNI";
			}
			
			if(!vm.ValidarEmail(vm.inputEmail)){
				throw "Debe ingresar un correo valido.";
			}
			
			if(!vm.inputEmail){
				throw "Debe ingresar un correo";
			}
			
			if(!vm.inputPhone){
				throw "Debe ingresar un celular";
			}
			
			if(!vm.nombres){
				throw "Debe ingresar sus nombres";
			}
		},
		ValidarEmail: function (valor) {
			emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

			if (emailRegex.test(valor)) {
				return true;
			} else {
				return false;
			}

		},
		EnviarFormulario: function(){
			let vm = this;

			try{
				vm.ValidarFormulario();
				
				$.LoadingOverlay("show");
				axios({
                method: 'POST',
                url: vm.urlCrearSolicitudApi,
                data: new Object({
					"solicitud": {
						"dni": vm.inputDNI,
						"correo": vm.inputEmail,
						"celular": vm.inputPhone,
						"origen": vm.origen,
						"nombres": vm.nombres,
						"monto_solicitado": Number.parseFloat(vm.inputMonto).toFixed(2),
						"id_prestamo": vm.tipoPrest
					}
				})
				}).then(function (response) {
					let correo=vm.inputEmail;
					if(!response.data.error){
						vm.Clean();
					}else{
						bootbox.alert(response.data.message);
						return
					}
					
					bootbox.alert("En los próximo minutos te enviaremos las Mejores Ofertas Financieras a tu email <b>"+correo+"</b>. Si no recibes un correo, por el momento no te encuentras en campaña. <br> <small>(*) Oferta Financieras sujetas a evaluación crediticia e información de comportamiento financiero.</small>")

				}).then(function(){
					$.LoadingOverlay("hide");
				});
			}catch(error)
			{
				bootbox.alert(error)
			}
			
		}, CargarTipoPrestamo: function(){
			let vm = this;
			$.LoadingOverlay("show");

            axios({
                method: 'POST',
                url: vm.urlPrestamoApi,
                data: null
            }).then(function (response) {
				vm.listaPrestamo=response.data.prestamos;
            }).then(function(){
				$.LoadingOverlay("hide");
			});
		}
	}
	
	
})

	var onReCaptcha=function(rt){
		console.log(45454)
	}
	
	function setInputFilter(textbox, inputFilter) {
	  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
	    textbox.addEventListener(event, function() {
	      if (inputFilter(this.value)) {
	        this.oldValue = this.value;
	        this.oldSelectionStart = this.selectionStart;
	        this.oldSelectionEnd = this.selectionEnd;
	      } else if (this.hasOwnProperty("oldValue")) {
	        this.value = this.oldValue;
	        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
	      } else {
	        this.value = "";
	      }
	    });
	  });
	}

	/*
	//Solo caracteres de la A - Z
	setInputFilter(document.getElementById("inputNombre"), function(value) {
    return /^[a-z]*$/i.test(value); });
    */

	//Originalmente uintTextBox - Integer >= 0 and <= 500
  	setInputFilter(document.getElementById("inputDNI"), function(value) {
    	return /^\d*$/.test(value); });

  	setInputFilter(document.getElementById("inputPhone"), function(value) {
    	return /^\d*$/.test(value); });

</script>
@endsection
