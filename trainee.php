<?php
include('clientobjects.php');
	
	//for weight
	$dist=$users->getById($_SESSION['userId']);
	$distName= $conn->fetchArray($dist);
	$weight = $program -> getLastWeightStatistics($distName['district']);
	if($_GET['type'] == "edit")
	{
		$result = $program->getByIdStatistics($_GET['id']);
		$editRow = $conn->fetchArray($result);	
		extract($editRow);
	}
	if($_POST['type'] == "Save")
	{
		extract($_POST);
		$vall="";
		$sess=$_SESSION['userId']; $user=mysql_query("select * from usergroups where id='$sess'");
		$userGet=mysql_fetch_array($user);
		$district=$userGet['district'];
		//print_r($_POST); die();
		
		if(empty($vdc_muncipality))
			$errMsg .= "<li>&#2327;&#2366;&#2357;&#2367;&#2360; / &#2344;&#2346;&#2366;</li>";
		
		if(empty($errMsg))
		{
			
			$pid = $program -> saveStatistics($id, $district, $vdc_muncipality, $total_familyno, $total_population, $farmer_familyno, $farmer_population, $crop_name, $crop_code, $total_areaunit, $irrigated_area, $nonirrigated_area, $total_area, $production_unit, $production_amount, $farmer_unit, $farmer_price, $market_unit, $market_price, $productivity, $publish, $weight);
			if($id > 0)
				$pid = $id;
			//$groups -> saveImage($pid);
			//$groups -> saveMap($pid);
			if($id>0)
			{?>
            	<script> location.href = 'trainee.php?type=edit&id=<?=$id;?>&msg=Statistics details updated successfully'; </script>
				<!--header("Location: trainee.php?type=edit&id=$id&msg=Statistics details updated successfully");-->
			<? }
			else
			{?>
            	<script> location.href = 'trainee.php?type=edit&id=<?=$id;?>&msg=Statistics details saved successfully'; </script>
				<!--header("Location: trainee.php?msg=Statistics details saved successfully");-->
			<? }
			exit();
		}		
	}
	
	if($_GET['type'] == "toogle")
	{
		if($package->toggleStatus($_GET['id']) > 0)
			header("location: trainee.php?region=".$_GET['region']."&category=".$_GET['category']."&msg=Status toogled successfully.");
	}
	
	if($_GET['type'] == "toogleFeatured")
	{
		$id = $_GET['id'];
		$changeTo = $_GET['changeTo'];
		
		$sql = "UPDATE groups SET featured='$changeTo' WHERE id='$id'";
		$conn->exec($sql);
		header("location: trainee.php?msg=Product feature status toogled successfully.");
		
	}
	
	
	if($_GET['type'] == "tooglePublish")
	{
		$id = $_GET['id'];
		$changeTo = $_GET['changeTo'];
		
		$sql = "UPDATE bills SET publish='$changeTo' WHERE id='$id'";
		$conn->exec($sql);
		header("location: trainee.php?&msg=Bill Show/Hide status toogled successfully.");
		
	}
	
		
	if($_GET['type'] == "removeImage")
	{
		$groups->deleteImage($_GET['id']);
		//echo "hello";
		//header("location: trainee.php?type=edit&id=".$_GET['id']."&msg=product image deleted successfully.");?>
		<script> document.location='trainee.php?type=edit&id=<?=$_GET['id']?>&msg=product image deleted successfully.' </script>
	<? }
	
	if($_GET['type'] == "removeMap")
	{
		$groups->deleteMap($_GET['id']);
		//echo "hello";
		//header("location: trainee.php?type=edit&id=".$_GET['id']."&msg=product image deleted successfully.");?>
		<script> document.location='trainee.php?type=edit&id=<?=$_GET['id']?>&msg=product map deleted successfully.' </script>
	<? }
	
	if($_GET['type']=="del")
	{
			$program -> deleteStatistics($_GET['id']);
			//echo "hello";
			//header("Location : trainee.php?&msg=Bill deleted successfully.");?>
			<script> document.location='trainee.php?&msg=Record deleted successfully.' </script>    
	<? }

	
