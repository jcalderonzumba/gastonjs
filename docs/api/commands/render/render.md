render
========
This command allows you render a web page to an image buffer and saves it as the specified filename given in the command arguments.

The image format will be automatically set based on the filename extension, the current supported formats are:
* PNG
* GIF
* JPEG
* PDF

##Commmand arguments:
  1. path
    * The path where you want the file to be saved
  2. full
    * `true` for rendering all the page, `false` if we are going to use a selection
  3. selector
    * If full is `false` then you have to specify the CSS selection you want to render, internally we will use document.querySelector.

##Full page render request:
```json
{
    "name" : "render",
    "args": [
      "/path/to/the/file.png", true, null
    ]
}
```
##Part of a page render request:
```json
{
    "name" : "render",
    "args": [
      "/path/to/the/file.png", false, "body > div.wrapper > div.main.clearfix"
    ]
}

```

##Response:
A successful render command will reply with:
```json
{
  "response": true
}
```
