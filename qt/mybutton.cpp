#include "mybutton.h"

MyButton::MyButton(QWidget *parent) : QPushButton(parent)
{
    this->show();
    this->setType(0);
    this->setGeometry(0,0,this->widthSize, this->heightSize);
}

void MyButton::setPos(int row, int col)
{
    this->setGeometry(QRect(this->widthSize*row, this->heightSize*col, this->width(), this->height()));
}

void MyButton::setType(int type)
{
    this->buttonType = type;
    if(0 == type)
    {
        this->widthSize=91;
        this->heightSize=48;
    }
    else
    {
        this->widthSize=91;
        this->heightSize=70;
    }
    this->setGeometry(this->x(), this->y(), this->widthSize, this->heightSize);
}
