<?php 
use_helper("json");
echo utf8_decode(jsonRemoveUnicodeSequences($jsonArray->getRawValue()))
?>