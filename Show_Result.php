
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
	$outPut.=$answer;
	$outPut.="   "; 

	$xml=simplexml_load_file("Qustion_Data_Base87373a3c11a6e866f2aa56f6ab9be8d4.xml");
	$stdAns=$xml->$question_id;
	if($stdAns==$answer)
	{
        //update student attribute
        $student_json_name=$student_id.".json";
        if(file_exists($student_json_name))
        {
            $student_json_file=fopen($student_json_name,'r');
			//echo "exist";
        }
        else
        {
        	//echo "not exist";
        	$template=fopen("Students_Template.json",'r');
        	$template_data=fgets($template);
        	//echo $template_data;
            $student_json_file=fopen($student_json_name,'w');
        	fwrite($student_json_file,$template_data);
        	fclose($template);
        	fclose($student_json_file);

        	$student_json_file=fopen($student_json_name,'r');

        }
        //$student_json_file=fopen($student_json_name,'r');
        $student_json_data=fgets($student_json_file);
        fclose($student_json_file);
        $student_json_data=substr($student_json_data,0,strlen($student_json_data)-1);
        $student_obj=json_decode($student_json_data);
		$student_ansflag=(int)$student_obj->{$question_id};

		if($student_ansflag==0)//haven't answer right yet
        {

            $sqlFile = fopen("QustionAnswerTimes.json", 'r');
            $data = fgets($sqlFile);
            fclose($sqlFile);
            $data = substr($data, 0, strlen($data) - 1);
            $obj = json_decode($data);
            $tempInt = (int)$obj->{$question_id};
            $tempInt = $tempInt + 1;
            $obj->{$question_id} = $tempInt;
            $outData = json_encode($obj);
            $outData .= "\n";
            //echo $outData;
            $sqlFile = fopen("QustionAnswerTimes.json", 'w');
            fwrite($sqlFile, $outData);
            fclose($sqlFile);


            //update answer times
            //echo "   in";
            $student_ansflag=1;
            $student_obj->{$question_id}=$student_ansflag;
            //update Correct_Times
            $student_Correct_Times=(int)$student_obj->{"Correct_Times"};
            $student_Correct_Times=$student_Correct_Times+1;
            $student_obj->{"Correct_Times"}=$student_Correct_Times;
            //update rank
            $student_Rank=(int)$student_obj->{"Rank"};
            $student_Rank=$student_Rank+41-$tempInt;
            $student_obj->{"Rank"}=$student_Rank;

            $student_outData=json_encode($student_obj);
            $student_outData.="\n";
            $student_json_file=fopen($student_json_name,'w');
            fwrite($student_json_file,$student_outData);
            fclose($student_json_file);






            $right_Content=file_get_contents("right.html");
            $right_Content=str_replace('{right_number}',$tempInt,$right_Content);
            $right_Content=str_replace('{right_problem}',$question_id,$right_Content);
            echo $right_Content;

        }
        else
		{
			$did_answered_Content=file_get_contents("did_answered.html");
			$did_answered_Content=str_replace('{right_problem}',$question_id,$did_answered_Content);
			echo $did_answered_Content;
		}


		$outPut.="Yes";
	}


	else
    {
        $student_json_name=$student_id.".json";
        $student_json_file=fopen($student_json_name,'r');
        $student_json_data=fgets($student_json_file);
        //echo $student_json_data;
        fclose($student_json_file);
        $student_json_data=substr($student_json_data,0,strlen($student_json_data)-1);
        $student_obj=json_decode($student_json_data);
        $student_ansflag=(int)$student_obj->{$question_id};
        if($student_ansflag==1)
        {
            $did_answered_Content=file_get_contents("did_answered.html");
            $did_answered_Content=str_replace('{right_problem}',$question_id,$did_answered_Content);
            echo $did_answered_Content; 
        }
        else
        {
            $false_Content = file_get_contents('wrong.html');
            echo $false_Content;
            $outPut .= "No";
        }

	}



//  write log
	$stFile=fopen("Connection.log",'a');
	$outPut.="\n";
	fwrite($stFile,$outPut);
	fclose($stFile);
?>
