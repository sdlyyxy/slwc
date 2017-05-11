#include <iostream>
#include <fstream>
#include <string>
#include <algorithm>
#include <vector>
using namespace std;
class student
{
public:
    student(string _studentId,int _correctTimes=0,int _rank=0)
            :studentId(_studentId),correctTimes(_correctTimes),rank(_rank){}
    string studentId;
    int correctTimes,rank;
    bool operator<(const student &student1) const
    {
        if(correctTimes<student1.correctTimes)
            return true;
        if(correctTimes==student1.correctTimes)
            return rank<student1.rank;
        if(correctTimes>student1.correctTimes)
            return false;
    }
};
int main() {
    /****!!!!!Attention!!!!*******
     ****Put the binary program***
     ****in the same folder of****
     ****ranklist.php!!!!!********/
    system("ls 2016* > StudentsList.chg");//change document
    ifstream studentsList_in;//("StudentsList.chg");
    studentsList_in.open("StudentsList.chg");
    string studentJsonName;
    vector<student>allStudent;
    while(studentsList_in>>studentJsonName)
    {
        ifstream studentJson_in;//(studentJsonName);
        studentJson_in.open(studentJsonName.c_str());
        string studentId=studentJsonName.substr(0,10);
        //cout<<studentId<<endl;
        for(int i=0;i<17;++i)//throw unused characters
            studentJson_in.get();
        int tempCorrectTimes,tempRank;
        studentJson_in>>tempCorrectTimes;
        for(int i=0;i<8;++i)
            studentJson_in.get();
        studentJson_in>>tempRank;
        allStudent.push_back(student(studentId,tempCorrectTimes,tempRank));
    }
    sort(allStudent.begin(),allStudent.end());
    ofstream StudentRankList_o;//("StudentRankList.txt");
    StudentRankList_o.open("StudentRankList.txt");
    long long rankNum=0;
    for(vector<student>::reverse_iterator i=allStudent.rbegin();i!=allStudent.rend();++i)
    {
        StudentRankList_o<<"<tr><td>"<<++rankNum<<"</td><td>"<<i->studentId;
        StudentRankList_o<<"</td><td>"<<i->correctTimes<<"</td><td>"<<i->rank;
        StudentRankList_o<<"</td></tr>";
        //StudentRankList_o<<endl;
    }
    return 0;
}
