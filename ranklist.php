<?php
    error_reporting(0);
    ini_set('date.timezone','Asia/Shanghai');

    $dataPath="local_data/";
    //$rankListInitExe=$dataPath."RankList_Init";
    system("cd ".$dataPath."\n./RankList_Init");
    $rankList_Content=file_get_contents($dataPath."StudentRankList.txt");
    //echo $rankList_Content;
    $rankH5_Content=file_get_contents("ranklist.html");
    //echo $rankH5_Content;
    $rankH5_Content=str_replace("{table_content}",$rankList_Content,$rankH5_Content);
    echo $rankH5_Content;
?>