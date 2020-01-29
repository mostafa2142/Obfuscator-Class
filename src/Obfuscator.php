<?php
/**
 * @author           Pierre-Henry Soria <hi@ph7.me>
 * @copyright        (c) 2014-2020, Pierre-Henry Soria. All Rights Reserved.
 * @license          CC-BY - http://creativecommons.org/licenses/by/3.0/
 * @link             https://ph7.me
 */

class Obfuscator
{
    /** @var string */
    private $sName;

    /** @var string */
    private $sData;

    /** @var string */
    private $sPreOutput;

    /** @var string */
    private $sOutput;

    /**
     * @param string $sData Code to obfuscate.
     * @param string $sName Give a name of the code you want to obfuscate (to know later on what were the things you obfuscated).
     */
    public function __construct($sData, $sName)
    {
        $this->sName = $sName;
        $this->sData = $sData;

        $this->encrypt();
    }

    public function __toString()
    {
        return $this->sOutput;
    }

    private function encrypt()
    {
        $this->sData = base64_encode($this->sData);
        $this->sPreOutput = <<<'DATA1'
        $____='printf';$___________='[NAME] Class...';
        [BREAK]
$___                                                                            =                 'X19sYW1iZGE='     ;
                                             $______=                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               'cmV0dXJuIGV2YWwoJF9fXyk7'      ;


$____                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      =                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   'base64_decode';                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           $___________='[DATA]';

                                                                                                           $______=$____($______);                                        $___=$____($___);                                  $_____=$___('$___',$______);
        [BREAK]
        $_____($____($___________));
DATA1;

        $this->sOutput = <<<'DATA2'
        $__='printf';$_='Loading [NAME]';
        [BREAK]
                                                                                                                                                                                                $_____='    b2JfZW5kX2NsZWFu';                                                                                                                                                                              $______________='cmV0dXJuIGV2YWwoJF8pOw==';
$__________________='X19sYW1iZGE=';

                                                                                                                                                                                                                                          $______=' Z3p1bmNvbXByZXNz';                    $___='  b2Jfc3RhcnQ=';                                                                                                    $____='b2JfZ2V0X2NvbnRlbnRz';                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                $__=                                                              'base64_decode'                           ;                                                                       $______=$__($______);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               $__________________=$__($__________________);                                                                                                                                                                                                                                                                                                                                                                         $______________=$__($______________);
        $__________=$__________________('$_',$______________);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 $_____=$__($_____);                                                                                                                                                                                                                                                    $____=$__($____);                                                                                                                    $___=$__($___);                      $_='[PRE_OUTPUT]';

        $___();$__________($______($__($_))); $________=$____();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             $_____();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       echo                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      [BREAK]                                                                                                                                                                                                                     $________;function __lambda($sArgs,$sCode){return eval("return function($sArgs){{$sCode}};");}

DATA2;

        $this->make();
    }

    private function make()
    {
        $sSpaces = $this->makeBreak(99 + (strlen($this->sName) * 4)); // Most people will have their PC bugged if they want to modify the code with an editor

        $this->sPreOutput = str_replace(array('[DATA]', '[NAME]', '[BREAK]'), array($this->sData, $this->sName, $sSpaces . "\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n"), $this->sPreOutput);
        $this->sOutput = str_replace(array('[PRE_OUTPUT]', '[NAME]', '[BREAK]'), array(base64_encode(gzcompress($this->sPreOutput, 9)), $this->sName, $sSpaces), $this->sOutput);
    }

    /**
     * @param int $iNum
     *
     * @return string
     */
    private function makeBreak($iNum)
    {
        $sToken = "\r\n";
        return str_repeat($sToken, $iNum);
    }
}
