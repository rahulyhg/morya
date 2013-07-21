<?php
class NodeType{
 const Photo = 0;
 const Vedic = 1;
 const Temple = 2;
 const Experience = 3;

    public static $heading = array(
         self::Photo => 'Photo',
         self::Vedic => 'Vedic',
         self::Temple => 'Temple',
         self::Experience => 'Experience',
     );
}
?>