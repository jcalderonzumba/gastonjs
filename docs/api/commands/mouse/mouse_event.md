mouse_event
===========

This command allows you to send a mouse event to PhantomJS on a given page and element.

Allowed mouse events are:

* mouseup
* mousedown
* mousemove
* doubleclick
* click

**TODO: add link to find command documentation**

##Command Request
```json
{
    "name": "mouse_event",
    "args": [1, 0, "mousemove"]
}
```
A successful mouse_event command has the following response:
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
Where **x** and **y** are the coordinates where the mouse_event was done.

You need coordinates to click because that is how PhantomJS works, for more info check [PhantomJS native events](http://phantomjs.org/api/webpage/method/send-event.html).
