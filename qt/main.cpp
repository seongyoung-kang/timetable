#include "mainwindow.h"
#include <QApplication>
#include "ui_mainwindow.h"
#include "MyButton.h"
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
    QApplication a(argc, argv);
    MainWindow w;
    w.show();

    QVector<MyButton*> buttons;
    buttons.push_back(new MyButton(w.ui->mainFrame));
    buttons[0]->setText("first");
    buttons.push_back(new MyButton(w.ui->mainFrame));
    buttons[1]->setText("second");
    buttons[1]->setPos(1,1);
    buttons.push_back(new MyButton(w.ui->mainFrame));
    buttons[2]->setText("third");
    buttons.push_back(new MyButton(w.ui->mainFrame));
    buttons[3]->setText("forth");
    buttons[3]->setType(1);
    buttons[3]->setPos(2,1);
    buttons.push_back(new MyButton(w.ui->mainFrame));
    buttons[4]->setText("fith");
    buttons[4]->setType(1);
    buttons[4]->setPos(3,2);

    for(int i=0;i<buttons.size();i++)
        buttons[i]->show();
    buttons[1]->raise();

    return a.exec();
}
