<?php 

    $response = file_get_contents('https://provinces.open-api.vn/api/?depth=3');

    $api = json_decode($response);
    $arr_thanh_pho = array();
   
    for($i = 0; $i < count($api) ;$i++)
    {
        $arr_thanh_pho[] = (array)$api[$i];
       
    };

     $arr_huyen = array();
     $arr_phuong = $arr_thanh_pho ;
    for($i = 0; $i < count($arr_thanh_pho) ;$i++)
    {
       
      $arr_thanh_pho[$i]['districts']; 
      $d = $i ;  
      for($a = 0 ; $a < count($arr_thanh_pho[$d]['districts']); $a++)
      {
        $arr_phuong[$d]['districts'][$a] = (array)$arr_thanh_pho[$d]['districts'][$a];    
      }
        
    };
    
    
    $arr_place = $arr_phuong ;
    for($v = 0; $v < count($arr_phuong) ;$v++)
    {
       
      $arr_phuong[$v]['districts']; 
      $b = $v ;  
      for($k = 0 ; $k < count($arr_phuong[$b]['districts']); $k++)
      {
         
         $f = $k ;
         for($e = 0 ; $e < count($arr_phuong[$b]['districts'][$f]['wards']) ; $e++ )
         {
            $arr_place[$b]['districts'][$f]['wards'][$e] = (array)$arr_phuong[$b]['districts'][$f]['wards'][$e] ;
         }
      }
        
    };
    
    $city ;
    $huyen ;
    $phuong ;
    for($v = 0; $v < count($arr_place) ;$v++)
    {
      if($arr_place[$v]['code'] == 1)
      {
         $city = $arr_place[$v]['name'];
         $b = $v ;  
          for($k = 0 ; $k < count($arr_place[$b]['districts']); $k++)
           {
            if($arr_place[$b]['districts'][$k]['code'] == 275)
            {

               $huyen = $arr_place[$b]['districts'][$k]['name'] ;
               $f = $k ;
               for($e = 0 ; $e < count($arr_place[$b]['districts'][$f]['wards']) ; $e++ )
               {
                   if($arr_place[$b]['districts'][$f]['wards'][$e]['code'] == 9895 )
                   {
                       $phuong = $arr_place[$b]['districts'][$f]['wards'][$e]['name'];
                   }
               }
            }
         }
      }
        
    };
   
    
    
    

?>