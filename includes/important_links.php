<style>
	.download{width:430px;}
	.download ul{ margin:0;}
	.download ul li{ list-style:none;}
</style>	
<?php //include("includes/breadcrumb.php"); ?>
<div class="main-content" style="width:100%; font-size:12px;text-align:justify">
	<h1 class="pagetitle">Important Links</h1>
	<div class="content">
	<?php
		echo '<div class="download"><ul>';
		$link=$groups->getByParentId(IMPORTANT_LINKS);
		while($linkGet=$conn->fetchArray($link))
		{?>
			<li><a href="<?=$linkGet['contents'];?>"><?=$linkGet['name'];?></a></li>
		<? }
		echo '</ul></div>';
	?>
	</div>
</div>