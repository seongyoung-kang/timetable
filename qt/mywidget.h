#ifndef MYWIDGET_H
#define MYWIDGET_H

#include <QWidget>
#include <QLabel>

class mywidget
{
public:
    mywidget();
private:
    void addwidget(QWidget* widget);
    QWidget* widget;
};

#endif // MYWIDGET_H
