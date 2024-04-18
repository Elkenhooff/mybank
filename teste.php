<?php

require("classeestado.php");
$estado = new Estado();
print_r($estado->listar());