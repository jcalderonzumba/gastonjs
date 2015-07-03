cookies_enabled
===============
Command to enable/disable the CookieJar on PhantomJS.
##How to enable cookies
####Request
```json
{
    "name": "cookies_enabled",
    "args": [
        true
    ]
}
```
####Response
```json
{
    "response": true
}
```

##How to disable cookies
####Request
```json
{
    "name": "cookies_enabled",
    "args": [
        false
    ]
}
```
####Response
```json
{
    "response": true
}
```
