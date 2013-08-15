<?php
class NodeType{
 const Photo = 0;
 const Vedic = 1;
 const Temple = 2;
 const Experience = 3;
 const Recipe = 4;
 const Post = 5;

    public static $heading = array(
         self::Photo => 'Photo',
         self::Vedic => 'Vedic',
         self::Temple => 'Temple',
         self::Experience => 'Experience',
		 self::Recipe => 'Recipe',
		 self::Post => 'Post',
     );	
}
?>