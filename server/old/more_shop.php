<?php
    include_once "connect.php";
?>
<style>
* {
  box-sizing:border-box;
}

.more_shop_mainBoard {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.more_shop_mainBoard .container {
  padding: 64px;
}

.row:after {
  content: "";
  display: table;
  clear: both
}

.column-66 {
  float: left;
  width: 66.66666%;
  padding: 20px;
}

.column-33 {
  float: left;
  width: 33.33333%;
  padding: 20px;
}

.large-font {
  font-size: 48px;
}

.xlarge-font {
  font-size: 64px
}

.button {
  border: none;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  background-color: #04AA6D;
}

img {
  display: block;
  height: auto;
  max-width: 100%;
}

@media screen and (max-width: 1000px) {
  .column-66,
  .column-33 {
    width: 100%;
    text-align: center;
  }
  img {
    margin: auto;
  }
}
</style>
<div class="more_shop_mainBoard">
<!-- The App Section -->
<div class="container">
  <div class="row">
    <div class="column-66">
      <h1 class="xlarge-font"><b>Control your data</b></h1>
      <h1 class="large-font" style="color:MediumSeaGreen;"><b>Why interested it?</b></h1>
      <p><span style="font-size:36px"></span>You own your data and you get to store it wherever you want. We help you get your data to and from your devices. It is as simple as that. Deploy code, access logs, update firmware, and collect data from your ESP32-based devices.</p>
      <button class="button">Read more ></button>
    </div>
    <div class="column-33">
        <img src="image/control_data.svg" width="335" height="471">
    </div>
  </div>
</div>

<!-- Clarity Section -->
<div class="container">
  <div class="row">
    <div class="column-33">
      <video src="image/risk.mp4" alt="App" width="335" height="471"  autoplay loop muted></video>
    </div>
    <div class="column-66">
      <h1 class="xlarge-font"><b>Risk-free code deployment on the ESP32</b></h1>
    
      <p><span style="font-size:24px"></span>No matter which bug slips into your code, the worst it can do is crash that one application. The system, as well as all your other applications, keeps running as if nothing had happened. This makes changing and deploying new code risk-free.

Treat firmware and drivers as you treat software. Set up a continuous delivery pipeline and deploy new device code on every commit.</p>
      <button class="button" style="background-color:red">Read More ></button>
    </div>
  </div>
</div>

<!-- The App Section -->
<div class="container">
  <div class="row">
    <div class="column-66">
      <h1 class="xlarge-font"><b>Monitor and service your devices in production</b></h1>
      <p><span style="font-size:36px"></span> Get full visibility into your device fleet with logs covering connectivity, code execution, and crash reports. Trace the bug, fix it and redeploy, all within minutes.

Assign your devices into groups and deploy updates on a group by group basis.

All communication is end-to-end encrypted using modern public-key cryptography. The same technology that keeps the internet secure keeps your devices and data safe.</p>
      <button class="button">Read more ></button>
    </div>
    <div class="column-33">
        <img src="image/manu.svg" width="335" height="471" >
    </div>
  </div>
</div>
</div>
