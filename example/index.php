<?
if (isset($_GET['request'])) 
{
	// Load D.E.A.R. constants and class
	$config_file = __DIR__.DIRECTORY_SEPARATOR.'dear_start.php';
	if (is_file($config_file)) require_once($config_file);
	// Set request options
	$request = array 
	(
		// Simple options
		'string' => $_GET['request'], // user request string
		'secure' => SITE_KEY, // use a same key for all of your sites
		'shrink' => 8, // possible values: 0 - don't minify, 4 - reduce to 4 characters, 8 - reduce to 8 characters
	);
	// Print response results
	$respond = (new class_dear($request))->result();
	die($respond);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<title>D.E.A.R. free version</title>
		<link rel="shortcut icon" href="/favicon.ico" type="image/ico">
		<link href="styles.css" type="text/css" rel="stylesheet">
		<script src="jquery-3.1.1.min.js"></script>
	</head>
	<body>
		<div class="example-page">
			<h2>Double-edged authorization request. Free version</h2>
			<div class="request-form">
				<div class="request-form-caption">Request example</div>
				<input class="request-field" name="request" type="text" placeholder="Your request">
				<div class="request-button">Send request</div>
				<div class="respondent"></div>
			</div>
			<div class="promotion">
				<h2>Promotion text is below (it's possible to remove it)</h2>
				<p class="contact-me">If you need a full (or special) version of <b>D.E.A.R.</b>, please contact me: <a href="mailto:ilya.neba@gmail.com">ilya.neba@gmail.com</a></p>
				<p>A simplified version of D.E.A.R. is free. The project with examples is <a href="https://github.com/ilyamain/dear/">placed on github</a>. It includes:</p>
				<ul>
					<li>response to the user in the form of a unique hash result (the answer demonstrates that the site visited by this visitor is not phishing, but real),</li>
					<li>the ability to shorten the answer to an 4 or 8-letter word (less safety, but better remembering the answer by a user).</li>
				</ul>
				<p>The full version of D.E.A.R. costs 1 BTC (or a similar amount in the fiat). It includes:</p>
				<ul>
					<li>easily remembered site responses (user himself determines the answer),</li>
					<li>the possibility of an image response instead of text response (like a CAPTCHA),</li>
					<li>protection against cURL-requests, created by phishing sites,</li>
					<li>the possibility of sending a response to user email (to ensure maximum security for the user).</li>
				</ul>
				<p>If the listed features are not enough, then you can contact me to order a special version of D.E.A.R. (the price is negotiable). For example:</p>
				<ul>
					<li>create template for your site in accordance with your requirements,</li>
					<li>customize your already existing system to provide double-edged authorization,</li>
					<li>the possibility of interaction of several simultaneously operating sites with a single center that generates responses,</li>
					<li>the possibility of using a private blockchain (or DAG) to increase the survivability of a system that has several simultaneous sites,</li>
					<li>any other your wishes.</li>
				</ul>
			</div>
			<div class="example-page-content">
				<h2>"Lorem ipsum" content below</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin lacinia lacus ut nisi maximus, eget vehicula nisi porta. Integer vestibulum nisl sit amet aliquam maximus. Ut semper tincidunt laoreet. Aliquam a ante metus. Proin at neque fermentum, semper elit in, sodales tellus. Cras ultricies hendrerit nibh eu posuere. Quisque mollis justo non orci viverra varius. Integer accumsan tortor leo, quis eleifend ex aliquet at. Nullam sit amet volutpat felis. Aliquam quis leo non sem accumsan laoreet sit amet in neque. Nam arcu neque, suscipit at urna non, congue pretium dui. Pellentesque commodo tincidunt erat ut commodo. Pellentesque magna ligula, mollis ut tempor vel, rhoncus nec magna.</p>
				<p>Aliquam lectus tellus, condimentum at nisi vitae, fermentum posuere augue. Suspendisse ac mollis lacus, non placerat mauris. Etiam sit amet tincidunt est, in feugiat nibh. Vestibulum non laoreet lacus, eu mattis nibh. Donec cursus est nibh, id posuere sapien pellentesque non. Duis eu felis condimentum augue convallis bibendum eget eu ex. Aliquam erat volutpat. Donec tincidunt justo vitae sagittis sagittis.</p>
				<p>Ut facilisis rhoncus commodo. Aliquam ac dignissim orci. Maecenas sed interdum est. Mauris porttitor, turpis eu blandit pulvinar, justo ligula vulputate turpis, vel maximus nisi enim id orci. Suspendisse pretium porta risus, a varius massa volutpat id. Fusce non laoreet turpis. Cras vitae ipsum tincidunt, aliquam purus eu, viverra erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque ornare vel enim vitae tincidunt. Pellentesque pretium massa viverra elit porta lobortis. Suspendisse tincidunt tempor justo at tempus. Nam mi nunc, facilisis non augue eu, hendrerit vestibulum magna. Ut sit amet feugiat dui. Nunc maximus ullamcorper tempus.</p>
				<p>Aliquam sed sapien lacus. Nam eget euismod enim, at gravida augue. Vestibulum eget mattis erat. Duis erat mi, sagittis sed orci vel, auctor pulvinar nisl. Donec nec felis sed elit malesuada ultrices. Sed et nisl tincidunt, lacinia felis vitae, laoreet nibh. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum semper pharetra cursus. Mauris elementum a neque et interdum. Nulla faucibus lacinia eros malesuada sodales. Mauris fringilla nulla id tellus semper, eget efficitur tellus accumsan.</p>
				<p>Praesent ornare, erat vitae convallis cursus, sapien lectus molestie lorem, a pellentesque ante risus vitae mauris. Fusce pretium consectetur nibh iaculis tincidunt. Mauris nunc dolor, ullamcorper at lobortis non, semper eget ligula. Vestibulum quis dolor a urna suscipit laoreet. Duis id convallis dui, in convallis risus. Donec rhoncus, erat id blandit scelerisque, elit odio ultrices lectus, quis fringilla purus velit ac orci. Sed eget tristique felis. Proin sed risus id erat efficitur rhoncus sed ultrices augue. Nunc tincidunt lorem et velit pellentesque volutpat. Fusce sed enim in eros malesuada euismod vel ac libero. Fusce hendrerit magna sed eleifend gravida.</p>
			</div>
		</div>
	</body>
	<script>
		// Demo script for D.E.A.R.
		$(document).ready(function () 
		{
			$(document).on('click', '.request-button', function () {dear_respond(this);});
			$(document).on('keypress', '.request-field', function (action) {if (action.which == 13) $('.request-button').first().click();});
		});

		function dear_respond (caller) 
		{
			let respondent = $(caller).closest('.request-form').find('.respondent');
			let request = $(caller).closest('.request-form').find('.request-field').val();
			$.get(window.location, {request: request}).done(function (respond) 
			{
				$(respondent).html(respond);
			});
		}
	</script>
</html>