<?php //include("includes/breadcrumb.php"); ?>

<div class="main-content" style="width:100%; font-size:12px; text-align:justify">
	<h1 class="pagetitle"><?php echo $pageName; ?></h1>

<div class="content">
<?php
$pagename = "index.php?id=". $pageId ."&";
include("includes/pagination.php");

echo Pagination($pageContents, "content");
?>
</div>
</div>