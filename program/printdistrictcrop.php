<table width="1000" cellspacing="0" cellpadding="0" border="1">
    <tbody>
    <tr>
		<? $district=$_GET['did']; $dist=mysql_query("select district_name from district where id='$district'"); $distGet=mysql_fetch_array($dist); ?>    
      	<td class="heading2">&nbsp;Crop Report / <?=$distGet['district_name'];?></td>
    </tr>
    <tr>
      <td>
      <table width="100%" cellspacing="9" cellpadding="4" border="0">
         
      	<tbody>
          	<tr bgcolor="#F1F1F1">
                <td class="tahomabold11">S.No</td>
                <td class="tahomabold11">गाविस / नपा</td>
                <td class="tahomabold11">वालिको नाम</td>
                <td class="tahomabold11" style="text-align:center">
                	<p style="text-align:left; padding:0 0 0 57px;">चैते</p>
                    <table style="width:130px">
                    	<td>क्षेत्रफल</td>
                        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                        <td>उत्पादन</td>
                    </table>
              	</td>
                <td class="tahomabold11" style="text-align:center">
                	<p style="text-align:left; padding:0 0 0 57px;">वर्षय</p>
                    <table style="width:130px">
                    	<td>क्षेत्रफल</td>
                        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                        <td>उत्पादन</td>
                    </table>
              	</td>
                <td class="tahomabold11" style="text-align:center">
                	<p style="text-align:left; padding:0 0 0 57px;">हाईब्रेड</p>
                    <table style="width:130px">
                    	<td>क्षेत्रफल</td>
                        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                        <td>उत्पादन</td>
                    </table>
              	</td>
                <td class="tahomabold11">वालिको कोड</td>
                <td class="tahomabold11">उत्पादकत्व</td>
          	</tr>
       		<?
            $crop=$program->getCropStatistics($_GET['did']); $counter=1;
			while($cropGet=$conn->fetchArray($crop))
			{?>
            	<tr>
                    <td align="center" valign="top"><?=$counter;?></td>
                    <td align="center" valign="top"><?=$cropGet['vdc_muncipality'];?></td>
                    <td align="center" valign="top"><?=$cropGet['crop_name'];?></td>
                    
                    <td align="center" valign="top">
                        <table style="width:130px">
                        	<? $code=str_replace(" ", "", $cropGet['crop_code']); ?>
                            <td align="left"><? if($code=="002"){ echo $cropGet['total_area']." ".$cropGet['total_areaunit'];}else { echo "-";}?></td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td align="left"><? if($code=="002"){ echo $cropGet['production_amount']." ".$cropGet['production_unit'];}else{ echo "-";}?> </td>
                        </table>
                    </td>
                    
                    <td align="center" valign="top">
                        <table style="width:130px">
                            <td align="left"><? if($code=="001"){ echo $cropGet['total_area']." ".$cropGet['total_areaunit'];}else { echo "-";}?></td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td align="left"><? if($code=="001"){ echo $cropGet['production_amount']." ".$cropGet['production_unit'];}else{ echo "-";}?> </td>
                        </table>
                    </td>
                    
                    <td align="center" valign="top">
                        <table style="width:130px">
                            <td align="left"><? if($code=="003"){ echo $cropGet['total_area']." ".$cropGet['total_areaunit'];}else { echo "-";}?></td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td align="left"><? if($code=="003"){ echo $cropGet['production_amount']." ".$cropGet['production_unit'];}else{ echo "-";}?> </td>
                        </table>
                    </td>
                    
                    <td align="center" valign="top"><?=$cropGet['crop_code'];?></td>
                    <td align="center" valign="top"><?=$cropGet['productivity'];?></td>
                    
            	</tr>
            <? $counter++; }?>
      		<tr><td>&nbsp;</td></tr>
            <tr bgcolor="#F1F1F1">
            	<td class="tahomabold11">चैते धान क्षेत्रफल</td>
                <td class="tahomabold11">उत्पादन</td>
                <td class="tahomabold11">वर्षय धान क्षेत्रफल</td>
                <td class="tahomabold11">उत्पादन</td>
                <td class="tahomabold11">हाईब्रेड धान क्षेत्रफल</td>
                <td class="tahomabold11">उत्पादन</td>
            </tr>
            <tr>
            	<?
					//$did=$_GET['did'];
					$total=mysql_query("select sum(total_area) as chaitraarea, sum(production_amount) as chaitraproduction, total_areaunit, production_unit 
					from statistics where crop_code='002'"); $tGet=mysql_fetch_array($total);
				?>
            	<td align="center" valign="top">
					<?=$tGet['chaitraarea']." ".$tGet['total_areaunit'];?>
              	</td>
                <td align="center" valign="top">
                	<?=$tGet['chaitraproduction']." ".$tGet['production_unit'];?>
                </td>
                
                <?
					//$did=$_GET['did'];
					$total=mysql_query("select sum(total_area) as chaitraarea, sum(production_amount) as chaitraproduction, total_areaunit, production_unit 
					from statistics where crop_code='001'"); $tGet=mysql_fetch_array($total);
				?>
            	<td align="center" valign="top">
					<?=$tGet['chaitraarea']." ".$tGet['total_areaunit'];?>
              	</td>
                <td align="center" valign="top">
                	<?=$tGet['chaitraproduction']." ".$tGet['production_unit'];?>
                </td>
                
                <?
					//$did=$_GET['did'];
					$total=mysql_query("select sum(total_area) as chaitraarea, sum(production_amount) as chaitraproduction, total_areaunit, production_unit 
					from statistics where crop_code='003'"); $tGet=mysql_fetch_array($total);
				?>
            	<td align="center" valign="top">
					<?=$tGet['chaitraarea']." ".$tGet['total_areaunit'];?>
              	</td>
                <td align="center" valign="top">
                	<?=$tGet['chaitraproduction']." ".$tGet['production_unit'];?>
                </td>
                
            </tr>                          
      		
      </tbody></table>
      </td>
    </tr>
    </tbody>
</table>