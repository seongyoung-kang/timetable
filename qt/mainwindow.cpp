#include "mainwindow.h"
#include "ui_mainwindow.h"

MainWindow::MainWindow(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::MainWindow)
{
    ui->setupUi(this);

    QVector<QVBoxLayout*> vertical_vec;
    for(int i=0;i<7;i++)
    {
        vertical_vec.push_back(new QVBoxLayout);
    }
    for(int i=0;i<7;i++)
    {
        for(int j=0;j<12;j++)
        {
            QLabel* label = new QLabel;
            label->setText(QString("%1").arg(j));
            vertical_vec[i]->addWidget(label);
        }
    }
    for(int i=0;i<7;i++)
        ui->horizontalLayout_2->addLayout(vertical_vec[i]);
}

MainWindow::~MainWindow()
{
    delete ui;
}
