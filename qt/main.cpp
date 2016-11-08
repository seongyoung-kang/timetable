#include "mainwindow.h"
#include <QApplication>
#include "ui_mainwindow.h"
#include "timetable.h"
/*
수강했던 과목 코드
과목 비율, 공강시간 비율
학년
과목 선호도-배열
공강날짜
꼭 수강해야하는 과목 갯수, 과목번호
찾는 과목 수
*/
int main(int argc, char *argv[])
{
    /*
    Timetable t;
    t.timetable();
    */

    QApplication a(argc, argv);
    MainWindow w;
    w.show();


    return a.exec();
}
