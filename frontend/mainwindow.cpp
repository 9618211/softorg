#include "mainwindow.h"
#include "ui_mainwindow.h"

#include <QtNetwork/QNetworkReply>
#include <QtNetwork/QNetworkCookieJar>


MainWindow::MainWindow(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::MainWindow)
{
    ui->setupUi(this);

    //url = "http://lackhite.com/softorg/";
    url = "http://softorg/";

    request_tags.setUrl(QUrl(url + "softorg_add_tags.php"));
    request_userssoft.setUrl(QUrl(url + "softorg_add_userssoft.php"));
    request_softplatforms.setUrl(QUrl(url + "softorg_add_softplatforms.php"));
    request_softtags.setUrl(QUrl(url + "softorg_add_softtags.php"));
    request_soft.setUrl(QUrl(url + "softorg_add_soft.php"));
    request_users.setUrl(QUrl(url + "softorg_add_users.php"));
    request_developers.setUrl(QUrl(url + "softorg_add_developers.php"));
    request_customers.setUrl(QUrl(url + "softorg_add_customers.php"));
    request_softcategories.setUrl(QUrl(url + "softorg_add_softcategories.php"));
    request_platforms.setUrl(QUrl(url + "softorg_add_platforms.php"));
    request_paysystems.setUrl(QUrl(url + "softorg_add_paysystems.php"));

    request_tags.setRawHeader("Content-Type", "application/x-www-form-urlencoded");
    request_userssoft.setRawHeader("Content-Type", "application/x-www-form-urlencoded");
    request_softplatforms.setRawHeader("Content-Type", "application/x-www-form-urlencoded");
    request_softtags.setRawHeader("Content-Type", "application/x-www-form-urlencoded");
    request_soft.setRawHeader("Content-Type", "application/x-www-form-urlencoded");
    request_users.setRawHeader("Content-Type", "application/x-www-form-urlencoded");
    request_developers.setRawHeader("Content-Type", "application/x-www-form-urlencoded");
    request_customers.setRawHeader("Content-Type", "application/x-www-form-urlencoded");
    request_softcategories.setRawHeader("Content-Type", "application/x-www-form-urlencoded");
    request_platforms.setRawHeader("Content-Type", "application/x-www-form-urlencoded");
    request_paysystems.setRawHeader("Content-Type", "application/x-www-form-urlencoded");

    mgr = new QNetworkAccessManager(this);
    connect(mgr, SIGNAL(finished(QNetworkReply*)), this, SLOT(getResult(QNetworkReply*)));

    ui->webView->load(QUrl(url + "softorg_show.php?table=users"));

    ui->stackedWidget->setCurrentIndex(12);
    ui->stackedWidget_2->setCurrentIndex(0);
}

MainWindow::~MainWindow()
{
    delete ui;
}

void MainWindow::on_pushButton_2_clicked()
{
    ui->stackedWidget->setCurrentIndex(1);
}

void MainWindow::on_pushButton_clicked()
{
    ui->stackedWidget->setCurrentIndex(2);
}

void MainWindow::on_pushButton_3_clicked()
{
    ui->stackedWidget->setCurrentIndex(3);
}

void MainWindow::on_pushButton_4_clicked()
{
    ui->stackedWidget->setCurrentIndex(4);
}

void MainWindow::on_pushButton_27_clicked()
{
    ui->stackedWidget->setCurrentIndex(5);
}

void MainWindow::on_pushButton_28_clicked()
{
    ui->stackedWidget->setCurrentIndex(6);
}

void MainWindow::on_pushButton_29_clicked()
{
    ui->stackedWidget->setCurrentIndex(7);
}

void MainWindow::on_pushButton_30_clicked()
{
    ui->stackedWidget->setCurrentIndex(8);
}

void MainWindow::on_pushButton_31_clicked()
{
    ui->stackedWidget->setCurrentIndex(9);
}

void MainWindow::on_pushButton_32_clicked()
{
    ui->stackedWidget->setCurrentIndex(10);
}

void MainWindow::on_pushButton_33_clicked()
{
    ui->stackedWidget->setCurrentIndex(11);
}

void MainWindow::on_pushButton_12_clicked()
{
    //tags
    ui->webView->load(QUrl(url + "softorg_show.php?table=tags"));
    ui->stackedWidget->setCurrentIndex(0);
}

void MainWindow::on_pushButton_13_clicked()
{
    //paysystems
    ui->webView->load(QUrl(url + "softorg_show.php?table=paysystems"));
    ui->stackedWidget->setCurrentIndex(0);
}

void MainWindow::on_pushButton_14_clicked()
{
    //platforms
    ui->webView->load(QUrl(url + "softorg_show.php?table=platforms"));
    ui->stackedWidget->setCurrentIndex(0);
}

