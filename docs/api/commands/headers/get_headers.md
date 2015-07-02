get_headers
========
This command returns an array with the additional HTTP request headers that will be sent to the server for every request issued (for pages and resources).

```json
{
  "name":"get_headers",
  "args":[]
}
```
When there are no additional headers to be sent the response is:
```json
{
  "response": []
}
```
When there are additional headers to be sent the response looks like:
```json
{
    "response": {
        "X-Header-One": "one",
        "X-Header-Three": "three",
        "X-Header-Two": "two"
    }
}
```
