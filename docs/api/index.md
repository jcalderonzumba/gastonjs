GastonJS HTTP API
==================
Lets start by saying that the API is **not REST**, is a simple HTTP interface where you can send POST requests with the command you want the browser to execute and the parameters to execute such commands.

This statement can change in the future but that will require all clients to upgrade to the REST implementation.

##Start the Browser and the API
```bash
phantomjs --ssl-protocol=any --ignore-ssl-errors=true vendor/jcalderonzumba/gastonjs/src/Client/main.js 8510 1024 768 false 2>&1 >> /tmp/gastonjs.log &
```
This will start a phantomjs process and the API listening on the 8510 port, the 1024x768 parameters are the width and
height you want the browser to use. The "false" argument is about [JavaScript errors](commands/javascript/set_js_errors.md),
if omitted it'll be "true" by default. You can start the API on the port you want, 8510 is just an example.

##API endpoint
Your client can start making HTTP POST requests to `http://localhost:8510/v1/api`

##API command request
Every POST request to the API needs a command name and the arguments that the commands needs to run.

This command is a JSON body that has the following schema:
```json
{
  "name": "COMMAND_NAME",
  "args" : [
    "COMMAND_ARG_1",
    "COMMAND_ARG_2",
    ...
  ]
}
```

##API response
* Successful command execution has an **HTTP 200 status code** and a body:
```json
{
  "response":{
    OBJECT_DEPENDS_ON_THE_COMMAND
    }
}
```
* Error while executing command has an **HTTP 500 status code** and a body:
```json
{
  "error": {
      "name": "GastonJSExceptionClass",
      "args": "ExceptionClassArguments"
    }
}
```

##API request example
The following example will teach you how to visit a page and save the rendered page:

1. Visit the page:
```bash
curl -X POST -H "Content-Type: application/json" -d '{"name":"visit","args":["https://www.google.es"]}' 'http://127.0.0.1:8510/v1/api'
```

2. Save the rendered page to a PNG file:
```bash
curl -X POST -H "Content-Type: application/json" -d '{"name":"render","args":["/tmp/google.png", true]}' 'http://127.0.0.1:8510/v1/api'
```

##Full API command documentation
* [API commands list](command-list.md)
