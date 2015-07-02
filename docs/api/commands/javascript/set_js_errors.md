set_js_errors
=============
This command allows you to enable/disable javascript error control when executing commands.

When javascript error control is enabled all commands where the page has javascript errors will fail.

This is a good practice so you can detect any javascript errors on your pages.


##Enable javascript error control
####Request
```json
{
    "name": "set_js_errors",
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
##Disable javascript error control
####Request
```json
{
    "name": "set_js_errors",
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
