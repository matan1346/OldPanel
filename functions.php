<?php
function getdesign($var){
    switch ($var) {
    case "V1":
        return "";
        break;
    case "V2":
        return "V2";
        break;
    case "V3":
        return "V3";
        break;
	case "V4":
        return "V4";
        break;
	case "V5":
        return "V5";
        break;
	case "V6":
        return "V6";
        break;
	case "V7":
        return "V7";
        break;
	case "V8":
        return "V8";
        break;
	case "V9":
        return "V9";
        break;
	case "V10":
        return "V10";
        break;
	default:
	    return "";
		break;
}
}



function getcolor($design, $num){
      if($design==""){
	       if($num==1)
	           return 255;
		   else if($num==2)
		       return 183;
		   else
		       return 81;
		 }
	  else if($design=="V2"){
	       if($num==1)
	           return 0;
		   else if($num==2)
		       return 194;
		   else
		       return 201;
	  
	  }
      else if($design=="V3"){
	       if($num==1)
	           return 0;
		   else if($num==2)
		       return 196;
		   else
		       return 32; 
	  }
	  else if($design=="V4"){
	       if($num==1)
	           return 255;
		   else if($num==2)
		       return 102;
		   else
		       return 102; 
	  }
	  else if($design=="V5"){
	       if($num==1)
	           return 226;
		   else if($num==2)
		       return 137;
		   else
		       return 255; 
	  }
	  else if($design=="V6"){
	       if($num==1)
	           return 98;
		   else if($num==2)
		       return 255;
		   else
		       return 224; 
	  }
	  else if($design=="V7"){
	       if($num==1)
	           return 255;
		   else if($num==2)
		       return 253;
		   else
		       return 102; 
	  }
	  else if($design=="V8"){
	       if($num==1)
	           return 255;
		   else if($num==2)
		       return 255;
		   else
		       return 255; 
	  }
	  else if($design=="V9"){
	       if($num==1)
	           return 255;
		   else if($num==2)
		       return 199;
		   else
		       return 110; 
	  }
	  else{
		if($num==1)
	           return 255;
		   else if($num==2)
		       return 210;
		   else
		       return 170; 
	  }
}


function x($mode, $num){
		if($mode == 1){
			$x = 105;
		}
		else if($mode == 2){
			if($num == 1)
				$x = 90;
			else if($num == 2)
				$x = 90;
			else if($num == 3)
				$x = 410;
			else if($num == 4)
				$x = 410;
		}
		return $x;
}

function y($mode, $num){
		if($mode == 1){
			if($num == 1)
				$y = 25;
			else if($num == 2)
				$y = 60;
			else if($num == 3)
				$y = 95;
			else if($num == 4)
			    $y = 129;
		}
		else if($mode == 2){
			if($num == 1)
				$y =95;
			else if($num == 2)
				$y = 129;
			else if($num == 3)
				$y = 95;
			else if($num == 4)
			    $y = 129;
		}
		return $y;
}
?>