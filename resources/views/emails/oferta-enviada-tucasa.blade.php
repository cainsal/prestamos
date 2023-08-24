<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,200;0,300;0,400;0,800;1,700&display=swap" rel="stylesheet">
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
        font-family: 'Exo 2', sans-serif;
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
        background-color: #bf0d0b;
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
        background-color: #bf0d0b;
        padding: 10px 20px;
        margin-bottom: 20px;
        border-radius: 10px;
      }

      .img-logo {
        max-width: 50%;
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
        padding-bottom: 20px;
        text-align: center;
        width: 100%;
        background-color: #303030;
      }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #fff;
          font-size: 12px;
          font-family: 'Exo 2', sans-serif;
          text-align: center;
      }

      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h2, h3 {
        color: #000000;
        font-family: 'Exo 2', sans-serif;
        font-weight: 800;
        line-height: 1.4;
        margin: 0;
      }

      h1,
      h4 {
        color: #000000;
        font-family: 'Exo 2', sans-serif;
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
        font-family: 'Exo 2', sans-serif !important;
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
        font-weight: 800;
      }

      small {
        font-family: 'Exo 2', sans-serif !important;
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
          border: solid 1px #bf0d0b;
          border-radius: 5px;
          box-sizing: border-box;
          color: #bf0d0b;
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
        background-color: #bf0d0b; 
      }

      .btn-warning a {
        background-color: #bf0d0b;
        border-color: #bf0d0b;
        color: #fff; 
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
        font-weight: 200 !important;
        font-family: 'Exo 2', sans-serif;
        font-size: 10px;
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
          background-color: #bf0d0b !important; 
          color: #1b1b1b !important;
        }
        .btn-warning a:hover {
          background-color: #bf0d0b !important;
          border-color: #bf0d0b !important;
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
          <img src="http://tucasaperu.pe/img/logo_tucasa.png" class="img-logo" alt="Logo TuCasa, conectamos tus sueños">
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
                        
                        <p>Gracias por confiar en nosotros, te enviamos las mejores ofertas financieras, az click en el botón de abajo, luego coloca tus credenciales:</p>

                        <h3 style="text-align: center;">Usuario: <label for="">{{ $solicitud->cliente->correo }}</label></h3>
                        <h3 style="text-align: center;">Password: <label for="">{{ $password }}</label></h3>
                        <br>

                        <p>Selecciona tus mejores Ofertas Financieras (*) y los Financiadores se pondrán en contacto contigo.
                        <br>
                        <br>
                        <strong>TuCasa, conectamos tus sueños.</strong></p>

                        <small>(*) Oferta Financieras sujetas a evaluación crediticia e información de comportamiento financiero.</small>


                        <div style="margin-top: 30px;">
                          <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-warning" style="text-align: center;">
                          <tbody>
                            <tr>
                              <td align="center">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                  <tbody>
                                    <tr>
                                      <td> <a href="https://miyunta.info:8091/prestamo/public/login?email={{$solicitud->cliente->correo}}" style="font-family: 'Exo 2', sans-serif;" target="_blank">Haz click aquí para ver nuestras oferta</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        </div> 
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
                <br>
                <tr>
                  <td>
                    <span class="apple-link" style="font-weight: 800 !important; font-size: 15px;">Contáctanos</span>
                    <br>
                    <br>
                    <span class="apple-link">Correo: <a href="mailto:info@tucasaperu.com.pe">info@tucasaperu.com.pe</a></span>
                    <br>
                    <span class="apple-link">Celular: <a href="tel:+51994603560">+51 994603560</a></span>
                    <br><br>
                    <span class="apple-link" style="margin-right: 10px;">
                        <a href="https://www.facebook.com/TuCasa-111614857223944/" target="_blank">
                          <svg height="20" fill="#fff" viewBox="-21 -21 682.66669 682.66669" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m604.671875 0h-569.375c-19.496094.0117188-35.30078125 15.824219-35.296875 35.328125v569.375c.0117188 19.496094 15.824219 35.300781 35.328125 35.296875h306.546875v-247.5h-83.125v-96.875h83.125v-71.292969c0-82.675781 50.472656-127.675781 124.222656-127.675781 35.324219 0 65.679688 2.632812 74.527344 3.808594v86.410156h-50.855469c-40.125 0-47.894531 19.066406-47.894531 47.050781v61.699219h95.9375l-12.5 96.875h-83.4375v247.5h162.796875c19.507813.003906 35.324219-15.804688 35.328125-35.3125 0-.003906 0-.007812 0-.015625v-569.375c-.007812-19.496094-15.824219-35.30078125-35.328125-35.296875zm0 0"/></svg>
                        </a>
                    </span>

                    <span class="apple-link">
                        <a href="https://www.instagram.com/tucasa.peru/" target="_blank"> 
                          <svg id="Bold" enable-background="new 0 0 24 24" fill="#fff" height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m12.004 5.838c-3.403 0-6.158 2.758-6.158 6.158 0 3.403 2.758 6.158 6.158 6.158 3.403 0 6.158-2.758 6.158-6.158 0-3.403-2.758-6.158-6.158-6.158zm0 10.155c-2.209 0-3.997-1.789-3.997-3.997s1.789-3.997 3.997-3.997 3.997 1.789 3.997 3.997c.001 2.208-1.788 3.997-3.997 3.997z"/><path d="m16.948.076c-2.208-.103-7.677-.098-9.887 0-1.942.091-3.655.56-5.036 1.941-2.308 2.308-2.013 5.418-2.013 9.979 0 4.668-.26 7.706 2.013 9.979 2.317 2.316 5.472 2.013 9.979 2.013 4.624 0 6.22.003 7.855-.63 2.223-.863 3.901-2.85 4.065-6.419.104-2.209.098-7.677 0-9.887-.198-4.213-2.459-6.768-6.976-6.976zm3.495 20.372c-1.513 1.513-3.612 1.378-8.468 1.378-5 0-7.005.074-8.468-1.393-1.685-1.677-1.38-4.37-1.38-8.453 0-5.525-.567-9.504 4.978-9.788 1.274-.045 1.649-.06 4.856-.06l.045.03c5.329 0 9.51-.558 9.761 4.986.057 1.265.07 1.645.07 4.847-.001 4.942.093 6.959-1.394 8.453z"/><circle cx="18.406" cy="5.595" r="1.439"/></svg>
                        </a>
                    </span>  

                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by">
                     <a href="agilesolutions.pe">Copyright Agile Solutions</a>.
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
