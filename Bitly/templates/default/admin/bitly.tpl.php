<div class="row">

    <div class="span10 offset1">
        <h1>Bitly</h1>
        <?=$this->draw('admin/menu')?>
    </div>

</div>
<div class="row">
    <div class="span10 offset1">
        <form action="/admin/bitly/" class="form-horizontal" method="post">
            <div class="control-group">
                <div class="controls">
                    <p>
                        Please complete the Bit.ly configuration below in order to provide shortened links (using your vanity domain if you have one configured). 
			
                    </p>
		    <p>
                        To begin using Bit.ly, <a href="http://bitly.com/a/oauth_apps" target="_blank">create a new application in
                            the Bitly apps portal</a>.</p>
                    <p>
                        Add the following URL to the OAuth2 callback url box <strong><?=\Idno\Core\site()->config()->url?>bitly/callback</strong>.
                    </p>
                    <p>
                        Once you've finished, fill in the details below:
                    </p>
                </div>
            </div>
	    
            <div class="control-group">
                <label class="control-label" for="name">Client ID</label>
                <div class="controls">
                    <input type="text" id="name" placeholder="Client ID" class="span4" name="client_id" value="<?=htmlspecialchars(\Idno\Core\site()->config()->bitly['client_id'])?>" >
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="name">Client secret</label>
                <div class="controls">
                    <input type="text" id="name" placeholder="Client secret" class="span4" name="client_secret" value="<?=htmlspecialchars(\Idno\Core\site()->config()->bitly['client_secret'])?>" >
                </div>
            </div>
	    <hr />
	    <div class="control-group">
                <label class="control-label" for="name">Generic Access Token (Optional)</label>
                <div class="controls">
                    <input type="text" id="name" placeholder="Generic Access Token" class="span4" name="generic_access_token" value="<?=htmlspecialchars(\Idno\Core\site()->config()->bitly['generic_access_token'])?>" >
		    <p><small>Generic access tokens provide a system wide default bitly integration.</small></p>
                </div>
		
            </div>
	    
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
            <?= \Idno\Core\site()->actions()->signForm('/admin/bitly/')?>
        </form>
    </div>
</div>
