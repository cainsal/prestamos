<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,900;1,700&display=swap" rel="stylesheet">
    <title> </title>
    <style>
      /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */
      
      /*All the styling goes here*/
      
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%; 
      }

      body {
        background-color: #f6f6f6;
        font-family: 'Nunito', sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; 
      }

      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top; 
      }

      /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

      .body {
        background-color: red;
        width: 100%;
      }

      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display: block;
        margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: 580px; 
      }

      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        box-sizing: border-box;
        display: block;
        margin: 0 auto;
        max-width: 580px;
        padding: 10px; 
      }

      /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
      .main {
        background: #ffffff;
        border-radius: 3px;
        width: 100%; 
      }

      .encabezado {
        background-color: #ffbc00;
        padding: 10px 20px;
        margin-bottom: 20px;
        border-radius: 10px;
      }

      .img-logo {
        width: 30%;
        display: flex;
        margin: auto;
        padding: 25px 0px;
      }

      .wrapper {
        box-sizing: border-box;
        padding: 20px; 
      }

      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }

      .footer {
        clear: both;
        margin-top: 10px;
        text-align: center;
        width: 100%; 
      }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #fff;
          font-size: 12px;
          text-align: center; 
      }

      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h2, h3 {
        color: #000000;
        font-family: 'Nunito', sans-serif;
        font-weight: 900;
        line-height: 1.4;
        margin: 0;
      }

      h1,
      h4 {
        color: #000000;
        font-family: 'Nunito', sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        margin-bottom: 30px; 
      }

      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize; 
      }

      p,
      ul,
      ol {
        font-family: 'Nunito', sans-serif !important;
        font-size: 16px;
        font-weight: 300;
        text-align: justify;
        margin: 0;
        margin-bottom: 15px; 
      }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; 
      }

      a {
        color: #1b1b1b;
        font-weight: 700;
        text-decoration: underline; 
      }

      strong {
        font-weight: 700;
      }

      small {
        font-family: 'Nunito', sans-serif !important;
        font-weight: 200;
      }

      /* -------------------------------------
          BUTTONS
      ------------------------------------- */
      .btn {
        box-sizing: border-box;
        width: 100%; }
        .btn > tbody > tr > td {
          padding-bottom: 15px; }
        .btn table {
          width: auto; 
      }
        .btn table td {
          background-color: #ffffff;
          border-radius: 5px;
          text-align: center; 
      }
        .btn a {
          background-color: #ffffff;
          border: solid 1px #3498db;
          border-radius: 5px;
          box-sizing: border-box;
          color: #3498db;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          margin: 0;
          padding: 12px 25px;
          text-decoration: none;
          text-transform: capitalize; 
      }

      .btn-warning table td {
        background-color: #FFBC00; 
      }

      .btn-warning a {
        background-color: #FFBC00;
        border-color: #FFBC00;
        color: #1b1b1b; 
      }

      /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
      .last {
        margin-bottom: 0; 
      }

      .first {
        margin-top: 0; 
      }

      .align-center {
        text-align: center; 
      }

      .align-right {
        text-align: right; 
      }

      .align-left {
        text-align: left; 
      }

      .clear {
        clear: both; 
      }

      .mt0 {
        margin-top: 0; 
      }

      .mb0 {
        margin-bottom: 0; 
      }

      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0; 
      }

      .powered-by a {
        text-decoration: none; 
        color: #fff;
      }

      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        margin: 20px 0; 
      }

      /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
      @media only screen and (max-width: 620px) {
        table[class=body] h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important; 
        }
        table[class=body] p,
        table[class=body] ul,
        table[class=body] ol,
        table[class=body] td,
        table[class=body] span,
        table[class=body] a {
          font-size: 16px !important; 
        }
        table[class=body] .wrapper,
        table[class=body] .article {
          padding: 10px !important; 
        }
        table[class=body] .content {
          padding: 0 !important; 
        }
        table[class=body] .container {
          padding: 0 !important;
          width: 100% !important; 
        }
        table[class=body] .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important; 
        }
        table[class=body] .btn table {
          width: 100% !important; 
        }
        table[class=body] .btn a {
          width: 100% !important; 
        }
        table[class=body] .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important; 
        }
      }

      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
      @media all {
        .ExternalClass {
          width: 100%;
        }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%; 
        }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important; 
        }
        #MessageViewBody a {
          color: inherit;
          text-decoration: none;
          font-size: inherit;
          font-family: inherit;
          font-weight: inherit;
          line-height: inherit;
        }
        .btn-warning table td:hover {
          background-color: #ffed4a !important; 
          color: #1b1b1b !important;
        }
        .btn-warning a:hover {
          background-color: #ffed4a !important;
          border-color: #ffed4a !important;
          color: #1b1b1b !important; 
        } 
      }
    </style>
  </head>
  <body class="">
    <span class="preheader">Solicitud de Préstamo Financiero.</span>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <img src="http://landing.turboocloud.com/img/logo-miyunta-color.png" class="img-logo" alt="" >
          <div class="content">

            <!-- START CENTERED WHITE CONTAINER -->
            <table role="presentation" class="main">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper">
                  <table class="encabezado">
                    <tr>
                    <td><h2 style="margin: auto; color: #ffffff;">Hola {{ strtoupper($solicitud->cliente->nombres) }}</h2></td>
                    </tr>
                  </table>
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                        
                        <p>Gracias por confiar en nosotros, te enviamos las mejores ofertas financieras, haz click en el botón de abajo, luego coloca tus credenciales:</p>

                        <h3 style="text-align: center;">Usuario: <label for="">{{ $solicitud->cliente->correo }}</label></h3>
                        <h3 style="text-align: center;">Password: <label for="">{{ $password }}</label></h3>
                        <br>

                        <p>Selecciona tus mejores Ofertas Financieras (*) y los Financiadores se pondrán en contacto contigo.
                        <br>
                        <br>
                        <strong>Miyunta, tu mano amiga.</strong></p>

                        <div>
                          <small>
                            (*) Por favor siempre usar el último Password del último email que te remitimos.
                          </small>
                        </div>
                       
                        <div>
                          <small>
                            (*) Oferta Financieras sujetas a evaluación crediticia e información de comportamiento financiero.
                          </small>
                        </div>

                        <div style="margin-top: 30px; margin-bottom: 30px;">
                          <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-warning" style="text-align: center;">
                            <tbody>
                              <tr>
                                <td align="left">
                                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                      <tr>
                                        <td> <a href="https://miyunta.info:8091/prestamo/public/login?email={{$solicitud->cliente->correo}}" target="_blank">Haz click aquí para ver nuestras oferta</a> </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
						<!-- 
                         <p>This is a really simple email template. Its sole purpose is to get the recipient to click the button with no distractions.</p>
                        <p>Good luck! Hope it works.</p> -->

                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>
            <!-- END CENTERED WHITE CONTAINER -->

            <!-- START FOOTER -->
            <div class="footer">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="content-block">
                    <span class="apple-link">Calle Las Orquídeas 444 Piso 7, San Isidro</span>
                    <!-- <br> Don't like these emails? <a href="http://i.imgur.com/CScmqnj.gif">Unsubscribe</a>. -->
                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by">
                    Copyright <a href="agilesolutions.pe">Agile Solutions</a>.
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>
