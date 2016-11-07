#include "mybutton.h"

MyButton::MyButton(QWidget *parent) : QPushButton(parent)
{
    this->show();
    this->setType(0);
}

void MyButton::setPos(int row, int col)
{
    this->row = row;
    this->col = col;
    this->move(row*this->widthSize, col*this->heightSize);
}

void MyButton::setType(int type)
{
    if(0 == type)
        this->heightSize=42;
    else
        this->heightSize=62;
    this->resize(this->widthSize, this->heightSize);
}
