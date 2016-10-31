#include "threadtest.h"

ThreadTest::ThreadTest(QObject *parent):
    QThread(parent)
{
}

void ThreadTest::run()
{
    int high_count=0;
    int low_count;

    while(high_count<10000)
    {
        high_count++;
        low_count=0;
        while(low_count<100000)
            low_count++;
    }

    emit FInishCount(high_count);
}
