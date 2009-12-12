<?php
	if(isset($_GET['close'])){
		@session_start();
		@session_destroy();
	}else if (1){
	      if (isset($_POST['in']) && !empty($_POST['in'])){
	      	 $in = fopen("/tmp/test.in","a");
	   	 fwrite($in,$_POST['in']);
	   	 fclose($in);
	 	 echo "//ok".$_POST['in'];
	      } else
	      if (isset($_GET['out'])){
		 @session_start();
	   	 if (!isset($_SESSION['index']))
	       	    $_SESSION['index']=0;
		 $index=$_SESSION['index'];
		 @session_commit();
	      	 while (1){
	      	       $out = fopen("/tmp/test.out","r");
	   	       fseek($out,$index);
	   	       $_ = fgets($out);
		       fclose($out);
		       if ($_!=""){
	   	       	  $index+=strlen($_);
	   	       	  echo $_;
			  @session_start();
			  $_SESSION['index']=$index;
			  @session_commit();
			  break;
		       }else{
			  sleep(1);
		       }
		 }
	      }else 
	      	   echo "//wrong operation";
	}else{
		echo "//service not started";
	}
?>