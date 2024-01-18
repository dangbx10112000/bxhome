#include <Arduino.h>
#include <BH1750.h>
#include <WiFi.h>
#include <HTTPClient.h>
#include<Arduino_JSON.h>
#include <Wire.h>
#include <ESP32httpUpdate.h>
#include "DHT.h"
#include <WebServer.h>
#include <EEPROM.h>

/* Open web server port 80 */
WebServer webServer(80);

/* Link of server */
const char* serverNameSendData = "http://192.168.43.150/BX_HOME/api.php";
const char* serverNameGetData;
String serverNameGetData1;

/* Timer's variables */
unsigned long previousMillisSendData = 0;
unsigned long previousMillisGetData =0;
unsigned long previousMillis = 0;
unsigned long interval = 1000;

/* Sensor's variable */
volatile float temp,humd,gas,lux;
int people = 0;
const int gasPin = 34;
const int speakerPin = 2;
const int fanOutPin = 4;
#define DHTPIN 15
#define DHTTYPE DHT11
DHT dht(DHTPIN, DHTTYPE);
BH1750 lightMeter;

/* Task names of multi core */
TaskHandle_t get_data_from_server_core0;
TaskHandle_t send_data_to_server_core1;

/* Json's variables */
String dataJson, idpJson;

/* Check value variable */
int value_check;

/* Version of firmware */
String version = "2.4";

/* Board ìnfomation's variables */
String ssid,pass,keyroom,boardDevice,idpkey,postData;

/* Web server infomations in AP mode*/
char* ssid_ap = "DREAM HOME";
char* pass_ap = "88888888";
IPAddress ip_ap(192,168,1,1);
IPAddress gateway_ap(192,168,1,1);
IPAddress subnet_ap(255,255,255,0);

