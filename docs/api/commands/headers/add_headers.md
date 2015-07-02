add_headers
========
This command allows you to set the additional headers you want to send when visiting pages via GastonJS.

**add_headers** will add the headers by creating the ones that do not exists and overwriting the ones that already exists.

```json
{
    "name": "add_headers",
    "args": [
        {
            "X-Header-One": "one",
            "X-Header-Two": "two",
            "X-Old-Header": "new-value"
        }
    ]
}
```
Response should be:
```json
{
  "response": true
}
```
