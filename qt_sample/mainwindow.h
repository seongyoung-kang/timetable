#ifndef MAINWINDOW_H
#define MAINWINDOW_H

#include <QMainWindow>
#include <QString>
#include <QVector>
#include <QTimer>
#include "threadtest.h"

namespace Ui {
class MainWindow;
}

class MainWindow : public QMainWindow
{
    Q_OBJECT

public:
    explicit MainWindow(QWidget *parent = 0);
    ~MainWindow();

private slots:
    void on_pushButton_Count_clicked();

    void on_pushButton_Timer_clicked();

    void on_timer_count();

    void on_pushButton_Thread_clicked();

    void on_thread_finish(const int value);

private:
    Ui::MainWindow* ui;
    QTimer* m_timer;
    ThreadTest* m_thread;
};

#endif // MAINWINDOW_H
