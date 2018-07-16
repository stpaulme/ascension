<?php
//////////////////////////////////////////////
//  REMOVE 'PROTECTED' FROM PASSWORD POSTS
//////////////////////////////////////////////
function title_format($content) {
return '%s';
}
add_filter('private_title_format', 'title_format');
add_filter('protected_title_format', 'title_format');