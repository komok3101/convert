<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
<title>КОНВЕРЕТ</title>
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
     /* height: 220px;*/
     
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

    
<body class="body-login-form">
<div id="main-wrapper">
<div id="overlay" class="hide"></div>
  
  <div id="content" class="tab-content active" data-tabid="tab1"><div id="login-wrapper">
    <div id="login-form1">
        <img src='/img/732_1.png' width='170' class='imglog'> 
      <div id="login-form-form">
        <h2 class="b-title b-text b-text_lang_en">Welcome!</h2>
        <h2 class="b-title b-text b-text_lang_ru">Конвертер МТ100 -> 1C_to_kl.txt для системы "faktura.ru" </h2>
        <div class="b-content">
          <span class="b-text b-text_lang_en">Site convert.expobank.ru just created.</span>
          <span class="b-text b-text_lang_ru">
    
<?php



function as1($st)
{
$t=explode('/',$st);
$aq[1]=$t[1];
$aq[2]=$t[2];
return $aq;
}


header('Content-Type: text/html; charset= windows-1251');

require_once 'Autoloader.php';

use libs\libfunc;

$ms=libfunc::vals();

if ($ms['error']==0)
{

    $iso=$ms['iso'];
    $vals=$ms['vals'];
    $valsc=$ms['valsc'];
    $valsi=$ms['valsi'];
}
else
    exit;

$ms=libfunc::swiftbank();
$swiftp=$ms['swiftp'];
$bankpl=$ms['bankpl'];


$mas=$_POST;

