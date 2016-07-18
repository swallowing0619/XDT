# coding: utf8
# 
import sys
import os
from time import time,sleep
import urlparse
import urllib2
import subprocess

class Reflected():
    def __init__(self):

        #xsscases=['%22()%26%25<acx><ScRiPt%20>alert(1);</ScRiPt>','</pre><script>alert(1)</script><pre>','"/>"><body onload=alert(1)>','alert(1)']
        #'>\'>\"><script>window.a==1?1:alert(a=1)</script>','--></script><script>window.a==1?1:alert(a=1)</script>','\';alert(1);\'','</script><script>alert(1);//']
        payload_html = ["<>","<img src=1>","<img src=1 onerror=alert(1);>"]
        self.xsscases = ['eval("alert(1)");void','<script>alert("XSS")</script>','</script><script>alert("XSS");</script>']
        
        #xsscases=['--></script><script>window.a==1?1:alert(a=1)</script>','</script><script>alert(1);//']

        self.paichu=['.css','.js?','.gif','.jpg','.png','.swf']

    '''解析url判断是否带参数'''
    def assign(self,arg):
        r = urlparse.urlparse(arg)#将url地址进行拆解
        pairs = urlparse.parse_qsl(r.query)#连接符（&）连接键值对
        #print "pairs:",pairs
        #print r.query.find('='),arg.find('?'),len(pairs),r.path
        if r.query.find('=') == -1 or len(pairs) > 10 or arg.find('?')==-1:
            return
        for case in self.paichu:
            if case in r.path:#网页文件在服务器中存放的位置
                return
        return True, arg

    '''分离提取url'''
    def audit(self,arg):
        url = arg.split('?')
        #print 'url====',url
        query=url[1].split('&')
        #print 'query====',query
        rooturl=url[0]
        #print 'rooturl===',rooturl
        query_length=len(query)
        #print 'query_length===',query_length
        return rooturl,query,query_length
        '''
        for i in range(query_length):
            print 'i=',i 
            self.check_xss(rooturl,query,i)
        '''
        
    '''添加payload构造请求'''
    def check_xss(self,action,query,i):
        for xsscase in self.xsscases:
            query2=[]
            query2=query[:]
            query2[i]=query2[i]+xsscase
            #print 'quety2[%d]===' % (i,query2[i])
            querystr='&'.join(query2)
            #print "querystr====",querystr
            cmd = '%s?%s' % (action,querystr)
            #print 'payloadUrl:',cmd
            urlcoded=urllib2.quote(cmd)#对URL中字符进行编码
            #print 'urlcoded:',urlcoded
            

             

            

if __name__=='__main__':   
    xssreflected = Reflected()
    line = "http://localhost/test/submitform.php?first_name=1&last_name=1"
    testurl=xssreflected.assign(line)
    print "testurl=",testurl
    #判断是否有带参数
    if testurl:
        xssreflected.audit(line.rstrip('\n'))
    else:
        #分析页面
        pass


  