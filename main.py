#!/usr/bin/python
import sys
import image_slicer
import urllib3
http = urllib3.PoolManager()
r = http.request('GET', sys.argv[1], preload_content=False)
with open(sys.argv[2], 'wb') as out:
   while True:
       data = r.read(100)
       if not data:
           break
       out.write(data)
r.release_conn()

image_slicer.slice(sys.argv[2], 4)
