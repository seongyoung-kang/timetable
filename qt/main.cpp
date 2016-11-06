#include "mainwindow.h"
#include <QApplication>
#include "ui_mainwindow.h"
#include "MyButton.h"

int main(int argc, char *argv[])
{
    QApplication a(argc, argv);
    MainWindow w;
    w.show();

    QVector<MyButton*> buttons;
    buttons.push_back(new MyButton());
    buttons[0]->setParent(w.ui->frame);
    buttons[0]->setText("first");
    buttons[0]->setPos(0,0);
    buttons.push_back(new MyButton(w.ui->frame));
    buttons[1]->setText("second");
    buttons[1]->move(10,10);
    buttons.push_back(new MyButton(w.ui->frame));
    buttons[2]->setText("third");
    buttons.push_back(new MyButton(w.ui->frame));
    buttons[3]->setText("forth");
    buttons[3]->setType(1);
    buttons[3]->setPos(2,1);
    buttons.push_back(new MyButton(w.ui->frame));
    buttons[4]->setText("fith");
    buttons[4]->setPos(3,2);
    buttons[4]->setType(1);

    for(int i=0;i<buttons.size();i++)
        buttons[i]->show();
    buttons[1]->raise();

    return a.exec();
}
