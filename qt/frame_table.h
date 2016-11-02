#ifndef FRAME_TABLE_H
#define FRAME_TABLE_H

#include <QFrame>

namespace Ui {
class Frame_table;
}

class Frame_table : public QFrame
{
    Q_OBJECT

public:
    explicit Frame_table(QWidget *parent = 0);
    ~Frame_table();

private:
    Ui::Frame_table *ui;
};

#endif // FRAME_TABLE_H
