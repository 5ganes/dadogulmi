<? include('clientobjects.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<title>
	Market Research and Stastistics Management Programme-
	<?php if($pageName!=""){ echo $pageName;}else if(isset($_GET['action'])){ echo $_GET['action'];}else{ echo "Home";}?>
</title>
<? include('baselocation.php'); ?>
<meta name="description" content="Market Research and Stastistics Management Programme" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" media="screen,projection,print" href="css/layout4_setup.css" />
<link rel="stylesheet" type="text/css" media="screen,projection,print" href="css/layout4_text.css" />
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
        <span class="title" style="font-size:17px">District Agriculture Development Office, Gulmi</span> <br />
        <h2>Tamgas, Gulmi, Nepal </h2>                                           
                                                        
                                                      
      
      </div>
      <!-- Navigation Level 0 -->
     
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
  <div class="main" style="background:none">

	<div class="main-content" style="width:100%; font-size:12px; text-align:justify">
	
    	<h1 class="pagetitle" style="padding:0 6px 2px">भुक्तानीका लागि प्राप्त विलहरुको सार्वजनिकरण</h1>

		<div class="content">

	<table align="center" border="1" cellspacing="0" cellpadding="0">
  
    
   
    
    <tbody>
    <tr>
      <th width="2" align="center">सि.नं</th>
      <th width="17" align="center">विवरण</th>
      <th width="10" align="center">ब.उ.शि.नं.</th>
      <th width="12" align="center">खर्च शिर्षक</th>
      <th width="15" align="center">खरिद प्रक्रिया</th>
      <th width="12" align="center">प्यान नं</th>
      <th width="28" align="center">भुक्तानी पाउने व्यक्ति/ संस्था</th>
      <th width="16" align="center">बिल / निवेदन प्राप्त भएको मिति</th>
      <th align="center" width="12">रकम</th>
      <th width="7" align="center">कैफियत</th>
      <th width="15" align="center">अप्लोड समय</th>
       
    </tr>
    <? $bill=mysql_query("select * from bills order by weight"); $i=0;
	while($billGet=mysql_fetch_array($bill))
	{?>
    	<tr bgcolor="#DFDFDF">
            <td align="center"><?=++$i;?></td>
            <td align="center"><?=$billGet['description'];?></td>
            <td align="center"><?=$billGet['busn'];?></td>
            <td align="center"><?=$billGet['spentTitle'];?></td>
            <td align="center"><?=$billGet['buying'];?></td>
            <td align="center"><?=$billGet['panNo'];?></td>
            <td align="center"><?=$billGet['paymentReceiver'];?></td>
            <td align="center"><?=$billGet['billDate']?></td>
            <td align="center"><?=$billGet['amount'];?></td>
            <td align="center"><?=$billGet['remarks'];?></td>
            <td align="center"><?=$billGet['onDate'];?></td>
    	</tr>
  	<? }?>
       
    </tbody>
    </table>

</div>

	</div>
  </div>
  <!-- C. FOOTER AREA -->
  <div class="footer" style="margin-top:5px;">
    <p>Copyright &copy; 20<?=date("y");?> MRSMP | All Rights Reserved</p>
    <p class="credits"> <a href="http://www.krishighar.com/mrsmp">गृह पृष्‍ठ</a> | <a href="#">सम्पर्क ठेगाना</a> | <a href="#">सुझाब तथा सल्लाह</a></p>
  </div>
</div>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-159243-24";
urchinTracker();
</script>
<div align=center style="margin:10px 0">Powered By : <a href='http://www.krishighar.com' target="_blank">Development Team: krishighar.com</a></div></body>
</html>
