execute
=========
Command to execute javascript code within the current page you are browsing.

##Example of use
####Request
```json
{
    "name": "execute",
    "args": [
        "(function () {\n  document.getElementById(\"element_1\").value = \"THIS_IS_SPARTA\";\n  document.getElementById(\"element_3\").selectedIndex = 1;\n})();\n"
    ]
}
```
####Response
If there are no javascript errors then the response should be:
```json
{
    "response": true
}
```
##Rule of thumb for javascript code
As a recommendation try always to make your code like this:
```javascript
(function () {
  //Here should go all the code you want to execute
})();
```
