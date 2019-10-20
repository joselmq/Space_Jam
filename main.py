import image_slicer

import urllib2

filedata = urllib2.urlopen('http://i3.ytimg.com/vi/J---aiyznGQ/mqdefault.jpg')
datatowrite = filedata.read()
 
with open('assets/images/test.jpg', 'wb') as f:
    f.write(datatowrite)

#image_slicer.slice('assets/images/logo-space-apps-cl.png', 4)