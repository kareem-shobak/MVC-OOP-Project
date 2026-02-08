<?php

$sections = [];
$currentSection = null;

function startSection($name)
{
    global $currentSection;
    ob_start();
    $currentSection = $name;
}

function endSection()
{
    global $sections, $currentSection;
    $sections[$currentSection] = ob_get_clean();
    $currentSection = null;
}

function yieldSection($name)
{
    global $sections;
    echo $sections[$name] ?? '';
}

function view($path, $data = [])
{
    // products.index → products/index.php
    $viewPath = str_replace('.', '/', $path);


    extract($data);

    require __DIR__ . '/../Views/' . $viewPath . '.php';
    require __DIR__ . '/../Views/layouts/app.php';
}