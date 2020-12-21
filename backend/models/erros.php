<?php
function error_handler($codigo,$file,$mensagem,$linha){


echo json_encode(array(
"codigo"=>$codigo,
"arquivo"=>$file,
"mensagem"=>$mensagem,
"linha"=>$linha
));

set_error_handler(error_handler);
}