#include<stdio.h>
#include<iostream>
#include<string.h>
#pragma warning(disable:4996)
#define endtime(x) x%10000
#define starttime(x) x/10000
#include<algorithm>
#include<stdlib.h>
char * date[7] = { "월","화", "수", "목", "금", "토", "일" };
char * subjectname[11] = { "기초, 교양", "문학.언어", "역사.철학", "정치.경제.사회.세계", "과학.기술.자연", "예.체능계", "인성교육", "전공기초교양", "학부기초", "일반 전공", "전공필수" };
int subpoint[11] = { 8, 2, 2, 2, 2, 2, 6, 11, 23, 42, 32 };
int tl;
int testcase[100000][30];
int msearch(int k, int cnt);
int calculate(void);
int schoolnumber;
int compare(const void *a, const void *b)
{
	const int *da = (const int *)a;
	const int *db = (const int *)b;
 
	return (*da > *db) - (*da < *db);
}
int instant[20];
typedef struct subject
{
	char name[20];	//과목이름
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
	int limit; // 학년제한 네자리숫자 1100 이런식으로 / 나머지는 학과 제한여부
	int point; //학점
}subject;
 
int past[1000000]; // 과거에 수강했던 과목체크
int * answer[30]; //30set의 검색한 과목을 저장함
int * semianswer; //임시 포인터로
int answerpoint[30];
int sbnumber[30];
int minanswer;
int info[1000000]; // 과목코드에 따른 그 과목이 몇번째 배열인지 표시.
 
subject arr[800];	//과목 배열
subject sep[11][150]; //과목별로 분류한 배열
int s1max; // 전공과목 갯수
int s2max; // 교양과목 갯수
int subjectpoint;
int timepoint;
int userinfo[20]; //졸업이수에 의한 현재 수강된 계열현황 표시
 
int userpoint;	// 사용자가 수강한 총학점
 
int mysubject[30]; // 사용자가 수강할 과목 , 코드번호가아닌 arr 번호로 입력받는다
int number; ///mysubject의 갯수
int usertime[7][10]; // 사용자 시간표 시간정보 usertime[0][]... 기준으로 월요일 & usertime[x][0] 여기 배열은 x요일에 몇과목인지 표시 user[0][1] = 10301145이런식으로 표시
 
int mainpoint;
int find;
int proper[15];	///과목계열 선호도
int checkproper[15];///과목 선호도 체크
int empty; // 공강날짜 표시
 
