import java.io.InputStream;
import java.lang.System;

import org.apache.http.HttpResponse;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.HttpClientBuilder;
import org.apache.commons.io.IOUtils;
import org.apache.http.impl.client.CloseableHttpClient;

public class GastonJSClient{

    public static void main(String[] args) throws Exception{
            // write your code here
            String visitPage = "{\n" +
                    "  \"name\": \"visit\",\n" +
                    "  \"args\":[\n" +
                    "    \"http://www.google.es\"\n" +
                    "  ]\n" +
                    "}";
            String renderPage = "{\"name\":\"render\",\"args\":[\"/Users/juan/Downloads/page_image.png\",true,null]}";
            CloseableHttpClient httpClient = HttpClientBuilder.create().build();
            try {
                //Do the visit
                HttpPost request = new HttpPost("http://127.0.0.1:8510/v1/api");
                StringEntity params = new StringEntity(visitPage);
                request.addHeader("content-type", "application/json");
                request.setEntity(params);
                HttpResponse response = httpClient.execute(request);
                InputStream body = response.getEntity().getContent();
                String myString = IOUtils.toString(body, "UTF-8");
                System.out.println(myString);
                //Do the page print
                params = new StringEntity(renderPage);
                request.setEntity(params);
                response = httpClient.execute(request);
                body = response.getEntity().getContent();
                myString = IOUtils.toString(body, "UTF-8");
                System.out.println(myString);
                // handle response here...
            } catch (Exception ex) {
                // handle exception here
                System.out.println(ex.toString());
            } finally {
                httpClient.close();
            }
        }
}