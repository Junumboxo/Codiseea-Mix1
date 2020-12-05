#include <iostream>
#include <fstream>

using namespace std;


int N=1, Max=0, Nr=0;
int A[1000], B[1000], S[1000], M[1000];

int main()
{
    string in_file = "in.txt";
    string out_file = "out.txt";

	ifstream in(in_file.c_str());
	ofstream out(out_file.c_str());
    try{
        if(!in){throw 1;}
        if(in.peek() == ifstream::traits_type::eof()){throw 2;}
    }
    catch (int thr){
        switch(thr){
            case 1:{
                cout << "[Erroare-"<<thr<<"] Fisierul ["<<in_file<<"] nu aputut fi gasit pentru citire\n--Verificati denumirea fisierului\n";
                exit(1);
            }
            case 2:{
                cout << "[Erroare-"<<thr<<"] Fisierul ["<<in_file<<"] este gol\n--Introduceti date apoi reincercati";
                exit(1);
            }
        }

    }

    in >> N;
    int i;
    for (i=1;i<=N;++i) in>>A[i];
    for (i=1;i<=N;++i) in>>B[i];

    for (i=1;i<=N;++i) S[i]=S[i-1] + A[i];

    for (i=1;i<=N;++i)
    {
        int st=1, dr=N, gm=N;
        while (st<=dr)
        {
            int mij=(st+dr)/2;
            if (S[mij]-S[i-1] >= B[i])
            {
                gm=mij;
                dr=mij-1;
                continue;
            }
            else st=mij+1;
        }
        M[i]++;
        M[gm+1]--;
    }

    for (i=1;i<=N;++i)
    {
        M[i]+= M[i-1];
        if (M[i]>Max)
        {
            Max=M[i]; Nr=1;
            continue;
        }
        if(M[i]==Max) Nr++;
    }
    cout << Max << ' ' <<Nr;
    out << Max << ' ' << Nr;

    return 0;
}
