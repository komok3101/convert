<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--
<head>
<meta charset="866" >
<meta http-equiv="Content-Type" content="text/html; charset=866" /></head>
-->
<title>�������</title>

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
        <h2 class="b-title b-text b-text_lang_ru">�������� ��100 -> 1C_to_kl.txt ��� ��⥬� "faktura.ru" </h2>
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
        echo '����: '.$_FILES['file']['name'][$k].' ����㦥�.<br />';
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
fwrite($f1,'����ଠ�=1.02'.chr(13).chr(10));
fwrite($f1,'����஢��=DOS'.chr(13).chr(10));
fwrite($f1,'��ࠢ�⥫�=��壠���� �।�����, ।���� 2.0'.chr(13).chr(10));

//�����⥫�=���⥬� ��� BS-Client 
fwrite($f1,'�����⥫�=��� - ���୥�-���� (Faktura.ru) ��� "����� 䨭��ᮢ�� �孮�����"'.chr(13).chr(10));
fwrite($f1,'��⠑�������='.date('d.m.Y').chr(13).chr(10));
fwrite($f1,'�६������='.date('H:i:s').chr(13).chr(10));
fwrite($f1,'��⠍�砫�='.date('d.m.Y').chr(13).chr(10));
fwrite($f1,'��⠊���='.date('d.m.Y').chr(13).chr(10));
//------------------------------------------------------------

fwrite($f,'1CClientBankExchange'.chr(13).chr(10));
fwrite($f,'����ଠ�=1.02'.chr(13).chr(10));
fwrite($f,'����஢��=DOS'.chr(13).chr(10));
fwrite($f,'��ࠢ�⥫�=��壠���� �।�����, ।���� 2.0'.chr(13).chr(10));

//�����⥫�=���⥬� ��� BS-Client 
fwrite($f,'�����⥫�=��� - ���୥�-���� (Faktura.ru) ��� "����� 䨭��ᮢ�� �孮�����"'.chr(13).chr(10));
fwrite($f,'��⠑�������='.date('d.m.Y').chr(13).chr(10));
fwrite($f,'�६������='.date('H:i:s').chr(13).chr(10));
fwrite($f,'��⠍�砫�='.date('d.m.Y').chr(13).chr(10));
fwrite($f,'��⠊���='.date('d.m.Y').chr(13).chr(10));

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
echo' � ���⥦�� ����� '.$key.' ��������� ��� ����� �����⥫�. ������ ���⥦�� �� ������������ ���室�� � ᫥���饩<br>';
continue;

}

//----------------------------------------------------------
fwrite($f1,'���㬥��=���⥦��� ����祭��'.chr(13).chr(10));
fwrite($f1,'�����㬥��=���⥦��� ����祭��'.chr(13).chr(10));
fwrite($f1,'�����='.$key.chr(13).chr(10));
//------------------------------------------------------------


fwrite($f,'���㬥��=���⥦��� ����祭��'.chr(13).chr(10));
fwrite($f,'�����㬥��=���⥦��� ����祭��'.chr(13).chr(10));
fwrite($f,'�����='.$key.chr(13).chr(10));
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
fwrite($f1,'���='.$dat.chr(13).chr(10));
fwrite($f1,'�㬬�='.$sum.chr(13).chr(10));
fwrite($f1,'���⥫�騪���='.$tkl['number'].chr(13).chr(10));
//----------------------------------------


fwrite($f,'���='.$dat.chr(13).chr(10));
fwrite($f,'�㬬�='.$sum.chr(13).chr(10));
$schet=$mv['52A'][1];
$bik=trim($mv['52A'][2]);
$tsc=str_replace('/D/',' ',$schet);
$schet=trim ($tsc);

fwrite($f,'���⥫�騪���='.$schet.chr(13).chr(10));


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
    //fwrite($f1,'���⥫�騪=��� '.$tkl['inn'].' NEW�।���⨥ '.chr(13).chr(10));
    //fwrite($f1,'���⥫�騪=��� '.$tkl['inn'].' '.$tkl['name'].' '.chr(13).chr(10));
//-------------------------------------------------------
//���⥫�騪=��� 6901049940 ��� "������"
fwrite($f1,'���⥫�騪=��� '.$tkl['inn'].' NEW�।���⨥'.chr(13).chr(10));
//----------------------------------------------

fwrite($f,'���⥫�騪=��� '.$inn.' '.$name.chr(13).chr(10));

//-----------------------------------------------------
//���⥫�騪���=6901049940
fwrite($f1,'���⥫�騪���='.$tkl['inn'].chr(13).chr(10));
//--------------------------------------------------
fwrite($f,'���⥫�騪���='.$inn.chr(13).chr(10));


//--------------------------------------------
//���⥫�騪1=��� "������"

fwrite($f1,'���⥫�騪1=NEW�।���⨥'.chr(13).chr(10));
//-----------------------------------------------


