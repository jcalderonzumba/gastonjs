add_header
========
This command allows you to set an additional headers for the future page requests via GastonJS.

##Adding a temporal header
This header will be valid for ONE request only, after that request it will disappear.
```json
{
    "name": "add_header",
    "args": [
        {
            "X-Temporal-Header": "x_temporal_value"
        },
        false
    ]
}
```
Response should be:
```json
{
    "response": true
}
```

##Adding a permanent header
This header will be valid for all the requests.
```json
{
    "name": "add_header",
    "args": [
        {
            "X-Permanent-Test": "x_permanent_value"
        },
        true
    ]
}
```
Response should be:
```json
{
  "response": true
}
```
