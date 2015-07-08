hover
========
Hover command is basically a command to move the mouse to the page and element set by the command arguments.

**TODO: add link to find command documentation**

##Command Request
```json
{
    "name": "hover",
    "args": [1, 0]
}
```
A successful hover or mouse move command has the following response:
##Command Response
```json
{
    "response": {
        "position": {
            "x": 165,
            "y": 59
        }
    }
}
```
Where **x** and **y** are the coordinates where the mouse has been positioned.

You need coordinates to click because that is how PhantomJS works, for more info check [PhantomJS native events](http://phantomjs.org/api/webpage/method/send-event.html).
