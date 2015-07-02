evaluate
========
Command to evaluate javascript code within the current page you are browsing.

##Example of use
####Request
```json
{
    "name": "evaluate",
    "args": [
        "(function (fibonnaciNumber) {\n  var looping = function (n) {\n    var a = 0, b = 1, f = 1;\n    for (var i = 2; i <= n; i++) {\n      f = a + b;\n      a = b;\n      b = f;\n    }\n    return f;\n  };\n  return looping(fibonnaciNumber);\n})(10);\n"
    ]
}
```
####Response
If there are no javascript errors then the response should be the result of the evaluation of the code, in this case:
```json
{
    "response": 55
}
```
##Rule of thumb for javascript code
As a recommendation try always to make your code like this:
```javascript
(function () {
  //Here should go all the code you want to evaluate
  return value;
})();
```
