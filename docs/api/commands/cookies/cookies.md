cookies
=========
Command to get the visible cookies in the current page.
##Request
```json
{
    "name": "cookies",
    "args": []
}
```
##Response
If the page you are visiting sends cookies you will get something like:
```json
{
    "response": [
        {
            "domain": "127.0.0.1",
            "httponly": true,
            "name": "b_cookie",
            "path": "/",
            "secure": false,
            "value": "b_has_value"
        },
        {
            "domain": "127.0.0.1",
            "httponly": true,
            "name": "a_cookie",
            "path": "/",
            "secure": false,
            "value": "a_has_value"
        }
    ]
}
```