/* Variable constain source of HTLM Website */
const char MainPage[] PROGMEM = R"=====(
<!DOCTYPE html> 
  <html>
   <head> 
       <title>DREAM HOME</title> 
       <style> 
          body {
            text-align:center;
        }
          h1 {color:#003399;}
          h3{color: #003399;text-align: left;}
          h4{color: #003399;}
          a {text-decoration: none;color:#FFFFFF;}
          .contentBox{
            background-color: antiquewhite;
            width: 90%;
            margin: auto;
            margin-top: 50px;
            box-shadow: 5px 10px 8px #888888;
            border-radius: 15px;
            padding: 10px;
          }
          .contentInfo{
              clear: both;
              margin: 10px;
          }
          .inputInfo{
              float: right;
              border: none;
              border-radius: 10px;
              font-size: 1rem;
              padding: 5px;
              color: #003399;
              width: 60%;
          }
          .buttonSubmit{
            border-radius: 10px;
            font-size: 1rem;
            padding: 10px;
            border-width: 0.5px;
          }
          .pinname{
            width: 50%;
            float: left;
            margin-top: -10px;
          }
          .boxbtn{
            width: 100%;
            clear: both;
          }
          .bt_on{
            width: 80px;
            height: 50px;
            border-radius: 20px;
            background-color: aqua;
            float: left;
          }
          .bt_off{
            width: 80px;
            height: 50px;
            border-radius: 20px;
            background-color: rgb(251, 40, 12);
            clear: right;
          }
       </style>
       <meta name="viewport" content="width=device-width,user-scalable=0" charset="UTF-8">
   </head>
   <body> 
      <div class="contentBox">
        <div><h1>Dream Home</h1></div>
        <div class="contentInfo"><h3>Wifi name:<input class="inputInfo" id="ssid" placeholder="wifi name..."/></h3></div>
        <div  class="contentInfo"><h3>Password:<input type="password" class="inputInfo" id="pass" placeholder="password..."/></h3></div>
        <div class="contentInfo"><h3> Key Room:<input class="inputInfo" id="keyroom" placeholder="key room..."/></h3></div>
        <div class="contentInfo"><h3> Board id:<input class="inputInfo" id="boardDevice" placeholder="Board id..."/></h3></div>
        <div  class="contentInfo"><h3>IDP key:<input class="inputInfo" id="idpkey" placeholder="idp key..."/></h3></div>
        <div class="contentInfo" id="reponsetext"></div>
        <div>
          <button class="buttonSubmit bt_write" onclick="writeEEPROM()" style="background-color: rgb(161, 255, 73);">CONFIG</button>
          <button class="buttonSubmit bt_clear" onclick="clearEEPROM()" style="background-color: tomato;">DELETE</button>
        </div>
        <h4>Designed by: diot.com</h4>
      </div>
      <div class="contentBox">
        <div><h1>Control Panel</h1></div>
        <div class="boxbtn">
          <div class="pinname"><h2>Pin 12:</h2><b><span id="statusD12"></span></b></div>
          <div class="buttonbox">
            <button class="bt_on" onclick="getdata('on12')">ON</button>
            <button class="bt_off" onclick="getdata('off12')">OFF</button>
          </div>
        </div>
        <div class="boxbtn">
          <div class="pinname"><h2>Pin 13:</h2><b><span id="statusD13"></span></b></div>
          <div class="buttonbox">
            <button class="bt_on" onclick="getdata('on13')">ON</button>
            <button class="bt_off" onclick="getdata('off13')">OFF</button>
          </div>
        </div>
        <div class="boxbtn">
          <div class="pinname"><h2>Pin 14:</h2><b><span id="statusD14"></span></b></div>
          <div class="buttonbox">
            <button class="bt_on" onclick="getdata('on14')">ON</button>
            <button class="bt_off" onclick="getdata('off14')">OFF</button>
          </div>
        </div>
        <div class="boxbtn">
          <div class="pinname"><h2>Pin 16:</h2><b><span id="statusD16"></span></b></div>
          <div class="buttonbox">
            <button class="bt_on" onclick="getdata('on16')">ON</button>
            <button class="bt_off" onclick="getdata('off16')">OFF</button>
          </div>
        </div>
        <div class="boxbtn">
          <div class="pinname"><h2>Pin 18:</h2><b><span id="statusD18"></span></b></div>
          <div class="buttonbox">
            <button class="bt_on" onclick="getdata('on18')">ON</button>
            <button class="bt_off" onclick="getdata('off18')">OFF</button>
          </div>
        </div>
        <div class="boxbtn">
          <div class="pinname"><h2>Pin 19:</h2><b><span id="statusD19"></span></b></div>
          <div class="buttonbox">
            <button class="bt_on" onclick="getdata('on19')">ON</button>
            <button class="bt_off" onclick="getdata('off19')">OFF</button>
          </div>
        </div>
        <div class="boxbtn">
          <div class="pinname"><h2>Pin 23:</h2><b><span id="statusD23"></span></b></div>
          <div class="buttonbox">
            <button class="bt_on" onclick="getdata('on23')">ON</button>
            <button class="bt_off" onclick="getdata('off23')">OFF</button>
          </div>
        </div>
        <div class="boxbtn">
          <div class="pinname"><h2>Pin 25:</h2><b><span id="statusD25"></span></b></div>
          <div class="buttonbox">
            <button class="bt_on" onclick="getdata('on25')">ON</button>
            <button class="bt_off" onclick="getdata('off25')">OFF</button>
          </div>
        </div>
        <div class="boxbtn">
          <div class="pinname"><h2>Pin 26:</h2><b><span id="statusD26"></span></b></div>
          <div class="buttonbox">
            <button class="bt_on" onclick="getdata('on26')">ON</button>
            <button class="bt_off" onclick="getdata('off26')">OFF</button>
          </div>
        </div>
        <div class="boxbtn">
          <div class="pinname"><h2>Pin 32:</h2><b><span id="statusD32"></span></b></div>
          <div class="buttonbox">
            <button class="bt_on" onclick="getdata('on32')">ON</button>
            <button class="bt_off" onclick="getdata('off32')">OFF</button>
          </div>
        </div>
        <div class="boxbtn">
          <div class="pinname"><h2>Pin 33:</h2><b><span id="statusD33"></span></b></div>
          <div class="buttonbox">
            <button class="bt_on" onclick="getdata('on33')">ON</button>
            <button class="bt_off" onclick="getdata('off33')">OFF</button>
          </div>
        </div>
      </div>
      <script>
        var xhttp = new XMLHttpRequest();
        //-----------Thiết lập dữ liệu và gửi request ssid và password---
        function writeEEPROM(){
          var ssid = document.getElementById("ssid").value;
          var pass = document.getElementById("pass").value;
          var keyroom = document.getElementById("keyroom").value;
          var boardDevice = document.getElementById("boardDevice").value;
          var idpkey = document.getElementById("idpkey").value
          xhttp.open("GET","/writeEEPROM?ssid="+ssid+"&pass="+pass+"&keyroom="+keyroom+"&boardDevice="+boardDevice+"&idpkey="+idpkey,true);
          xhttp.onreadystatechange = process;//nhận reponse 
          xhttp.send();
        }
        function clearEEPROM(){
          xhttp.open("GET","/clearEEPROM",true);
          xhttp.onreadystatechange = process;//nhận reponse 
          xhttp.send();
        }
/* Thiet lap du lieu va gui request */
        function getdata(url){
          xhttp.open("GET","/"+url,true);
          xhttp.onreadystatechange = process;
          xhttp.send();
        }

        setInterval(function(){
          getstatuspin();
        },1000);

        function getstatuspin(){
          xhttp.open("GET","getstatuspin",true);
          xhttp.onreadystatechange = process_json;
          xhttp.send();
        }

        function process_json(){
          if(xhttp.readyState == 4 && xhttp.status == 200){
            var statuspin_JSON = xhttp.responseText;
            document.getElementById("statusD12").innerHTML = Obj.D12;
            document.getElementById("statusD13").innerHTML = Obj.D13;
            document.getElementById("statusD14").innerHTML = Obj.D14;
            document.getElementById("statusD16").innerHTML = Obj.D16;
            document.getElementById("statusD18").innerHTML = Obj.D18;
            document.getElementById("statusD19").innerHTML = Obj.D19;
            document.getElementById("statusD23").innerHTML = Obj.D23;
            document.getElementById("statusD25").innerHTML = Obj.D25;
            document.getElementById("statusD26").innerHTML = Obj.D26;
            document.getElementById("statusD32").innerHTML = Obj.D32;
            document.getElementById("statusD33").innerHTML = Obj.D33;
          }
        }
              //-----------Kiểm tra response ------------------
        function process(){
          if(xhttp.readyState == 4 && xhttp.status == 200){
            //------Updat data sử dụng javascript----------
            ketqua = xhttp.responseText; 
            document.getElementById("reponsetext").innerHTML=ketqua;       
          }
        }
     </script>
   </body> 
  </html>
)=====";

void setup() {
  /* Setup pin mode */
  pinMode(speakerPin,OUTPUT);
  pinMode(fanOutPin,OUTPUT);
  pinMode(DHTPIN, INPUT);

  /* Open serial with bault rate is 115200 */
  Serial.begin(115200);

  /* Initialized eeprom memory with 512 bytes*/
  EEPROM.begin(512);
  delay(10);

  /* Read eeprom to check the empty of board infomations*/
  if(read_EEPROM()){
    checkConnection();
  }else{
  
    /* Change to AP mode */
    WiFi.disconnect();
    WiFi.mode(WIFI_AP);
    WiFi.softAPConfig(ip_ap, gateway_ap, subnet_ap);
    WiFi.softAP(ssid_ap,pass_ap);
    Serial.println("Soft Access Point mode!");
    Serial.print("Please connect to ");
    Serial.println(ssid_ap);
    Serial.print("Web Server IP Address: ");
    Serial.println(ip_ap);
  }
  webServer.on("/",mainpage);
  webServer.on("/writeEEPROM",write_EEPROM);
  webServer.on("/clearEEPROM",clear_EEPROM);
    webServer.on("/on12",on_12);
  webServer.on("/off12",off_12);
  webServer.on("/on12",on_13);
  webServer.on("/off12",off_13);
  webServer.on("/on12",on_14);
  webServer.on("/off12",off_14);
  webServer.on("/on12",on_16);
  webServer.on("/off12",off_16);
  webServer.on("/on12",on_18);
  webServer.on("/off12",off_18);
  webServer.on("/on12",on_19);
  webServer.on("/off12",off_19);
  webServer.on("/on12",on_23);
  webServer.on("/off12",off_23);
  webServer.on("/on12",on_25);
  webServer.on("/off12",off_25);
  webServer.on("/on12",on_26);
  webServer.on("/off12",off_26);
  webServer.on("/on12",on_32);
  webServer.on("/off12",off_32);
  webServer.on("/on12",on_33);
  webServer.on("/off12",off_33);
  webServer.begin();
  dht.begin();
  Wire.begin();// Enable I2C pins of Arduino
  lightMeter.begin();

  /* CORE 0 */
  xTaskCreatePinnedToCore(task_get_data_from_server_core0, "Task1codeCore0", 5000, NULL, 1, &get_data_from_server_core0, 0);
                   
  /* CORE 1 */
  xTaskCreatePinnedToCore(task_send_data_to_server_core1, "Task1codeCore1", 5000, NULL, 1, &send_data_to_server_core1, 1);
}

void task_get_data_from_server_core0( void * pvParameters ){
  for(;;){
    unsigned long currentMillisSendData = millis();
    if(currentMillisSendData - previousMillisSendData >= interval){
      if(idpkey != 0){
        read_BH1750();
        read_DHT11();
        read_MQ2();
        if(WiFi.status()== WL_CONNECTED){
          send_data();
        }
        Serial.println(postData);
        if(WiFi.status()!= WL_CONNECTED){
          wifi_reconnect();
        }
        previousMillisSendData = currentMillisSendData; 
      }
      else{
        webServer.handleClient();
      }
    }   
  }
}
void task_send_data_to_server_core1( void * pvParameters ){
  for(;;){
    unsigned long currentMillisGetData = millis();
    if(currentMillisGetData - previousMillisGetData >= interval){
      json_decoder();
      Serial.println(serverNameGetData);
      Serial.println(version);
      previousMillisGetData = currentMillisGetData; 
    }   
  }
}
void loop() {
  // put your main code here, to run repeatedly
}

void on_12(){
  digitalWrite(12,HIGH);
  webServer.send(200,"text/html","Pin 12 is turned on");
}
void off_12(){
  digitalWrite(12,LOW);
  webServer.send(200,"text/html","Pin 12 is turned off");
}
void on_13(){
  digitalWrite(13,HIGH);
  webServer.send(200,"text/html","Pin 13 is turned on");
}
void off_13(){
  digitalWrite(13,LOW);
  webServer.send(200,"text/html","Pin 13 is turned off");
}
void on_14(){
  digitalWrite(14,HIGH);
  webServer.send(200,"text/html","Pin 14 is turned on");
}
void off_14(){
  digitalWrite(14,LOW);
  webServer.send(200,"text/html","Pin 14 is turned off");
}
void on_16(){
  digitalWrite(16,HIGH);
  webServer.send(200,"text/html","Pin 16 is turned on");
}
void off_16(){
  digitalWrite(16,LOW);
  webServer.send(200,"text/html","Pin 16 is turned off");
}
void on_18(){
  digitalWrite(18,HIGH);
  webServer.send(200,"text/html","Pin 18 is turned on");
}
void off_18(){
  digitalWrite(18,LOW);
  webServer.send(200,"text/html","Pin 18 is turned off");
}void on_19(){
  digitalWrite(19,HIGH);
  webServer.send(200,"text/html","Pin 19 is turned on");
}
void off_19(){
  digitalWrite(19,LOW);
  webServer.send(200,"text/html","Pin 19 is turned off");
}
void on_23(){
  digitalWrite(23,HIGH);
  webServer.send(200,"text/html","Pin 23 is turned on");
}
void off_23(){
  digitalWrite(23,LOW);
  webServer.send(200,"text/html","Pin 23 is turned off");
}
void on_25(){
  digitalWrite(25,HIGH);
  webServer.send(200,"text/html","Pin 25 is turned on");
}
void off_25(){
  digitalWrite(25,LOW);
  webServer.send(200,"text/html","Pin 25 is turned off");
}
void on_26(){
  digitalWrite(26,HIGH);
  webServer.send(200,"text/html","Pin 26 is turned on");
}
void off_26(){
  digitalWrite(26,LOW);
  webServer.send(200,"text/html","Pin 26 is turned off");
}
void on_32(){
  digitalWrite(32,HIGH);
  webServer.send(200,"text/html","Pin 32 is turned on");
}
void off_32(){
  digitalWrite(32,LOW);
  webServer.send(200,"text/html","Pin 32 is turned off");
}
void on_33(){
  digitalWrite(33,HIGH);
  webServer.send(200,"text/html","Pin 33 is turned on");
}
void off_33(){
  digitalWrite(33,LOW);
  webServer.send(200,"text/html","Pin 33 is turned off");
}


/* Wifi config */
/* Functions is used to run web socket*/
void mainpage(){
  String s = FPSTR(MainPage);
  webServer.send(200,"text/html",s);
}

/* Functions is used to read data from eeprom */
boolean read_EEPROM(){
  Serial.println("Reading EEPROM...");
  if(EEPROM.read(0)!=0){
    ssid = pass = keyroom = idpkey = boardDevice="";
    for (int i=0; i<32; ++i){
      ssid += char(EEPROM.read(i));
    }
    Serial.print("SSID: ");
    Serial.println(ssid);
    for (int i=32; i<64; ++i){
      pass += char(EEPROM.read(i));
    }
    Serial.print("PASSWORD: ");
    Serial.println(pass);
    for (int i=64; i<96; ++i){
      keyroom += char(EEPROM.read(i));
    }
    Serial.print("Key room: ");
    Serial.println(keyroom);
    for (int i=96; i<128; ++i){
      boardDevice += char(EEPROM.read(i));
    }
    Serial.print("Board id: ");
    Serial.println(boardDevice);
    for (int i=128; i<192; ++i){
      idpkey += char(EEPROM.read(i));
    }
    Serial.print("IDP key: ");
    Serial.println(idpkey);
    ssid = ssid.c_str();
    pass = pass.c_str();
    keyroom = keyroom.c_str();
    boardDevice = boardDevice.c_str();
    idpkey = idpkey.c_str();
    serverNameGetData1 = "http://192.168.43.150/BX_HOME/action.php?action=get_data_json&boardDevice="+boardDevice+"&idp_key="+idpkey;
    serverNameGetData = (char*) serverNameGetData1.c_str();
    return true;
  }else{
    Serial.println("Data wifi not found!");
    return false;
  }
}

/* Function is used to check the connection */
void checkConnection() {
  Serial.println();
  Serial.print("Check connecting to ");
  Serial.println(ssid);
  WiFi.disconnect();
  WiFi.begin(ssid.c_str(),pass.c_str());
  int count=0;
  while(count < 100){
    if(WiFi.status() == WL_CONNECTED){
      WiFi.mode(WIFI_STA);
      Serial.println();
      Serial.print("Connected to ");
      Serial.println(ssid);
      Serial.print("Web Server IP Address: ");
      Serial.println(WiFi.localIP());
      return;
    }
    delay(200);
    Serial.print(".");
    count++;
  }
  Serial.println("Timed out.");
  WiFi.disconnect();
  WiFi.mode(WIFI_AP);
  WiFi.softAPConfig(ip_ap, gateway_ap, subnet_ap);
  WiFi.softAP(ssid_ap,pass_ap);
  Serial.println("Soft Access Point mode!");
  Serial.print("Please connect to ");
  Serial.println(ssid_ap);
  Serial.print("Web Server IP Address: ");
  Serial.println(ip_ap);
}

/* Function is used to wirte data to eeprom */
void write_EEPROM(){
  ssid = webServer.arg("ssid");
  pass = webServer.arg("pass");
  keyroom = webServer.arg("keyroom");
  boardDevice = webServer.arg("boardDevice");
  idpkey = webServer.arg("idpkey");
  Serial.println("Clear EEPROM!");
  for (int i = 0; i < 192; ++i) {
    EEPROM.write(i, 0);           
    delay(10);
  }
  for (int i = 0; i < ssid.length(); ++i) {
    EEPROM.write(i, ssid[i]);
  }
  for (int i = 0; i < pass.length(); ++i) {
    EEPROM.write(32 + i, pass[i]);
  }
  for (int i = 0; i < keyroom.length(); ++i) {
    EEPROM.write(64 + i, keyroom[i]);
  }
  for (int i = 0; i < boardDevice.length(); ++i) {
    EEPROM.write(96 + i, boardDevice[i]);
  }
  for (int i = 0; i < idpkey.length(); ++i) {
    EEPROM.write(128 + i, idpkey[i]);
  }
  EEPROM.commit();
  Serial.println("Writed to EEPROM!");
  Serial.print("SSID: ");
  Serial.println(ssid);
  Serial.print("PASS: ");
  Serial.println(pass);
  Serial.print("Key room: ");
  Serial.println(keyroom);
  Serial.print("Board id: ");
  Serial.println(boardDevice);
  Serial.print("IDP key: ");
  Serial.println(idpkey);
  String s = "Đã lưu thông tin wifi";
  webServer.send(200, "text/html", s);
  restart_ESP();
}

/* Function is used to restart ESP32 */
void restart_ESP(){
  ESP.restart();
  String s = "Đã khởi động lại ";
  webServer.send(200, "text/html", s);
}

/* Function is used to clear eeprom */
void clear_EEPROM(){
  Serial.println("Clear EEPROM!");
  for (int i = 0; i < 192; ++i) {
    Serial.println("Clear EEPROM!");
    EEPROM.write(i, 0);           
    delay(10);
  }
  EEPROM.commit();
  String s = "Đã xóa bộ nhớ EEPROM";
  webServer.send(200,"text/html", s);
}

/* Function is used to auto reconnect wifi*/
void wifi_reconnect(){
  unsigned long currentMillis = millis();
  /* f WiFi is down, try reconnecting every CHECK_WIFI_TIME seconds */
  if ((WiFi.status() != WL_CONNECTED) && (currentMillis - previousMillis >= interval)) {
    Serial.print(millis());
    Serial.println("Reconnecting to WiFi...");
    WiFi.disconnect();
    WiFi.reconnect();
    previousMillis = currentMillis;
  }
  else{
    
  }
}

/* Function is used to update firmware by OTA */
void ota_update(){
  if (1)
  {
    t_httpUpdate_return ret = ESPhttpUpdate.update("http://192.168.43.150/BX_HOME/uploads/HTTPS_OTA_Update.bin"); // Bạn cần thay đúng địa chỉ web chứa fw của bạn
      switch(ret) {
        case HTTP_UPDATE_FAILED:
            Serial.println("[update] Update failed.");
            break;
        case HTTP_UPDATE_NO_UPDATES:
            Serial.println("[update] Update no Update.");
            break;
        case HTTP_UPDATE_OK:
            Serial.println("[update] Update ok."); // may not called we reboot the ESP
            restart_ESP();
            break;
     }
  }
}

/* Function is used to decoder data Json */
void json_decoder(){
  dataJson = httpGETRequestDevice(serverNameGetData);
  Serial.println(dataJson);
  JSONVar deviceObj = JSON.parse(dataJson);
  if (JSON.typeof(deviceObj)=="undefined")
  {
    Serial.print("Parsing input failed!");
    return;
  }
  Serial.print("JSON Object Device = ");
  Serial.println(deviceObj);
  JSONVar keys = deviceObj.keys();
    for (int i = 0; i < keys.length(); i++)
    {
      JSONVar value = deviceObj[keys[i]];
      value_check = atoi(value);
      if (atoi(keys[i]) == 111020)
      {
        if(value_check == 1){
          Serial.print("cap nhat one");
          ota_update();
        }
        else if(value_check == 2){
          Serial.print("Reset board");
          clear_EEPROM();
          restart_ESP();
        }
      }
      else{
        Serial.print("GPIO: ");
        Serial.print(keys[i]);
        Serial.print(" - SET to: ");
        Serial.println(value);
        pinMode(atoi(keys[i]), OUTPUT);
        digitalWrite(atoi(keys[i]), value_check);
      }
    }  
}

/* SENSOR'S FUNCTIONS */
/* Functions is used to read gas data from MQ2 module*/
void read_MQ2(){
  gas=analogRead(gasPin);
  gas=map(gas,0,4095,0,100);
  Serial.println(gas);
  if(gas>85)
  {
    digitalWrite(speakerPin,HIGH);
    digitalWrite(fanOutPin,HIGH);
  }
  else{
    digitalWrite(speakerPin,LOW);
    digitalWrite(fanOutPin,LOW);
  }
}

/* Functions is used to read temperature and humidity data from DHT11 module*/
void read_DHT11() {
  humd = dht.readHumidity();
  temp = dht.readTemperature();
  while (isnan(humd) || isnan(temp)) {
    dht.begin();
    humd = dht.readHumidity();
    temp = dht.readTemperature();
  }
  Serial.print(F("Humidity: "));
  Serial.print(humd);
  Serial.print(F("%  Temperature: "));
  Serial.print(temp);
  Serial.println(F("°C "));
}

/* Function is used to read light data using BH1750 */
void read_BH1750(){
  lux = lightMeter.readLightLevel();
  lux=map(lux,0,4095,0,100);
}

/* Functions is used to send data to server */
void send_data(){
  postData = (String)"idpkey=" + idpkey + "&keyroom=" + keyroom + "&boardDevice=" + boardDevice + "&ssid=" + ssid + "&version_now=" + version + "&temp=" + temp + "&humd=" + humd + "&gas=" + gas + "&lux=" + lux + "&people=" + people;
  HTTPClient http;
  http.begin(serverNameSendData);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");

  auto httpCode = http.POST(postData);
  String payload = http.getString();
  http.end();
}

/* Function is used to get data from server */
String httpGETRequestDevice(const char* serverNameGetData){
  HTTPClient http;
  http.begin(serverNameGetData);
  int httpResponseCode = http.GET();
  String payload = "{}";
  while (httpResponseCode <= 0)
  {
    http.begin(serverNameGetData);
    httpResponseCode = http.GET();
  }
  if (httpResponseCode > 0)
  {
    payload = http.getString();
  }
  else{
    Serial.print("Erorr code: ");
    Serial.println(httpResponseCode);
  }
  http.end();
  return payload;
}
