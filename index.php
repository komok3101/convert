<!DOCTYPE html>
<html>
<head>
  <title>Welcome!</title>
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
  <style>
    * {
      margin: 0;
      padding: 0;
      border: 0 none;
      background: none;
    }
    body {
      font-weight: normal;
      font-size: 11px;
      font-family: Arial;
    }
    #login-wrapper {
      width: 510px;
      left: 50%;
      margin-left: -300px;
      position: absolute;
      margin-top: -135px;
      top: 50%;
      /*border: 1px solid #333; */
      
    }
    #login-form {
      width: 270px;
      background: #78a5df;
      height: 370px;
      -webkit-border-radius: 135px;
      -moz-border-radius: 135px;
      border-radius: 135px;
    }
    
    #login-form1 {
      width: 510px;
      background: #78a5df;
      height: 220px;
     
    }
    ul li {
      
      padding: 5px;  
      list-style: none;
    }
    .body-login-form .tab-content {
      position: inherit;
      padding: inherit;
    }
    .b-title {
      text-align: center;
      padding-top: 10px;
      /*color: white;*/
      color: #e0e0e0;
      margin-bottom: 20px;
      font-size: 20px;
    }
    .b-content {
      font-size: 14px;
      /*color: #FFF;*/
      color: #00;
      text-align: left;
      padding-left: 15px;
    }
    .b-copyright {
      margin-top: 40px;
      text-align: center;
    }
    .b-copyright__link {
      color: #587b9d;
    }
    .b-text_lang_ru {
      display: none;
    }
    .imglog
    {
      padding-left: 15px;
      padding-top: 15px;
      /* border: 2px solid #333;*/
        
    }
    .scontent
    {
        color:#333333;
        text-decoration:none;
        
        
    }
  </style>
</head>
<?php
header('Content-Type: text/html; charset= windows-1251');
unlink("*1c*.txt");
?>
<body class="body-login-form">
<div id="main-wrapper">
<div id="overlay" class="hide"></div>
  
  <div id="content" class="tab-content active" data-tabid="tab1"><div id="login-wrapper">
    <div id="login-form1">
        <img src='/img/732_1.png' width='170' class='imglog'> 
      <div id="login-form-form">
        <h2 class="b-title b-text b-text_lang_en">Welcome!</h2>
        <h2 class="b-title b-text b-text_lang_ru">Конвертер МТ100 -> 1C_to_kl.txt для системы "faktura.ru"</h2>
        <div class="b-content">
          <span class="b-text b-text_lang_en">Site convert.expobank.ru just created.</span>
          <span class="b-text b-text_lang_ru">
            <ul>
                <li><a class="scontent" href="./convertr.php">Конвертировать реестр рублёвых платежей.</a>
                <li><a class="scontent" href="./convertv.php">Конвертировать реестр валютных платежей..</a>
            </ul>
          </span>
          
          <span class="b-text b-text_lang_en">Real content coming soon.</span>
        </div>
      </div>
    </div>
    <div class="b-copyright">
     
    </div>
    <div id="error-log" style="display: none;"></div>
  </div></div>
</div>
<script type="text/javascript">
  var platformLanguage = navigator && (
      navigator.language ||
        navigator.browserLanguage ||
        navigator.systemLanguage ||
        navigator.userLanguage ||
        null ),
    elemsRU, elemsEN;
  if (platformLanguage.match("ru") && document.getElementsByClassName) {
    elemsRU = document.getElementsByClassName("b-text_lang_ru");
    elemsEN = document.getElementsByClassName("b-text_lang_en");
    var l = elemsEN.length;
    while(l--) {
      elemsEN[l].style.display = "none";
    }
    l = elemsRU.length;
    while(l--) {
      elemsRU[l].style.display = "block";
    }
    document.title = "?????????";
  }
</script>
</body>
</html>