<?php
$client_id = '2518500191695982';
$client_secret = '19dc6141317b29c0317b45d538cded8c';
$redirect_uri = 'https://swiftweb.app/api/instagram.php';
//$code ='AQA0CFnh6vagAkChXj8otFcyPQ2CaB4IH0d91-s5L0K5EJtkXZ3wviO9hzSQw5HCRRMm0iUg1-7PoeYVYbeJKEfW1xZGyDOvQNzWe_Rl94qWOqCYv4uAI1Oi4UCm28iGOikyBgGCvaN3fS-28ZBuIw1VTYWdLyy6wh2eRtPuuhWu6KNeXm4SyQs8jeP0f1YUScD4wl_ltpMmCdp_za4FZEBgeHt8s1NqCRur06WF4GpsoQ';

$code = $_GET['code'] ? substr($_GET['code'], 0, -2) : 'AQALv2kFGSm_bzxJEOk_abvk5lLu2GeFM7R-mKp5QjFSsGRNHc_stMWHfoqhSKMkO-Njzb4RFS0SBprap-vpU5hbLmHHjWGhsSX0M12EM6WG8M1Hd3Nw81CGmZG_AWvDPlpy9LYd4DfCjjmTIs_NJPFoe_eak4mGgcHT8fLMC5h49wyNTQICtjM45YgV0qk1-1lr8-W8Sufcg2dSv_kQGh4gZLIxs5rX56bTqRwT7UTCYQ';


$url = "https://api.instagram.com/oauth/access_token";
$access_token_parameters = array(
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'grant_type' => 'authorization_code',
    'redirect_uri' => $redirect_uri,
    'code' => $code
);

$curl = curl_init($url);    // we init curl by passing the url
curl_setopt($curl, CURLOPT_POST, true);   // to send a POST request
curl_setopt($curl, CURLOPT_POSTFIELDS, $access_token_parameters);   // indicate the data to send
//curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);   // to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);   // to stop cURL from verifying the peer's certificate.
$result = curl_exec($curl);   // to perform the curl session
curl_close($curl);   // to close the curl session

var_dump($result);