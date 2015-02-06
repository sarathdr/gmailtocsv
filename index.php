<?php 
// Show all errors 
error_reporting(E_ALL);
ini_set('display_errors', '1'); 

set_include_path("lib/src/" . PATH_SEPARATOR . get_include_path());
require_once 'Google/Client.php';


session_start();

$client = new Google_Client();
$client->setApplicationName("Connect to Your Gmail Account");
// Visit https://code.google.com/apis/console to generate your
// oauth2_client_id, oauth2_client_secret, and to register your oauth2_redirect_uri.
 $client->setClientId('insert_your_client-id>');
 $client->setClientSecret('insert_your_secret_key');
 $client->setRedirectUri('http://gmailtocsv.sarathdr.com/index.php');
 $client->setDeveloperKey('insert_your_developer_key');
 $client->setScopes(array('https://mail.google.com/'));

if (isset($_REQUEST['logout'])) {
  unset($_SESSION['access_token']);
}

if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header("Location: oauth2.php");
}

if (isset($_SESSION['access_token'])) {
  $client->setAccessToken($_SESSION['access_token']);

}

if (!$client->getAccessToken())  {
  try{
	  $authUrl = $client->createAuthUrl();	  
  }catch( Exception $e ){
	  die( $e->getMessage() );		  
  }

}
?>

<?php require_once('header.php'); ?>
<div class="jumbotron">
        <h1>Connect to Your Gmail Account</h1>
        <p class="lead">Descalimer: This is just a proof of concept web app. None of your email information will be stored any where in the website. It will create a cookie on your browser to store the access token that is  received after you give permission to access to your email account. You can later destroy the cookie by clicking the Logout button. Click "Connect Me!" button to give permission.</p>
        <p class="center">
			<?php   if(isset($authUrl)): ?>
				<a class="btn btn-lg btn-success" href="<?php echo $authUrl;?>" role="button">Connect Me!</a>
			<?php endif; ?>
			</p>
</div>
<?php require_once('footer.php'); ?>		
