<table width="500" cellspacing="0" cellpadding="0" border="1">
    <tbody>
    <tr>    
      	<td class="heading2">&nbsp;Crop Report / <?=$region;?></td>
    </tr>
    <tr>
      <td>
      <table width="100%" cellspacing="7" cellpadding="10" border="0" style="font-size:13px">
        <?
		$ttl=mysql_query("select sum(total_area) as area, sum(production_amount) as production, total_areaunit, production_unit, crop_name, crop_code, 
		sum(productivity) as prod from statistics where district in (select id from district where dev_region='$region') and crop_code='002'");
		$ttlGet=mysql_fetch_array($ttl);
		?>
      	<tr>
        	<td class="tahomabold11" style="font-size:14px">वालिको नाम : <?=$ttlGet['crop_name'];?></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
        	<td>जम्मा क्षेत्रफल</td>
            <td>उत्पादन</td>
            <td>वालिको कोड</td>
            <td>उत्पादकत्व</td>
        </tr>
        <tr>
        	<td><?=$ttlGet['area'];?></td>
            <td><?=$ttlGet['production'];?></td>
            <td><?=$ttlGet['crop_code'];?></td>
            <td><?=$ttlGet['prod'];?></td>
        </tr>
        
        <tr><td>&nbsp;</td></tr>
      	<tr><td>&nbsp;</td></tr>
      
      	<?
			$ttl=mysql_query("select sum(total_area) as area, sum(production_amount) as production, total_areaunit, production_unit, crop_name, crop_code, 
			sum(productivity) as prod from statistics where district in (select id from district where dev_region='$region') and crop_code='001'");
			$ttlGet=mysql_fetch_array($ttl);
	  	?>
      	<tr>
        	<td class="tahomabold11" style="font-size:14px">वालिको नाम : <?=$ttlGet['crop_name'];?></td>
      	</tr>
      	<tr><td>&nbsp;</td></tr>
      	<tr>
        	<td>जम्मा क्षेत्रफल</td>
        	<td>उत्पादन</td>
        	<td>वालिको कोड</td>
        	<td>उत्पादकत्व</td>
      	</tr>
      	<tr>
        	<td><?=$ttlGet['area'];?></td>
        	<td><?=$ttlGet['production'];?></td>
        	<td><?=$ttlGet['crop_code'];?></td>
        	<td><?=$ttlGet['prod'];?></td>
      	</tr>
        
        <tr><td>&nbsp;</td></tr>
      	<tr><td>&nbsp;</td></tr>
        
        <?
			$ttl=mysql_query("select sum(total_area) as area, sum(production_amount) as production, total_areaunit, production_unit, crop_name, crop_code, 
			sum(productivity) as prod from statistics where district in (select id from district where dev_region='$region') and crop_code='003'");
			$ttlGet=mysql_fetch_array($ttl);
	  	?>
      	<tr>
        	<td class="tahomabold11" style="font-size:14px">वालिको नाम : <?=$ttlGet['crop_name'];?></td>
      	</tr>
      	<tr><td>&nbsp;</td></tr>
      	<tr>
        	<td>जम्मा क्षेत्रफल</td>
        	<td>उत्पादन</td>
        	<td>वालिको कोड</td>
        	<td>उत्पादकत्व</td>
      	</tr>
      	<tr>
        	<td><?=$ttlGet['area'];?></td>
        	<td><?=$ttlGet['production'];?></td>
        	<td><?=$ttlGet['crop_code'];?></td>
        	<td><?=$ttlGet['prod'];?></td>
      	</tr>
      
      </table>
      </td>
    </tr>
    </tbody>
</table>