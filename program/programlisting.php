<table width="100%" border="0" cellspacing="0" cellpadding="2">
  	<tr>
    	<td colspan="8" class="heading2">
			&nbsp;<?php
			if (!isset($_GET['groupType']))
			{
				echo "Program List";
			}
			else
			{
				echo "Showing Programs of " . $program->getNameById($_GET['groupType']);
			}
			?>
       	</td>
  	</tr>
  	<tr bgcolor="#F1F1F1">
    	<td class="tahomabold11" style="width:10px">S.No</td>
        <td class="tahomabold11" style="width:200px">&#2325;&#2366;&#2352;&#2381;&#2351;&#2325;&#2381;&#2352;&#2350;&#2325;&#2379; &#2344;&#2366;&#2350;</td>
    	<td class="tahomabold11" style="width:200px">&#2325;&#2366;&#2352;&#2381;&#2351;&#2325;&#2381;&#2352;&#2350;&#2325;&#2379; &#2346;&#2381;&#2352;&#2325;&#2366;&#2352;</td>
   	 	<td class="tahomabold11" style="width:200px">
        	&#2325;&#2366;&#2352;&#2381;&#2351;&#2325;&#2381;&#2352;&#2350; &#2342;&#2367;&#2344;&#2375;
         	&#2344;&#2367;&#2325;&#2366;&#2351;
      	</td>
        <td class="tahomabold11" style="width:60px">&#2350;&#2367;&#2340;&#2368;</td>
        <td class="tahomabold11" style="width:40px">Publish</td>
    	<td class="tahomabold11" style="width:40px">Weight</td>
    	<td class="tahomabold11" style="width:98px">Action</td>
  	</tr>
  	<?php
	$counter = 0;
	$result = $program->getByType($selectedGroupType);
	while ($row = $conn->fetchArray($result))
	{
		$counter++;
		?>
  		<tr <?php if ($counter % 2 == 0) { echo "bgcolor='#F7F7F7'";} ?>>
            <td valign="top" align="center"><?php echo $counter; ?></td>
            <td valign="top" align="center"><?=$row['program_name'];?></td>
            <td valign="top" align="center"><?php $type=$program->getTypeById($row['program_type']); echo $type['program_name']; ?></td>
            <td valign="top" align="center">
				<?
                	$user=$users->getById($row['program_from']); $userGet=$conn->fetchArray($user);
					echo $userGet['name'];
				?>
         	</td>
            <td valign="top" align="center"><?=$row['date'];?></td>
            <td valign="top" align="center"><?=$row['publish'];?></td>
            <td valign="top" align="center"><?php echo $row['weight']; ?></td>
            <td valign="top" align="center">
      			<a href="program.php?groupType=<?=$_GET['groupType']?>&id=<?php echo $row['id']; ?>">Edit</a> /      			
      			<a href="program/manage_program.php?id=<?php echo $row['id']; ?>&groupType=<?php echo $_GET['groupType'];?>&delete">Delete</a>
        	</td>
  		</tr>
  		
	<?php }?>
</table>