int testtime(int tt)
{
	int j;
	int st;
	int end;
	int eend;
	int sst;
	int r;
	int day;
	for (j = 0; j < arr[tt].date; j++) //주 몇회수업인지
	{
		day = arr[tt].day[j];//탐색중인 과목 요일
		if (day == empty)
		{
			break; //그 요일이 공강이랑 겹치면 break
		}
 
 
		st = starttime(arr[tt].time[j]); //탐색과목의 시작시간
		end = endtime(arr[tt].time[j]); //탐색과목의 종료시간
 
		for (r = 1; r <= usertime[day][0]; r++) ///기존에 수강을하려고 했던 과목이랑 겹치는 시간이 있는지 확인
		{
			sst = starttime(usertime[day][r]);
			eend = endtime(usertime[day][r]);
 
			if ((st < sst && end < sst) || (st > eend && end > eend))
			{
				continue;
			}
			else break;
		}
		if (r != usertime[day][0] + 1) return 0;
	}
	if (j != arr[tt].date)return 0;
	else return 1;
}
int main()
{
	// 1 들었던 과목 체크
	// 2 현황 표시 (졸업 이수 학점에 의한 현재 학점 여부 표시)
	// 3 선호도 체크 ( 교양에따른 , 공강여부 , 과목에따른 (전공선택 or 전공필수 ) )
	// 4 꼭 듣고싶은 과목 입력
	// 5 전공탐색
	// 6 교양탐색
	int codenumber; // 과거 수강과목
	minanswer = 0;
	int i, j;
	FILE * in = fopen("input.txt", "r");
	FILE * out = fopen("output.txt", "w");
	/*FILE * in0 = fopen("input.txt", "r");
	FILE * in1 = fopen("input.txt", "r");
	FILE * in2 = fopen("input.txt", "r");
	FILE * in3 = fopen("input.txt", "r");
	FILE * in4 = fopen("input.txt", "r");
	FILE * in5 = fopen("input.txt", "r");
	FILE * in6 = fopen("input.txt", "r");
	FILE * in7 = fopen("input.txt", "r");
	FILE * in8 = fopen("input.txt", "r");
	FILE * in9 = fopen("input.txt", "r");
	FILE * in10 = fopen("input.txt", "r");*/
 
	fscanf(in, "%d", &s1max);
	/// 인풋이 들어옴 arr로
 
	for (i = 1; i <= s1max; i++)
	{
		fscanf(in, "%s", arr[i].name);
		fscanf(in, "%s", arr[i].propessor);
		fscanf(in, "%d", &arr[i].code);
		info[arr[i].code] = i;
 
		fscanf(in, "%d", &arr[i].date);
		for (j = 0; j < arr[i].date; j++)
			fscanf(in, "%d", &arr[i].day[j]);
 
		for (j = 0; j < arr[i].date; j++)
			fscanf(in, "%d", &arr[i].time[j]);
 
		fscanf(in, "%d", &arr[i].major);
		fscanf(in, "%d", &arr[i].id);
		fscanf(in, "%d", &arr[i].limit);
		fscanf(in, "%d", &arr[i].point);
 
	}
 
	
	printf("과거에 수강했던 과목을 입력해주시고, 입력이 끝났으면 0을 입력해주세요\n");
 
	while (1)
	{
		scanf("%d", &codenumber);
		if (codenumber != 0)
		{
			if (past[codenumber] != 1)
			{
				past[codenumber] = 1;
				userinfo[arr[info[codenumber]].id] += arr[info[codenumber]].point;
				userpoint += arr[info[codenumber]].point;
			}
			else
			{
				printf("과목 중복입니다 \n");
			}
		}
		else
			break;
	}
	
 
	/*
	user 에게 현황 보고.
	userinfo 배열에 있는것을 참고해서 현재 수강한 과목에의한 졸업 요건을 보여줌
 
	계열	  이수해야하는학점		이수학점		완성도
	0	기초 교양 		9				7				7/9 * 100 ...
	1	문학.언어		2				2
	2	역사.철학		2				2
	3	정치.경제.사회.세계	2			2
	4	과학.기술.자연		2			2
	5	예.체능계		2				2
	6	인성교육		6				2
	7	전공기초교양		17			12
	8	학부기초		59				31
	9	전공			33				22
	*/
	printf("계열		이수해야하는 학점			이수 학점				완성도 \n");
	for (i = 0; i < 11; i++)
		printf("%s		%d				%d		%.2f\n", subjectname[i], subpoint[i], userinfo[i], (double)userinfo[i] * 100 / subpoint[i]);
 
 
	//	과목 점수랑 공강시간 점수 입력
	printf("과목 비율과 공강시간 비율을 입력해주세요 \n");
	scanf("%d %d", &subjectpoint, &timepoint);
	printf("학년을 입력해주세요 \n");
	scanf("%d", &schoolnumber);
	for (i = 0; i < 11; i++) ///과목선호도 입력
	{
		printf("%s 과목의 과목 선호도를 입력해주세요 ", subjectname[i]);
		scanf("%d", &proper[i]);
	}
	printf("학교나오기 싫은날을 입력해주세요 \n");
	scanf("%d", &empty); //공강날짜 입력 상관없을시 0을 입력받습니다
 
						 // 이제 꼭 수강해야하는 과목을 입력받습니다.
						 // 입력후..
	mainpoint = 0;
	int day;
 
	printf("수강을 꼭 해야하는 과목 갯수 입력해주세요\n");
	scanf("%d", &number);
	int r;
	int tt;
	printf("수강을 꼭 해야하는 과목 고유 번호를 입력해주세요\n");
	for (i = 0; i < number; i++)
	{
		scanf("%d", &tt);
		if (past[arr[tt].code] == 1)
		{
			i--;
			printf("과거에 수강했던 과목 입니다. 다시 입력해주세요 \n");
			continue;
		}
		r = testtime(tt);
		if (r == 1)
		{
			mysubject[i] = tt;
			mainpoint += arr[tt].point;
			for (j = 0; j < arr[tt].date; j++) //주 몇회수업인지
			{
				day = arr[tt].day[j];
				usertime[day][0]++;
				usertime[day][usertime[day][0]] = arr[tt].time[j];
			}
			past[arr[tt].code] = 1;
			printf("%d 번 %s 수업 저장 완료 ! \n", tt,arr[tt].name);
		}
		else
		{
			printf("시간이 겹치거나, 학교가기 싫은날입니다. !\n");
			i--;
		}
	}
 
	for (i = 0; i < number;i++)
	{
		printf("현재 저장된 과목 %d 번째 %s  \n", i+1, arr[mysubject[i]].name);
	}
	printf("현재 요일별 시간 입니다 \n\n");
	
	for (i = 0; i < 7; i++)
	{
		printf("%s ", date[i]);
		for (j = 0; j < 10; j++)
		{
			if (j == 0)printf(" 수업갯수!  ");
			printf("%d ", usertime[i][j]);
		}
		printf("\n\n");
	}
	
	printf("몇과목을 찾아드릴까요? \n");
	scanf("%d", &find);
	// mysubject 배열에 number수 만큼 과목이 입력되어있고,(입력시에 과목코드가 아닌 실제 arr의 번호로 입력되어 있다고 가정, past배열에도 표시되어있음)
	// time에 또한 시간이 표시되어있음
	tl = 0;
	int subn = number;
	msearch(1, 0);// 메인과목찾기
 
	int sss;
	int qqq;
	int u;
	int ii, jj;
	int s1, s2;
	for (i = 0; i < 10; i++)
	{
		printf("%d 번째 과목추천 세트입니다\n", i);
		for (j = 0; j < find + subn; j++)
		{
			printf("과목 고유코드 %d  %s 점수 = %d \n", answer[i][j], arr[answer[i][j]].name,answerpoint[i]);
		}
		for (j = 0; j < find + subn; j++)
		{
			for (u = 0; u < arr[answer[i][j]].date;u++) //answer[i][j].datefor(j = 0; j < arr[i].date; j++) //주 몇회수업인지
			{
				day = arr[answer[i][j]].day[u];
				usertime[day][0]++;
				usertime[day][usertime[day][0]] = arr[answer[i][j]].time[u];
			}
		}
		for (s1 = 0; s1 < 7; s1++)
		{
			printf("%s ", date[s1]);
			for (s2 = 0; s2 < 10; s2++)
			{
				if (s2 == 0)printf(" 수업갯수!  ");
				printf("%d ", usertime[s1][s2]);
			}
			printf("\n\n");
		}
		for (s1 = 0; s1 < 7; s1++)
		{
			for (s2 = 0; s2 < 10; s2++)
			{
				
				usertime[s1][s2] = 0;
			}
		}
		printf("\n\n\n");
 
	}
 
	//과목 서칭 완료!
	//answer 은 포인터 배열로 arr[answer[][1~10]].name 이런식으로 하나씩 과목을 추천해줄것임.
	/*for (i = 0; i < 10; i++)
	{
		for (j = 0; j < 2; j++)
		{
			printf("과목 %d번째 세트입니다 %s ", i + 1, arr[answer[i][j]].name);
		}
	}
	*/
	fprintf(out, "%d", 1);
}
 
