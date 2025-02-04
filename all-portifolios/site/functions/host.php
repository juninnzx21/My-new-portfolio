<?php

if ($_SERVER['SERVER_NAME'] === $_SERVER['HTTP_HOST'] && $_SERVER['HTTP_HOST'] === 'localhost') {
    # localhost
    function base_url()
    {
        return 'http://localhost/Multicred/';
    }
} else {
    # servidor   
    function base_url()
    {
        return 'https://www.juninnzxtec.com.br/all-portifolios/site/';
    }
}
