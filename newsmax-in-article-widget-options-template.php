
<style>
.wrap .nmx-logo{
    display: block;
    width: 310px;
    height: 85px;
    margin: 20px auto 20px;
}

.nm-ar-widget-settings {
	margin-left:auto;
	margin-right:auto;
	margin-top:50px;
    max-width: 500px;
    background: #F7F7F7;
    padding: 50px;
    font: 12px Georgia, "Times New Roman", Times, serif;
    color: #888;
    text-shadow: 1px 1px 1px #FFF;
    border:1px solid #E4E4E4;
}
.nm-ar-widget-settings h1 {
    font-size: 25px;
    padding: 0px 0px 10px 40px;
    display: block;
    border-bottom:1px solid #E4E4E4;
    margin: -10px -15px 30px -10px;;
    color: #888;
}
.nm-ar-widget-settings h2{
    text-align:center;
}

.nm-ar-widget-settings hr{
    margin-bottom:40px;
}

.nm-ar-widget-settings h1>span {
    display: block;
    font-size: 11px;
}
.nm-ar-widget-settings label {
    display: block;
    margin: 0px;
}
.nm-ar-widget-settings label>span {
    float: left;
    width: 30%;
    text-align: left;
    padding-right: 10px;
    margin-top: 10px;
    color: #888;
	font-size:16px;
}
.nm-ar-widget-settings input[type="text"]{
    border: 1px solid #DADADA;
    color: #888;
    height: 30px;
    margin-bottom: 16px;
    margin-right: 6px;
    margin-top: 2px;
    outline: 0 none;
    padding: 3px 3px 3px 5px;
    width: 50%;
    font-size: 12px;
    line-height:15px;
    box-shadow: inset 0px 1px 4px #ECECEC;
    -moz-box-shadow: inset 0px 1px 4px #ECECEC;
    -webkit-box-shadow: inset 0px 1px 4px #ECECEC;
}

.nm-ar-widget-settings .form-group{
    margin-top:10px;
}

.nm-ar-widget-settings .submit{
    margin-top:50px;
    text-align:center;
}

.nm-ar-widget-settings input[type="checkbox"]{
    margin-top:10px;
}

.nm-text-center {
  text-align: center;
}
</style>

<form method="POST" action="../wp-admin/options.php" class="nm-ar-widget-settings">
<div class="wrap">
<div class="nmx-logo"><img src="../wp-content/plugins/newsmax-article-widget/logo.png"></div>
<h2>Newsmax InStream Ads | Settings</h2>
<hr>

<?php settings_fields('newsmax-settings-group'); ?>
<?php do_settings_sections('newsmax-settings-group'); ?>

<div class="form-group">
<label for="newsmax_nm_client_id"><span>Widget Id</span>
<input type="text" name="newsmax_nm_client_id" value="<?php echo get_option('newsmax_nm_client_id'); ?>" />
</label>
</div>

<div class="form-group">
<label for="newsmax_nm_client_id"><span>Template</span>
<input type="text" name="newsmax_nm_template" value="<?php echo get_option('newsmax_nm_template'); ?>" />
</label>
</div>

<div class="form-group">
<label for="newsmax_nm_article_selector"><span>Article Selector</span>
<input type="text" name="newsmax_nm_article_selector" value="<?php echo get_option('newsmax_nm_article_selector'); ?>" />
</label>
</div>

<div class="form-group">
<label for="newsmax_nm_cloudflare_async"><span>Cloudflare Support</span>
<input type="checkbox" name="newsmax_nm_cloudflare_async" <?php if(get_option('newsmax_nm_cloudflare_async')) echo " checked"; ?> />
</label>
</div>
<br/>
<hr>
<div class="form-group">
<?php submit_button(); ?>
</div>

<p class="nm-text-center"><a href="https://www.newsmaxfeednetwork.com/" target="_blank">Newsmax Feed Network</a></p>

</form>
</div>
