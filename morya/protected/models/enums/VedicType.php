<?php
class VedicType{
 const Aarti = 0;
 const Mantra = 1;
 const Atharva = 2;
 const Pooja = 3;

    public static $heading = array(
         self::Aarti => 'Aarti',
         self::Mantra => 'Mantra Pushpanjali',
         self::Atharva => 'Atharva shirsha',
         self::Pooja => 'Uttar Pooja',
     );
}
?>