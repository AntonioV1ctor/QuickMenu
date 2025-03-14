#!/usr/bin/php
<?php
    $main_p = './';
    $adm_p = './';
    $adm_url = 'adm';
    $cardapio = '';

    // do NOT use $_SERVER['REQUEST_URI'] in this one
    function extract_urn($urn) {
        $token = preg_split('/\//', $urn); // $tokem named after strtok()
        $urn_final = '';
        $i = 0;
        while (isset($token[$i + 2])) {
            $urn_final .= '/' .$token[$i + 2];
            $i++;
        }
        return $urn_final;
    }

    function load_config() {
        if (!($config = file_get_contents('./config.json'))) return;
        $json = json_decode($config);

        global $main_p, $adm_p, $adm_url;
        $main_p = $json->html_path;
        $adm_p = $json->adm_html_path;
        $caminho_dev = $json->adm_page_url;

        if (substr($adm_url, 0, 1) != '/') {$adm_url = '/'.$adm_url;};


    }
    load_config();

    $page_extention = pathinfo($_SERVER['REQUEST_URI'], PATHINFO_EXTENSION);

    // special url for managing orders
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] == $adm_url){
        echo file_get_contents($adm_p . '/index.html');
        return;
    }

    // handle POST requests
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $headers = getallheaders();

        // admin page post
        if ($_SERVER['REQUEST_URI'] == $adm_url) {
            echo 'wassup';
            return;
        }
        if (isset($headers['User-token'])) {
            echo $headers['User-token'];
        }
        return;
    }

    // handle GET requests for html files
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && !(!$page_extention || $page_extention == '.html')) {
        header('content-type: '. mime_content_type($_SERVER['REQUEST_URI']));
        echo file_get_contents($main_p.$_SERVER['REQUEST_URI']);
        return;
    }

    echo file_get_contents($main_p. '/index.html');
?>
