<?php
namespace libs;
use libs\db;
class libfunc
{
 public function vals()
 {
     $m=db::connect();
     if ($m[1]==1)
         $baza=$m[2];
     else
         exit;

     $zap='select cod,iso from cur_code';
      if($rez=$baza->query($zap))
      {
          while($row=$rez->fetch_assoc())
          {
              $iso[]=$row['iso'];
              $vals[]=$row['cod'];
              $valsc[$row['iso']]=$row['cod'];
              $valsi[$row['cod']]=$row['iso'];
          }
          $rezm['error']=0;
          $rezm['iso']=$iso;
          $rezm['vals']=$vals;
          $rezm['valsc']=$valsc;
          $rezm['valsi']=$valsi;
      }
      else
          $rezm['error']=1;
  return $rezm;
 }
 public function swiftbank()
{
    $m=db::connect();
    if ($m[1]==1)
        $baza=$m[2];
    else
        exit;

    $zap='SELECT name FROM swift WHERE bic_code="EXPNRUMM"';

      if($rez=$baza->query($zap))
      {
        $sb=$rez->fetch_assoc();
      }

    $rezm['swiftp']="EXPNRUMM";
    $rezm['bankpl']=$sb['name'];
    return $rezm;

}
 public function banks($swift)
    {
        $m=db::connect();
        if ($m[1]==1)
            $baza=$m[2];
        else
            exit;

        if (strlen(trim($swift))>8)
        {
            $sb1=substr(trim($swift),0, 8);
            $sb2=substr(trim($swift),8, 3);
//echo $sb2;
            $zap='SELECT name, COUNTRY, CITY_HEADING, LOCATION,ADDRESS1 FROM swift WHERE bic_code="'.$sb1.'" and BRANCH_CODE="'.$sb2.'"';
        }
        else
        {
            $zap='SELECT name, COUNTRY, CITY_HEADING, LOCATION,ADDRESS1 FROM swift WHERE bic_code="'.$swift.'" and BRANCH_CODE="XXX"';
        }

        $qw=$baza->query($zap);

        while($sb=$qw->fetch_assoc())
        {
            $mbs['name']=$sb['name'];
            $mbs['city']=$sb['CITY_HEADING'];
            $mbs['count']=$sb['COUNTRY'];
            $mbs['LOCATION']=$sb['LOCATION'];
            $mbs['ADDRESS']=$sb['ADDRESS1'];
        }

        return $mbs;
    }

 public function valuts($fnam,$val)
    {
        $text = file_get_contents($fnam);
        $c=0;
        $asw= stripos($text,':32A:');
        $sb1=substr($text,$asw-1,30);
        while(strpos($sb1,$val[$c])===false)
        {
            $c++;
        }

        return $val[$c];
    }
 public function bankfrombik($bik)
 {
     $m=db::connect();
     if ($m[1]==1)
         $baza=$m[2];
     else
         exit;
     $zap = 'select namep,nnp,ksnp from bank where newnum =' . $bik;

     if ($qw2 = $baza->query($zap))
     {
         $sb=$qw2->fetch_assoc();
         $sb['error']=0;
     }
   return (count($sb)!=0)?$sb:['error'=>1];
 }

 public function klients($inn,$vals)
 {
     $m=db::connect();
     if ($m[1]==1)
         $baza=$m[2];
     else
         exit;

     $zap='select * from klients where inn="'.trim($inn).'" and curr="'.$vals.'";';
     if ($qw2 = $baza->query($zap))
     {
         $sb=$qw2->fetch_assoc();
         $sb['error']=0;
     }


     return (count($sb)!=0)?$sb:['error'=>1];

 }
 public function klienttest($inn,$vals)
    {
        $m=db::connect();
        if ($m[1]==1)
            $baza=$m[2];
        else
            exit;

        $zap='select * from klienttest where inn="'.trim($inn).'" and curr="'.$vals.'";';
        if ($qw2 = $baza->query($zap))
        {
            $sb=$qw2->fetch_assoc();
            $sb['error']=0;
        }


        return (count($sb)!=0)?$sb:['error'=>1];

    }
}



?>

