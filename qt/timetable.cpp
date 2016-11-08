#include "timetable.h"


Timetable::Timetable()
{

}


int Timetable::testtime(int tt)	// 현재 서칭하고 있는 과목들이랑 시간이나 공강이 겹치지 않는지 확인하는 함수.
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
        if (day == empty_s)
        {
            break; //그 요일이 공강이랑 겹치면 break
        }
        if (arr[tt].limit[schoolnumber] == 0) break;

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


void Timetable::timetable(void) {

    FILE * out = fopen("subjectnumber.txt", "w");
    fstream inputFile("input1.txt");
    string str;
    count1 = 1;
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
    std::regex r2("학부(과)기초");//1
    std::regex r3("자유교양");//2
    std::regex r4("핵심교양");//3
    std::regex r5("전공선택");//4
    std::regex r6("전공기초교양");//5

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
                        limit_cnt = cstr[6] - '0';
                        for (j = limit_cnt; j <= 4; j++)
                        {
                            arr[count1].limit[j] = 1;
                        }

                    }
                    if (k == 1)
                    {
                        if (regex_search(str, m, r1))arr[count1].id = 0;
                        if (regex_search(str, m, r2))arr[count1].id = 1;
                        if (regex_search(str, m, r3))arr[count1].id = 2;
                        if (regex_search(str, m, r4))arr[count1].id = 3;
                        if (regex_search(str, m, r5))arr[count1].id = 4;
                        if (regex_search(str, m, r6))arr[count1].id = 5;

                    }
                    if (k == 2)
                    {
                        multi = 10000;
                        strcpy_s(cstr, str.c_str());
                        for (j = 6; j <= 10; j++)
                        {
                            arr[count1].code += (cstr[j] - '0') *multi;
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
                    {
                    }
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
                        arr[count1].point = cstr[6] - '0';
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

                    if (regex_search(str, m, d_check1))arr[count1].day[arr[count1].date] = 0;
                    if (regex_search(str, m, d_check2))arr[count1].day[arr[count1].date] = 1;
                    if (regex_search(str, m, d_check3))arr[count1].day[arr[count1].date] = 2;
                    if (regex_search(str, m, d_check4))arr[count1].day[arr[count1].date] = 3;
                    if (regex_search(str, m, d_check5))arr[count1].day[arr[count1].date] = 4;
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

            }
            arr[count1].date++;
            info[arr[count1].code] = count1;
            count1++;
        }


    }

    //사용자에게 과목 배열을 보여줍니다.

    fprintf(out, "요일은 0 을기준으로 월요일입니다 알맞은 과목을 확인해주세요 \n\n");
    for (int i = 1; i < count1; i++)
    {
        fprintf(out, "넘버 %d \n", i);
        fprintf(out, "과목이름  = %s \n", arr[i].name);
        fprintf(out, "교수님 이름  = %s \n", arr[i].propessor);
        fprintf(out, "과목코드 %d \n", arr[i].code);
        fprintf(out, "몇일 수업인지 %d \n", arr[i].date);
        for (j = 0; j < arr[i].date; j++)
        {
            fprintf(out, "무슨요일 %d 몇시수업 %d\n", arr[i].day[j], arr[i].time[j]);
        }
        fprintf(out, "과목특성 %d\n", arr[i].id);
        fprintf(out, "학년제한 ");
        for (j = 1; j <= 4; j++)
        {
            fprintf(out, "%d", arr[i].limit[j]);
        }
        fprintf(out, "\n");
        fprintf(out, "학점 = %d\n", arr[i].point);
        fprintf(out, "\n");
        fprintf(out, "\n");
    }



    /*함수의 전반적인 흐름입니다*/
    // 1 들었던 과목 체크
    // 2 현황 표시 (졸업 이수 학점에 의한 현재 학점 여부 표시)
    // 3 선호도 체크 ( 교양에따른 , 공강여부 , 과목에따른 (전공선택 or 전공필수 ) )
    // 4 꼭 듣고싶은 과목 입력 (이 과목을 무조건 포함시키고 서칭합니다 )
    // 5 전공탐색
    // 6 30set의 과목탐색결과를 출력 & 점수도 같이 출력

    int codenumber; // 과거 수강과목
    minanswer = 0;
    int i;
    FILE * out1 = fopen("searching.txt", "w");

    printf("과거에 수강했던 과목의 과목코드을 입력해주시고, 입력이 끝났으면 0을 입력해주세요\n");

    while (1)
    {
        scanf("%d", &codenumber);	///과거에 수강했던 과목의 과목코드를 입력합니다
        if (codenumber != 0 )
        {
            if (past[codenumber] != 1 && arr[info[codenumber]].point != 0)
            {
                past[codenumber] = 1;	// past배열에서 저정해서 탐색시에 과거에 수강했던 과목을 배제합니다.
                userinfo[arr[info[codenumber]].id] += arr[info[codenumber]].point;	//
                userpoint += arr[info[codenumber]].point;
                printf("%s 과목 수강 완료! \n", arr[info[codenumber]].name);
            }
            else
            {
                printf("과목 중복이거나 없는과목 입니다 \n");
            }
        }
        else
            break;
    }


    /*
    user 에게 현황 보고.
    userinfo 배열에 있는것을 참고해서 현재 수강한 과목에의한 졸업 요건을 보여줌

    계열	  이수해야하는학점		이수학점		완성도

    */
    printf("현재 수강현황입니다. 핵심교양과 자유교양은 합쳐서 20학점 넘으면 됩니다\n");
    printf("계열		이수해야하는 학점		   이수 학점	     완성도 \n");
    for (i = 0; i < 6; i++)
    {
        if (i == 3) continue;
        if (i == 2) userinfo[i] = userinfo[i] + userinfo[i + 1];
        printf("%s		%d				%d		%.2f\n", subjectname[i], subpoint[i], userinfo[i], (double)userinfo[i] * 100 / subpoint[i]);

    }

    //	과목 점수랑 공강시간 점수 입력
    printf("과목 비율과 공강시간 비율을 입력해주세요 \n");
    scanf("%d %d", &subjectpoint, &timepoint);
    printf("학년을 입력해주세요 \n");
    scanf("%d", &schoolnumber);

    for (i = 0; i < 6; i++) ///과목선호도 입력
    {
        printf("%s 과목의 과목 선호도를 입력해주세요 ", subjectname[i]);
        scanf("%d", &proper[i]);
    }

    printf("학교나오기 싫은날을 입력해주세요 \n");
    scanf("%d", &empty_s); //공강날짜 입력 상관없을시 5이상을 입력받습니다

    mainpoint = 0;	//현재 수강 예정중인 학점은 아직 0 입니다
    int day;

    printf("이미 수강하기로 정해놓으신 과목 갯수 입력해주세요\n");
    scanf("%d", &number);
    int r;
    int tt;
    printf("수강하기로 정해놓으신 과목의 넘버를 입력해주세요\n");
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
            printf("%d 번 %s 수업 저장 완료 ! \n", tt, arr[tt].name);
        }
        else
        {
            printf("시간이 겹치거나, 학교가기 싫은날 , 또는 학년이 안맞습니다. !\n");
            i--;
        }
    }

    for (i = 0; i < number; i++)
    {
        printf("현재 저장된 과목 %d 번째 %s  \n", i + 1, arr[mysubject[i]].name);
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
    scanf("%d", &find_s);
    // mysubject 배열에 number수 만큼 과목이 입력되어있고,(입력시에 과목코드가 아닌 실제 arr의 번호로 입력되어 있다고 가정, past배열에도 표시되어있음)
    // time에 또한 시간이 표시되어있음
    int subn = number;
    msearch(1, 0);// 메인과목찾기

    int u;
    int s1, s2;
    for (i = 0; i < 30; i++)
    {
        fprintf(out1, "%d 번째 과목추천 세트입니다\n", i);
        for (j = 0; j < find_s + subn; j++)
        {
            fprintf(out1, "과목 고유코드 %d  %s 점수 = %d \n", answer[i][j], arr[answer[i][j]].name, answerpoint[i]);
        }
        for (j = 0; j < find_s + subn; j++)
        {
            for (u = 0; u < arr[answer[i][j]].date; u++) //answer[i][j].datefor(j = 0; j < arr[i].date; j++) //주 몇회수업인지
            {
                day = arr[answer[i][j]].day[u];
                usertime[day][0]++;
                usertime[day][usertime[day][0]] = arr[answer[i][j]].time[u];
            }
        }
        for (s1 = 0; s1 < 7; s1++)
        {
            fprintf(out1, "%s ", date[s1]);
            for (s2 = 0; s2 < 10; s2++)
            {
                if (s2 == 0)fprintf(out1, " 수업갯수!  ");
                else fprintf(out1, "%d ", usertime[s1][s2]);
            }
            fprintf(out1, "\n\n");
        }
        for (s1 = 0; s1 < 7; s1++)
        {
            for (s2 = 0; s2 < 10; s2++)
            {

                usertime[s1][s2] = 0;
            }
        }
        fprintf(out1, "\n\n\n");

    }
    system("pause");
}

