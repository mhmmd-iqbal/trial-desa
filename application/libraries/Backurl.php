<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Backurl {
	function main_url(){
		$http_req   = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']) === 'on' ? "https://" : "http://";
		$server_url = $_SERVER['HTTP_HOST'];
		$back_url   = $http_req.$server_url."/wps/";
		if(( $server_url == 'localhost')||($server_url == '192.168.0.0') || ($server_url == '192.168.1.3')){
		    $back_url = $http_req.$server_url."/edesa/wps/";
		}
		return $back_url;
	}

}