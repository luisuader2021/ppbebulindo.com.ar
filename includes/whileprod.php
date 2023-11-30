<?php
     
            $descr = str_replace(array(' ','"'),array("%20",""), $producto[23]);

            $codbar=$producto[1];
            $bcodbar="";
            $j=1;
            $k=0;
            for($i=0;$i<13;$i++){
             if($codbar[$i]==="0" & $j){$k=$k+1;}else{$bcodbar.=$codbar[$i];$j=0;} }          
?>
             <div class='<? echo $producto[1]; ?> prod'>
                      <div class='d1'>
                        <a href='../img/<? echo $producto[1]; ?>.jpg' class='d2'></a>
                        <img src='../img/<? echo $producto[1]; ?>.jpg'/>
                        <div class='info li'><? echo $producto[23]; ?><br>                        
                          <div class='talle'><span>Talle: </span><? echo $producto[11]; ?></div>
                          <b><? echo $bcodbar; ?></b>
                          <div class='cod'>Art. <? echo $producto[22]; ?></div>
                          <a href='https://api.whatsapp.com/send?phone=5493436209824&text=http://bebulindo.com.ar/p/<? echo codArt($producto[21])." ".$palabra;?>:%20Art<? echo $producto[22]; ?>II<? echo $bcodbar; ?>%20*T<? echo $producto[14]; ?>*%20*<? echo $descr; ?>* '  class='buy'><? echo $palabra;?></a>
                          <div class='precio'>$ <? echo $producto[26] ?></div>
                        </div>
                     </div>
                  </div> 
                  <?php
             $vueltas++;                
          
          ?>
