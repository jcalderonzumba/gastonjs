remove_cookie
=============
Command to delete any Cookie visible in the current page with the given name.

If not found on the current page then the cookie will be search in the entire PhantomJS cookieJar so use with caution.
##Cookie deletion request
```json
{
    "name": "remove_cookie",
    "args": [
        "cookie_name_to_delete"
    ]
}
```
##Cookie deletion response
```json
{
    "response": true
}
```
