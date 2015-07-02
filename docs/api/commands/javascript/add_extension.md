add_extension
=============
This command allows you to inject an external script code from the specified file into the current page.

```json
{
    "name": "add_extension",
    "args": [
        "/www/web/script_extensions/extension.js"
    ]
}
```
If the script was properly injected the response should be:
```json
{
    "response": "success"
}
```
For more details on how this works check [PhantomJS injectJS documentation](http://phantomjs.org/api/webpage/method/inject-js.html)
