#include <iostream>
#include <string>
#include <fstream>
using namespace std;
int main() {
    /********init XML********/
//    string attribute;
//    ifstream fin("Qbase.in");
//    fin>>attribute;
//    int i;
//    string data;
//    while(fin>>i>>data)
//    {
//        cout<<"<"<<attribute<<i<<">"<<data<<"</"<<attribute<<i<<">"<<endl;
//    }
//

    /*****creat template json****/
    cout<<"{";
    for(int i=1;i<=6;++i)
        cout<<"\"t"<<i<<"\":0,";
    for(int i=1;i<=5;++i)
        cout<<"\"y"<<i<<"\":0,";
    for(int i=1;i<=4;++i)
        cout<<"\"d"<<i<<"\":0,";
    for(int i=1;i<=10;++i)
        cout<<"\"x"<<i<<"\":0,";
    cout<<"}"<<endl;
    return 0;
}