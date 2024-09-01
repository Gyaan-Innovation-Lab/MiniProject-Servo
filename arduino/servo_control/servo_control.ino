#include <ESP8266WiFi.h>
#include <Wire.h>
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>
#include <Servo.h>

Servo servo;

const char *ssid = "SSID";
const char *password = "password";

int angle;

void setup() {
  servo.attach(2);  //D4
  servo.write(0);
  delay(2000);


  Serial.begin(115200);
  Wire.begin();
  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while (WiFi.status() != WL_CONNECTED)
  {
      delay(500);
      Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());
}

void loop() {
  if (WiFi.status() == WL_CONNECTED)
  {
    HTTPClient http;
    WiFiClient client;
    
    if (http.begin(client, "Put your url here")) {
      int httpCode = http.GET();
      
      if (httpCode > 0) {
        if (httpCode == HTTP_CODE_OK) {
          String payload = http.getString();
          DynamicJsonDocument doc(256);
          deserializeJson(doc, payload);
          angle = doc["angle"];
          servo.write(angle);
          delay(1000);
        } else {
          Serial.printf("HTTP error: %d\n", httpCode);
        }
      } else {
        Serial.println("Failed to connect to server");
      }
      http.end();
    } else {
      Serial.println("Failed to begin HTTP connection");
    }
  }
}
