<?php

/**
 * Bitly pages
 */

namespace IdnoPlugins\Bitly\Pages {

    /**
     * Default class to serve the Bitly callback
     */
    class Callback extends \Idno\Common\Page {

	function getContent() {
	    $this->gatekeeper(); // Logged-in users only

	    try {
		if ($bitly = \Idno\Core\site()->plugins()->get('Bitly')) {
		    if ($bitlyAPI = $bitly->connect()) {

			if ($response = $bitlyAPI->getAccessToken('authorization_code', [
			    'code' => $this->getInput('code'), 
			    'redirect_uri' => \IdnoPlugins\Bitly\Main::getRedirectUrl(), 
			    'state' => \IdnoPlugins\Bitly\Main::getState()])) {
  
			    $response = parse_str($response['content'], $out);
			  
			    if (isset($out['access_token'])) {
				$user = \Idno\Core\site()->session()->currentUser();
				$user->bitly = ['access_token' => $out['access_token']];

				$user->save();
				\Idno\Core\site()->session()->addMessage('Your Bitly account was connected.');
			    }
			    else
				\Idno\Core\site()->session()->addErrorMessage ('There was a problem connecting your Bitly account');
			}
		    }
		}
	    } catch (\Exception $e) {
		\Idno\Core\site()->session()->addErrorMessage($e->getMessage());
	    }
	    
	    $this->forward('/account/bitly/');
	}

    }

}