fwrite($f,'���⥫�騪1='.$name.chr(13).chr(10));


//---------------------------------------------------
//���⥫�騪������=40702810809010954684
fwrite($f1,'���⥫�騪������='.$tkl['number'].chr(13).chr(10));
//---------------------------------------------------




fwrite($f,'���⥫�騪������='.$schet.chr(13).chr(10));




//-------------------------------------------------
//���⥫�騪���=046577910
fwrite($f1,'���⥫�騪���='.$tkl['Bik'].chr(13).chr(10));

//----------------------------------------------------


fwrite($f,'���⥫�騪���='.$bik.chr(13).chr(10));

   $sb8=libfunc::bankfrombik($bik);
   $sb8t=libfunc::bankfrombik($tkl['Bik']);

  $pkrs=as1($mv['53D'][1]);



//fwrite($f,'���⥫�騪������='.$pkrs[2].chr(13).chr(10));

fwrite($f,'���⥫�騪������='.$sb8['ksnp'].chr(13).chr(10));
fwrite($f1,'���⥫�騪������='.$sb8t['ksnp'].chr(13).chr(10));




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

//�����⥫���=40101810200000010001
fwrite($f,'�����⥫���='.$schetp.chr(13).chr(10));

//-------------------------------------------------------------
fwrite($f1,'�����⥫���='.$schetp.chr(13).chr(10));
//--------------------------------------------------------------

// �����⥫�=��� 7802114044 ��� �� �. ������������� (���� �� ������������� � ������ࠤ᪮� ������)

fwrite($f,'�����⥫�=��� '.$innp.' '.$namep.chr(13).chr(10));

//---------------------------------------------------------
fwrite($f1,'�����⥫�=��� '.$innp.' '.$namep.chr(13).chr(10));
//-----------------------------------------------------------

//�����⥫숍�=7802114044

fwrite($f,'�����⥫숍�='.$innp.chr(13).chr(10));

//----------------------------------------------
fwrite($f1,'�����⥫숍�='.$innp.chr(13).chr(10));
//-----------------------------------------------

//�����⥫�1=��� �� �. ������������� (���� �� ������������� � ������ࠤ᪮� ������)

fwrite($f,'�����⥫�1='.$namep.chr(13).chr(10));

//-----------------------------------------
fwrite($f1,'�����⥫�1='.$namep.chr(13).chr(10));
//------------------------------------------



//�����⥫쐠����=40101810200000010001

fwrite($f,'�����⥫쐠����='.$schetp.chr(13).chr(10));

//-------------------------------------------------
fwrite($f1,'�����⥫쐠����='.$schetp.chr(13).chr(10));
//--------------------------------------------------

//�����⥫쁠��1=���� �� ����� ������ �� �. �������������
//�����⥫쁠��2=�. ������������
//�����⥫쁈�=044030001
fwrite($f,'�����⥫쁈�='.$bikbp.chr(13).chr(10));
 $sb8=libfunc::bankfrombik($bikbp);

$pkrsp[2]=$sb8['ksnp'];

//print_r($sb8);

//print_r($mv['56D']);
if ((trim($pkrsp[2])!='') and (trim($pkrsp[2])!='00000000000000000000') )
{
fwrite($f,'�����⥫슮����='.$pkrsp[2].chr(13).chr(10));
fwrite($f1,'�����⥫슮����='.$pkrsp[2].chr(13).chr(10));
}


//-----------------------------------------------
fwrite($f1,'�����⥫쁈�='.$bikbp.chr(13).chr(10));

//-----------------------------------------------


$dopinf=$mv['72'];
$mdi=array();
foreach($dopinf as $value)
{
$mdt=as1($value);
$mdi[$mdt[1]]=$mdt[2];
}
//print_r($mdi);

//���������=01

if ($mdi['STATUS']!='')
{
//����ᑮ�⠢�⥫�=01
fwrite($f,'����ᑮ�⠢�⥫�='.$mdi['STATUS'].chr(13).chr(10));
//���⥫�騪���=780501001
//$kppl
fwrite($f,'���⥫�騪���='.$kppl.chr(13).chr(10));
//�����⥫슏�=780201001

fwrite($f,'�����⥫슏�='.$kppp.chr(13).chr(10));

//---------------------------------------------------

fwrite($f1,'����ᑮ�⠢�⥫�='.$mdi['STATUS'].chr(13).chr(10));
//���⥫�騪���=780501001
//$kppl
fwrite($f1,'���⥫�騪���='.$tkl['kpp'].chr(13).chr(10));
//�����⥫슏�=780201001

fwrite($f1,'�����⥫슏�='.$kppp.chr(13).chr(10));

//---------------------------------------------------
}

