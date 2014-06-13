<?php

    namespace IdnoPlugins\Bitly {
        class Main extends \Idno\Common\Plugin {
	    
            function registerPages() {
		
		// Register admin settings
                \Idno\Core\site()->addPageHandler('admin/bitly', '\IdnoPlugins\Bitly\Pages\Admin');
                \Idno\Core\site()->template()->extendTemplate('admin/menu/items', 'admin/bitly/menu');
		
		// Handle shorten event
		\Idno\Core\site()->addEventHook('url/shorten', function(\Idno\Core\Event $event) {

		    
		    if (isset(\Idno\Core\site()->config->config['bitly'])) {

			// Shorten with GAT
			$generic_access_token = \Idno\Core\site()->config->config['bitly']['generic_access_token'];
			
			if ($generic_access_token) {
			    
			    $url = $event->response();
			    
			    try {
				$result = \Idno\Core\Webservice::get('https://api-ssl.bitly.com/v3/shorten', [
				    'access_token' => $generic_access_token,
				    'longUrl' => $url
				]);
				
				$result = json_decode($result['content']);
				
				if ($result && $result->status_txt == 'OK') {
				    $event->setResponse($result->data->url);
				}
				else 
				    throw new \Exception("There was a problem shortening that link..." );
			    } catch (\Exception $e) {
				\Idno\Core\site()->session()->addMessage($e->getMessage(), 'alert-warn');
			    }
			    
			}
		    }
		});
            }
        }
    }
