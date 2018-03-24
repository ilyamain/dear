<?
if (isset($_GET['request'])) 
{
	// Load D.E.A.R. constants and class
	$config_file = __DIR__.DIRECTORY_SEPARATOR.'dear_start.php';
	if (is_file($config_file)) require_once($config_file);

	// Do nothing. CAPTCHA drawing is no need in a simplified version of D.E.A.R.
	// If you need a full version of D.E.A.R., please contact me: ilya.neba@gmail.com
	// 
	// A simplified version of D.E.A.R. is free. It includes:
	// * response to the user in the form of a unique hash result (the answer demonstrates that 
	// the site visited by this visitor is not phishing, but real),
	// * the ability to shorten the answer to an 4 or 8-letter word (less safety, but better 
	// remembering the answer by a user).
	// 
	// The full version of D.E.A.R. costs 1 BTC (or a similar amount in the fiat). It includes:
	// * easily remembered site responses (user himself determines the answer),
	// * the possibility of an image response instead of text response (like a CAPTCHA),
	// * protection against cURL-requests, created by phishing sites,
	// * the possibility of sending a response to user email (to ensure maximum security for the user).
	// 
	// If the listed features are not enough, then you can contact me to order a special version of D.E.A.R. 
	// (the price is negotiable). For example:
	// * create template for your site in accordance with your requirements,
	// * customize your already existing system to provide double-edged authorization,
	// * the possibility of interaction of several simultaneously operating sites with a single center 
	// that generates responses,
	// * the possibility of using a private blockchain (or DAG) to increase the survivability of a system 
	// that has several simultaneous sites,
	// * any other your wishes.
}
else 
{
	$text = 'D.E.A.R. free';
	$font = __DIR__.DIRECTORY_SEPARATOR.'aka.ttf';
	$default_image = imagecreatetruecolor(400, 80);
	$back_color = imagecolorallocate($default_image, 25, 151, 70);
	$text_color = imagecolorallocate($default_image, 255, 255, 255);
	imagefill($default_image, 0, 0, $back_color);
	imagettftext($default_image, 40, 0, 50, 60, $text_color, $font, $text);
	header('Content-type: image/gif');
	header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	header('Pragma: no-cache');
	imagegif($default_image);
	imagedestroy($default_image);
	exit();
}
?>