<?php
// Calculator Add Function - no error checking
function add($x, $y)
{
	if(!$x.is_int||!$y.is_int)
		return;
	else 
	return $x+$y;
}