void MainWindow::on_pushButton_15_clicked()
{
    //softcategories
    ui->webView->load(QUrl(url + "softorg_show.php?table=softcategories"));
    ui->stackedWidget->setCurrentIndex(0);
}

void MainWindow::on_pushButton_16_clicked()
{
    //customers
    ui->webView->load(QUrl(url + "softorg_show.php?table=customers"));
    ui->stackedWidget->setCurrentIndex(0);
}

void MainWindow::on_pushButton_17_clicked()
{
    //developers
    ui->webView->load(QUrl(url + "softorg_show.php?table=developers"));
    ui->stackedWidget->setCurrentIndex(0);
}

void MainWindow::on_pushButton_18_clicked()
{
    //users
    ui->webView->load(QUrl(url + "softorg_show.php?table=users"));
    ui->stackedWidget->setCurrentIndex(0);
}

void MainWindow::on_pushButton_20_clicked()
{
    //soft
    ui->webView->load(QUrl(url + "softorg_show.php?table=soft"));
    ui->stackedWidget->setCurrentIndex(0);
}

void MainWindow::on_pushButton_22_clicked()
{
    //softtags
    ui->webView->load(QUrl(url + "softorg_show.php?table=softtags"));
    ui->stackedWidget->setCurrentIndex(0);
}

void MainWindow::on_pushButton_24_clicked()
{
    //softplatforms
    ui->webView->load(QUrl(url + "softorg_show.php?table=softplatforms"));
    ui->stackedWidget->setCurrentIndex(0);
}

void MainWindow::on_pushButton_26_clicked()
{
    //userssoft
    ui->webView->load(QUrl(url + "softorg_show.php?table=userssoft"));
    ui->stackedWidget->setCurrentIndex(0);
}

void MainWindow::on_pushButton_5_clicked()
{
    //tags
    QByteArray body;
    body.append("name=");
    body.append(ui->lineEdit->text().toUtf8().data());
    mgr->post(request_tags, body);
}

void MainWindow::on_pushButton_6_clicked()
{
    //paysystems
    QByteArray body;
    body.append("name=");
    body.append(ui->lineEdit_2->text().toUtf8().data());
    body.append("&data=");
    body.append(ui->lineEdit_12->text().toUtf8().data());
    mgr->post(request_paysystems, body);
}

void MainWindow::on_pushButton_7_clicked()
{
    //platforms

    QUrlQuery params;
    params.addQueryItem("name", ui->lineEdit_3->text());
    QByteArray data;
    data.append(params.toString());
    mgr->post(request_platforms, data);

    /*QUrl postData;
    postData.addQueryItem("name", ui->lineEdit_3->text());
    mgr->post(request_platforms, postData.encodedQuery());*/

    /*
    QByteArray body;
    body.append("name=");
    body.append(ui->lineEdit_3->text().toUtf8().data());
    mgr->post(request_platforms, body);*/
}

void MainWindow::on_pushButton_8_clicked()
{
    //softcategories
    QByteArray body;
    body.append("name=");
    body.append(ui->lineEdit_4->text().toUtf8().data());
    mgr->post(request_softcategories, body);
}

void MainWindow::on_pushButton_9_clicked()
{
    //customers
    QByteArray body;
    body.append("name=");
    body.append(ui->lineEdit_5->text().toUtf8().data());
    body.append("&bik=");
    body.append(ui->lineEdit_13->text().toUtf8().data());
    body.append("&bankaccount=");
    body.append(ui->lineEdit_14->text().toUtf8().data());
    body.append("&paysystems_id=");
    body.append(ui->lineEdit_15->text().toUtf8().data());
    mgr->post(request_customers, body);
}

void MainWindow::on_pushButton_10_clicked()
{
    //developers
    QByteArray body;
    body.append("name=");
    body.append(ui->lineEdit_6->text().toUtf8().data());
    body.append("&customers_id=");
    body.append(ui->lineEdit_16->text().toUtf8().data());
    mgr->post(request_developers, body);
}

void MainWindow::on_pushButton_11_clicked()
{
    //users
    QByteArray body;
    body.append("mail=");
    body.append(ui->lineEdit_7->text().toUtf8().data());
    body.append("&password=");
    body.append(ui->lineEdit_17->text().toUtf8().data());
    body.append("&name=");
    body.append(ui->lineEdit_18->text().toUtf8().data());
    body.append("&customers_id=");
    body.append(ui->lineEdit_19->text().toUtf8().data());
    body.append("&online=");
    body.append(ui->lineEdit_20->text().toUtf8().data());
    mgr->post(request_users, body);
}

