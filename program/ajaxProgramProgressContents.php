<tr>
	<td><strong>&#2348;&#2366;&#2354;&#2367;&#2325;&#2379; &#2344;&#2366;&#2350; :<span class="asterisk">*</span></strong></td>
    <td><input type="text" name="crop_name" class="text" value="<?=$groupRow['crop_name'];?>" /></td>
</tr>

<tr>
	<td><strong>&#2360;&#2361;&#2349;&#2366;&#2327;&#2368; &#2325;&#2371;&#2359;&#2325; &#2360;&#2306;&#2326;&#2381;&#2351;&#2366; :</strong> <span class="asterisk">*</span></td>
    <td><input type="text" name="participant_number" class="text" value="<?=$groupRow['participant_number'];?>" /></td>
</tr>

<tr>
	<td><strong>&#2325;&#2381;&#2359;&#2375;&#2340;&#2381;&#2352;&#2347;&#2354; :<span class="asterisk">*</span></strong></td>
	<td>
        <p>
            <strong>&#2319;&#2325;&#2366;&#2311; :</strong> 
            <select name="area_unit" class="subinput">
                <option value="hector" selected="selected">hector</option>
                <option value="ropani" <? if($groupRow['area_unit']=="ropani"){ echo 'selected="selected"';}?>>ropani</option>
            	<option value="bighaa" <? if($groupRow['area_unit']=="bighaa"){ echo 'selected="selected"';}?>>bighaa</option>
            </select>
            <strong>&#2346;&#2352;&#2367;&#2350;&#2366;&#2339; :</strong>
            <input type="text" name="area_amount" class="subinput" value="<?=$groupRow['area_amount'];?>"/>
        </p>
    </td>
</tr>

<tr>
	<td><strong>&#2313;&#2340;&#2381;&#2346;&#2366;&#2342;&#2344; :<span class="asterisk">*</span></strong></td>
	<td>
        <p>
            <strong>&#2319;&#2325;&#2366;&#2311; :</strong> 
            <select name="production_unit" class="subinput">
                <option value="hector" selected="selected">hector</option>
                <option value="ropani" <? if($groupRow['production_unit']=="ropani"){ echo 'selected="selected"';}?>>ropani</option>
            	<option value="bighaa" <? if($groupRow['production_unit']=="bighaa"){ echo 'selected="selected"';}?>>bighaa</option>
            </select>
            <strong>&#2346;&#2352;&#2367;&#2350;&#2366;&#2339; :</strong>
            <input type="text" name="production_amount" class="subinput" value="<?=$groupRow['production_amount'];?>"/>
        </p>
    </td>
</tr>