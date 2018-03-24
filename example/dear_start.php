<?
// Constants defining
if (!defined('SITE_KEY')) define('SITE_KEY', 'security_key_for_my_site'); // a permanent private key for all your sites
// Other constants are no need in a simplified version of D.E.A.R:
// if (!defined('DB_HOST')) define('DB_HOST', 'localhost');
// if (!defined('DB_USER')) define('DB_USER', 'root');
// if (!defined('DB_PASS')) define('DB_PASS', '');
// if (!defined('DB_NAME')) define('DB_NAME', 'dear');
// if (!defined('CAPTCHA_TABLE')) define('CAPTCHA_TABLE', 'nonce');
// if (!defined('CAPTCHA_COLOR')) define('CAPTCHA_COLOR', '');
// if (!defined('CAPTCHA_ENTROPY')) define('CAPTCHA_ENTROPY', 10);
// if (!defined('CAPTCHA_LINES')) define('CAPTCHA_LINES', 4);
// if (!defined('CAPTCHA_SHARP')) define('CAPTCHA_SHARP', 6);
// if (!defined('MESSAGE_SUBJECT')) define('MESSAGE_SUBJECT', 'Response');
// if (!defined('MESSAGE_TEXT')) define('MESSAGE_TEXT', 'The response for your request is: ');
// if (!defined('MESSAGE_REPLY')) define('MESSAGE_REPLY', 'info@yourdomain.com');

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

// Class loading
$dear_file = __DIR__.DIRECTORY_SEPARATOR.'dear.php';
if (is_file($dear_file)) require_once($dear_file);
?>