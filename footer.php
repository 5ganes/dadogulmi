<link href="css/main_styles.css" type="text/css" rel="stylesheet" />
<div id="footer">

	<div id="footerLeft">
    	<p class="contact1">
        	&copy; Copyright <?="20".date("y");?> Reliable Surgical Trading company P. Ltd.<br>All Rights Reserved.<br>
      		Powered By: <strong><a href="#">Ganesh Khatri</a></strong>
    	</p>
  	</div>

  	<div id="footerMid">
    	<h3>We are Associated With:</h3>
  		<? $ass=$groups->getByParentId(241);
		while($assGet=$conn->fetchArray($ass))
		{?>
        	<img title="<?=$assGet['name'];?>" src="<?=CMS_GROUPS_DIR.$assGet['image'];?>" width="50" height="45" style="border-radius:3px;" />
       	<? }?> 
  	</div>

  	<div id="footerRight">
		
        <h3>Connect With Us:</h3>
        
    	<ul id="footerSocialLinks">
      		<li><a id="footer_rss" href=""></a></li>
      		<li><a id="footer_stumble" href=""></a></li>
      		<li><a id="footer_twitter" href=""></a></li>
      		<li><a id="footer_facebook" href=""></a></li>
      		<li style="padding:0;"><a id="footer_google" href=""></a></li>
    	</ul>

  	</div>

</div>