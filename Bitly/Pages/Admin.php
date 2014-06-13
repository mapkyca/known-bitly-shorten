<?php

    /**
     * Plugin administration
     */

    namespace IdnoPlugins\Bitly\Pages {

        /**
         * Default class to serve the homepage
         */
        class Admin extends \Idno\Common\Page
        {

            function getContent()
            {
                $this->adminGatekeeper(); // Admins only
                $t = \Idno\Core\site()->template();
                $body = $t->draw('admin/bitly');
                $t->__(['title' => 'Bit.ly', 'body' => $body])->drawPage();
            }

            function postContent() {
                $this->adminGatekeeper(); // Admins only
                //$consumer_key = $this->getInput('consumer_key');
                //$consumer_secret = $this->getInput('consumer_secret');
		
		$generic_access_token = $this->getInput('generic_access_token');
		
                \Idno\Core\site()->config->config['bitly'] = [
                //    'consumer_key' => $consumer_key,
                //    'consumer_secret' => $consumer_secret
		    'generic_access_token' => $generic_access_token
                ];
                \Idno\Core\site()->config()->save();
                \Idno\Core\site()->session()->addMessage('Your Bitly details were saved.');
                $this->forward('/admin/bitly/');
            }

        }

    }