//������⥫슁�=39210202010061000160
if (trim($mdi['BCC']!=''))
{
fwrite($f,'������⥫슁�='.$mdi['BCC'].chr(13).chr(10));

//-----------------------------------
fwrite($f1,'������⥫슁�='.$mdi['BCC'].chr(13).chr(10));
//----------------------------------------------
}
//�����=40339000
if (trim($mdi['OKATO']!=''))
{
fwrite($f,'�����='.$mdi['OKATO'].chr(13).chr(10));
fwrite($f1,'�����='.$mdi['OKATO'].chr(13).chr(10));
}
//������⥫�᭮�����=��
if (trim($mdi['TREASON']!=''))
{
$ttt=($mdi['TREASON']=='00')?'0':$mdi['TREASON'];
fwrite($f,'������⥫�᭮�����='.$ttt.chr(13).chr(10));
fwrite($f1,'������⥫�᭮�����='.ttt.chr(13).chr(10));
}

if (trim($mdi['TPERIOD']!=''))
{
//������⥫쏥ਮ��=��.10.2014
fwrite($f,'������⥫쏥ਮ��='.$mdi['TPERIOD'].chr(13).chr(10));
fwrite($f1,'������⥫쏥ਮ��='.$mdi['TPERIOD'].chr(13).chr(10));
}


//������⥫썮���=0

if (trim($mdi['TDOCNUM']!=''))
{
//������⥫썮���=0
fwrite($f,'������⥫썮���='.$mdi['TDOCNUM'].chr(13).chr(10));
fwrite($f1,'������⥫썮���='.$mdi['TDOCNUM'].chr(13).chr(10));
}


if (trim($mdi['TDOCDATE']!=''))
{
//������⥫선��=0
fwrite($f,'������⥫선��='.$mdi['TDOCDATE'].chr(13).chr(10));
fwrite($f1,'������⥫선��='.$mdi['TDOCDATE'].chr(13).chr(10));
}
if (trim($mdi['TTYPE']!=''))
{
//������⥫쒨��=0
fwrite($f,'������⥫쒨��='.$mdi['TTYPE'].chr(13).chr(10));
fwrite($f1,'������⥫쒨��='.$mdi['TTYPE'].chr(13).chr(10));
}


 //������⥦�=�����஭��
fwrite($f,'������⥦�=�����஭��'.chr(13).chr(10));
fwrite($f1,'������⥦�=�����஭��'.chr(13).chr(10));
//��।�����=5

//���������=01
fwrite($f,'���������=01'.chr(13).chr(10));
fwrite($f1,'���������=01'.chr(13).chr(10));
if ($mdi['P']>5)
 {
 $mdi['P']=5;
 }

fwrite($f,'��।�����='.$mdi['P'].chr(13).chr(10));
fwrite($f1,'��।�����='.$mdi['P'].chr(13).chr(10));



$mnaznach=$mv['70'];
$textn='';

foreach ($mnaznach as $naz)
{
 $textn.=$naz;
}


//�����祭�����⥦�=���0///���客� ������ �� ��易⥫쭮� ���ᨮ���� ���客����, ����塞� � ���ᨮ��� 䮭� ��. ॣ. � 088-006-081082 �� ������ 2014 �.
$kod=0;
if (stripos($textn,'///')!==false)
{
$uin=explode('///',$textn);
$textn=$uin[2];
$kod=$uin[1];
//print_r($uin);
}

fwrite($f,'�����祭�����⥦�='.$textn.chr(13).chr(10));
fwrite($f1,'�����祭�����⥦�='.$textn.chr(13).chr(10));


//$bikbp=trim($mv[][1]);



//���⥫�騪����1=������ ��� "���������" � �. �������������
//���⥫�騪����2=�. �����-���������

//���⥫�騪������=30101810400000000910

//echo '<br><br>'.$key.'<br>';
//print_r($mv);
if ($kod!=0)
{
fwrite($f,'���='.$kod.chr(13).chr(10));
fwrite($f1,'���='.$kod.chr(13).chr(10));
}
fwrite($f,'����愮�㬥��'.chr(13).chr(10));


fwrite($f1,'����愮�㬥��'.chr(13).chr(10));


echo'���㬥�� � ����஬ '.$key.' ��ࠡ�⠭.<br>';
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
echo '������ ����� '.$pv['p'].' ������ �� '.$pv['z'].'<br>';

}  
}
echo '�ᥣ� ���⥦�� '.$nik.'<br>';


fclose($f);
fclose($f1);
//echo'<a href="./load.php?name='.$na1.'">���⮢� 䠩� ��� '.$tkl['name'].'</a><br><br>';
echo'<br><a href="./load.php?name='.$na.'">���࠭��� १����</a><br><br><br>';


unlink($fname);

//--------------------------

}
else 
 {
?>


<form action="convertr.php" method="post" ENCTYPE="multipart/form-data" accept-charset="cp866">
        <label>
            
          ����: <input type="file" name="file[]"><br>
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
    document.title = "��������";
  }
</script>
</body>
</html>
