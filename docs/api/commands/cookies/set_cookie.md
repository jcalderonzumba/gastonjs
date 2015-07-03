set_cookie
===========
Command to add a Cookie to PhantomJS CookieJar.

Returns `true` if cookie was successfully added, `false` otherwise
##Set a cookie request
```json
{
    "name": "set_cookie",
    "args": [
        {
            "name": "mycookie",
            "value": "myvalue",
            "path": "/",
            "domain": "gastonjs.readthedocs.org"
        }
    ]
}
```
##Set a cookie response
```json
{
    "response": true
}
```

For more information on how the Cookie JSON object should be check [addCookie](http://phantomjs.org/api/phantom/method/add-cookie.html) in PhantomJS documentation
