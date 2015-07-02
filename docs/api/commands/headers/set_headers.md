set_headers
========
This command allows you to set the additional headers you want to send when visiting pages via GastonJS.

**set_headers** WILL overwrite any other additional headers you might have set before.

```json
{
    "name": "set_headers",
    "args": [
        {
            "X-Header-One": "one",
            "X-Header-Two": "two"
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
