#ifndef MYBUTTON_H
#define MYBUTTON_H

#include <QPushButton>

class MyButton : public QPushButton
{
    Q_OBJECT
public:
    explicit MyButton(QWidget *parent = 0);
    void setPos(int row, int col);
    void setType(int type);

private:
    int buttonType=0;
    int widthSize=91;
    int heightSize=48;

signals:

public slots:
};

#endif // MYBUTTON_H
