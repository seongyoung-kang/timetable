#include "mainwindow.h"
#include "ui_mainwindow.h"

MainWindow::MainWindow(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::MainWindow)
{
    ui->setupUi(this);
    m_timer = new QTimer;
    connect(m_timer,SIGNAL(timeout()),this,SLOT(on_timer_count()));
    m_thread = new ThreadTest(this);
    connect(m_thread,SIGNAL(FInishCount(int)),this,SLOT(on_thread_finish(int)));
}

MainWindow::~MainWindow()
{
    delete ui;
}

void MainWindow::on_pushButton_Count_clicked()
{
    static int count=0;
    QString qstr = QString("%1 %2 %3").arg(count).arg(count+1).arg(count+2);
    ui->lineEdit->setText(qstr);
    count++;
}

void MainWindow::on_pushButton_Timer_clicked()
{
    m_timer->start(100);
}

void MainWindow::on_timer_count()
{
    static int count=0;
    static QVector<int> integers;
    integers.push_back(count);

    QString qstr = QString("%1 %2 %3").arg(integers[0]).arg(integers.last()).arg(integers.size());
    ui->lineEdit->setText(qstr);

    count++;
    if(100==count)
    {
        count=0;
        integers.clear();
        m_timer->stop();
    }
}

void MainWindow::on_pushButton_Thread_clicked()
{
    m_thread->start();
}

void MainWindow::on_thread_finish(const int value)
{
    if(m_thread->isFinished()==false)
        return;
    if(m_thread->isRunning()==true)
        return;

    QString qstr = QString("high_count=%1").arg(value);
    ui->lineEdit->setText(qstr);
}
