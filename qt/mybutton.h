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
    int widthSize=90;
    int heightSize;
    int row;
    int col;

signals:

public slots:
};

#endif // MYBUTTON_H
