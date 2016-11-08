#include "mainwindow.h"
#include "ui_mainwindow.h"
#include "MyButton.h"
#include "timetable.h"


MainWindow::MainWindow(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::MainWindow)
{
    ui->setupUi(this);
    ui->tabWidget->setTabText(0,"시간표");
    ui->tabWidget->setTabText(1,"수정");

    for(int i=0;i<30;i++)
    {
        QListWidgetItem* item = new QListWidgetItem(ui->listWidget_2);
        item->setText(QString("%1번째 추천").arg(i));
        ui->listWidget_2->addItem(item);
    }

    QVector<MyButton*> buttons;
    buttons.push_back(new MyButton(ui->mainFrame));
    buttons[0]->setText("first");
    buttons.push_back(new MyButton(ui->mainFrame));
    buttons[1]->setText("second");
    buttons[1]->setPos(1,1);
    buttons.push_back(new MyButton(ui->mainFrame));
    buttons[2]->setText("third");
    buttons.push_back(new MyButton(ui->mainFrame));
    buttons[3]->setText("forth");
    buttons[3]->setType(1);
    buttons[3]->setPos(2,1);
    buttons.push_back(new MyButton(ui->mainFrame));
    buttons[4]->setText("fith");
    buttons[4]->setType(1);
    buttons[4]->setPos(3,2);

    for(int i=0;i<buttons.size();i++)
        buttons[i]->show();
    buttons[1]->raise();
}

MainWindow::~MainWindow()
{
    delete ui;
}