/*
int starttime(int x)
{
return x/10000;
 
}
int endtime(int x)
{
return x %10000;
}
*/
int msearch(int k, int cnt)
{
	int i;
	int j;
	int r;
	int st;
	int end;
	int day;
	int sst;
	int eend;
	int point;
	int q;
	/*if (find == cnt)
	{
		for (i = 0; i < number; i++)
		{
			testcase[tl][i] = mysubject[i];
		}
		tl++;
		return 0;
	}*/
	
	if (cnt == find)
	{
		//포인트 합산후 등록~ & return;
		point = calculate();
		if (point > minanswer)
		{
			delete[]answer[29];
			answerpoint[29] = 0;
			sbnumber[29] = 0;
			semianswer = new int[number];
 
			for (i = 0; i < number; i++)
				semianswer[i] = mysubject[i];
 
			for (i = 0; i < 30; i++)
			{
				q = 0;
				if (answerpoint[i] < point)
				{
					for (j = 29; j>i; j--)
					{
						answerpoint[j] = answerpoint[j - 1];
						answer[j] = answer[j - 1];
						sbnumber[j] = sbnumber[j - 1];
					}
					answerpoint[i] = point;
					answer[i] = semianswer;
					sbnumber[i] = number;
					q = 1;
				}
 
				if (q == 1)break;
			}
			minanswer = answerpoint[29];
		}
		return 0;
	}
	
	for (i = k ; i < s1max; i++)
	{
		if (past[arr[i].code] != 1) ///수강했던과목인지 확인.
		{
			r = testtime(i);
			if (r == 1) //모든조건을 만족한다면
			{
				//추가 시작
 
				for (j = 0; j < arr[i].date; j++) //주 몇회수업인지
				{
					day = arr[i].day[j];
					usertime[day][0]++;
					usertime[day][usertime[day][0]] = arr[i].time[j];
				}
				mysubject[number] = i;
				number++;
				mainpoint += arr[i].point;
				past[arr[i].code] = 1;
 
				msearch(i + 1, cnt + 1); //재귀
 
										 // 빼주기
 
				number--;
				mysubject[number] = 0;
				mainpoint -= arr[i].point;
				past[arr[i].code] = 0;
 
				for (j = 0; j < arr[i].date; j++) //주 몇회수업인지
				{
					day = arr[i].day[j];
					usertime[day][usertime[day][0]] = 0;
					usertime[day][0]--;
				}
			}
 
		}
	}
}
 
