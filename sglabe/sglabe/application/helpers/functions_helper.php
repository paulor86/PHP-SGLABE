
<?php

function msgError($msg){
		return "<div class=\"alert alert-danger\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>$msg</div>";
}

function msgSucesso($msg){
		return "<div class=\"alert alert-success\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>$msg</div>";
}



function checkTurno($atual,$valor){
	if($atual==$valor){
		echo "selected=\"\"";
	}
}


?>