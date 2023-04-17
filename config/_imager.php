<?php
return array(
	'*' => array(
		'jpegoptimEnabled' => true,
		'logOptimizations' => true,
		'suppressExceptions' => true,
		'cacheEnabled' => true,
		'cacheDuration' => 2592000,
		'cacheDurationRemoteFiles' => 0,
		'useFilenamePattern' => false,
		'hashRemoteUrl' => true,
		'curlOptions' => array(
			//CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
			//CURLOPT_USERPWD => base64_encode("bgetem:rhein"),
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSLVERSION => 1,
			CURLOPT_SSL_CIPHER_LIST => 'TLSv1',
			//CURLOPT_RETURNTRANSFER => 1,
			//CURLOPT_UNRESTRICTED_AUTH => 1,
			//CURLOPT_HEADER => true,
			//CURLOPT_PROTOCOLS => CURLPROTO_HTTPS,
			//CURLOPT_HTTPHEADER => array('Accept: application/json','Connection: Keep-Alive')
		),
	)
);