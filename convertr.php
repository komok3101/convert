<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--
<head>
<meta charset="866" >
<meta http-equiv="Content-Type" content="text/html; charset=866" /></head>
-->
<title>КОНВЕРТ</title>

<style>

    * {
    charset: "866";
    
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
          <span class="b-text b-text_lang_en"></span>
          <span class="b-text b-text_lang_ru">
<?php



function as1($st)
{
$t=explode('/',$st);
$aq[1]=$t[1];
$aq[2]=$t[2];
return $aq;
}


header('Content-Type: text/html; charset= cp866');

require_once 'Autoloader.php';
use libs\libfunc;
use libs\db;
$mas=$_POST;
$tkl=libfunc::klienttest('7764546846','RUB');

if (count($mas)!=0)
{

foreach($_FILES['file']['name'] as $k=>$f) {
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
$na='./upload/1c_to_kl'.date('HisdmY').'.txt';
$na1='./upload/tt1c_to_kl'.date('HisdmY').'.txt';

$f=fopen($na,"a");
$f1=fopen($na1,"a");


//-----------------------------------------------------
fwrite($f1,'1CClientBankExchange'.chr(13).chr(10));
fwrite($f1,'ВерсияФормата=1.02'.chr(13).chr(10));
fwrite($f1,'Кодировка=DOS'.chr(13).chr(10));
fwrite($f1,'Отправитель=Бухгалтерия предприятия, редакция 2.0'.chr(13).chr(10));

//Получатель=Система ДБО BS-Client 
fwrite($f1,'Получатель=ЦФТ - Интернет-банк (Faktura.ru) фирмы "Центр финансовых технологий"'.chr(13).chr(10));
fwrite($f1,'ДатаСоздания='.date('d.m.Y').chr(13).chr(10));
fwrite($f1,'ВремяСоздания='.date('H:i:s').chr(13).chr(10));
fwrite($f1,'ДатаНачала='.date('d.m.Y').chr(13).chr(10));
fwrite($f1,'ДатаКонца='.date('d.m.Y').chr(13).chr(10));
//------------------------------------------------------------

fwrite($f,'1CClientBankExchange'.chr(13).chr(10));
fwrite($f,'ВерсияФормата=1.02'.chr(13).chr(10));
fwrite($f,'Кодировка=DOS'.chr(13).chr(10));
fwrite($f,'Отправитель=Бухгалтерия предприятия, редакция 2.0'.chr(13).chr(10));

//Получатель=Система ДБО BS-Client 
fwrite($f,'Получатель=ЦФТ - Интернет-банк (Faktura.ru) фирмы "Центр финансовых технологий"'.chr(13).chr(10));
fwrite($f,'ДатаСоздания='.date('d.m.Y').chr(13).chr(10));
fwrite($f,'ВремяСоздания='.date('H:i:s').chr(13).chr(10));
fwrite($f,'ДатаНачала='.date('d.m.Y').chr(13).chr(10));
fwrite($f,'ДатаКонца='.date('d.m.Y').chr(13).chr(10));

$n=0;
$rr=1;
$nm=array();
foreach ($lines as $line_num => $line) 
  {
  $st5=trim($line);
  if ($st5[0]==':')
     {
	  $t=1;
      $st01=explode(':',$st5);
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


$nik=0;

foreach ($m as $key => $mv)
{

if ($key!='0')
  {
    $nik++;
  // echo $key.', ';
   $m1[$key]=$mv;
   }
} 

$m=$m1;
foreach ($m as $key => $mv)
{
if (trim($mv['57A'][1])=='')
{
$nik--;
echo' в платежке номер '.$key.' отсутствует БИК банка получателя. Данная платежка не конвертируется переходим к следующей<br>';
continue;

}

//----------------------------------------------------------
fwrite($f1,'Документ=Платежное поручение'.chr(13).chr(10));
fwrite($f1,'СекцияДокумент=Платежное поручение'.chr(13).chr(10));
fwrite($f1,'Номер='.$key.chr(13).chr(10));
//------------------------------------------------------------


fwrite($f,'Документ=Платежное поручение'.chr(13).chr(10));
fwrite($f,'СекцияДокумент=Платежное поручение'.chr(13).chr(10));
fwrite($f,'Номер='.$key.chr(13).chr(10));
$st=$mv['32A'][1];
$stt=explode('RUB',$st);

//echo strpos($stt[1],',');


if (strpos($stt[1],'-')==true)
{
//echo '<br>1111<br>';
$stt1=explode('-',$stt[1]);
}
elseif(strpos($stt[1],',')==true)
 {
// echo '<br>121212<br>';
 $stt1=explode(',',$stt[1]);
 
 }

$std=$stt[0];
$std1=$std[4].$std[5];
$stm=$std[2].$std[3];
$sty=$std[0].$std[1];
$kop=$stt1[1];

$sum=$stt1[0].'.'.$kop[0].$kop[1];


$dat=$std1.'.'.$stm.'.'.'20'.$sty;


//----------------------------------------
fwrite($f1,'Дата='.$dat.chr(13).chr(10));
fwrite($f1,'Сумма='.$sum.chr(13).chr(10));
fwrite($f1,'ПлательщикСчет='.$tkl['number'].chr(13).chr(10));
//----------------------------------------


fwrite($f,'Дата='.$dat.chr(13).chr(10));
fwrite($f,'Сумма='.$sum.chr(13).chr(10));
$schet=$mv['52A'][1];
$bik=trim($mv['52A'][2]);
$tsc=str_replace('/D/',' ',$schet);
$schet=trim ($tsc);

fwrite($f,'ПлательщикСчет='.$schet.chr(13).chr(10));


$coun=count($recv['05']);
$ks=array_keys($recv['05']);


$name=$recv['05'][1];

$name='';

$name=trim($recv['05'][$ks[0]]);
//echo $namep.'312<br>';



$inn=$recv['05'][$ks[$coun-1]];
//if ($inn=='')
//{
//$inn=$mv['50'][2];
//}

$coun=count($mv['50']);

//echo $coun;
$kta=as1($mv['50'][$coun]);
$kppl=$kta[2];

    $ntemp=iconv('Windows-1251','DOS',$tkl['name']);
    //fwrite($f1,'Плательщик=ИНН '.$tkl['inn'].' NEWПредприятие '.chr(13).chr(10));
    //fwrite($f1,'Плательщик=ИНН '.$tkl['inn'].' '.$tkl['name'].' '.chr(13).chr(10));
//-------------------------------------------------------
//Плательщик=ИНН 6901049940 ООО "Илизор"
fwrite($f1,'Плательщик=ИНН '.$tkl['inn'].' NEWПредприятие'.chr(13).chr(10));
//----------------------------------------------

fwrite($f,'Плательщик=ИНН '.$inn.' '.$name.chr(13).chr(10));

//-----------------------------------------------------
//ПлательщикИНН=6901049940
fwrite($f1,'ПлательщикИНН='.$tkl['inn'].chr(13).chr(10));
//--------------------------------------------------
fwrite($f,'ПлательщикИНН='.$inn.chr(13).chr(10));


//--------------------------------------------
//Плательщик1=ООО "Илизор"

fwrite($f1,'Плательщик1=NEWПредприятие'.chr(13).chr(10));
//-----------------------------------------------


fwrite($f,'Плательщик1='.$name.chr(13).chr(10));


//---------------------------------------------------
//ПлательщикРасчСчет=40702810809010954684
fwrite($f1,'ПлательщикРасчСчет='.$tkl['number'].chr(13).chr(10));
//---------------------------------------------------




fwrite($f,'ПлательщикРасчСчет='.$schet.chr(13).chr(10));




//-------------------------------------------------
//ПлательщикБИК=046577910
fwrite($f1,'ПлательщикБИК='.$tkl['Bik'].chr(13).chr(10));

//----------------------------------------------------


fwrite($f,'ПлательщикБИК='.$bik.chr(13).chr(10));

   $sb8=libfunc::bankfrombik($bik);
   $sb8t=libfunc::bankfrombik($tkl['Bik']);

  $pkrs=as1($mv['53D'][1]);



//fwrite($f,'ПлательщикКорсчет='.$pkrs[2].chr(13).chr(10));

fwrite($f,'ПлательщикКорсчет='.$sb8['ksnp'].chr(13).chr(10));
fwrite($f1,'ПлательщикКорсчет='.$sb8t['ksnp'].chr(13).chr(10));




$schetp=trim($mv['59'][1]);
$schetp[0]=' ';
$schetp=trim($schetp);


$coun=count($mv['59']);
$ks=array_keys($mv['59']);

//print_r($ks);
//echo $coun;

$namep='';

for ($i=1;$i<($coun-2);$i++)
{
$namep.=trim($mv['59'][$ks[$i]]);
//echo $namep.'312<br>';
}

$innp=trim($mv['59'][$ks[$coun-2]]);
$kppp=trim($mv['59'][$ks[$coun-1]]);
if ($innp=='0000000000')
{
$innp='';
}
$kppt=str_replace('/KPP2/',' ',$kppp);


$kppp=trim($kppt);

$bikbp=trim($mv['57A'][1]);

//ПолучательСчет=40101810200000010001
fwrite($f,'ПолучательСчет='.$schetp.chr(13).chr(10));

//-------------------------------------------------------------
fwrite($f1,'ПолучательСчет='.$schetp.chr(13).chr(10));
//--------------------------------------------------------------

// Получатель=ИНН 7802114044 УФК по г. ЕКАТЕРИНБУРГу (ОПФР по ЕКАТЕРИНБУРГу и Ленинградской области)

fwrite($f,'Получатель=ИНН '.$innp.' '.$namep.chr(13).chr(10));

//---------------------------------------------------------
fwrite($f1,'Получатель=ИНН '.$innp.' '.$namep.chr(13).chr(10));
//-----------------------------------------------------------

//ПолучательИНН=7802114044

fwrite($f,'ПолучательИНН='.$innp.chr(13).chr(10));

//----------------------------------------------
fwrite($f1,'ПолучательИНН='.$innp.chr(13).chr(10));
//-----------------------------------------------

//Получатель1=УФК по г. ЕКАТЕРИНБУРГу (ОПФР по ЕКАТЕРИНБУРГу и Ленинградской области)

fwrite($f,'Получатель1='.$namep.chr(13).chr(10));

//-----------------------------------------
fwrite($f1,'Получатель1='.$namep.chr(13).chr(10));
//------------------------------------------



//ПолучательРасчСчет=40101810200000010001

fwrite($f,'ПолучательРасчСчет='.$schetp.chr(13).chr(10));

//-------------------------------------------------
fwrite($f1,'ПолучательРасчСчет='.$schetp.chr(13).chr(10));
//--------------------------------------------------

//ПолучательБанк1=ГРКЦ ГУ БАНКА РОССИИ ПО Г. ЕКАТЕРИНБУРГУ
//ПолучательБанк2=Г. ЕКАТЕРИНБУРГ
//ПолучательБИК=044030001
fwrite($f,'ПолучательБИК='.$bikbp.chr(13).chr(10));
 $sb8=libfunc::bankfrombik($bikbp);

$pkrsp[2]=$sb8['ksnp'];

//print_r($sb8);

//print_r($mv['56D']);
if ((trim($pkrsp[2])!='') and (trim($pkrsp[2])!='00000000000000000000') )
{
fwrite($f,'ПолучательКорсчет='.$pkrsp[2].chr(13).chr(10));
fwrite($f1,'ПолучательКорсчет='.$pkrsp[2].chr(13).chr(10));
}


//-----------------------------------------------
fwrite($f1,'ПолучательБИК='.$bikbp.chr(13).chr(10));

//-----------------------------------------------


$dopinf=$mv['72'];
$mdi=array();
foreach($dopinf as $value)
{
$mdt=as1($value);
$mdi[$mdt[1]]=$mdt[2];
}
//print_r($mdi);

//ВидОплаты=01

if ($mdi['STATUS']!='')
{
//СтатусСоставителя=01
fwrite($f,'СтатусСоставителя='.$mdi['STATUS'].chr(13).chr(10));
//ПлательщикКПП=780501001
//$kppl
fwrite($f,'ПлательщикКПП='.$kppl.chr(13).chr(10));
//ПолучательКПП=780201001

fwrite($f,'ПолучательКПП='.$kppp.chr(13).chr(10));

//---------------------------------------------------

fwrite($f1,'СтатусСоставителя='.$mdi['STATUS'].chr(13).chr(10));
//ПлательщикКПП=780501001
//$kppl
fwrite($f1,'ПлательщикКПП='.$tkl['kpp'].chr(13).chr(10));
//ПолучательКПП=780201001

fwrite($f1,'ПолучательКПП='.$kppp.chr(13).chr(10));

//---------------------------------------------------
}

//ПоказательКБК=39210202010061000160
if (trim($mdi['BCC']!=''))
{
fwrite($f,'ПоказательКБК='.$mdi['BCC'].chr(13).chr(10));

//-----------------------------------
fwrite($f1,'ПоказательКБК='.$mdi['BCC'].chr(13).chr(10));
//----------------------------------------------
}
//ОКАТО=40339000
if (trim($mdi['OKATO']!=''))
{
fwrite($f,'ОКАТО='.$mdi['OKATO'].chr(13).chr(10));
fwrite($f1,'ОКАТО='.$mdi['OKATO'].chr(13).chr(10));
}
//ПоказательОснования=ТП
if (trim($mdi['TREASON']!=''))
{
$ttt=($mdi['TREASON']=='00')?'0':$mdi['TREASON'];
fwrite($f,'ПоказательОснования='.$ttt.chr(13).chr(10));
fwrite($f1,'ПоказательОснования='.ttt.chr(13).chr(10));
}

if (trim($mdi['TPERIOD']!=''))
{
//ПоказательПериода=МС.10.2014
fwrite($f,'ПоказательПериода='.$mdi['TPERIOD'].chr(13).chr(10));
fwrite($f1,'ПоказательПериода='.$mdi['TPERIOD'].chr(13).chr(10));
}


//ПоказательНомера=0

if (trim($mdi['TDOCNUM']!=''))
{
//ПоказательНомера=0
fwrite($f,'ПоказательНомера='.$mdi['TDOCNUM'].chr(13).chr(10));
fwrite($f1,'ПоказательНомера='.$mdi['TDOCNUM'].chr(13).chr(10));
}


if (trim($mdi['TDOCDATE']!=''))
{
//ПоказательДаты=0
fwrite($f,'ПоказательДаты='.$mdi['TDOCDATE'].chr(13).chr(10));
fwrite($f1,'ПоказательДаты='.$mdi['TDOCDATE'].chr(13).chr(10));
}
if (trim($mdi['TTYPE']!=''))
{
//ПоказательТипа=0
fwrite($f,'ПоказательТипа='.$mdi['TTYPE'].chr(13).chr(10));
fwrite($f1,'ПоказательТипа='.$mdi['TTYPE'].chr(13).chr(10));
}


 //ВидПлатежа=Электронно
fwrite($f,'ВидПлатежа=Электронно'.chr(13).chr(10));
fwrite($f1,'ВидПлатежа=Электронно'.chr(13).chr(10));
//Очередность=5

//ВидОплаты=01
fwrite($f,'ВидОплаты=01'.chr(13).chr(10));
fwrite($f1,'ВидОплаты=01'.chr(13).chr(10));
if ($mdi['P']>5)
 {
 $mdi['P']=5;
 }

fwrite($f,'Очередность='.$mdi['P'].chr(13).chr(10));
fwrite($f1,'Очередность='.$mdi['P'].chr(13).chr(10));



$mnaznach=$mv['70'];
$textn='';

foreach ($mnaznach as $naz)
{
 $textn.=$naz;
}


//НазначениеПлатежа=УИН0///Страховые взносы на обязательное пенсионное страхование, зачисляемые в Пенсионный фонд РФ. рег. № 088-006-081082 за октябрь 2014 г.
$kod=0;
if (stripos($textn,'///')!==false)
{
$uin=explode('///',$textn);
$textn=$uin[2];
$kod=$uin[1];
//print_r($uin);
}

fwrite($f,'НазначениеПлатежа='.$textn.chr(13).chr(10));
fwrite($f1,'НазначениеПлатежа='.$textn.chr(13).chr(10));


//$bikbp=trim($mv[][1]);



//ПлательщикБанк1=ФИЛИАЛ ООО "ЭКСПОБАНК" В Г. ЕКАТЕРИНБУРГЕ
//ПлательщикБанк2=Г. САНКТ-ПЕТЕРБУРГ

//ПлательщикКорсчет=30101810400000000910

//echo '<br><br>'.$key.'<br>';
//print_r($mv);
if ($kod!=0)
{
fwrite($f,'Код='.$kod.chr(13).chr(10));
fwrite($f1,'Код='.$kod.chr(13).chr(10));
}
fwrite($f,'КонецДокумента'.chr(13).chr(10));


fwrite($f1,'КонецДокумента'.chr(13).chr(10));


echo'Документ с номером '.$key.' обработан.<br>';
//print_r($dopinf);
//echo '<br>';
$dopinf=array();
$mnaznach=array();

} 

//print_r($povtor);
if (count($povtor)!=0)
{
foreach ($povtor as $pv)
{
echo 'Повторный номер '.$pv['p'].' Заменён на '.$pv['z'].'<br>';

}  
}
echo 'Всего платежек '.$nik.'<br>';


fclose($f);
fclose($f1);
//echo'<a href="./load.php?name='.$na1.'">Тестовый файл для '.$tkl['name'].'</a><br><br>';
echo'<br><a href="./load.php?name='.$na.'">Сохранить результат</a><br><br><br>';


unlink($fname);

//--------------------------

}
else 
 {
?>


<form action="convertr.php" method="post" ENCTYPE="multipart/form-data" accept-charset="cp866">
        <label>
            
          Файл: <input type="file" name="file[]"><br>
		  <input type ="submit" name="ok" value="Ok">
    </label>
        </form><br><br>




<?php

}

?>
</span>
          
          <span class="b-text b-text_lang_en"></span>
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
    document.title = "Конвертер";
  }
</script>
</body>
</html>
