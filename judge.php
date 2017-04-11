<?php

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
		echo Yeeeee;
	
	
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
		
	
	
	
	
		$outPut.="Yes";
	}
	else
	{	
		echo Noooo;
		$outPut.="No";
	}


//	$outPut.=
	$stFile=fopen($student_id,'a');
	$outPut.="\n";
	fwrite($stFile,$outPut);
	fclose($stFile);
?>
