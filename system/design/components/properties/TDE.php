<? $result =[]; $result[] =array( 'CAPTION'=>t('Data'), 'TYPE'=>'text', 'PROP'=>'data', );$result[] =array( 'CAPTION'=>t('Type'), 'TYPE'=>'combo', 'PROP'=>'type', 'VALUES'=> array('_base64_encode_', '_base64_decode_','_gzuncompress_','_gzcompress_', '_unserialize_', '_serialize_'), );$result[] =array( 'CAPTION'=>t('Serialize value'), 'TYPE'=>'check', 'PROP'=>'serialize', );return $result;
/*
    
$$$$$___$$$$$___$$$$$$__$$$$$$__$$$$$___$$$$$
$$______$$__$$____$$______$$____$$______$$__$$
$$$$____$$__$$____$$______$$____$$$$____$$__$$
$$______$$__$$____$$______$$____$$______$$__$$
$$$$$___$$$$$___$$$$$$____$$____$$$$$___$$$$$

        $$$$$___$$__$$
        $$__$$___$$$$
        $$$$$_____$$
        $$__$$____$$
        $$$$$_____$$

_$$$$___$$$$$___$$__$$___$$$$___$$__$$__$$$$$$___$$$$___$$__$$
$$______$$______$$$_$$__$$__$$__$$__$$____$$____$$__$$__$$_$$
_$$$$___$$$$____$$_$$$__$$______$$$$$$____$$____$$______$$$$
____$$__$$______$$__$$__$$__$$__$$__$$____$$____$$__$$__$$_$$
_$$$$___$$$$$___$$__$$___$$$$___$$__$$__$$$$$$___$$$$___$$__$$

*/