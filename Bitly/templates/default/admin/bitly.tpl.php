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
                        Please complete the Bit.ly configuration below in order to provide shortened links (using your vanity domain if you have one configured). Currently only the generic access token is supported, full multi-user OAuth support will come...
			
                    </p>
                </div>
            </div>
	    <div class="control-group">
                <label class="control-label" for="name">Generic Access Token</label>
                <div class="controls">
                    <input type="text" id="name" placeholder="Generic Access Token" class="span4" name="generic_access_token" value="<?=htmlspecialchars(\Idno\Core\site()->config()->bitly['generic_access_token'])?>" >
                </div>
            </div>
            <?php /*<div class="control-group">
                <label class="control-label" for="name">Consumer key</label>
                <div class="controls">
                    <input type="text" id="name" placeholder="Consumer key" class="span4" name="consumer_key" value="<?=htmlspecialchars(\Idno\Core\site()->config()->twitter['consumer_key'])?>" >
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="name">Consumer secret</label>
                <div class="controls">
                    <input type="text" id="name" placeholder="Consumer secret" class="span4" name="consumer_secret" value="<?=htmlspecialchars(\Idno\Core\site()->config()->twitter['consumer_secret'])?>" >
                </div>
            </div>*/ ?>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
            <?= \Idno\Core\site()->actions()->signForm('/admin/bitly/')?>
        </form>
    </div>
</div>