void MainWindow::on_pushButton_19_clicked()
{
    //soft
    QByteArray body;
    body.append("name=");
    body.append(ui->lineEdit_8->text().toUtf8().data());
    body.append("&developers_id=");
    body.append(ui->lineEdit_21->text().toUtf8().data());
    body.append("&softcategories_id=");
    body.append(ui->lineEdit_22->text().toUtf8().data());
    body.append("&path=");
    body.append(ui->lineEdit_23->text().toUtf8().data());
    mgr->post(request_soft, body);
}

void MainWindow::on_pushButton_21_clicked()
{
    //softtags
    QByteArray body;
    body.append("soft_id=");
    body.append(ui->lineEdit_9->text().toUtf8().data());
    body.append("&tags_id=");
    body.append(ui->lineEdit_24->text().toUtf8().data());
    mgr->post(request_softtags, body);
}

void MainWindow::on_pushButton_23_clicked()
{
    //softplatforms
    QByteArray body;
    body.append("soft_id=");
    body.append(ui->lineEdit_10->text().toUtf8().data());
    body.append("&platforms_id=");
    body.append(ui->lineEdit_25->text().toUtf8().data());
    mgr->post(request_softplatforms, body);
}

void MainWindow::on_pushButton_25_clicked()
{
    //userssoft
    QByteArray body;
    body.append("users_id=");
    body.append(ui->lineEdit_11->text().toUtf8().data());
    body.append("&soft_id=");
    body.append(ui->lineEdit_26->text().toUtf8().data());
    mgr->post(request_userssoft, body);
}

void MainWindow::on_pushButton_35_clicked()
{
    ui->stackedWidget_2->setCurrentIndex(2);
}

void MainWindow::on_pushButton_36_clicked()
{
    ui->stackedWidget_2->setCurrentIndex(1);
}

void MainWindow::on_pushButton_37_clicked()
{
    ui->stackedWidget_2->setCurrentIndex(0);
    ui->stackedWidget->setCurrentIndex(12);
}

void MainWindow::on_pushButton_34_clicked()
{
    ui->stackedWidget_2->setCurrentIndex(0);
    ui->stackedWidget->setCurrentIndex(12);
}

void MainWindow::on_comboBox_activated(int index) {
    switch (index) {
    case 0:
        ui->webView->load(QUrl(url + "softorg_select.php?query=0"));
        ui->label_39->setText("Весь установленный софт конкретного пользователя");
        break;
    case 1:
        ui->webView->load(QUrl(url + "softorg_select.php?query=1"));
        ui->label_39->setText("Софт по определенной категории и платформе");
        break;
    case 2:
        ui->webView->load(QUrl(url + "softorg_select.php?query=2"));
        ui->label_39->setText("Софт по платформе и тэгам");
        break;
    case 3:
        ui->webView->load(QUrl(url + "softorg_select.php?query=3"));
        ui->label_39->setText("Весь софт разработчика");
        break;
    case 4:
        ui->webView->load(QUrl(url + "softorg_select.php?query=4"));
        ui->label_39->setText("Все пользователи, установившие определенный софт");
        break;
    case 5:
        ui->webView->load(QUrl(url + "softorg_select.php?query=5"));
        ui->label_39->setText("Затраты пользователей на софт");
        break;
    case 6:
        ui->webView->load(QUrl(url + "softorg_select.php?query=6"));
        ui->label_39->setText("Количество пользователей, использующие софт определенного разработчика");
        break;
    case 7:
        ui->webView->load(QUrl(url + "softorg_select.php?query=7"));
        ui->label_39->setText("Количество пользователей, использующие определенную платформу");
        break;
    }
    ui->stackedWidget->setCurrentIndex(0);
}

void MainWindow::on_pushButton_39_clicked()
{
    ui->stackedWidget_2->setCurrentIndex(0);
    ui->stackedWidget->setCurrentIndex(12);
}

void MainWindow::on_pushButton_40_clicked()
{
    //create
    ui->webView->load(QUrl(url + "softorg_create.php"));
}

void MainWindow::on_pushButton_41_clicked()
{
    //insert
    ui->webView->load(QUrl(url + "softorg_insert.php"));
}

void MainWindow::on_pushButton_42_clicked()
{
    //drop
    ui->webView->load(QUrl(url + "softorg_drop.php"));
}

void MainWindow::on_pushButton_43_clicked()
{
    //install
    ui->webView->load(QUrl(url + "softorg_script.php?query=" + QString::number(ui->spinBox->value())));
    //ui->stackedWidget->setCurrentIndex(0);//
}

void MainWindow::on_pushButton_38_clicked()
{
    ui->stackedWidget->setCurrentIndex(12);
    ui->stackedWidget_2->setCurrentIndex(3);
}
