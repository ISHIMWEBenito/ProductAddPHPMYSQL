<?php

require_once "Mainproduct.php";

if (isset($_POST['save'])) {
    $sc = new productType();

    $sc->set_sku($_POST['sku']);
    $sc->set_name($_POST['name']);
    $sc->set_price($_POST['price']);
    $sc->set_size($_POST['size']);
    $sc->set_height($_POST['height']);
    $sc->set_width($_POST['width']);
    $sc->set_length($_POST['length']);
    $sc->set_weight($_POST['weight']);
    $sc->set_dimension();
    $sc->validateForm();
}

if (isset($_POST['cancel'])) {
    $ca = new productType();

    $ca->set_sku($_POST['sku']);
    $ca->set_name($_POST['name']);
    $ca->set_price($_POST['price']);
    $ca->set_size($_POST['size']);
    $ca->set_height($_POST['height']);
    $ca->set_width($_POST['width']);
    $ca->set_length($_POST['length']);
    $ca->set_weight($_POST['weight']);
    $ca->cancel();

    header("Location:index.php");
}
