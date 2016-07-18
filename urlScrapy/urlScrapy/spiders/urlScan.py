import sys
reload(sys)
sys.setdefaultencoding("utf-8")
#
import re
#import scrapy

from scrapy.spiders import CrawlSpider, Rule
from scrapy.selector import HtmlXPathSelector
from urlScrapy.items import UrlscrapyItem
from scrapy.crawler import CrawlerProcess
import json
import codecs
import sys
import os

class Urlscrapy(CrawlSpider):
    
    name = "urlscrapy"
    start_urls = []
    allowed_domains = []

    def init(self,baseUrl):

        if baseUrl != None:
            '''print baseUrl'''
            self.start_urls.append(baseUrl)
        else:
            self.start_urls.append("http://www.sohu.com/ ")
        s = baseUrl.split('.')
        t = s[2].split('/')
        domain = s[1] + '.' + t[0]
        if domain != None: 
            print 'domain:',domain
            self.allowed_domains.append(domain)
        else:
            self.allowed_domains.append("sohu.com")


    def parse(self, response):
        pattern1 = re.compile(r'^http')
        pattern2 = re.compile(r'^.*\?.*\=.*$')
        '''
        url = 'http://travel.sohu.com/?pvid=725adae4dbd11180'
        item = UrlscrapyItem()         
        result1 = re.match(pattern1,url)
        result2 = re.match(pattern2,url)
        if result1 and result2 :
            self.parse_item(url)
            item['new_url'] = url 
            yield item 
        
        '''
        self.file = codecs.open('D:/PythonCode/XDT/urlScrapy/url.json', 'w', encoding='utf-8')

        for url in response.xpath("//a/@href").extract():
            result1 = re.match(pattern1,url)
            result2 = re.match(pattern2,url)
            if result1 and result2:
                item = UrlscrapyItem()
                #self.parse_item(url)
                item['new_url'] = url
                yield item
                line = json.dumps(dict(item), ensure_ascii=False) + "\n"
                self.file.write(line)
        
    def parse_item(self, url):
        #while 1:
            '''   
            if not url:
                return
            print url
            xsscaner = XssScaner()
            testurl=xsscaner.assign(url)
            #print "testurl=",testurl
            if testurl:
                xsscaner.audit(url.rstrip('\n')) 
            '''

    def runScript(self):
        self.process = CrawlerProcess({'USER_AGENT': 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)'})
        self.process.crawl(Urlscrapy)
        self.process.start() 

    def stopSpider(self):
        self.process.stop()

if __name__=='__main__':
    print 'sys.argv[1]:',sys.argv[1]
    baseUrl = sys.argv[1]
    urlspider = Urlscrapy()
    urlspider.init(baseUrl)
    urlspider.runScript()