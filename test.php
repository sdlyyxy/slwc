<?php
// $sqlFile=fopen("sql.json",'r');
// $data=fgets($sqlFile);
// #echo $data;
// fclose($sqlFile);
// $data=substr($data,0,strlen($data)-1);
// $obj=json_decode($data);
// $tempInt=(int)$obj->{'t1'};
// $tempInt=$tempInt+1;
// $obj->{'t1'}=$tempInt;
// $outData= json_encode($obj);
// $outData.="\n";
// #echo $outData;
// $sqlFile2=fopen("sql.json",'w');
// fwrite($sqlFile2,$outData);
// fclose($sqlFile2);
// #file_put_contents('sqwwl.json',$outData);

    $return=system("ls",$return_num);
    echo $return;
    echo $return_num;
?>
