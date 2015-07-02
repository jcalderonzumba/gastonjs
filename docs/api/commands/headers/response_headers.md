response_headers
========
This command returns the response headers sent from the page server when making a page request.

```json
{
  "name":"response_headers",
  "args":[]
}
```
Response should look like:
```json
{
    "response": {
        "Host": "127.0.0.1:6789",
        "Connection": "close",
        "Content-Type": "text/html; charset=UTF-8",
        "Content-Length": "671"
    }
}
```
