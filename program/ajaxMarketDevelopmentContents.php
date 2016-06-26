<tr>
	<td><strong>&#2325;&#2366;&#2352;&#2381;&#2351;&#2325;&#2381;&#2352;&#2350;&#2325;&#2379; &#2325;&#2379;&#2337; :</strong></td>
    <td><input type="text" name="program_code" class="text" value="<?=$groupRow['program_code'];?>" /></td>
</tr>

<tr>
	<td><strong>&#2325;&#2366;&#2352;&#2381;&#2351;&#2325;&#2381;&#2352;&#2350;&#2325;&#2379; &#2360;&#2381;&#2340;&#2352; :</strong></td>
    <td>
    	<select name="program_level">
        	<option value="select">&#2325;&#2366;&#2352;&#2381;&#2351;&#2325;&#2381;&#2352;&#2350;&#2325;&#2379; &#2360;&#2381;&#2340;&#2352; </option>
            <?
			$level=mysql_query("select program_level from programlevel where publish='Yes'");
			while($levelGet=mysql_fetch_array($level))
			{?>
				<option value="<?=$levelGet['program_level'];?>" <? if($groupRow['program_level']==$levelGet['program_level']){ echo 'selected="selected"';}?>>
					<?=$levelGet['program_level'];?>
              	</option>	
			<? }
			?>
        </select>
    </td>
</tr>

<tr>
	<td><strong>&#2360;&#2361;&#2349;&#2366;&#2327;&#2368; &#2360;&#2306;&#2326;&#2381;&#2351;&#2366; :</strong></td>
    <td><input type="text" name="participant_number" class="text" value="<?=$groupRow['participant_number'];?>" /></td>
</tr>

<tr>
	<td><strong>&#2346;&#2369;&#2352;&#2369;&#2359; &#2360;&#2306;&#2326;&#2381;&#2351;&#2366; :</strong></td>
    <td><input type="text" name="male_number" class="text" value="<?=$groupRow['male_number'];?>" /></td>
</tr>

<tr>
	<td><strong>&#2350;&#2361;&#2367;&#2354;&#2366; &#2360;&#2306;&#2326;&#2381;&#2351;&#2366; :</strong></td>
    <td><input type="text" name="female_number" class="text" value="<?=$groupRow['female_number'];?>" /></td>
</tr>

<tr>
	<td><strong>&#2342;&#2354;&#2367;&#2340;&#2325;&#2379; &#2360;&#2306;&#2326;&#2381;&#2351;&#2366; :</strong></td>
    <td><input type="text" name="lowcast_number" class="text" value="<?=$groupRow['lowcast_number'];?>" /></td>
</tr>

<tr>
	<td><strong>&#2332;&#2344;&#2332;&#2366;&#2340;&#2367;&#2325;&#2379; &#2360;&#2306;&#2326;&#2381;&#2351;&#2366; :</strong></td>
    <td><input type="text" name="indigenous_number" class="text" value="<?=$groupRow['indigenous_number'];?>" /></td>
</tr>

<tr>
	<td><strong>&#2309;&#2344;&#2381;&#2351; :</strong></td>
    <td><input type="text" name="other" class="text" value="<?=$groupRow['other'];?>" /></td>
</tr>