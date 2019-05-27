<div class="row">

    <div class="col-md-10 col-md-offset-1">
        <h3>Bitly</h3>
        <?=$this->draw('account/menu')?>
    </div>

</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <form action="/account/bitly/" class="form-horizontal" method="post">
            <?php
                if (empty(\Idno\Core\site()->session()->currentUser()->bitly)) {
            ?>
                    <div class="control-group">
                        <div class="controls">
                            <p>
                                If you have a Bitly account, you may connect it here. Public content that you
                                post to this site will be automatically cross-posted to your Bitly wall.
                            </p>
                            <p>
                                <a href="<?=$vars['login_url']?>" class="btn btn-large btn-success">Click here to connect Bitly to your account</a>
                            </p>
                        </div>
                    </div>
                <?php

                } else {

                    ?>
                    <div class="control-group">
                        <div class="controls">
                            <p>
                                Your account is currently connected to Bitly. Public content that you post here
                                will be shared with your Bitly account.
                            </p>
                            <p>
                                <input type="hidden" name="remove" value="1" />
                                <button type="submit" class="btn btn-large btn-primary">Click here to remove Bitly from your account.</button>
                            </p>
                        </div>
                    </div>

                <?php

                }
            ?>
            <?= \Idno\Core\site()->actions()->signForm('/account/bitly/')?>
        </form>
    </div>
</div>