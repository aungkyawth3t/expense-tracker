<?php

function url($path) { 
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
    . "://"
    . $_SERVER['HTTP_HOST']
    . '/' . trim($path, '/');
}

function isActive($path) {
    return url($path) === currentUrl();
}

function currentUrl() {
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
    . "://"
    . $_SERVER['HTTP_HOST']
    . $_SERVER['REQUEST_URI'];
}
