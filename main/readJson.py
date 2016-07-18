# coding: utf8
import json
import codecs


class ReadJson():
    def __init__(self):
        self.fin = open('D:/PythonCode/XDT/urlScrapy/url.json','r')
        self.urls =[]
        self.readjson()

    def readjson(self):
        for eachLine in self.fin:  
            line = eachLine.strip().decode('utf-8')
            js = None  
            try:  
                js = json.loads(line)   #加载Json文件  
            except Exception,e:  
                print 'bad line'  
                continue  
            url = js["new_url"]
            if url != "" and url != "javascript: void 0;" and url != "#more":
                self.urls.append(url)

if __name__=='__main__':

    jsondata = ReadJson()
    for url in jsondata.urls:
        print url
