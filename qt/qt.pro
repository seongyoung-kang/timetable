#-------------------------------------------------
#
# Project created by QtCreator 2016-10-31T01:07:06
#
#-------------------------------------------------

QT       += core gui

greaterThan(QT_MAJOR_VERSION, 4): QT += widgets

TARGET = qt
TEMPLATE = app


SOURCES += main.cpp\
        mainwindow.cpp \
    mybutton.cpp \
    timetable.cpp

HEADERS  += mainwindow.h \
    mybutton.h \
    timetable.h

FORMS    += mainwindow.ui

DISTFILES += \
    input.txt
