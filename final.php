
<?php
	error_reporting(0);
    $outPut=date('[Y-m-d H:i:s]',time());
	$outPut.="   ";
	$student_id=$_GET['id'];
	$question_id=$_GET['qid'];
	$answer=$_GET['ans'];
	$outPut.=$student_id;
	$outPut.="   ";
	$outPut.=$question_id;
	$outPut.="   ";  
	$outPut.=$ans;
	$outPut.="   "; 

	$xml=simplexml_load_file("data.xml");
//	print_r($xml);
//	echo $xml->t1."<br>";
	$stdAns=$xml->$question_id;
//	echo $stdAns."<br>";
	if($stdAns==$answer)
	{
		
	
	
		$sqlFile=fopen("sql.json",'r');
		$data=fgets($sqlFile);
		fclose($sqlFile);
		$data=substr($data,0,strlen($data)-1);
		$obj=json_decode($data);
		$tempInt=(int)$obj->{$question_id};
		$tempInt=$tempInt+1;
		$obj->{$question_id}=$tempInt;
		$outData=json_encode($obj);
		$outData.="\n";
		$sqlFile2=fopen("sql.json",'w');
		fwrite($sqlFile2,$outData);
		fclose($sqlFile2);
		
        echo '
        <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
  <!--<meta content="yes" name="apple-mobile-web-app-capable">
  <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">  
  	<title>这是一个抢答器</title>

	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        function jump(){
            self.location=';
            echo "'";
            echo 'index.html';
            echo "'";
            echo '
        } 
    </script>
</head>
<body class="jumbotron">

<div onload="checkCookie()">
	<div class="container">
		<h1>恭喜您答对了！</h1>
		<p>您是第<strong>';
    
    
    echo $tempInt;
    echo '</strong>位答对第<strong>';
    echo $question_id;
    echo '</strong>题的同学。</p>
		<p><a class="btn btn-primary btn-lg" role="button" onclick="jump()">
			继续答题</a>
		</p>
	</div>
</div>

</body>

</html>

<!--id qid ans-->
    '
	;
	
	
	
		$outPut.="Yes";
	}
	else
	{	
		echo '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
  <!--<meta content="yes" name="apple-mobile-web-app-capable">
  <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">  
  	<title>这是一个抢答器</title>

	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        function jump(){
            self.location=\'index.html\'
        } 
    </script>
</head>
<body class="jumbotron">
<div onload="checkCookie()">
	<div class="container">
		<h1>很遗憾您没有答对！</h1>
		<p>请您继续答题。</p>
		<p><a class="btn btn-primary btn-lg" role="button" onclick="jump()">
			继续答题</a>
		</p>
	</div>
</div>

</body>

</html>

<!--id qid ans-->'
		;

		$outPut.="No";
	}


//	$outPut.=
	$stFile=fopen($student_id,'a');
	$outPut.="\n";
	fwrite($stFile,$outPut);
	fclose($stFile);
?>
