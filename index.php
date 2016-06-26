<? include('clientobjects.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<title>
	District Agriculture Development Office, Gulmi-
	<?php if($pageName!=""){ echo $pageName;}else if(isset($_GET['action'])){ echo $_GET['action'];}else{ echo "Home";}?>
</title>
<? include('baselocation.php'); ?>
<meta name="description" content="Market Research and Stastistics Management Programme" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" media="screen,projection,print" href="css/layout4_setup.css" />
<link rel="stylesheet" type="text/css" media="screen,projection,print" href="css/layout4_text.css" />
</head>
<!-- Global IE fix to avoid layout crash when single word size wider than column width -->
<!--[if IE]><style type="text/css"> body {word-wrap: break-word;}</style><![endif]-->
<body>
<!-- Main Page Container -->
<div class="page-container">
  <!-- For alternative headers START PASTE here -->
  <!-- A. header--->
  <div class="header">
    <!-- A.1 header-TOP -->
    <div class="header-top">
      <!-- Sitelogo and sitename -->
      <a class="sitelogo" href="<?=SITE_URL;?>"></a>
      <div class="sitename">
        <h1>Government of Nepal</h1>
        <h2>Ministry of Agricultural Development</h2>
        <span class="title" style="font-size:17px">District Agriculture Development Office, Gulmi</span> <br />
        <h2>Tamgas, Gulmi, Nepal </h2>                                           
                                                        
      
      </div>
      <!-- Navigation Level 0 -->
      
    </div>
  
    <!-- A.3 header-BOTTOM -->
    <div class="header-bottom" style="margin-top:5px;">
      <!-- Navigation Level 2 (Drop-down menus) -->
      <div class="nav2">
        	<? createMenu(0, "Header"); ?>
      </div>
    </div>
    
  </div>
  <!-- For alternative headers END PASTE here -->
  <!-- B. MAIN -->
  <div class="main">
    <!-- B.1 MAIN NAVIGATION -->
    <div class="main-navigation">
      <!-- Navigation Level 3 -->
      <div class="round-border-topright"></div>
      
      <h1 class="first">Information Categories</h1>
      <!-- Navigation with grid style -->
      <dl class="nav3-grid">
      	<? $info=$groups->getByParentIdWithLimit(241,20);
		while($infoGet=$conn->fetchArray($info))
		{?>
        	<dt> <a href="<?=$infoGet['urlname'];?>"><?=$infoGet['name'];?></a></dt>
      	<? }?>
      </dl>
      
      <!-- Template infos -->
      <h1>Important Links</h1>
      <ul style="margin:0 5px 0 6px">
      	<? $links=$groups->getByParentIdWithLimit(275, 10);
		while($linksGet=$conn->fetchArray($links))
		{?>
   			<li><a href="<?=$linksGet['contents'];?>" target="_blank"><?=$linksGet['name'];?></a></li>
        <? }?>
      </ul>
 		
        
      <? $msg=$groups->getById(274); $msgGet=$conn->fetchArray($msg); ?>
      <h1><?=$msgGet['name'];?></h1>
      <img src="<?=CMS_GROUPS_DIR.$msgGet['image'];?>" width="167" style="margin:0px 7px 7px 14px" />
      <p style="text-align:justify"><?=substr($msgGet['shortcontents'],0,180);?>...<br />
      <a style="float:right" href="<?=$msgGet['urlname'];?>">more...</a></p>
      
      <div style="background:#669933;height:52px;padding:9px 0 0;text-align:center;width:200px;;">
     	  <p><a href="bills.html" style="color:white; text-align:center; font-size:16px; font-weight:bold; line-height:1.4">भुक्तानीका लागि प्राप्त विलहरुको सार्वजनिकरण</a></p>
      </div>
    
    </div>
    
    <div class="dynamic" style="font-size:12px; line-height:1.5">
    	
        <?php 
			if(isset($_GET['action']))
			{
				$action = $_GET['action'];
				$action = str_replace(".","", $action);
				include("includes/".$action.".php");			
			}				
			else if(isset($pageLinkType))
			{
				if ($pageLinkType == ""){}
				else{ include("includes/cmspage.php"); }
			}
			else{ include("includes/main.php"); }
		?>
        
  	</div>
    <div style="clear:both"></div>
  </div>
  <!-- C. FOOTER AREA -->
  <div class="footer" style="margin-top:5px;">
    <p>Copyright &copy; 20<?=date("y");?> DADO Gulmi | All Rights Reserved</p>
    <p class="credits"> <a href="<?=SITE_URL?>">गृह पृष्‍ठ</a> | <a href="contact">सम्पर्क ठेगाना</a> | <a href="feedback">सुझाब तथा सल्लाह</a></p>
  </div>
</div>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-159243-24";
urchinTracker();
</script>
<div align=center style="margin:10px 0">Powered By : <a href='http://www.krishighar.com' target="_blank">Development Team: krishighar.com</a></div></body>
</html>
<? //session_destroy(); ?>