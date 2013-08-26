<?php
function curl_file_get_contents($url)
{
	$curl = curl_init();
	//$userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';
	 
	curl_setopt($curl,CURLOPT_URL, $url);	//The URL to fetch. This can also be set when initializing a session with curl_init().
	curl_setopt($curl,CURLOPT_RETURNTRANSFER, TRUE);	//TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
	curl_setopt($curl,CURLOPT_CONNECTTIMEOUT, 5);	//The number of seconds to wait while trying to connect.	
	 
	//curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);	//The contents of the "User-Agent: " header to be used in a HTTP request.
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);	//To follow any "Location: " header that the server sends as part of the HTTP header.
	curl_setopt($curl, CURLOPT_AUTOREFERER, TRUE);	//To automatically set the Referer: field in requests where it follows a Location: redirect.
	curl_setopt($curl, CURLOPT_TIMEOUT, 10);	//The maximum number of seconds to allow cURL functions to execute.
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);	//To stop cURL from verifying the peer's certificate.
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
	 
	$contents = curl_exec($curl);
	curl_close($curl);
	return $contents;
}

if(isset($_GET["code"])) {
	$max_results = 500;
	$fields=array(
		'code'=>  urlencode($_GET["code"]),
		'client_id'=>  urlencode(Yii::app()->params['OAuth2.0ClientId']),
		'client_secret'=>  urlencode(Yii::app()->params['OAuth2.0ClientSecret']),
		'redirect_uri'=>  urlencode(Yii::app()->params['OAuth2.0RedirectURI']),
		'grant_type'=>  urlencode('authorization_code')
	);

	$post = '';
	foreach($fields as $key=>$value) { 
		$post .= $key.'='.$value.'&'; 
	}
	$post = rtrim($post,'&');

	$curl = curl_init();
	curl_setopt($curl,CURLOPT_URL,'https://accounts.google.com/o/oauth2/token');
	curl_setopt($curl,CURLOPT_POST,5);
	curl_setopt($curl,CURLOPT_POSTFIELDS,$post);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER,TRUE);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0);
	$result = curl_exec($curl);
	curl_close($curl);

	$response =  json_decode($result);
	$accesstoken = $response->access_token;

	$url = 'https://www.google.com/m8/feeds/contacts/default/full?max-results='.$max_results.'&oauth_token='.$accesstoken;
	$xmlresponse =  curl_file_get_contents($url);
	if((strlen(stristr($xmlresponse,'Authorization required'))>0) && (strlen(stristr($xmlresponse,'Error '))>0))
	{
		echo "<h2>OOPS !! Something went wrong. Please try reloading the page.</h2>";
		exit();
	}
	?>
	<div class="title-bar">Invite your friends to devaganesha:</div>
<?php	
	$xml =  new SimpleXMLElement($xmlresponse);
	$xml->registerXPathNamespace('gd', 'http://schemas.google.com/g/2005');
	$result = $xml->xpath('//gd:email');
?>
<div id="invite-gm-friends">
<input type="checkbox" id="select-all" checked/> <b>Select/Deselect all</b><br /><br />
<?php
	foreach ($result as $title) { ?>
		<div class="fl each-mail"><span><input type="checkbox" class="email-addresses" value="<?php echo $title->attributes()->address; ?>" checked /></span><span class="ml10"><?php echo $title->attributes()->address; ?></span></div>
<?php	}
}
?>
</div>
<div class="clear"></div>
<input type="button" value="Invite" id="send-gmail-invitation" class="btn btn-primary mt10"/>

<script type="text/javascript">
$("#select-all").click(function () {
	$('.email-addresses').attr('checked', this.checked);
		
	$(".email-addresses").click(function(){
		if($(".email-addresses").length == $(".email-addresses:checked").length) {
			$("#select-all").attr("checked", "checked");
		} else {
			$("#select-all").removeAttr("checked");
		}
	});
});

$('#send-gmail-invitation').click(function() {
	var name = 'Devaganesha';
	var emails = [];
	$('#invite-gm-friends input:checked').each(function() {
		emails.push($(this).val());
	});
	var emails = emails.toString();
	var body = "<div style='color:magenta; font-family: garamond; font-size: 28px; font-style: italic; font-weight: bold; padding: 8px;'>"+
					"You are invited to devaganesha!<br />"+
					"Please click on the following link to go to devaganesha <br />"+
					"http://www.devaganesha.com/"+
				"</div>";
	var sub = "Invitation to join devaganesha!";
	
	$.ajax({
		url: "<?php echo Yii::app()->createUrl("user/sendemail"); ?>",
		type: 'POST',
		data: {
			'name': name,
			'email': emails,
			'subject': sub,
			'body': body,
			'type': 'gmail_invitation'
		}
	});
	setTimeout(function() {
		window.close();
	}, 1000);
});
</script>