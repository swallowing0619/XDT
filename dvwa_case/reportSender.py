# -*- coding: utf-8 -*-
import unittest
import HTMLTestRunner
import os ,time,datetime
import smtplib
import email.MIMEMultipart  
import email.MIMEText  
import email.MIMEBase  
import os.path  

class ReportSender():
	"""docstring for ReportSender"""
	def __init__(self,email_to):
		#用户名
		self.username = '15574999656@163.com'
		#密码
		self.userpwd = '1234abcd'
		#发信邮箱
		self.mail_from='15574999656@163.com'
		#收信邮箱
		#self.mail_to='985430865@qq.com'
		self.mail_to = email_to
		#smtp服务器
		self.server = smtplib.SMTP("smtp.163.com")

	def sendMail(self,file_new):
		#仅smtp服务器需要验证时  
		self.server.login(self.username,self.userpwd) 
		  
		# 构造MIMEMultipart对象做为根容器  
		main_msg = email.MIMEMultipart.MIMEMultipart()  
		  
		# 构造MIMEText对象做为邮件显示内容并附加到根容器  
		data = open(file_new, 'rb')  
		text_msg = email.MIMEText.MIMEText(data.read(),'html','utf-8')  
		main_msg.attach(text_msg)  
		  
		# 构造MIMEBase对象做为文件附件内容并附加到根容器  
		contype = 'application/octet-stream'  
		maintype, subtype = contype.split('/', 1)
		  
		## 读入文件内容并格式化  
		data = open(file_new, 'rb')  
		file_msg = email.MIMEBase.MIMEBase(maintype, subtype)  
		file_msg.set_payload(data.read( ))  
		data.close( )  
		email.Encoders.encode_base64(file_msg)  
		  
		## 设置附件头  
		basename = os.path.basename(file_new)  
		file_msg.add_header('Content-Disposition',  
		 'attachment', filename = basename)  
		main_msg.attach(file_msg)  
		  
		# 设置根容器属性  
		main_msg['From'] = self.mail_from  
		main_msg['To'] = self.mail_to  
		main_msg['Subject'] = u"XSS测试报告"  
		main_msg['Date'] = email.Utils.formatdate( )  
		  
		# 得到格式化后的完整文本  
		fullText = main_msg.as_string( )
		  
		# 用smtp发送邮件  
		try:  
			self.server.sendmail(self.mail_from  , self.mail_to  , fullText)
			print 'email sends out!'
			return 1		    
		except:
			print "failed"
			return 0

		finally:
			self.server.quit()  
		    
	
	def sendReport(self):
		'''查找测试报告，调用发邮件功能'''
		result_dir = 'D:\\PythonCode\\XDT\\report'
		lists=os.listdir(result_dir)
		lists.sort(key=lambda fn: os.path.getmtime(result_dir+"\\"+fn) if not
		os.path.isdir(result_dir+"\\"+fn) else 0)
		print (u'最新测试生成的报告： '+lists[-1])
		#找到最新生成的文件
		try:
			file_new = os.path.join(result_dir,lists[-1])
			print "try",file_new
				#调用发邮件模块
			res = self.sendMail(file_new)
			print "res",res
			if res == 1:
				return 1
		except :
			print "There's no file!"
			return 0
		
	
if __name__ == "__main__":
		#执行测试用例
		#runner.run(alltestnames)
		mail = "15574999656@163.com"
		email = mail.split(",")
		for ee in email:
			#print ee
			reportSender = ReportSender(ee)
			#执行发邮件
			result = reportSender.sendReport()
			print result