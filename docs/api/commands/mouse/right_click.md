right_click
========
Sends a right_click event to the browser, this event is sent as if it comes as part of the user interaction, meaning is not a synthetic [DOM event](http://www.w3.org/TR/DOM-Level-2-Events/events.html).

In order to send a click you have to send the page and the element id where you want to click.

**TODO: add link to find command documentation**

##Command Request
```json
{
    "name": "right_click",
    "args": [1, 0]
}
```
A successful right_click command has the following response:
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
Where **x** and **y** are the coordinates where the right_click was done.

You need coordinates to click because that is how PhantomJS works, for more info check [PhantomJS native events](http://phantomjs.org/api/webpage/method/send-event.html).
