<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<label>Máquinas</label>
<ul class="list-group">

	<?php

		if($dataMaquinas){

			foreach ($dataMaquinas as $key) {
				echo "<li class=\"list-group-item\"><input type=\"checkbox\" name=\"tombo_maquina[]\" value=\"{$key->tombo}\"> {$key->tombo}</li>";
			}
		}
	?>

</ul>