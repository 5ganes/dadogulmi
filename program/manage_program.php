<?php
include("../admin/init.php");
/*if(!isset($_SESSION['sessUserId']))//User authentication
{
 	header("Location: login.php");
 	exit();
}*/

function saveImages($xid, $files, $captionList)
{
 	global $groups;
	for ($i=0; $i<count($files['galimage']['name']); $i++)
 	{
  		if(isset($files['galimage']['tmp_name'][$i]) && $files['galimage']['size'][$i] <= (1024*1024))
  		{
   			$ft = $files['galimage']['type'][$i];
   			if($ft == "image/jpeg" || $ft == "image/jpg" || $ft == "image/pjpeg")
   			{
    			$ext = "jpg";
   			}
   			else if ($ft == "image/gif")
    			$ext = "gif";
   			else if ($ft == "image/png" || $ft == "image/x-png")
    			$ext = "png";			
   			
			if ($ext == "jpg" || $ext == "gif" || $ext == "png")
   			{
       			$photoId = $groups->saveGallerySub("", $xid, $captionList[$i]);
			 	$groups -> updateUrlName($photoId);
			 	$groups -> updateImage($photoId, $photoId . "." . $ext);
       			copy($files['galimage']['tmp_name'][$i], "../" . CMS_GROUPS_DIR . $photoId . "." . $ext);
   			}
  		}
 	}
}

function saveListingImage($photoId)
{
	global $_FILES;
	if (isset($_FILES['listImage']['name']))
   	{
   	  	if($_FILES['listImage']['size'] <= (1024*1024))
	  	{
	   		$ft = $_FILES['listImage']['type'];
	   		if($ft == "image/jpeg" || $ft == "image/jpg" || $ft == "image/pjpeg")
	   		{
	    		$ext = "jpg";
	   		}
	   		else if ($ft == "image/gif")
	    		$ext = "gif";
	   		else if ($ft == "image/png" || $ft == "image/x-png")
	    		$ext = "png";
					
	   		if ($ext == "jpg" || $ext == "gif" || $ext == "png")
	   		{	  
	   	 		copy($_FILES['listImage']['tmp_name'], "../" . CMS_GROUPS_DIR. $photoId . "." . $ext);
	   	 		return $ext;
	   		}
	  	}
  	}
  	return "";
}

function saveListFiles($listingId, $files, $captionList)
{
 	global $listings;
 	global $listingFiles; 
 	for ($i=0; $i<count($files['listFile']['name']); $i++)
 	{
 	 	if ($files['listFile']['size'][$i] > 0)
	 	{
    		$listingFiles->save($listingId, $captionList[$i], $files['listFile']['name'][$i]);
    		copy($files['listFile']['tmp_name'][$i], "../" . CMS_LISTING_FILES_DIR . $files['listFile']['name'][$i]);
	 	}
 	}
}

function saveGroupImage($groupId)
{
	global $_FILES;
	if (isset($_FILES['groupImage']['name']))
  	{
    	if($_FILES['groupImage']['size'] <= (1024*1024))
	  	{
	   		$ft = $_FILES['groupImage']['type'];
	   		if($ft == "image/jpeg" || $ft == "image/jpg" || $ft == "image/pjpeg")
	   		{
	    		$ext = "jpg";
	   		}
	   		else if ($ft == "image/gif")
	    		$ext = "gif";
	   		else if ($ft == "image/png" || $ft == "image/x-png")
	    		$ext = "png";
				
	   		if ($ext == "jpg" || $ext == "gif" || $ext == "png")
	   		{	  
	   	 		copy($_FILES['groupImage']['tmp_name'], "../" . CMS_GROUPS_DIR. $groupId . "." . $ext);
	   	 		return $ext;
	   		}
		}
	}
  	return "";
}

