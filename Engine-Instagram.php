<?php

/*-------------------*/
#  Coded By Hyperguy  # 
#   t.me/SpiritCoder  #
#     2019/01/14      #
/*-------------------*/

$email = 'email@provedor.com';
$senha = 'Hyperguy';

function catcha($string,$start,$end){
    $str = explode($start,$string);
    $str = explode($end,$str[1]);
    return $str[0];
}

function DelCookie()
{
	if (file_exists('Cookie.txt')) 
		{
			unlink('Cookie.txt');
	}
}

DelCookie();

function _curl($url, $post, $headers, $email, $senha)
{
	$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);

			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);

				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

						curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

							curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);

								curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/Cookie.txt');

									curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/Cookie.txt');

										curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

											curl_setopt($ch, CURLOPT_POST, true);

												curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

													$Login = curl_exec($ch);

														curl_close($ch);

															// echo "$Login"; 

																if (strpos($Login, '"authenticated": true')) 
																{
																	echo "Live -> $email|$senha";

																}
																else
																{
																	echo "Die -> $email|$senha";
																}
																	}

$headers = array('Origin: https://www.instagram.com','Referer: https://www.instagram.com/accounts/login/?source=auth_switcher','X-CSRFToken: U5eQc9SrGy1Y1Hn3wH3yOF1HVDgWPTp1','X-Instagram-AJAX: 16b73267f71b','Content-Type: application/x-www-form-urlencoded','Accept: */*','Accept-Language: pt-BR','Host: www.instagram.com','Connection: Keep-Alive');

$Logged = _curl('https://www.instagram.com/accounts/login/ajax/', 'username='.$email.'&password='.$senha.'&queryParams=%7B%22source%22%3A%22auth_switcher%22%7D', $headers, $email, $senha);


echo "$Logged";





?>