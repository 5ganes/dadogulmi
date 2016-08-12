<!-- B.2 MAIN CONTENT -->
<div class="main-content">
      
  	<div class="column1-unit">
    
    	<!-- Start WOWSlider.com HEAD section -->
        <link rel="stylesheet" type="text/css" href="jquery/engine1//style.css" media="screen" />
        <script type="text/javascript" src="jquery/engine1//jquery.js"></script>
        <!-- End WOWSlider.com HEAD section -->
        <!-- Start WOWSlider.com BODY section id=wowslider-container1 -->
        <div id="wowslider-container1">
            <div class="ws_images">
                <ul>
                    <?php
                    $slide=$groups->getByParentId(SLIDER); $i=0;
                    while($slideGet=$conn->fetchArray($slide))
                    {?>
                        <li><img src="<?=CMS_GROUPS_DIR.$slideGet['image'];?>" id="wows1_<?=$i;?>" width="673" height="280"/></li>
                    <? $i++; }?>
                </ul>
            </div>
            <a href="#" class="ws_frame"></a>
            <div class="ws_shadow"></div>
        </div>
        <script type="text/javascript" src="jquery/engine1//wowslider.js"></script>
        <script type="text/javascript" src="jquery/engine1//script.js"></script>
        <!-- End WOWSlider.com BODY section -->
        
  	</div>
      
      <!-- Pagetitle -->
      <? $wel=$groups->getById(176); $welget=$conn->fetchArray($wel);?>
      <h1 class="pagetitle"><?=$welget['name'];?></h1>
      <!-- Content unit - One column -->
      <div class="column1-unit" style="text-align:justify;">
      		<? echo $welget['shortcontents'];?>
      </div>
      <a href="<?=$welget['urlname'];?>" style="float:right">See More...</a>
      <hr class="clear-contentunit" />
      
      <!-- Content unit - One column -->
      <div class="column1-unit">
        <h1 style="font-size:190%">सुचना तथा समाचार</h1>
        <ul>
        	<? $news=$groups->getByParentIdWithLimit(NEWS,4);
			    while($newsGet=$conn->fetchArray($news))
			    {?>
            	<li><a href="<?=$newsGet['urlname'];?>"><?=$newsGet['name'];?></a></li>
        	<? }?>
        	<li><a style="font-weight:bold; font-size:13px; margin-top:10px" href="<?=$url['urlname'];?>">see more...</a></li>
     	</ul>
      </div>
      <hr class="clear-contentunit" />
      
</div>