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
