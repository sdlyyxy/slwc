#!/bin/bash
echo "Sure wanna reset?yes/no"
read A
if [ $A = "yes" ]
then
	rm -f 2016*;
	rm -f  Connection.log;
	rm -f StudentsList.chg;
	rm  -f StudentRankList.txt;
    cp QustionAnswerTimesTemplate.json QustionAnswerTimes.json;
	echo "done";
else
	echo "exit";
fi;