?>
<?php
//include("admin/initprogram.php");

$showSaveForm = false;
$showListing = false;

if (isset($_GET['id']))
{
	$groupResult = $program->getById($_GET['id']);
	$groupRow = $conn->fetchArray($groupResult);

	$selectedGroupType = $groupRow['parentId'];

	$showSaveForm = true;
	$showListing = true;
}
if (isset($_GET['groupType']))
{
	$selectedGroupType = $_GET['groupType'];
	$showSaveForm = true;
	$showListing = true;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<title>
	Market Research and Stastistics Management Programme-
	<?php if($pageName!=""){ echo $pageName;}else if(isset($_GET['action'])){ echo $_GET['action'];}else{ echo "Home";}?>
</title>
<? include('baselocation.php'); ?>
<meta name="description" content="Market Research and Stastistics Management Programme" />
<!--<meta http-equiv="content-type" content="text/html; charset=utf-8" />-->
<link rel="stylesheet" type="text/css" media="screen,projection,print" href="css/layout4_setup.css" />
<link rel="stylesheet" type="text/css" media="screen,projection,print" href="css/layout4_text.css" />
	<script language="javascript" src="js/cms.js"></script>
</head>
<!-- Global IE fix to avoid layout crash when single word size wider than column width -->
<!--[if IE]><style type="text/css"> body {word-wrap: break-word;}</style><![endif]-->
<body>
<!-- Main Page Container -->
<div class="page-container">
  <!-- For alternative headers START PASTE here -->
  <!-- A. header--->
  <div class="header">
    <!-- A.1 header-TOP -->
    <div class="header-top">
      <!-- Sitelogo and sitename -->
      <a class="sitelogo" href="http://www.krishighar.com/mrsmp"></a>
      <div class="sitename">
        <h1>Government of Nepal</h1>
        <h2>Ministry of Agricultural Development</h2>
        <span class="title" style="font-size:17px">Market Research and Stastistics Management Programme</span> <br />
        <h2>Hariharbhawan, Lalitpur, Nepal </h2>                                           
                                                        
      
      </div>
      <!-- Navigation Level 0 -->
      <div class="nav0">
        <img src="img/flag.gif" />
      </div>
      
    </div>
    <!-- A.2 header-MIDDLE -->
    <!--<div class="header-middle">
      <div class="sitemessage">
        <h1>EASY &bull; FLEXIBLE &bull; ROBUST</h1>
        <h2>The third generation Multiflex is<br />
          here, now with cooler Design<br />
          features and easier code.</h2>
        <h3> <a href="#">&rsaquo;&rsaquo;&nbsp;More details</a></h3>
      </div>
    </div>-->
    <!-- A.3 header-BOTTOM -->
    <div class="header-bottom" style="margin-top:5px;">
      <!-- Navigation Level 2 (Drop-down menus) -->
      <div class="nav2">
        	<? createMenu(0, "Header"); ?>
      </div>
    </div>
    
  </div>
  <!-- For alternative headers END PASTE here -->
  <!-- B. MAIN -->
  <div class="main" style="width:900px; padding-bottom:0; background:none; margin:0; line-height:20px; font-size:11px;">


<style>
	.master{ width:100%}
	.send_info {
	  background: green;
float: left;
height: 58px;
line-height: 24px;
margin: 3%;
padding: 48px 0;
text-align: center;
width: 26%;
border-radius: 15px;
	}
	.master .send_info:hover{ background:#87f284;}
	.master .send_info:hover a{ color:#000; text-decoration:underline}
	.master div.last-child{ margin-right:0;}
	.send_info a{ color:#FFF; font-size:24px; font-weight:bold}
	.send_info a:hover{ }
	.questions{}
	.sent_info{}
	.logout{background: none repeat scroll 0 0 #dfdbd2;
    border-radius: 4px 0;
    color: #005900;
    font-size: 17px;
    padding: 2px 8px; border:1px solid #00BB00;}
	.logout:hover{ color:#FB0000; text-decoration:underline}
</style>

<?php //include("includes/breadcrumb.php"); ?>
<div class="content">

 	<table width="100%" border="0" align="center" cellpadding="0"
	cellspacing="5" bgcolor="#FFFFFF">
  	<tr>
    <td width="20%" valign="top">
		<ul class="menu">
            <li>
            	<?
					$sess=$_SESSION['userId']; $user=mysql_query("select * from usergroups where id='$sess'");
					$userGet=mysql_fetch_array($user);
				?>
                <p><?=$userGet['name'];?></p>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="changepswd.php">Change Password</a></li>
                    <li><a href="logoutUser.php">Logout</a></li>
                </ul>
            </li>
            <? if($userGet['user_type']!=3)
			{?>
            	<li>
                	<p>Manage Links</p>
                	<ul>
                    	<li><a href="program.php">&#2325;&#2366;&#2352;&#2381;&#2351;&#2325;&#2381;&#2352;&#2350;&#2361;&#2352;&#2369;</a></li>
                    	<li><a href="statistics.php">&#2340;&#2341;&#2381;&#2351;&#2366;&#2344;&#2381;&#2325;</a></li>
                	</ul>
            	</li>
            <? }?>
            
            <li>
                <p>Manage Report</p>
                <ul>
                    <li><a href="report.php">Manage Report</a></li>
                </ul>
            </li>
        </ul>
 	</td>
    
    <td width="80%" valign="top">
    
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
            <td class="bgborder">
                <table width="100%" border="0" cellspacing="1" cellpadding="0">
                    <tr>
                        <td bgcolor="#FFFFFF">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td valign="top">
                                    
                                        <table width="100%" border="0" cellpadding="2" cellspacing="0" style="font-size:11px;">
                                            
                                            <tr>
                                                <td class="heading2">
                                                    <div style="float: right;">
                                                        <?php
                                                            $addLink = "trainee.php";
                                                            $formLink = "manage_program.php";
                                                        
                                                            if (isset($_GET['groupType']))
                                                            {
                                                             $addLink .= "?groupType=" . $_GET['groupType'];
                                                             $formLink .= "?groupType=" . $_GET['groupType'];
                                                            }
                                                            if(isset($_GET['page']))
                                                            {
                                                                $addLink .= "&page=" . $_GET['page'];
                                                                $formLink .= "&page=" . $_GET['page'];
                                                            } 
                                                        ?>
                                                        <a href="<?php echo $addLink ?>" class="headLink"> Add New </a>
                                                    </div>
                                                    &nbsp;Manage Trainee
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                              <td>
                                              <form action="<?= $_REQUEST['uri']?>" method="post" enctype="multipart/form-data">
                                              <table width="100%" border="0" cellpadding="2" cellspacing="4">
                                                  <?php if(!empty($errMsg)){ ?>
                                                  <tr align="left">
                                                    <td colspan="3" class="err_msg"><?php echo $errMsg; ?></td>
                                                  </tr>
                                                  <?php } ?>
                                                  <?php
													if(isset($_GET['msg']))
													{ ?>
													 <tr align="left">
                                                     	<td colspan="3"  class="err_msg"><?php echo $_GET['msg']; ?>&nbsp;</td>
                                                   	 </tr>
													<? }?>                          
                                                    <tr><td></td></tr>
                                                    <tr>
                                                      <td>&nbsp;</td>
                                                      <td><strong>&#2325;&#2366;&#2352;&#2381;&#2351;&#2325;&#2381;&#2352;&#2350; : 
                                                      <span class="asterisk">*</span></strong></td>
                                                      <td>
                                                      	<label for="program"></label>
                                                        <select name="program">
                                                        	<option value="select">&#2325;&#2366;&#2352;&#2381;&#2351;&#2325;&#2381;&#2352;&#2350;</option>
                                                            <?
																//$dist=$userGet['district'];
																$program=mysql_query("select program_name from program order by weight");
																while($programGet=mysql_fetch_array($program))
																{?>
																	<option value="<?=$programGet['id'];?>" <? if($programGet['name']==$program){ 
																	echo 'selected="selected"';} ?>>
																		<?=$programGet['program_name'];?>
                                                                 	</option>
																<? }
															?>
                                                        </select>
                                                      </td>
                                                      
                                                    </tr>
                                                    <tr><td></td></tr>                           
                                                    
                                                    <tr>
                                                      <td>&nbsp;</td>
                                                      <td>
                                                      	<strong>
                                                        	&#2360;&#2361;&#2349;&#2366;&#2327;&#2368;&#2325;&#2379; &#2344;&#2366;&#2350;  
                                                            : <span class="asterisk">*</span>
                                                       	</strong>
                                                   	  </td>
                                                      <td>
                                                      	<div style="float:left"><label for=""></label>
                                                        <input type="text" name="name" class="text" value="<?=$name;?>" /> </div>
                                                      </td>
                                                    </tr>
                                                    
                                                    <tr><td></td></tr>
                                                    
                                                    <tr>
                                                      <td></td>
                                                      <td><strong>&#2354;&#2367;&#2329;&#2381;&#2327; : 
                                                      <span class="asterisk">*</span></strong></td>
                                                      <td>
                                                   		<label>
                                                          	<input name="sex" type="radio" id="featured_0" value="male" checked="checked" />
                                                          	&#2346;&#2369;&#2352;&#2369;&#2359;</label>
                                                        <label>
                                                        <input type="radio" name="sex" value="female" id="featured_1" <? if($sex == 'female') 
														echo 'checked="checked"';?> /> &#2350;&#2361;&#2367;&#2354;&#2366;</label>
                                                      </td>
                                                    </tr>
                                                    <tr><td></td></tr>
                                                    
                                                    <tr>
                                                      <td></td>
                                                      <td><strong>&#2336;&#2375;&#2327;&#2366;&#2344;&#2366; : 
                                                      <span class="asterisk">*</span></strong></td>
                                                      <td>
                                                            <div style="float:left"><label for=""></label>
                                                            <input type="text" name="address" class="text" value="<?=$address;?>" /></div> 
                                                      </td>
                                                    </tr>
                                                    <tr><td></td></tr>
                                                    
                                                    <tr>
                                                      <td></td>
                                                      <td><strong>&#2347;&#2379;&#2344; : 
                                                      <span class="asterisk">*</span></strong></td>
                                                      <td>
                                                            <div style="float:left"><label for=""></label>
                                                            <input type="text" name="phone" class="text" value="<?=$phone;?>" /></div> 
                                                      </td>
                                                    </tr>
                                                    <tr><td></td></tr>
                                                    
                                                    <tr>
                                                      <td></td>
                                                      <td><strong>&#2350;&#2369;&#2326;&#2381;&#2351; &#2348;&#2366;&#2354;&#2368; : 
                                                      <span class="asterisk">*</span></strong></td>
                                                      <td>
                                                            <div style="float:left"><label for=""></label>
                                                            <input type="text" name="crops" class="text" value="<?=$crops;?>" /></div> 
                                                      </td>
                                                    </tr>
                                                    <tr><td></td></tr>
                                                    
                                                    <tr>
                                                      <td></td>
                                                      <td><strong>Publish :</strong></td>
                                                      <td>
                                                        <label>
                                                          <input name="publish" type="radio" id="featured_0" value="No" checked="checked" />
                                                          No</label>
                                                        <label>
                                                          <input type="radio" name="publish" value="Yes" id="featured_1" <? if($publish == 'Yes') 
														  echo 'checked="checked"';?> /> Yes</label>
                                                      </td>
                                                    </tr>
                                                    <tr><td></td></tr>      
                                                   
                                                    <tr>
                                                      <td></td>
                                                      <td><strong>Weight :</strong></td>
                                                      <td><input name="weight" type="text" class="text" id="weight" value="<?php echo $weight; ?>" style="width:35px;" /></td>
                                                    </tr>
                                                    <tr><td></td></tr>
                                                    
                                                    <tr>
                                                      <td></td>
                                                      <td></td>
                                                      <td>
                                                        <input name="type" type="submit" class="button" id="button" value="Save" />
                                                        <?php if($_GET['type'] == "edit"){ ?>
                                                        <input type="hidden" value="<?= $id?>" name="id" id="id" />
                                                        <?php }else{ ?>                                
                                                        <input name="reset" type="reset" class="button" id="button2" value="Clear" />
                                                        <?php } ?>
                                                        </td>
                                                    </tr>
                                                                            
                                                </table>
                                                </form></td>
                                            </tr>
                                                                    
                                                                </table>
                                                            
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td height="5"></td>
        </tr>
        
        <tr>
            <td class="bgborder">
                <table width="100%" border="0" cellspacing="1" cellpadding="0">
                    <tr>
                        <td bgcolor="#FFFFFF">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td valign="top">
										<!--statistics listing-->
                                        <table width="100%" border="0" cellspacing="0" cellpadding="2">
                                            <tr>
                                                <td colspan="10" class="heading2">
                                                    &nbsp; &#2360;&#2361;&#2349;&#2366;&#2327;&#2368;&#2361;&#2352;&#2369;
                                                </td>
                                            </tr>
                                            <tr bgcolor="#F1F1F1">
                                                <td class="tahomabold11">S.No</td>
                                                <td class="tahomabold11">&#2325;&#2366;&#2352;&#2381;&#2351;&#2325;&#2381;&#2352;&#2350;</td>
                                                <td class="tahomabold11">&#2360;&#2361;&#2349;&#2366;&#2327;&#2367;&#2325;&#2379; &#2344;&#2366;&#2350;</td>
                                                <td class="tahomabold11">&#2354;&#2367;&#2329;&#2381;&#2327;</td>
                                                <td class="tahomabold11">&#2336;&#2375;&#2327;&#2366;&#2344;&#2366;</td>
                                                <td class="tahomabold11">&#2347;&#2379;&#2344;</td>
                                                <td class="tahomabold11">&#2350;&#2369;&#2326;&#2381;&#2351; &#2348;&#2366;&#2354;&#2368;</td>
                                                <td class="tahomabold11">Publish</td>
                                                <td class="tahomabold11">Weight</td>
                                                <td class="tahomabold11">Action</td>
                                            </tr>
											
										</table>
                                        
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    	
    </table>
    
    </td>
  	</tr>
    </table>
       	

</div>

</div>
  <!-- C. FOOTER AREA -->
  <div class="footer" style="margin-top:5px;">
    <p>Copyright &copy; 20<?=date("y");?> MRSMP | All Rights Reserved</p>
    <p class="credits">
    	<a href="<?=SITE_URL?>">&#2327;&#2371;&#2361; &#2346;&#2371;&#2359;&#2381;&#2336;</a> | 
    	<a href="contact">&#2360;&#2350;&#2381;&#2346;&#2352;&#2381;&#2325; &#2336;&#2375;&#2327;&#2366;&#2344;&#2366;</a> | 
        <a href="feedback">&#2360;&#2369;&#2333;&#2366;&#2357; &#2340;&#2341;&#2366; &#2360;&#2354;&#2381;&#2354;&#2366;&#2361;</a></p>
  </div>
</div>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-159243-24";
urchinTracker();
</script>
<div align=center style="margin:10px 0">Powered By : <a href='http://www.krishighar.com' target="_blank">Development Team: krishighar.com</a></div></body>
</html>