visit
============
To visit a page you have to send the following JSON POST request body:

```json
{
  "name": "visit",
  "args":[
    "http://gastonjs.readthedocs.org/en/latest/"
  ]
}
```

GastonJS takes as `"visit"` as the command to run and expects only one argument which is the page you want to visit, in this case is `"http://gastonjs.readthedocs.org/en/latest/"`

A successful `"visit"` command will return the following body:
```json
{
  "response": {
      "status": "success"
  }
}
```
