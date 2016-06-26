<link href="css/main_styles.css" rel="stylesheet" type="text/css" />
<div id="header">
	<div id="headerTop">
    	<div id="headerTopLeft">
        	<? //$head=$groups->getById(235); $headGet=$conn->fetchArray($head);?>
            <img src="images/common_header_logo.png" width="480" height="120" />
        </div>
    	<div id="headerTopRight">
      		<div class="headerTopRight_Search">
            	<form name="" action="index.php?action=search" method="post">
        			<input name="keyword" type="text" class="searchBox" />
        			<input name="submit" type="submit" class="searchBtn" value="" style="cursor:pointer" />
      			</form>
            </div>
    	</div>
  	</div>
    
    <div id="headerBtm">
 		<div id="navigation">
      		
			<? if(isset($_GET['pageId'])){ $pageId=$_GET['pageId']; }?>
            <? createMenu(0, "Header", $pageId); ?>
               
    	</div>
  	</div>
    
    <div class="certificates">
    	<marquee>
        	<? $certificate=mysql_query("select * from groups where id=274"); $certificateGet=mysql_fetch_array($certificate); echo $certificateGet['shortcontents']; ?>
        </marquee>
    </div>
    
</div>