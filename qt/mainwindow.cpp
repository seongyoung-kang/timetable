#include "mainwindow.h"
#include "ui_mainwindow.h"

MainWindow::MainWindow(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::MainWindow)
{
    ui->setupUi(this);
    ui->tabWidget->setTabText(0,"시간표");
    ui->tabWidget->setTabText(1,"수정");
}

MainWindow::~MainWindow()
{
    delete ui;
}
