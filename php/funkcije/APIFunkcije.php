<?php
function getRequest($url, $queryParams = array()) {
    $response = file_get_contents($url . queryPath($queryParams));

    return json_decode($response);
}

function queryPath($queryParams) {
    $path = '?';

    foreach ($queryParams as $param => $val) {
        $path .= "$param=$val&";
    }

    substr($path, 0, -1);

    return $path;
}