if (isset($_POST['save']))
{
	  
 	if (isset($_POST['id']))
 	{
  		//edit contents
  		
			//$parentId=$_POST['parentId'];
			//$parent=$categories->getById($parentId);
			
			if($_POST['program_type']==TRAINING)
			{
				$program->saveTraining($_POST['id'], $_POST['program_name'], $_POST['program_type'], $_POST['program_from'], $_POST['program_code'], 
				$_POST['program_level'], $_POST['participant_number'], $_POST['male_number'], $_POST['female_number'], $_POST['lowcast_number'], 
				$_POST['indigenous_number'], $_POST['other'], $_POST['date'], $_POST['publish'], $_POST['weight']);
			}
			elseif($_POST['program_type']==NURSERY)
			{
				$program->saveNursery($_POST['id'], $_POST['program_name'], $_POST['program_type'], $_POST['program_from'], $_POST['nursery_type'], 
				$_POST['nursery_number'], $_POST['production_number'], $_POST['distribution_number'], $_POST['date'], $_POST['publish'], $_POST['weight']);
			}
			elseif($_POST['program_type']==PROGRAMPROGRESS)
			{
				$program->saveProgramProgress($_POST['id'], $_POST['program_name'], $_POST['program_type'], $_POST['program_from'], $_POST['crop_name'], 
				$_POST['participant_number'], $_POST['area_unit'], $_POST['area_amount'], $_POST['production_unit'], $_POST['production_amount'], $_POST['date'], $_POST['publish'], $_POST['weight']);
			}
		
			//$diary -> saveImage($_POST['id']);
			
			$url = 	"../program.php?groupType=". $_GET['groupType'] ."&id=". $_POST['id'];
			
			if(isset($_GET['page']))
				$url .= "&page=".$_GET['page'];
	
			header ("Location: " . $url ."&msg=Successfully updated!");
			exit();
	 	
 	}
	////////////////
	// ADD NEW //// /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else //add new code goes here...
	{
		//echo $_POST['program_name']." ".$_POST['program_type']." ".$_POST['program_code']." ".$_POST['program_level']." ".$_POST['participant_number']
		//." ".$_POST['male_number']." ".$_POST['female_number']." ".$_POST['lowcast_number']." ".$_POST['indigenous_number']." ".$_POST['other']
		//." ".$_POST['date']." ".$_POST['publish']." ".$_POST['weight']; die();
		//echo $_POST['date']; die();
		if(empty($_POST['program_name']))
			$msg = "Please enter Program Name";
		elseif($_POST['program_type'] == "select")
			$msg = "Please select Program Type";
	
 		if(empty($msg))
		{
			//$program_type=$_POST['program_type'];
			//$parent=$categories->getById($parentId);
			if($_POST['program_type']==TRAINING)
			{
				//echo "hi"; die();
				//echo $_POST['indigenous_number']; die();
				$newId = $program->saveTraining("", $_POST['program_name'], $_POST['program_type'], $_POST['program_from'], $_POST['program_code'], 
				$_POST['program_level'], $_POST['participant_number'], $_POST['male_number'], $_POST['female_number'], $_POST['lowcast_number'], 
				$_POST['indigenous_number'], $_POST['other'], $_POST['date'], $_POST['publish'], $_POST['weight']);		
			}
			elseif($_POST['program_type']==NURSERY)
			{
				$newId = $program->saveNursery("", $_POST['program_name'], $_POST['program_type'], $_POST['program_from'], $_POST['nursery_type'], 
				$_POST['nursery_number'], $_POST['production_number'], $_POST['distribution_number'], $_POST['date'], $_POST['publish'], $_POST['weight']);
			}
			elseif($_POST['program_type']==PROGRAMPROGRESS)
			{
				$newId = $program->saveProgramProgress("", $_POST['program_name'], $_POST['program_type'], $_POST['program_from'], $_POST['crop_name'], 
				$_POST['participant_number'], $_POST['area_unit'], $_POST['area_amount'], $_POST['production_unit'], $_POST['production_amount'], $_POST['date'], $_POST['publish'], $_POST['weight']);
			}
			
			//$diary->saveImage($newId);
			
			if(empty($msg))
			{
				$url = 	"../program.php?groupType=". $_GET['groupType'];
				if($showId)
					$url .= "&id=". $_POST['id'];
				if(isset($_GET['page']))
					$url .= "&page=".$_GET['page'];
		
				header ("Location: " . $url ."&msg=Successfully saved!");
				exit();
			}
		}
	}
 	
 	header ("Location: ../program.php?groupType=". $_GET['groupType'] ."&msg=" . $msg);	
 	exit();
}
else if (isset($_GET['id']) && isset($_GET['delete']))
{
 	//this will delete the group and all its belongings (image, files, etc)
 	$program->delete($_GET['id']);

 	$msg = "Successfully deleted!";
 	header ("Location: ../program.php?groupType=". $_GET['groupType'] ."&msg=" . $msg);
 	exit();
}
else if (isset($_GET['imageId']) && isset($_GET['deleteImage']))
{
 	$groups->delete($_GET['imageId']);
 	$msg = "Image deleted!";
 	header ("Location: cms.php?id=". $_GET['id'] ."&groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'] ."&msg=" . $msg);
 	exit();
}
else if (isset($_GET['deleteListId']))
{
 	$groups->delete($_GET['deleteListId']);
 	$msg = "Listing deleted!";
 	header ("Location: cms.php?id=". $_GET['id'] ."&groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'] ."&msg=" . $msg);
 	exit();
}
else if (isset($_GET['fileId']) && isset($_GET['deleteFile']))
{
 	$listingFiles->delete($_GET['fileId']);
 	$msg = "File deleted!";
 
 	$url = "cms.php?id=". $_GET['id'] ."&parentId=". $_GET['parentId'] ."&groupType=". $_GET['groupType']."&listId=" . $_GET['listId'];
	if(isset($_GET['page']))
		$url .= "&page=".$_GET['page'];
		
 	header ("Location: ". $url . "&msg=" . $msg);
 	exit();
}
elseif(isset($_GET['listId']) && isset($_GET['deleteImage']))
{
	$result = $groups -> getById($_GET['listId']);
	$row = $conn -> fetchArray($result);
	
	$groups -> updateImage($row['id'], "");
	@unlink("../". CMS_GROUPS_DIR . $row['filename']);
	
	$msg = "Image deleted!";
	
	$url = "cms.php?id=". $_GET['id'] ."&parentId=". $_GET['parentId'] ."&groupType=". $_GET['groupType'] ."&listId=". $_GET['listId'];
	if(isset($_GET['page']))
		$url .= "&page=".$_GET['page'];

 	header ("Location: ". $url ."&msg=" . $msg);
	exit();
}
elseif(isset($_GET['id']) && isset($_GET['deleteImage']))
{
	$result = $diary -> getById($_GET['id']);
	$row = $conn -> fetchArray($result);
	
	$diary->updateImage($row['id'], "");
	@unlink("../". CMS_DIARY_DIR . $row['image']);
	
	$msg = "Image deleted!";
	
	$url = "../program.php?id=". $_GET['id'] ."&groupType=". $_GET['groupType'];
	if(isset($_GET['page']))
		$url .= "&page=".$_GET['page'];
	
 	header ("Location: ". $url ."&msg=" . $msg);
	exit();
}
else if (isset($_GET['videoId']) && isset($_GET['deleteVideo']))
{
 	$groups -> delete($_GET['videoId']);
 	$msg = "Video deleted!";
 	header ("Location: cms.php?id=". $_GET['id'] ."&groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'] ."&msg=" . $msg);
 	exit();
}
?>
