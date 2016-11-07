#include <stdio.h>
#include<iostream>
#include<regex>
using std::tr1::regex;
using std::tr1::smatch;
using std::tr1::regex_match;
using std::string;
using namespace std;
#include<string.h>
char * cc;
//while(!feof(in))
#include <iostream>
#include <string>
#include <regex>
#include <fstream>
using namespace std;
int limit_cnt;
typedef struct subject		//과목의 정보를 담는 배열입니다.
{
	char name[30];	//과목이름
	char propessor[10];//교수님 성함
	int code;	//과목코드
	int date;	// 주 몇회 수업인지
	int day[5];	//무슨 무슨 요일 수업인지 0을 기준으로 월요일
	int time[5]; //몇시부터 몇시수업인지 ex 10301145
	int major; // 어느 학과 전공과목인지
	int id;		//& 과목특성 (철학,역사 등등... ) 또는 (일반선택 전공선택 필수...)
				/*
				코드번호 과목 특성    이수해야하는 학점
				계열	  이수해야하는학점		이수학점
				0	기초 교양 		8				7
 
				1	문학.언어		2				2
				2	역사.철학		2				2
				3	정치.경제.사회.세계	2			2
				4	과학.기술.자연		2			2
				5	예.체능계		2				2
				6	인성교육		6				2
 
				7	전공기초교양	11			12
				8	학부기초		23				31
				9	일반 전공		42				22
				10  전공필수		32
				*/
	int limit[5]; // 학년제한 네자리숫자 limit[1]이 1이면 1학년은 수강 가능하다는 뜻입니다.
	int point; //학점
}subject;
subject arr[1000];
int main(void) {
	
	/*FILE * in = fopen("input.txt", "rt");*/
	FILE * out = fopen("kk.txt", "w");
 
	fstream inputFile("input1.txt");
	string str;
	int count1 = 0;
	std::regex reg("\\[\\d+\\]");
	std::regex nb("&nbsp;");
	std::regex d_day("&nbsp;화|&nbsp;수|&nbsp;월|&nbsp;목|&nbsp;금|&nbsp;토");
	std::regex d_day1("<br>월|<br>화|<br>수|<br>목|<br>금|<br>토");
	std::regex d_time("\\d\\d\:\\d\\d\\-");
	std::regex d_check1("월");
	std::regex d_check2("화");
	std::regex d_check3("수");
	std::regex d_check4("목");
	std::regex d_check5("금");
	std::regex d_check6("토");
	std::regex r1("기초교양"); //0
	std::regex r2("학부(과)기초");//8
	std::regex r3("자유교양");//1
	std::regex r4("핵심교양");//2
	std::regex r5("전공선택");//9
	std::regex r6("전공기초교양");//7
 
	int multi;
	int sscheck;
	char cstr[200];
	smatch m;
	int k = 0;
	int j;
	while (!inputFile.eof())
	{
		inputFile >> str;
		if (regex_match(str, m, reg))
		{
			k = 0;
			while (k < 7)
			{
				inputFile >> str;
				if (regex_search(str, m, nb))
				{
					//cout << str << endl;
					//cout << cstr << endl;
					if (k == 0)
					{
						strcpy_s(cstr, str.c_str());
						limit_cnt = cstr[6]-'0';
						for (j = limit_cnt; j <= 4; j++)
						{
							arr[count1].limit[j] = 1;
						}
					
					}
					if (k == 1)
					{
						if (regex_search(str, m, r1))arr[count1].id = 0;
						if (regex_search(str, m, r2))arr[count1].id = 8;
						if (regex_search(str, m, r3))arr[count1].id = 1;
						if (regex_search(str, m, r4))arr[count1].id = 2;
						if (regex_search(str, m, r5))arr[count1].id = 9;
						if (regex_search(str, m, r6))arr[count1].id = 7;
						
					}
					if (k == 2)
					{
						multi = 10000;
						strcpy_s(cstr, str.c_str());
						for (j = 6; j <= 10; j++)
						{
							arr[count1].code += (cstr[j]-'0') *multi ;
							multi = multi / 10;
						}
						
					}
					if (k == 3)
					{
						strcpy_s(cstr, str.c_str());
						for (j = 6; j <= strlen(cstr); j++)
						{
							arr[count1].name[j - 6] = cstr[j];
						}
					
					}
					if (k == 4)//분반 추후에 입력
					{ }
					if (k == 5)
					{
						strcpy_s(cstr, str.c_str());
						for (j = 6; j <= strlen(cstr); j++)
						{
							arr[count1].propessor[j - 6] = cstr[j];
						}
					}
					if (k == 6)
					{
						strcpy_s(cstr, str.c_str());
						arr[count1].point = cstr[6]-'0';
					}
					k++;
				}
			}
			sscheck = 0;
			while (!regex_match(str, m, nb))
			{
				inputFile >> str;
				if (regex_match(str, m, d_day)) //요일매칭
				{
					if (sscheck != 0) arr[count1].date++;
					if (sscheck == 0)sscheck++;
					
					if (regex_search(str, m,d_check1))arr[count1].day[arr[count1].date] = 0;
					if (regex_search(str, m,d_check2))arr[count1].day[arr[count1].date] = 1;
					if (regex_search(str, m,d_check3))arr[count1].day[arr[count1].date] = 2;
					if (regex_search(str, m,d_check4))arr[count1].day[arr[count1].date] = 3;
					if (regex_search(str, m,d_check5))arr[count1].day[arr[count1].date] = 4;
					if (regex_search(str, m, d_check6))arr[count1].day[arr[count1].date] = 5;
				}
 
				if (regex_search(str, m, d_time))	//시간매칭
				{
					multi = 10000000;
					strcpy_s(cstr, str.c_str());
					if (cstr[2] == '(')
					{
						for (j = 1; j < 12; j++)
						{
							if (j != 3 && j != 6 && j != 9)
							{
								arr[count1].time[arr[count1].date] += (cstr[2 + j] - '0')*multi;
								multi = multi / 10;
							}
						}
					}
					else
					{
						for (j = 0; j < 11; j++)
						{
							if (j != 2 && j != 5 && j != 8)
							{
								arr[count1].time[arr[count1].date] += (cstr[2 + j] - '0')*multi;
								multi = multi / 10;
							}
						}
					}
					//printf("date = %d  time = %d\n", arr[count1].day[arr[count1].date], arr[count1].time[arr[count1].date]);
				
				}
 
				if (regex_search(str, m, d_day1))	//요일매칭
				{
					if (sscheck == 0)sscheck++;
					if (sscheck != 0) arr[count1].date++;
					
					if (regex_search(str, m, d_check1))arr[count1].day[arr[count1].date] = 0;
					if (regex_search(str, m, d_check2))arr[count1].day[arr[count1].date] = 1;
					if (regex_search(str, m, d_check3))arr[count1].day[arr[count1].date] = 2;
					if (regex_search(str, m, d_check4))arr[count1].day[arr[count1].date] = 3;
					if (regex_search(str, m, d_check5))arr[count1].day[arr[count1].date] = 4;
					if (regex_search(str, m, d_check6))arr[count1].day[arr[count1].date] = 5;
				}
 
				/*inputFile >> str;
				if (regex_search(str, m, d_time))
				{
					cout << str << endl;
 
				}*/
			}
			arr[count1].date++;
			count1++;
		}
		
		
	}
 
	for (int i = 0; i < count1; i++)
	{
		printf("넘버 %d \n", i);
		printf("과목이름  = %s \n", arr[i].name);
		printf("교수님 이름  = %s \n", arr[i].propessor);
		printf("과목코드 %d \n", arr[i].code);
		printf("몇일 수업인지 %d \n", arr[i].date);
		for (j = 0; j < arr[i].date; j++)
		{
			printf("무슨요일 %d 몇시수업 %d\n", arr[i].day[j], arr[i].time[j]);
		}
		printf("과목특성 %d\n", arr[i].id);
		printf("학년제한 ");
		for (j = 1; j <= 4; j++)
		{
			printf("%d", arr[i].limit[j]);
		}
		puts("");
		printf("학점 = %d\n", arr[i].point);
	}
	system("pause");
	return 0;
}
