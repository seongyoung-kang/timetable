#include "frame_table.h"
#include "ui_frame_table.h"

Frame_table::Frame_table(QWidget *parent) :
    QFrame(parent),
    ui(new Ui::Frame_table)
{
    ui->setupUi(this);
}

Frame_table::~Frame_table()
{
    delete ui;
}
