package main

import (
	"bytes"
	"fmt"
	"io/ioutil"
	"net/http"
)

func main() {
	url := "http://127.0.0.1:8510/api/v1"
	fmt.Println("URL:>", url)

	var commandStr = []byte(`{"name": "visit", "args": ["http://www.google.es"]}`)

  req, err := http.NewRequest("POST", url, bytes.NewBuffer(commandStr))
	req.Header.Set("Content-Type", "application/json")

	client := &http.Client{}
	resp, err := client.Do(req)
	if err != nil {
		panic(err)
	}

  responseStr, err := ioutil.ReadAll(resp.Body)
  fmt.Printf("%s\n", responseStr)

	defer resp.Body.Close()

  commandStr = []byte(`{"name": "render", "args": ["/Users/juan/Downloads/page_image.png", true, null]}`)
  renderReq, renderErr := http.NewRequest("POST", url, bytes.NewBuffer(commandStr))
	renderReq.Header.Set("Content-Type", "application/json")

	renderResp, renderErr := client.Do(renderReq)
	if renderErr != nil {
		panic(renderErr)
	}

  renderResponseStr, renderErr := ioutil.ReadAll(renderResp.Body)
  fmt.Printf("%s\n", renderResponseStr)

	defer renderResp.Body.Close()

}
