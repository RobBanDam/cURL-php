<?php

if (isset($_POST['valor'])) {
	$valor = floatval($_POST['valor']);

	$apiURL = "https://v6.exchangerate-api.com/v6/f86192bd0e1f2cb13120576e/pair/USD/MXN/{$valor}";

	$iniciarCURL = curl_init($apiURL);

	// Desactivar la verificación SSL (NO RECOMENDADO)
	curl_setopt($iniciarCURL, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($iniciarCURL, CURLOPT_SSL_VERIFYHOST, false);

	curl_setopt($iniciarCURL, CURLOPT_RETURNTRANSFER, true);

	$respuesta = curl_exec($iniciarCURL);

	if (curl_errno($iniciarCURL)) {
		echo "Error al realizar la solicitud: " . curl_error($iniciarCURL);
		exit;
	}

	// Cerrar la sesión cURL
	curl_close($iniciarCURL);

	$datos = json_decode($respuesta, true);
	$valorUnitario = $datos['conversion_rate'];
	$conversion = $datos['conversion_result'];
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <header>
      <!-- place navbar here -->
    </header>
    <main>
      <div class="container-sm">
        <br />
        <?php if(isset($conversion)){?>
          <div
          class="alert alert-info alert-dismissible fade show"
          role="alert"
          >
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="alert"
              aria-label="Close"
            ></button>
          
            <strong>Divisa Convertida</strong> 
            <?php echo "<br> El Dólar equivale a {$valorUnitario}
          <br> {$valor} USD equivalen a {$conversion} MXN.";?>
          </div>
        <?php }?>
        
        
        <div class="card">
          <div class="card-header">Conversor de Divisas (USD a MXN)</div>
          <div class="card-body">
            <form action="?" method="post">
              <div class="mb-3">
                <label for="valor" class="form-label"
                  >Convertir de USD a MXN</label
                >
                <input
                  type="text"
                  class="form-control"
                  name="valor"
                  id="valor"
                  placeholder="Ingrese la cantidad a convertir"
                />
              </div>

              <br />
              <input
                type="submit"
                class="btn btn-success"
                value="Convertir a MXN"
              />
            </form>
          </div>
          <div class="card-footer text-muted"></div>
        </div>
      </div>
    </main>
    <footer>
      <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