if (count($mas)!=0)
{

foreach($_FILES['file']['name'] as $k=>$f)
 {
 
  if (!$_FILES['file']['error'][$k]) {
    if (is_uploaded_file($_FILES['file']['tmp_name'][$k])) {
      if (move_uploaded_file($_FILES['file']['tmp_name'][$k], "./avtoload/".$_FILES['file']['name'][$k])) {
        echo 'Файл: '.$_FILES['file']['name'][$k].' загружен.<br />';
		$str='t'.$k;
		$fname='./avtoload/'.$_FILES['file']['name'][$k];
      }
    }
  }
 }

//echo $fname;
chmod($fname,0666);
$lines = file($fname);
$na='./upload/1c_to_kl'.date('HisdmY').'.xml';
$na1='./upload/tt1c_to_kl'.date('HisdmY').'.xml';

$f=fopen($na,"a");
$f1=fopen($na1,"a");


//-----------------------------------------------------

$n=0;
$n=0;
$rr=1;
$nm=array();
foreach ($lines as $line_num => $line) 
  {
  $st5=trim($line);
  if ($st5[0]==':')
     {
	  $t=1;
      $st01=explode(':',$st5,3);
	  // print_r($st01);
	   //echo'<br>'.$st5.'<br>';
	  $p=$st01[1];
	   if ($p==20)
	   {
	     //----
		  $m[$n]=$ms;
		  $nm[]=$n;
		  $n=$st01[2];
		  
		if (in_array($n,$nm))
  		{
  		$povtor[$rr]['p']=$n;
   		while (in_array($n,$nm))
			{
			$n=$n+1;
			}
 
		  $povtor[$rr]['z']=$n;
		  $rr++;
  
  }
		 //----
	    
		 
	   	 $ms=array();
	//	 print_r($m); echo '<br><br>';  
	   }
	  $ms[$p][$t]=$st01[2];
	  
     }
	 else
	 {
	 $t++;
	 $ms[$p][$t]=$st5;
	 }
	
   }
   
 
 
  if (in_array($n,$nm))
  {
  $povtor[$rr]['p']=$n;
   while (in_array($n,$nm))
			{
			$n=$n+1;
			}
 
  $povtor[$rr]['z']=$n;
  
  }
     
 $m[$n]=$ms;
   
$recv=$m[0];
   
//print_r($nm); 
//print_r($recv);
//echo '<br>';
$nik=0;
foreach ($m as $key => $mv)
{
if ($key!='0')
  {
  $nik++;
   $m1[$key]=$mv;
 //  echo $key.'<br>';
//   print_r($mv);
   //echo '<br>';
   }
} 

$m=$m1;
//echo $nik.'<br>';

$vas=libfunc::valuts($fname,$vals);
$sss=str_replace(',','.',$recv['02'][1]);
$sh='<?xml version="1.0" encoding="windows-1251"?> 
<currency-payment-list total-docs-count="'.$recv['03'][1].'" total-docs-sum="'.$sss.'" currency="'.$vas.'">';

fwrite($f,$sh.chr(13).chr(10));
fwrite($f1,$sh.chr(13).chr(10));
//echo $sh;


//print_r($m);


foreach ($m as $key => $mv)
{
if (trim($mv['57A'][1])=='')
{
$nik--;
echo' в платежке номер '.$key.' отсутствует БИК банка получателя. Данная платежка не конвертируется переходим к следующей<br>';
continue;
}
//print_r($vals);
$st=$mv['32A'][1];
$c=0;

while(strpos($st,$vals[$c])===false)
{
$c++;
}
//echo $vals[$c];

$stt=explode($vals[$c],$st);
//
////echo strpos($stt[1],',');
//
//
if (strpos($stt[1],'-')==true)
{
//echo '<br>1111<br>';
$stt1=explode('-',$stt[1]);
}
elseif(strpos($stt[1],',')==true)
 {
/// echo '<br>121212<br>';
 $stt1=explode(',',$stt[1]);
 
 }
//
$std=$stt[0];
$std1=$std[4].$std[5];
$stm=$std[2].$std[3];
$sty=$std[0].$std[1];
$kop=$stt1[1];

$sum=$stt1[0].'.'.$kop[0].$kop[1];
//
//
$dat=$std1.'.'.$stm.'.'.'20'.$sty;
$dat='20'.$sty.'-'.$stm.'-'.$std1;
//
//
////----------------------------------------
$pls='<currency-payment document_type="d" delivery-type="swift" doc-date="'.$dat.'" doc-number="'.$key.'"  urgency="normal" value-date="">';

fwrite($f1,$pls.chr(13).chr(10));
fwrite($f,$pls.chr(13).chr(10));
$pls='<amount currency="'.$vals[$c].'" currency-code="'.$valsi[$vals[$c]].'" value="'.$sum.'" />';
fwrite($f1,$pls.chr(13).chr(10));
fwrite($f,$pls.chr(13).chr(10));

$inn=$mv[50][1];
$name=$mv[50][2];
$inn1=explode(':',$inn);

$sb=libfunc::klients($inn1[1],$vals[$c]);
$sbt=libfunc::klienttest('7764546846',$vals[$c]);

$pls="<payer name='".trim($sb['name'])."' inn='".$inn1[1]."'>";
$plstest="<payer name='".trim($sbt['name'])."' inn='".$sbt['inn']."'>";//'<payer name="OOO Perspektiva" inn="7796566354">';
fwrite($f1,$plstest.chr(13).chr(10));
fwrite($f,$pls.chr(13).chr(10));

$sb=libfunc::klients($inn1[1],$vals[$c]);
$sbt=libfunc::klienttest('7764546846',$vals[$c]);

$pls='<account number="'.$sb['number'].'">';
$plstest='<account number="'.$sbt['number'].'">';//'<account number="40702840656468468698">';
fwrite($f1,$plstest.chr(13).chr(10));
fwrite($f,$pls.chr(13).chr(10));


$pls='<bank name="'.$bankpl.'" bic="'.trim($sb['Bik']).'" bic-type="ru" />';
$pls1='<bank name="'.$bankpl.'" bic="'.trim($sbt['Bik']).'" bic-type="ru" />';//'<bank name="'.$bankpl.'" bic="045003731" bic-type="ru" />';
fwrite($f1,$pls1.chr(13).chr(10));
fwrite($f,$pls.chr(13).chr(10));

$pls='</account>';
fwrite($f1,$pls.chr(13).chr(10));
fwrite($f,$pls.chr(13).chr(10));
$sit=explode(',',$sb['city']);
 $pls='<address address="'.trim($sit[1]).'" city="'.trim($sit[0]).'" country-code="643" country-name="RUSSIAN FEDERATION"/>';
fwrite($f1,$pls.chr(13).chr(10));
fwrite($f,$pls.chr(13).chr(10));

$pls='</payer>';
fwrite($f1,$pls.chr(13).chr(10));
fwrite($f,$pls.chr(13).chr(10));

//print_r($mv);
$namep=$mv['59'][2];

if ($mv['59'][3]!='')
{
    $namep.=' '.$mv['59'][3];
   // echo $namep.' rr ';
    
}

$schetp=$mv['59'][1];
$schetp[0]=' ';
$schetp=trim($schetp);



$pls='<payee name="'.$namep.'">'.chr(13).chr(10);
$pls.='<account number="'.$schetp.'">'.chr(13).chr(10);


$bank=libfunc::banks($mv['57A'][1]);
$pls.='<bank name="'.$bank['name'].'" bic="'.$mv['57A'][1].'" bic-type="swift" >'.chr(13).chr(10);

$kol=count($mv['59']);
$stb=$mv['59'][$kol];
$stb1=$mv['59'][$kol-1];

$sit=explode(',',$stb);
$pls.='<address address="'.$bank['LOCATION'].', '.$bank['ADDRESS'].'" city="'.$bank['city'].'" country-name="'.$bank['count'].'" />'.chr(13).chr(10);
$pls.='</bank>'.chr(13).chr(10).'</account>'.chr(13).chr(10);

$pls.='<address city="'.trim($sit[0]).'" address="'.$stb1.'" />';
fwrite($f1,$pls.chr(13).chr(10));
fwrite($f,$pls.chr(13).chr(10));


//fwrite($f1,$pls.chr(13).chr(10));
//fwrite($f,$pls.chr(13).chr(10));

$pls='</payee>';

fwrite($f1,$pls.chr(13).chr(10));
fwrite($f,$pls.chr(13).chr(10));

$mnaznach=$mv['70'];
$textn='';

foreach ($mnaznach as $naz)
{
 $textn.=$naz.chr(13).chr(10);
}


$pls='<payment-info>'.chr(13).chr(10).$textn.'</payment-info>';

fwrite($f1,$pls.chr(13).chr(10));
fwrite($f,$pls.chr(13).chr(10));

$pls='<charges-info>'.chr(13).chr(10).'<swift-charges type="our" account-number="'.$sb['snumber'].'"/>'.chr(13).chr(10).'</charges-info>';

$pls1='<charges-info>'.chr(13).chr(10).'<swift-charges type="our" account-number="'.$sbt['snumber'].'"/>'.chr(13).chr(10).'</charges-info>';//'<charges-info>'.chr(13).chr(10).'<swift-charges type="our" account-number="40702840656468468698"/>'.chr(13).chr(10).'</charges-info>';


fwrite($f1,$pls1.chr(13).chr(10));
fwrite($f,$pls.chr(13).chr(10));


$pls='</currency-payment>';

fwrite($f1,$pls.chr(13).chr(10));
fwrite($f,$pls.chr(13).chr(10));

echo'Документ с номером '.$key.' обработан.<br>';
$dopinf=array();
$mnaznach=array();
} 
if (count($povtor)!=0)
{
foreach ($povtor as $pv)
{
echo 'Повторный номер '.$pv['p'].' Заменён на '.$pv['z'].'<br>';

}  
}
echo 'Всего платежек '.$nik.'<br>';

$pls='</currency-payment-list>';

fwrite($f1,$pls.chr(13).chr(10));
fwrite($f,$pls.chr(13).chr(10));

fclose($f);
fclose($f1);

unlink($fname);
//echo '<a href="./load.php?name='.$na1.'">Тестовый файл для ООО "Перспектива"</a><br><br>';
//echo'<a href="./'.$na.'">Сохранить результат</a> правильный';
echo'<br><a href="./load.php?name='.$na.'">Сохранить результат</a><br><br><br>';
}
else 
 {
?>

<form action="convertv.php" method="post" ENCTYPE="multipart/form-data">
        <label>
          Файл: <input type="file" name="file[]"><br>
		  <input type ="submit" name="ok" value="Ok">
    </label>
        </form><br><br>

<?php
 }

?>
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
  var
      platformLanguage = navigator && (
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
    document.title = "Конвертер";
  }
</script>
</body>
</html>
