#ifndef TIMETABLE_H
#define TIMETABLE_H

#include <stdio.h>
#include <string>
#include <regex>
#include <fstream>
#include<iostream>
#include<regex>
#include<string.h>
using std::regex;
using std::smatch;
using std::regex_match;
using std::string;
using namespace std;

/*
define된 매크로는 수업시간을 계산하기 위한 매크로입니다.
수업시간이 1130~1245인경우 11301245로 받습니다. 그러므로 endtime과 starttime은 11301245를 1245와 1130으로 분리해줍니다.
*/
#define endtime(x) x%10000
#define starttime(x) x/10000
#include<algorithm>


class Timetable
{
public:
    typedef struct Subject		//과목의 정보를 담는 배열입니다.
    {
        char name[30];	//과목이름
        char propessor[10];//교수님 성함
        int code;	//과목코드
        int date;	// 주 몇회 수업인지
        int day[10];	//무슨 무슨 요일 수업인지 0을 기준으로 월요일
        int time[8]; //몇시부터 몇시수업인지 ex 10301145
        int major; // 어느 학과 전공과목인지
        int id;		//& 과목특성 (철학,역사 등등... ) 또는 (일반선택 전공선택 필수...)
                    /*
                    코드번호 과목 특성    이수해야하는 학점
                    계열	  이수해야하는학점		이수학점
                    ("기초교양")//0
                    ("학부(과)기초")//1
                    ("자유교양")//2
                    ("핵심교양")//3
                    ("전공선택")//4
                    ("전공기초교양")//5
                    */
        int limit[5]; // 학년제한 네자리숫자 limit[1]이 1이면 1학년은 수강 가능하다는 뜻입니다.
        int point; //학점
    }subject;

    subject arr[800];	//과목 배열입니다.

    explicit Timetable();


    void timetable(void);

private:
    /*출력때 필요한 배열들입니다.*/
    char * date[7] = { "월","화", "수", "목", "금", "토", "일" };
    char * subjectname[7] = { "기초교양", "학부(과)기초", "자유교양", "핵심교양", "전공선택", "전공기초교양"};
    int subpoint[11] = {8,23,20,0,74,11};	///졸업이수에 필요한 학점입니다. 위에서 선언된 subjectname과 연관됩니다.


                                    /* 함수선언 입니다*/
    int msearch(int k, int cnt);	/// 시간표를 찾아주는 핵심 함수 입니다. (서칭함수)
    int calculate(void);	/// 탐색한 시간표의 점수를 표시합니다.


                            /*서칭함수에 사용되는 변수입니다*/
    int mysubject[30]; // 사용자가 수강할 과목 , 코드번호가아닌 arr 번호로 입력받는다
    int number; ///mysubject의 갯수
    int past[1000000]; // 과거에 수강했던 과목체크합니다 과목코드를 기반으로 ex) 과목코드가 111인 과목을 수강하면 past[111] 값을 1로 합니다
    int * answer[30]; //30set의 검색한 과목을 저장합니다 ex) answer[0][1~5] = 점수가 가장높은(0순위) 과목 세트는 1,12,5,7,31 이런식으로 과목 배열번호를 저장하고있습니다.
    int * semianswer; //임시 포인터입니다 . 현재 탐색한 mysubject 배열을 담고, 점수에 따라서 answer에 등록할지 말지 판단합니다.
    int answerpoint[30]; //탐색한 과목 set가 몇점인지 저장하는 배열입니다. 점수 높은순서대로 answer이랑 함께 저장합니다
    int sbnumber[30];	// 탐색한 과목 set에 과목이 몇개 있는지 저장한 배열입니다.
                        // ex) 탐색한 과목의 배열번호가 1, 3, 5 이고 점수가 가장 높은 set 라면 answerpoint[0][1~3]=1,3,5 sbnumber[0]은 3입니다
    int minanswer;		// 탐색한 30개 set 과목중에 가장 낮은 점수가 몇점짜리 set인지 기억합니다
    int info[1000000]; // 과목코드에 따른 그 과목이 몇번째 배열인지 표시.
    int find_s;	// 사용자가 몇과목을 탐색할지 지정해줍니다.

                /* 사용자 정보에 대한 변수입니다.*/
    int empty_s; // 원하는 공강날짜 표시 0을 기준으로 월요일
    int mainpoint;//서칭한 과목들이 총 몇학점인지 나타 냅니다
    int subjectpoint;	//사용자가 선호과목에 얼만큼 비중을 둘지 정하는 변수입니다.
    int timepoint;		//사용자가 최소공강시간에 얼만큼 비중을 둘지 정하는 변수입니다.
    int schoolnumber;	///사용자에게 학년을 입력받습니다.
    int userpoint;	// 사용자가 수강한 총학점
    int userinfo[20]; //졸업이수에 의거해서 현재 수강된 계열의 학점을 보여줍니다 ex) 전공 필수 32학점 졸업이수 기준 userinfo[x] = 10 이라면 10학점을 수강한것입니다.
    int usertime[7][20]; // 추천 시간표 혹은 현재의 시간표에 따라서 요일별 시간을 나타내는 배열입니다
                         //사용자 시간표 시간정보 usertime[0~4][]... 기준으로 월요일 & usertime[x][0] 여기 배열은 x요일에 몇과목인지 표시, user[0][1] = 10301145이런식으로 표시
    int proper[15];	///과목계열 선호도입니다 어떠한 계열을 얼만큼 선호하는지 순서대로 표시합니다
    int checkproper[15];///과목 선호도 체크배열입니다 / 탐색이 편중되는것을 막기위해 최초 1회만 proper 점수를 획득하게 만든 함수입니다.


                        /*input 텍스트 파일에서 입력 받는 것들입니다.*/

                        //subject sep[11][150]; //나중에 전공이나 계열별로 분류할수 있기에 생성은 했지만 주석처리 했습니다.
    int limit_cnt; // 학년제한 관련 변수입니다 2학년 이상 수강과목이면 limit[5] = { 0, 0, 1, 1, 1 } 로 만들기 위해 필요한 변수입니다
    int count1;
    int instant[20];

    int testtime(int tt);	// 현재 서칭하고 있는 과목들이랑 시간이나 공강이 겹치지 않는지 확인하는 함수.

};

#endif // TIMETABLE_H
