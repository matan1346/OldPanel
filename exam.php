<html>
<style type="text/css" rel="stylesheet">
#tryme { background-color: #000000; font-size: 100%;
    padding: 0px; font-weight: bold; width:350px; height: 20px; }
	</style>
<body>
<?php
if(isset($_GET['design1'], $_GET['name'])){
if($_GET['name']==""){
      if($_GET['design1']=="V1")
    {
	     echo "<img src='asdas/Quality-gunz-banner.png'><br/><br/><div id='tryme'><font color='#FFFFF'>Default Color:</font> <font color='#FFB751'>Character</font></div>";
	}
else if($_GET['design1']=="V2")
    {
	     echo "<img src='asdas/Quality-gunz-bannerV2.png'><br/><br/><div id='tryme'><font color='#FFFFF'>Default Color:</font> <font color='#6fd5ff'>Character</font></div>";
	}
else if($_GET['design1']=="V3")
    {
	     echo "<img src='asdas/Quality-gunz-bannerV3.png'><br/><br/><div id='tryme'><font color='#FFFFF'>Default Color:</font> <font color='#52ff52'>Character</font></div>";
	}
else if($_GET['design1']=="V4")
    {
         echo "<img src='asdas/Quality-gunz-bannerV4.png'><br/><br/><div id='tryme'><font color='#FFFFF'>Default Color:</font> <font color='#ff6666'>Character</font></div>";
    }
else if($_GET['design1']=="V5")
    {
         echo "<img src='asdas/Quality-gunz-bannerV5.png'><br/><br/><div id='tryme'><font color='#FFFFF'>Default Color:</font> <font color='#e289ff'>Character</font></div>";
    }	
}else{
$name = $_GET['name'];
// --------------------------------------------------------------------------------------


if($_GET['design1']=="V1")
    {
	     echo "<img src='asdas/Quality-gunz-banner.png'><br/><br/><div id='tryme'><font color='#FFFFF'>Default Color:</font> <font color='#FFB751'>$name</font></div>";
	}
else if($_GET['design1']=="V2")
    {
	     echo "<img src='asdas/Quality-gunz-bannerV2.png'><br/><br/><div id='tryme'><font color='#FFFFF'>Default Color:</font> <font color='#6fd5ff'>$name</font></div>";
	}
else if($_GET['design1']=="V3")
    {
	     echo "<img src='asdas/Quality-gunz-bannerV3.png'><br/><br/><div id='tryme'><font color='#FFFFF'>Default Color:</font> <font color='#52ff52'>$name</font></div>";
	}
else if($_GET['design1']=="V4")
    {
         echo "<img src='asdas/Quality-gunz-bannerV4.png'><br/><br/><div id='tryme'><font color='#FFFFF'>Default Color:</font> <font color='#ff6666'>$name</font></div>";
    }
else if($_GET['design1']=="V5")
    {
         echo "<img src='asdas/Quality-gunz-bannerV5.png'><br/><br/><div id='tryme'><font color='#FFFFF'>Default Color:</font> <font color='#e289ff'>$name</font></div>";
    }	
}

// --------------------------------------------------------------------------------------



}
?>

</body>
</html>