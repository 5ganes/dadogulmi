<?php
include("admin/initprogram.php");
if(!isset($_SESSION['sessUserId']))//User authentication
{
 header("Location: programlogin.php");
 exit();
}

$showSaveForm = false;
$showListing = false;

if (isset($_GET['id']))
{
	$groupResult = $groups->getById($_GET['id']);
	$groupRow = $conn->fetchArray($groupResult);

	$selectedGroupType = $groupRow['type'];

	$showSaveForm = true;
	$showListing = true;
}
if (isset($_GET['programType']))
{
	$selectedProgramType = $_GET['programType'];
	$showSaveForm = true;
	$showListing = true;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php echo ADMIN_TITLE; ?> :: <?php echo PAGE_TITLE; ?></title>
<link href="css/admin.css" rel="stylesheet" type="text/css">
<script language="javascript" src="js/program.js"></script>
<script language="javascript" src="js/jquery.min.js"></script>
</head>
<body>
<table width="<?php echo ADMIN_PAGE_WIDTH; ?>" border="0" align="center" cellpadding="0" cellspacing="5" bgcolor="#FFFFFF">
	<tr>
    	<td colspan="2"><?php include("admin/header.php"); ?></td>
  	</tr>
  	<tr>
    	<td width="<?php echo ADMIN_LEFT_WIDTH; ?>" valign="top"><?php include("admin/leftnav.php"); ?></td>
    	<td width="<?php echo ADMIN_BODY_WIDTH; ?>" valign="top">
        	<table width="100%" border="0" cellspacing="1" cellpadding="0">
        		<tr>
          			<td class="bgborder">
                    	<table width="100%" border="0" cellspacing="1" cellpadding="0">
              				<tr>
                				<td bgcolor="#FFFFFF">
                                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    					<tr>
                      						<td valign="top">
                                            	<table width="100%" border="0" cellpadding="2" cellspacing="0">
                          							<tr>
                            							<td class="heading2">
                              								<div style="float: right;">
                                								<?php
																$addLink = "program.php";
																$formLink = "manage_cms.php";
																
																if (isset($_GET['programType']))
																{
																 $addLink .= "?programType=" . $_GET['programType'];
																 $formLink .= "?programType=" . $_GET['programType'];
																}
																if (isset($_GET['parentId']))
																{
																 $addLink .= "&parentId=" . $_GET['parentId'];
																 $formLink .= "&parentId=" . $_GET['parentId'];
																}
																if(isset($_GET['page']))
																{
																	$addLink .= "&page=" . $_GET['page'];
																 	$formLink .= "&page=" . $_GET['page'];
																} 
																?>
                                								<a href="<?php echo $addLink ?>" class="headLink"> Add New </a>
                                                        	</div>
                                                            &nbsp;Manage Program
                                                      	</td>
                          							</tr>
                          							<tr>
                            							<td>
															<?php
																if (isset($_GET['msg']))
																{
															 		//echo $msg;
																}
															?>
                              								<form action="cms.php" method="get">
                                								<table border="0" width="100%" cellpadding="2" cellspacing="0">
                                  									<tr>
                                    									<td width="90"><strong>Program Type : </strong></td>
                                    									<td>
                                                                        	<select name="programType" onchange="changeType(this);" class="list1">
                                        										<option value="select">Select Program</option>
                                        										<?php
																				$types=$program->getProgramTypes();
																				while($typesGet=$conn->fetchArray($types))
																				{?>
                                        											<option value="<?php echo $typesGet['program_name']; ?>"
																				<?php
																				if ($showSaveForm && $typesGet['program_type'] == $selectedProgramType)
																				{
																					echo "selected ";
																				}
																				?>>
																				<?php echo $grp ?>
                                                                                </option>
                                        										<?php }?>
                                    										</select>
                                                                      	</td>
                                  									</tr>
                                								</table>
                              								</form>
                                                      	</td>
                          							</tr>
                          							<?php
													if ($showSaveForm)
													{?>
                          								<tr>
                            								<td>
                                                            	<form action="<?php echo $formLink; ?>" method="post" enctype="multipart/form-data">
                                								<?php
																if (isset($_GET['id']))
																{?>
                                									<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                								<?php }?>
                                								<table width="100%" border="0" cellspacing="0" cellpadding="2">
                                  									<?php
																	if (isset($_GET['id']))
																	{?>
                                  									<tr>
                                    									<td><strong>Created On : </strong></td>
                                    									<td>
																		<?php
																		$arr = explode("-", $groupRow['onDate']);
																		echo date("M d, Y", mktime(0, 0, 0, $arr[1], $arr[2], $arr[0]));
																		?>
                                                                        </td>
                                  									</tr>
                                  									<?php } ?>
                                  									<tr>
                                    									<td width="90"><strong>Program Name : </strong></td>
                                    									<td>
                                                                        	<input type="text" name="program_name" value="<?php echo $groupRow['program_name']; ?>" class="text">
                                                                      	</td>
                                  									</tr>
																	<tr>
                                    									<td><strong>Program Level :</strong> </td>
                                    									<td>
                                                                        	<select name="program_level">
                                                                            	<? $level=$program->getProgramLevel();
																				while($levelGet=$conn->fetchArray($level))
																				{?>
                                                                                	<option value="<?=$levelGet['program_level'];?>" <? if($levelGet['program_level']==$groupRow[
																					'program_level']){ echo "selected";} ?>><?=$levelGet['program_level'];?></option>
                                                                            	<? }?>
                                                                            </select>
                                                                      	</td>
                                  									</tr>
                                  									<tr>
                                    									<td width="90"><strong>No. of Participant : </strong></td>
                                    									<td>
                                                                        	<input type="text" name="participant_number" value="<?php echo $groupRow['participant_number']; ?>" 
                                                                            class="text">
                                                                      	</td>
                                  									</tr>
                                                                    <tr>
                                    									<td width="90"><strong>No. of Male : </strong></td>
                                    									<td>
                                                                        	<input type="text" name="male_number" value="<?php echo $groupRow['male_number']; ?>" class="text">
                                                                      	</td>
                                  									</tr>
                                                                    <tr>
                                    									<td width="90"><strong>No. of Female : </strong></td>
                                    									<td>
                                                                        	<input type="text" name="female_number" value="<?php echo $groupRow['female_number']; ?>" class="text">
                                                                      	</td>
                                  									</tr>
                                                                    <tr>
                                    									<td width="90"><strong>No. of Lowcast : </strong></td>
                                    									<td>
                                                                        	<input type="text" name="lowcast_number" value="<?php echo $groupRow['lowcast_number']; ?>" class="text">
                                                                      	</td>
                                  									</tr>
                                                                    <tr>
                                    									<td width="90"><strong>No. of Indigenous : </strong></td>
                                    									<td>
                                                                        	<input type="text" name="indigenous_number" value="<?php echo $groupRow['indigenous_number']; ?>" 
                                                                            class="text">
                                                                      	</td>
                                  									</tr>
                                                                    <tr>
                                    									<td width="90"><strong>Other : </strong></td>
                                    									<td>
                                                                        	<input type="text" name="other" value="<?php echo $groupRow['other']; ?>" class="text">
                                                                      	</td>
                                  									</tr>
                                                                    <tr>
                                    									<td width="90"><strong>Date : </strong></td>
                                    									<td>
                                                                        	<input type="text" name="date" value="<?php echo $groupRow['date']; ?>" class="text">
                                                                      	</td>
                                  									</tr>
                                  									
                                                                  	<tr>
                                                                    	<td><strong>Weight : </strong></td>
                                                                    	<?php
																		if (!isset($groupRow['weight']))
																		{
																			if(!empty($_GET['parentId']))
																				$parentId = $_GET['parentId'];
																			else
																				$parentId = 0;
																			$groupRow['weight'] = $groups -> getLastWeight($_GET['groupType'], $parentId);
																			// $groupRow['weight'] = 50;
																		} ?>
                                                                    	<td><input type="text" value="<?php echo $groupRow['weight'] ?>" name="weight" class="text" 
                                                                        style="width:25px;"></td>
                                                                  	</tr>
                                  									<?php if(!empty($groupRow['image']) && file_exists("../". CMS_GROUPS_DIR .$groupRow['image'])){ ?>
                                  									<tr>
                                    									<td align="left"><strong>Existing Image : </strong></td>
                                    									<td><img src="../<?php echo CMS_GROUPS_DIR . $groupRow['image']; ?>" width="100" border="0" /> 
                                                                        [<a href="manage_cms.php?id=<?php echo $_GET['id']; ?>&parentId=<?php echo $_GET['parentId']; ?>&groupType=
																		<?php echo $_GET['groupType']; ?>&deleteImage<?php if(isset($_GET['page'])) echo '&page='. $_GET['page']; ?>"
                                                                        >Delete</a>]</td>
                                  									</tr>
                                  									<?php } ?>
                                                                  	<tr>
                                                                    	<td>
                                                                        	<div id="ImageLabel"
																				<?php /*if($groupRow['linkType'] != "Normal Group" && $groupRow['linkType'] != "Contents Page"){ 
                                                                                    echo 'style="display: none;"';
                                                                                }*/
                                                                                ?>
                                                                                ><strong> Image : </strong>
                                                                          	</div>
                                                                       	</td>
                                    									<td>
                                                                        	<div id="grpImage">
                                                                        		<input type="file" name="image" class="file">
                                                                      		</div>
                                                                      	</td>
                                                                  	</tr>
                                  									<tr>
                                    								<td></td>
                                    								<td><input type="submit" value="Save" name="save" class="button"></td>
                                  									</tr>
                                								</table>
                              									</form>
                                                          	</td>
                          								</tr>
                          							<?php }
													if ($showListing)
													{?>
                          							<?php }?>
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
                      					<td valign="top"><?php
											$pagename = "cms.php";
											$withEdit = true;
											$withDelete = true;
											$withOpen = true;
											//selectedGroupType will be used inside groupListing.php
											$parentId = 0;
											if (isset($_GET['parentId']))
											$parentId = $_GET['parentId'];
											include("grouplisting.php");
											?>
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
  	<tr>
    	<td colspan="2"><?php include("footer.php"); ?></td>
  	</tr>
</table>

</body>
</html>
