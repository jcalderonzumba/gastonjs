import httplib
import json

__author__ = 'juan'

connection = httplib.HTTPConnection('127.0.0.1', 8510)
headers = {'Content-type': 'application/json'}
command = {'name': 'visit', 'args': ['http://www.google.es']}

jsonCommand = json.dumps(command)
connection.request('POST', '/v1/api', jsonCommand, headers)
response = connection.getresponse()
print(response.read().decode())
command = {'name': 'render', 'args': ['/Users/juan/Downloads/page_image.png', True, None]}
jsonCommand = json.dumps(command)
connection.request('POST', '/v1/api', jsonCommand, headers)
response = connection.getresponse()
print(response.read().decode())
