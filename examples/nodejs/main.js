"use strict";
var http = require("http");

var visitCommand = JSON.stringify({name: 'visit', args: ['http://www.google.es']});
var renderCommand = JSON.stringify({name: 'render', args: ['/Users/juan/Downloads/page_image.png', true, null]});

var postOptions = {
  host: '127.0.0.1',
  port : 8510,
  path: '/api/v1',
  method: 'POST',
  headers: {
    'Content-type': 'application/json',
    'Content-Length': visitCommand.length
  }
};

var postRequest = http.request(postOptions, function(res){
  res.setEncoding('utf8');
  res.on('data', function(chunk){
    console.log(chunk);
  });
});

postRequest.write(visitCommand);
postRequest.end();

postOptions.headers['Content-Length']=renderCommand.length;
postRequest = http.request(postOptions, function(res){
  res.setEncoding('utf8');
  res.on('data', function(chunk){
    console.log(chunk);
  });
});

postRequest.write(renderCommand);
postRequest.end();
