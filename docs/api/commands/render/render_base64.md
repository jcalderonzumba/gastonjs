render_base64
=============
This command allows you render a web page to an image buffer and returns the base64 encoded representation of the image.

The supported formats are:

* PNG
* GIF
* JPEG

##Commmand arguments:
  1. image_format
  2. full
    * `true` for rendering all the page, `false` if we are going to use a selection
  3. selector
    * If full is `false` then you have to specify the CSS selection you want to render, internally we will use document.querySelector.

##Full page render request:
```json
{
    "name" : "render_base64",
    "args": [
      "png", true, null
    ]
}
```
##Part of a page render request:
```json
{
    "name" : "render_base64",
    "args": [
      "png", false, "body > div.wrapper > div.main.clearfix"
    ]
}

```

##Response:
A successful render_base64 command will reply with:
```json
{
  "response": "iVBORw0KGgoAAAANSUhEUgAABAAAAACYCAYAAAB6Z5u+AAAABHNCSVQICAgIfAh......"
}
```
