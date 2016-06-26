<?php
function createMenu($parentId, $groupType)
{
	global $groups;
	global $conn;

	if ($parentId == 0)
		$groupResult = $groups->getByParentIdAndType($parentId, $groupType);	
	else
		$groupResult = $groups->getByParentId($parentId);		

	while($groupRow = $conn->fetchArray($groupResult))
	{	
		echo '<ul><li>';
		?>
    	<a href="<? echo $groupRow['urlname'];?>"><?=$groupRow['name'];?></a>
		<?
		echo "</li></ul>\n";
	}
}
?>

<?
	function createByBlock($id)
	{
		//echo "hello";
		//die();
		global $groups;
		global $conn;
		if($id==2)
			$block="Category Submenu";
		else if($id==3)
			$block="Destination Submenu";
		$act=$groups->getByBlock($block);
		echo '<ul>';
		while($actGet=$conn->fetchArray($act))
		{?>
        	<li><a href="<? if($block=="Activity Submenu"){?>activity<? }else{?>destination<? }?>-<?=$actGet['urlname'];?>.html"><?=$actGet['name'];?></a></li>		
		<? }
		echo '</ul>';
	}


?>