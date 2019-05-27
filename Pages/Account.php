<?php

    /**
     * Bitly pages
     */

    namespace IdnoPlugins\Bitly\Pages {

        /**
         * Default class to serve Bitly-related account settings
         */
        class Account extends \Idno\Common\Page
        {

            function getContent()
            {
                $this->gatekeeper(); // Logged-in users only
                if ($bitly = \Idno\Core\site()->plugins()->get('Bitly')) {
                    if (!$bitly->hasBitly()) {
                        if ($bitlyAPI = $bitly->connect()) {
                            $login_url = $bitlyAPI->getAuthenticationUrl(
				\IdnoPlugins\Bitly\Main::$AUTHORIZATION_ENDPOINT,
				\IdnoPlugins\Bitly\Main::getRedirectUrl(),
				['response_type' => 'code', 'state' => \IdnoPlugins\Bitly\Main::getState()] 
                            );
			    
                        }
                    } else {
                        $login_url = '';
                    }
                }
                $t = \Idno\Core\site()->template();
                $body = $t->__(['login_url' => $login_url])->draw('account/bitly');
                $t->__(['title' => 'Bitly', 'body' => $body])->drawPage();
            }

            function postContent() {
                $this->gatekeeper(); // Logged-in users only
                if (($this->getInput('remove'))) {
                    $user = \Idno\Core\site()->session()->currentUser();
                    $user->bitly = [];
                    $user->save();
                    \Idno\Core\site()->session()->addMessage('Your Bitly settings have been removed from your account.');
                }
                $this->forward('/account/bitly/');
            }

        }

    }