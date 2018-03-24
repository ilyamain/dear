<?
// D.E.A.R. - double-edged authorization request.
// This class is designed to generate the response to the user's request.
// This response is the proof that the user has visited the original site.
// This is proof that the site is not fraudulent.

// Simple way to use double-edged authorization request system:
// 1. DEFINE CONSTANTS AT FILE DEAR_START.PHP
// it's necessary to set the same SITE_KEY for all of your sites
// only in this case, you can ensure your users that your site is not a fraud
// (even if the site changes its address from time to time)
// EXAMPLE:
// 2. DEFINE USER REQUEST AND CALLABLE OPTIONS
// EXAMPLE:
// // Load D.E.A.R. constants and class
// $config_file = __DIR__.DIRECTORY_SEPARATOR.'dear_start.php';
// if (is_file($config_file)) require_once($config_file);
// $request = array 
// (
	// // Simple options
	// 'string' => $_GET['request'], // user request string
	// 'secure' => SITE_KEY, // use a same key for all of your sites
	// 'shrink' => 4, // possible values: 0 - don't minify, 4 - reduce to 4 characters, 8 - reduce to 8 characters
	// // 
	// // WARNING! The settings of a full version of a D.E.A.R. are placed below.
	// // !!! Do not use these options in the simplified version. Because in this case, instead of
	// // !!! response of your site, your users will see a message about the need to update the version.
	// 'captcha' => true, // CAPTCHA response
	// // User defined response settings
	// 'user' => array 
	// (
		// 'table' => 'user', // specify the table in which the request and response fields are stored
		// 'request_field' => 'name', // specify the field in which the request is stored
		// 'respond_field' => 'response', // specify the field in which the response is stored
		// 'email_field' => 'email', // specify the field in which the email is stored
	// ), 
// );
// 3. CALCULATE RESPONSE
// EXAMPLE:
// $respond = (new class_dear($request))->result();
// 4. SHOW RESULT TO USER
// if you send an email instead of displaying a response to the screen, a result
// include information about the successful sending of the message to the email
// EXAMPLE:
// die($respond);

class class_dear 
{
	private $request;
	private $private_key;
	private $shrink;
	private $user;
	private $email;
	private $captcha;
	private $respond;

	// Initiate D.E.A.R.
	public function class_dear ($request = array()) 
	{
		// Get and filter start parameters
		$this->request = ((!empty($request['string']))&&(is_string($request['string']))) ? $request['string'] : '';
		$this->private_key = ((!empty($request['secure']))&&(is_string($request['secure']))) ? $request['secure'] : '';
		$this->shrink = ((!empty($request['shrink']))&&(is_numeric($request['shrink']))) ? $request['shrink'] : 0;
		$this->user = ((!empty($request['user']))&&(is_array($request['user']))) ? $request['user'] : array();
		$this->email = false;
		$this->captcha = (($request['captcha'] === true)||($request['captcha'] === 1)) ? true : false;
		// Calculation of response
		$this->simple(); // calculate simple response
		if (($this->shrink === 4)||($this->shrink === 8)) $this->minify(); // minify response string
		if (!empty($this->user)) 
		{
			// Choose: send an email or display the result on the screen
			// various errors when sending processed in a separate method
			$this->email = ((!empty($this->user['email_field']))&&(is_string($this->user['email_field']))) ? true : false;
			$this->fields(); // get user-defined response string and send it to email or display it on the screen
		}
		if (($this->captcha)&&(!$this->email)) $this->paint(); // convert response string to image
	}

	// Display a result of double-edged authorization
	public function result () 
	{
		return $this->respond;
	}

	// Get nonce from database
	public function get_nonce ($nonce) 
	{
		// Do nothing. It's no need in a simplified version of D.E.A.R.
	}

	// Set nonce to database
	public function set_nonce ($nonce) 
	{
		// Do nothing. It's no need in a simplified version of D.E.A.R.
	}

	// Get simple result. Returns a double hash of the concatenated string: 
	// - private key of the site,
	// - user request string.
	private function simple () 
	{
		$this->respond = hash('sha256', hash('sha256', ($this->request).($this->private_key)));
	}

	// Minify result. The user is difficult to remember the result of 64 characters.
	// To simplify the memorization of the result by a human, it can be shortened to 8 or 4 characters.
	private function minify () 
	{
		// Select snippet size depending on "shrink" option
		$snippet_size = 1;
		switch ($this->shrink) 
		{
			case 4:
				$snippet_size = 16;
				break;
			case 8:
				$snippet_size = 8;
				break;
			default:
				$snippet_size = 1;
		}
		// Minify results
		$arHash = str_split($this->respond, $snippet_size);
		$arHash = array_map(function ($snippet) 
		{
			$arCharacter = str_split($snippet, 1);
			$character = 0; // initial character code
			foreach ($arCharacter as $item) $character ^= intval($item, 16); // XOR for each symbol at snippet
			return dechex($character); // convert to hex
		}, $arHash);
		$this->respond = implode('', $arHash); // implode to result response string
	}

	// Read user-defined response. This response is easier to remember.
	private function fields () 
	{
		// Do nothing. This is a simplified version of D.E.A.R.
		// To receive a response without user-defined data, please disable the "user" settings in your request.
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
		$this->respond = 'The simplified version of D.E.A.R. is can\'t return user-defined response.';
	}

	// Simple message sender
	private function message ($addressee) 
	{
		// Do nothing. It's no need in a simplified version of D.E.A.R.
	}

	// Converting the result to CAPTCHA. Returns an image with a response.
	private function paint () 
	{
		// Do nothing. This is a simplified version of D.E.A.R.
		// To receive a response without CAPTCHA, please disable the "CAPTCHA" settings in your request.
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
		$this->respond = 'The simplified version of D.E.A.R. is can\'t paint CAPTCHA response.';
	}

	// Random word generator
	private function abra ($length = 10) 
	{
		// Do nothing. It's no need in a simplified version of D.E.A.R.
	}
};
?>