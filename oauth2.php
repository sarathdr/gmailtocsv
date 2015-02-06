<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1'); 



if( !isset( $_SESSION['access_token']) ){
	header("Location: index.php");
}

require_once 'Zend/Mail/Protocol/Imap.php';
require_once 'Zend/Mail/Storage/Imap.php';

/**
 * Builds an OAuth2 authentication string for the given email address and access
 * token.
 */
function constructAuthString($email, $accessToken) {
  return base64_encode("user=$email\1auth=Bearer $accessToken\1\1");
}

/**
 * Given an open IMAP connection, attempts to authenticate with OAuth2.
 *
 * $imap is an open IMAP connection.
 * $email is a Gmail address.
 * $accessToken is a valid OAuth 2.0 access token for the given email address.
 *
 * Returns true on successful authentication, false otherwise.
 */
function oauth2Authenticate($imap, $email, $accessToken) {
  $authenticateParams = array('XOAUTH2',
      constructAuthString($email, $accessToken ));

  $imap->sendRequest('AUTHENTICATE', $authenticateParams);
  while (true) {
    $response = "";
    $is_plus = $imap->readLine($response, '+', true);
    if ($is_plus) {
      error_log("got an extra server challenge: $response");
      // Send empty client response.
      $imap->sendRequest('');
    } else {
      if (preg_match('/^NO /i', $response) ||
          preg_match('/^BAD /i', $response)) {
          var_dump($response); die();
        error_log("got failure response: $response");
        return false;
      } else if (preg_match("/^OK /i", $response)) {
        return true;
      } else {
        // Some untagged response, such as CAPABILITY
      }
    }
  }
}


function getTextContent( $message ) {
	$foundPart = null;

	foreach (new RecursiveIteratorIterator($message) as $part) {
    try {
        if (strtok($part->contentType, ';') == 'text/plain') {
            $foundPart = $part;
            break;
        }
    } catch ( Exception  $e) {
        // ignore
    }
}

	if (!$foundPart) {
	    return "";
	} else {
		return $foundPart;
	}
}



/**
 * Given an open and authenticated IMAP connection, displays some basic info
 * about the INBOX folder.
 */
function showInbox($imap) {
  /**
   * Print the INBOX message count and the subject of all messages
   * in the INBOX
   */
  $storage = new Zend_Mail_Storage_Imap($imap);

  include 'header.php';
  echo '<h1>Total messages: ' . $storage->countMessages() . "</h1>\n";

  /**
   * Retrieve first 5 messages.  If retrieving more, you'll want
   * to directly use Zend_Mail_Protocol_Imap and do a batch retrieval,
   * plus retrieve only the headers
   */
  echo 'First five messages: <ul>';
  for ($i = 1; $i <= $storage->countMessages() && $i <= 5; $i++ ){
    echo '<li>' . htmlentities($storage->getMessage($i)->subject) . "</li>\n";
  }
  echo '</ul>';
}

function searchInbox($imap, $folder ){
	 $storage = new Zend_Mail_Storage_Imap($imap);	
	 $results = $storage->selectFolder("testing");
	 
	




 	  for ($i = 1; $i <= $storage->countMessages() && $i <= 5 ; $i++ ){
	 	 
		 	 if($storage->getMessage($i)->isMultipart()){
			 	 $contentObj = getTextContent($storage->getMessage($i));
				 $content = $contentObj->getContent();
		 	 } else {
			 	 $content = $storage->getMessage($i)->getContent(); 
		 	 }	    
				    $myArray =  array( "date" => htmlentities($storage->getMessage($i)->date), 
				    					"subject" => htmlentities($storage->getMessage($i)->subject),
				    					"content" => htmlentities($content )
				    					);
				    							
	    			$fp = fopen('file.csv', 'a+');
					fputcsv($fp, $myArray );
					fclose($fp);

	  }	

	$file = 'file.csv';  
	  
	header("Content-type: application/csv");
    header("Content-Disposition: attachment;filename=file.csv");
    header("Content-Transfer-Encoding: binary"); 
    header('Pragma: no-cache'); 
    header('Expires: 0');
    // Send the file contents.
    set_time_limit(0); 
    readfile($file);
	exit();
}

/**
 * Tries to login to IMAP and show inbox stats.
 */
function tryImapLogin($email, $accessToken, $folder ) {
  /**
   * Make the IMAP connection and send the auth request
   */
  $imap = new Zend_Mail_Protocol_Imap('imap.gmail.com', '993', true);
  if (oauth2Authenticate($imap, $email, $accessToken)) {
     
     // showInbox( $imap );
     searchInbox($imap, $folder );    
  } else {
    echo '<h1>Failed to login</h1>';
  }
}


if( isset( $_POST['email'])){

	$email 		 = $_POST['email'];
	$folder		 = $_POST['folder'];
	
	$jObj = json_decode($_SESSION['access_token']);
	$accessToken = $jObj->access_token;
		
	if ($email && $accessToken) {
	  tryImapLogin($email, $accessToken, $folder);
	}	else {
		header("Location:index.php");exit();
	}	
}
?>

<?php require_once('header.php')?>
<div class="jumbotron">

		    <form class="form-signin" role="form" action="oauth2.php" method="post">
		          <h2 class="form-signin-heading">Enter Details</h2>
		          <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
		          <input type="text" name="folder" class="form-control" placeholder="Gmail Folder" required>
		          <button class="btn btn-lg btn-primary btn-block" type="submit">Download CSV</button>
		        </form>
			
</div>

<?php require_once('footer.php')?>











