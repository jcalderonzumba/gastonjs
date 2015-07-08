

click_coordinates
========
Sends a click_coordinates event to the browser, this event is sent as if it comes as part of the user interaction, meaning is not a synthetic [DOM event](http://www.w3.org/TR/DOM-Level-2-Events/events.html).

This is a low level command as you have to now beforehand the **X,Y** coordinates of the element you want to click. **Use it with caution.**

##Command Request
```json
{
    "name": "click_coordinates",
    "args": [165, 95]
}
```
A successful click_coordinates command has the following response:
##Command Response
```json
{
    "response": {
        "click": {
            "x": 165,
            "y": 59
        }
    }
}
```
Where **x** and **y** are the coordinates where the click_coordinates was done.
