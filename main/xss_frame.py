# coding: utf8
import sys

from PyQt4.QtCore import *
from PyQt4.QtGui import *
from PyQt4.QtWebKit import *
from PyQt4.QtNetwork import *
import unittest, time, re
import HTMLTestRunner
import subprocess
from dvwa_case import xss_simulation,reportSender
import scrapy
from urlScrapy.spiders.urlScan import Urlscrapy
from readJson import ReadJson
import xss_detect
import global_list

class MyFrame(QWidget):

    def __init__(self, parent = None):
        super(MyFrame, self).__init__(parent)
        #初始化界面
        self.createLayout()
        #设置触发连接
        self.createConnection()
        #待发送邮箱
        self.email_to = []

    '''爬虫扫描获取url'''
    def url_scan(self):
        
        baseUrl = str(self.baseUrlBar.text())
        if baseUrl == '':
            #提示请先填入url
            QMessageBox.warning(self,"Warning",  
                                   self.tr("Please enter a baseUrl!"),  
                                   QMessageBox.Ok, QMessageBox.Ok)           
            return
        else:
            if baseUrl.find('http://') == -1 & baseUrl.find('/') == -1 :
                baseUrl = 'http://' + baseUrl +'/'
                print "baseUrl:",baseUrl
            #爬取并存储url
            argv1=[]
            argv1.append('python')
            argv1.append('D:\PythonCode\XDT\urlScrapy\urlScrapy\spiders\urlScan.py')
            argv1.append(baseUrl)
            child=subprocess.Popen(argv1,stdout=subprocess.PIPE)
            xhtj=1
            while xhtj:
                ret=child.poll()#检查子进程状态
                if ret==0:#进程已结束
                    xhtj=0
                    print 'pid closed:%s'%child.pid#进程ID             
                    break
            
            #首先清空列表
            if self.listWidget.count() > 1:
                #print "need delete"
                self.listWidget.clear()
                self.listWidget.addItem('Possible Vulnerability View :')
            #读取json文件，加载到漏洞列表中
            jsondata = ReadJson()
            for url in jsondata.urls:
                item = url
                self.listWidget.addItem(item)


    '''点击url自动添加到输入文本框 ''' 
    def on_listView_clicked(self, index):
        print 'selected item index found at %s with data: %s' % (index.row(), index.data().toString())
        detectUrl = index.data().toString()
        self.urlBar.setText(detectUrl)


    '''url浏览器模拟检测'''
    def url_detect(self):
        url = str(self.urlBar.text())
        if len(self.email_to) == 0:
            self.setEmail()
            if len(self.email_to) == 0:
                #提示请先填入待发送邮箱
                QMessageBox.warning(self,"Warning",  
                                       self.tr("Please enter a email!"),  
                                       QMessageBox.Ok, QMessageBox.Ok)           
                return

        if url == '':
            #提示请先填入待测试url
            QMessageBox.warning(self,"Warning",  
                                   self.tr("Please enter a url !"),  
                                   QMessageBox.Ok, QMessageBox.Ok)           
            return

        print 'enter url:',url
        if url:
            if url.find('http://') == -1:
                url = 'http://' + url
        
        argv1=[]
        argv1.append('python')
        argv1.append('xss_detect.py')
        argv1.append(url)
        child=subprocess.Popen(argv1,stdout=subprocess.PIPE)
        xhtj=1
        while xhtj:
            ret=child.poll()#检查子进程状态
            if ret==0:#进程已结束
                xhtj=0
                print 'pid closed:%s'%child.pid#进程ID             
                break
        #发送邮件
        self.sendEmailReport()   
        '''
        testunit=unittest.TestSuite()
        #将测试用例加入到测试容器中

        testunit.addTest(xss_detect.XSS_detect("XSS_detected"))

        #定义个报告存放路径，支持相对路径
        now = time.strftime("%Y-%m-%M_%H-%M-%S",time.localtime(time.time()))
        filename = 'D:/PythonCode/XDT/report/'+now+'result.html'
        fp = file(filename, 'wb')
        #定义测试报告
        runner =HTMLTestRunner.HTMLTestRunner(
        stream=fp,
        title=u'XSS测试报告',
        description=u'用例执行情况：')
        #运行测试用例
        runner.run(testunit)
        '''
         
            
        

    '''检测报告待发送的邮箱设置'''
    def setEmail(self):
        mail = str(self.emailBar.text())
        #处理多个邮箱
        email= mail.split(",")
        self.email_to=email
             
        print 'email to:',mail 


    '''dvwa平台测试演示  '''    
    def dvwa_test(self):
        
        if len(self.email_to) == 0:
            self.setEmail()
            if len(self.email_to) == 0:
                #提示请先填入待发送邮箱
                QMessageBox.warning(self,"Warning",  
                                       self.tr("Please enter a email!"),  
                                       QMessageBox.Ok, QMessageBox.Ok)           
                return

        print "start! waiting..."
        argv1=[]
        argv1.append('python')
        argv1.append('D:/PythonCode/XDT/dvwa_case/xss_simulation.py')
        child=subprocess.Popen(argv1,stdout=subprocess.PIPE)
        xhtj=1
        while xhtj:
            ret=child.poll()#检查子进程状态
            if ret==0:#进程已结束
                xhtj=0
                print 'pid closed:%s'%child.pid#进程ID             
                break
        #发送邮件    
        self.sendEmailReport()
        """
        testunit=unittest.TestSuite()
            #将测试用例加入到测试容器中
        testunit.addTest(xss_simulation.DVWA_XSS("XSS_reflected"))
        testunit.addTest(xss_simulation.DVWA_XSS("XSS_stored"))
        #定义个报告存放路径，支持相对路径
        now = time.strftime("%Y-%m-%M_%H-%M-%S",time.localtime(time.time()))
        filename = 'D:/PythonCode/XDT/report/'+now+'result.html'
        fp = file(filename, 'wb')
        #定义测试报告
        runner =HTMLTestRunner.HTMLTestRunner(
        stream=fp,
        title=u'XSS测试报告',
        description=u'用例执行情况：')
        #运行测试用例
        runner.run(testunit)
        """
       

    '''将生成的测试报告发送到设定邮箱'''
    def sendEmailReport(self):
        for email in self.email_to:
            time.sleep(1)
            print u"发送邮件"
            reportsender = reportSender.ReportSender(email)
            #执行发邮件
            result = reportsender.sendReport()
            #提示邮件已发送
            if result == 1:
                QMessageBox.warning(self,"Tips",  
                                       self.tr("Email has send out to "+email+"!"),  
                                       QMessageBox.Ok, QMessageBox.Ok)
            else:
                QMessageBox.warning(self,"Tips",  
                                       self.tr("Email send failed!"),  
                                       QMessageBox.Ok, QMessageBox.Ok)

    '''设置触发连接'''
    def createConnection(self):
        
        self.baseUrlButton.clicked.connect(self.url_scan)
        self.urlButton.clicked.connect(self.url_detect)
        self.emailButton.clicked.connect(self.setEmail)
        self.demoButton.clicked.connect(self.dvwa_test)
        self.listWidget.clicked.connect(self.on_listView_clicked)
    



    '''界面布局设计'''
    def createLayout(self):
        
        self.setWindowTitle("XDT")
        self.setWindowIcon(QIcon("icon.png"))
        self.resize(550,420)
        #初始化一个容器（垂直流式布局）
        layout = QVBoxLayout()

        '''设置背景'''
        palette    = QPalette()
        palette.setBrush(self.backgroundRole(),QBrush(QPixmap("background.png")))  
        self.setPalette(palette)

        #gridlayout.setRowMinimumHeight (1, 180) # 设置第二行的最小高度为108 
        '''标题'''
        # 创建标签
        label = QLabel('XSS Detection Tool')
        # 居中对齐
        label.setFont(QFont("Roman times",18,QFont.Bold))
        label.setAlignment(Qt.AlignCenter) 
        layout.addWidget(label)
        layout.addStretch(3)

        """base url"""
        base_url = QLabel('Base url:')
        # 居中对齐
        base_url.setAlignment(Qt.AlignCenter) 
        base_url.setFont(QFont("Roman times",10,QFont.Bold))
        #创建一个输入框
        self.baseUrlBar = QLineEdit()
        #创建一个按钮
        self.baseUrlButton = QPushButton("&Scan")
        #初始化一个容器（水平流式布局）
        b0 = QHBoxLayout()
        #添加组件
        b0.addWidget(base_url)
        b0.addWidget(self.baseUrlBar)
        b0.addWidget(self.baseUrlButton)

        '''lisView'''
        self.listWidget = QListWidget() #实例化一个(item base)的列表
        self.listWidget.addItem('Possible Vulnerability View :') #添加一个项

        
        """待测url"""
        url_label = QLabel('url:')
        # 居中对齐
        url_label.setAlignment(Qt.AlignCenter) 
        url_label.setFont(QFont("Roman times",10,QFont.Bold))
        #创建一个输入框
        self.urlBar = QLineEdit()
        #创建一个按钮
        self.urlButton = QPushButton("&Detection")
        #初始化一个容器（水平流式布局）
        bl = QHBoxLayout()
        #添加组件
        bl.addWidget(url_label)
        bl.addWidget(self.urlBar)
        bl.addWidget(self.urlButton)


        '''报告接收的邮箱'''
        email_label = QLabel('your email:')
        # 居中对齐
        email_label.setAlignment(Qt.AlignCenter) 
        email_label.setFont(QFont("Roman times",10,QFont.Bold))
        #创建一个输入框
        self.emailBar = QLineEdit()
        #创建一个按钮
        self.emailButton = QPushButton("&Confirm")
        #初始化一个容器（水平流式布局）
        b2 = QHBoxLayout()
        #添加组件
        b2.addWidget(email_label)
        b2.addWidget(self.emailBar)
        b2.addWidget(self.emailButton)

        '''DVWA演示'''
        DVWA_label = QLabel(u'DVWA Demonstration:')
        DVWA_label.setFont(QFont("Roman times",10,QFont.Bold))
        #空白项
        spacer = QSpacerItem(200,8)
         #创建一个按钮
        self.demoButton = QPushButton("&start")
        b3 = QHBoxLayout()
        #添加组件
        b3.addWidget(DVWA_label)
        b3.addItem(spacer) 
        b3.addWidget(self.demoButton)

        '''空白项 ''' 
        spacer1 = QSpacerItem(400,15)
       
        '''添加布局容器'''
        layout.addLayout(b0)
        layout.addWidget(self.listWidget)  
        layout.addLayout(b2)
        layout.addLayout(bl)


        layout.addItem(spacer1) 
        layout.addLayout(b3)
        layout.addItem(spacer1)
        
        '''布局添加到窗体'''
        self.setLayout(layout)

class MyListModel(QAbstractListModel):  
    def __init__(self, datain, parent=None, *args):  
        """ datain: a list where each item is a row 
        """  
        QAbstractTableModel.__init__(self, parent, *args)  
        self.listdata = datain  
  
    def rowCount(self, parent=QModelIndex()):  
        return len(self.listdata)  
  
    def data(self, index, role):  
        if index.isValid() and role == Qt.DisplayRole:  
            return QVariant(self.listdata[index.row()])  
        else:  
            return QVariant()  

    
if __name__=='__main__':

    app = QApplication(sys.argv)
    frame = MyFrame()
    frame.show()
    sys.exit(app.exec_())
