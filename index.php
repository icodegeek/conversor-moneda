<?php

require 'vendor/autoload.php';

if (isset($_GET['load'])) {

  $cantidad = htmlspecialchars($_POST['cantidad'], ENT_QUOTES, 'UTF-8');
  $opcion = htmlspecialchars($_POST['convertir'], ENT_QUOTES, 'UTF-8');
  $error = [];

  // Si usuario introduce campo vacio o no númerico

  if (!is_numeric($cantidad)){

    $error['cantidad']= true;
  }

  if (empty($error)) {

      if ($opcion == 'EUR') {

        $provider = new \Thelia\CurrencyConverter\Provider\ECBProvider();

        $currencyConverter = new \Thelia\CurrencyConverter\CurrencyConverter($provider);

        $baseValue = new \Thelia\Math\Number($cantidad);

        $convertedValue = $currencyConverter
            ->from('USD')
            ->to('EUR')
            ->convert($baseValue);

      }

      if ($opcion == 'USD') {

        $provider = new \Thelia\CurrencyConverter\Provider\ECBProvider();

        $currencyConverter = new \Thelia\CurrencyConverter\CurrencyConverter($provider);

        $baseValue = new \Thelia\Math\Number($cantidad);

        $convertedValue = $currencyConverter
            ->from('EUR')
            ->to('USD')
            ->convert($baseValue);

      }

  }else{

    require_once 'vista.html.php';
    exit();
  }
}

require_once 'vista.html.php';