int Timetable::msearch(int k, int cnt)
{
    int i;
    int j;
    int r;
    int day;
    int point;
    int q;

    if (cnt == find_s)		// 원하는 횟수의 과목을 찾았을시에
    {
        //포인트 합산후 등록~ & return;
        point = calculate();
        if (point > minanswer)		// 30개의 set중에서 가장 낮은 점수를 가진 set보다 점수가 높을경우 등록을합니다.
        {
            delete[]answer[29];		/// answer 하나당 각각의 배열을 가지는데 그것은 서칭한 과목들입니다.
            answerpoint[29] = 0;	//	점수별로 정렬이 되어있기때문에, 맨마지막을 비우고 새로 탐색한 과목을 입력합니다.
            sbnumber[29] = 0;
            semianswer = new int[number];	//새로 등록할 과목 set입니다.

            for (i = 0; i < number; i++)
                semianswer[i] = mysubject[i];

            for (i = 0; i < 30; i++)
            {
                q = 0;
                if (answerpoint[i] < point)
                {
                    for (j = 29; j>i; j--)		// 원래 등록되어있던 과목 set중에서 자신보다 점수가 높은 set가 나올때까지 찾고 그다음엔 밀어내기식으로 등록합니다.
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

                if (q == 1)break;	//q가 1일때는 이미 등록을 했으므로 빠져나옵니다.
            }
            minanswer = answerpoint[29];
        }
        return 0;
    }

    for (i = k; i < count1; i++)
    {
        if (past[arr[i].code] != 1) ///수강했던과목인지 확인.
        {
            r = testtime(i);	//과목이 현재 가지고있는 set랑 비교했을때 등록이 가능한지 따집니다.
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

int Timetable::calculate(void)//현재 탐색한 과목들의 조합이 몇점인지 나타 냅니다.
{
    int i, j;
    int tcalpoint;
    int scalpoint;
    tcalpoint = 0;
    scalpoint = 0;
    int a, b;
    for (i = 0; i < number; i++)	///선호도 점수를 계산합니다
    {
        if (checkproper[arr[mysubject[i]].id] == 0)
        {
            //최초엔 과목계열별 checkproper이 0입니다 왜냐하면, 최초 1회 탐색시에만 선호도에 대한 점수를 주어서 편중현상을 막기 위해서입니다

            scalpoint += proper[arr[mysubject[i]].id] * arr[mysubject[i]].point;	//과목선호도*학점
            checkproper[arr[mysubject[i]].id] = 1;	//한번 점수를 얻은 선호도는 더이상 가산점이 없습니다 즉 선호도를 전공필수에10을 주었다면
                                                    //최초에 전공필수 한과목에 대해서만 점수가 들어갑니다.
        }
    }

    for (i = 0; i < 7; i++)
    {
        if (usertime[i][0] != 0)
        {
            for (j = 1; j <= usertime[i][0]; j++)	//instant 배열은 현재 요일에따른 시간정보를 sorting해서 공백시간이 얼만큼 있는지 계산하기 위한 배열입니다.
            {
                instant[j - 1] = usertime[i][j];
            }
            //qsort(instant, usertime[i][0], sizeof(int), compare); //정렬합니다
            int compare3;
            int compare1;
            int compare2;
            for (compare1 = 0; compare1 < usertime[i][0]; compare1++)
            {
                for (compare2 = compare1+1; compare2 < usertime[i][0]; compare2++)
                {
                    if (instant[compare1] > instant[compare2])
                    {
                        compare3 = instant[compare2];
                        instant[compare2] = instant[compare1];
                        instant[compare1] = compare3;
                    }
                }
            }

            for (j = 0; j < usertime[i][0] - 1; j++)	///공백시간에 따른 점수를 부여합니다 저는 15분단위로 즉, 15분 공강이 생길때마다 1점씩 깎았습니다.
            {
                a = ((endtime(instant[j]) / 100) * 60) + (endtime(instant[j]) % 100);
                b = ((starttime(instant[j + 1]) / 100) * 60) + starttime(instant[j + 1]) % 100;
                tcalpoint += b - a;
            }

        }
    }

    tcalpoint = 100 - (tcalpoint / 15);
    for (i = 0; i < 11; i++)
        checkproper[i] = 0;

    return (tcalpoint*timepoint) + (scalpoint*subjectpoint);


}
