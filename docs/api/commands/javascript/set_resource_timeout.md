set_resource_timeout
=============
This command allows you to set the timeout (in milliseconds) after which any resource requested on a page will stop trying and proceed with other parts of the page.

This is useful when the page contains a lot of resources and PhantomJS may sometimes infinitely hang on loading them.

set_resource_timeout should be called before calling visit else, wont have any effect. 

##Setting Resource Timeout
####Request
```json
{
    "name": "set_resource_timeout",
    "args": [
        10000
    ]
}
```
####Response
```json
{
    "response": true
}
```