int calculate(void)
{
	int i, j;
	int tcalpoint;
	int scalpoint;
	tcalpoint = 0;
	scalpoint = 0;
	int a, b, c, d;
	for (i = 0; i < number; i++)
	{
		if (checkproper[arr[mysubject[i]].id] == 0)
		{
			scalpoint += proper[arr[mysubject[i]].id] * arr[mysubject[i]].point;
			checkproper[arr[mysubject[i]].id] = 1;
		}
	}
 
	for (i = 0; i < 7; i++)
	{
		if (usertime[i][0] != 0)
		{
			for (j = 1; j <= usertime[i][0]; j++)
			{
				instant[j - 1] = usertime[i][j];
			}
			qsort(instant, usertime[i][0], sizeof(int), compare);
 
			for (j = 0; j < usertime[i][j] - 1; j++)
			{
				a = (endtime(instant[j]) / 100) * 60 + endtime(instant[j]) % 100;
				b = (starttime(instant[i + 1]) / 100) * 60 + starttime(instant[i + 1]) % 100;
				tcalpoint += b - a;
			}
		}
	}
	tcalpoint = 100 - (tcalpoint / 15);
	for (i = 0; i < 11; i++)
		checkproper[i] = 0;
 
	return (tcalpoint*timepoint) + (scalpoint*subjectpoint);
}
