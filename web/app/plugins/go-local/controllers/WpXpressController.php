<?php

namespace My_Plugin;

use GuzzleHttp\Client as GuzzleClient;

class WpXpressController 
{
    protected $user;
    protected $pass; 
    protected $client;
    protected $endpoint;
    protected $headers;

    public function __construct(){}

    public function setClient($endpoint){
        $this->user     = 'adminitor';//env('WPXPRESS_CLIENTID');
        $this->pass     = 'S6nN 4xCc Ymwc u26W NNYb BHX8';//env('WPXPRESS_CLIENTPASS'); S6nN 4xCc Ymwc u26W NNYb BHX8 utI8 l0eF ayhw s741 3teK sMvr
        $this->headers  = [
            'Authorization' => 'Basic ' . base64_encode( $this->user . ':' . $this->pass )
          ];
        $client   = new GuzzleClient([
            'base_uri' => $endpoint.'wp-json/wp/v2/'
        ]);
		$response = $client->request('GET', 'posts?_embed', $this->headers); 
	    $data     = json_decode($response->getBody(),true);
		
        return $data;
    }
}