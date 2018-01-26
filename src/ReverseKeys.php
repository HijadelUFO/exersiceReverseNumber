<?php
namespace Rioxygen\PayJoy;

/**
 * Class for test
 * @version 1.0
 * @author Ricardo Ruiz <rrrcfesc@gmail.com>
 */
class ReverseKeys
{
    /**
     *
     * @var array
     */
    private $marcacion;
    /**
     * Construct
     */
    public function __construct()
    {
        $this->marcacion = array(
            '0' => array(" "),
            '1' => array(" "),
            '2' => array("A", "B", "C"),
            '3' => array("D", "E", "F"),
            '4' => array("G", "H", "I"),
            '5' => array("J", "K", "L"),
            '6' => array("M", "N", "O"),
            '7' => array("P", "Q", "R", "S"),
            '8' => array("T", "U", "V"),
            '9' => array("W", "X", "Y", "z"),
        );
    }
    /**
     * Convierte una cadena de values enteros en string, como si fuera una
     * marcación de teclado de teléfono
     * @param string $stringValue
     * @return string
     */
    public function reverse_t9($stringValue) : string
    {
        $respuesta      = "";
        $encontrado     = false;
        $indice         = -1;
        $anterior       = "";
        $arr1           = str_split($stringValue);
        foreach ($arr1 as $val) {
            if ($val != " ") {
                switch ($anterior) {
                    case "":
                        if (array_key_exists($val, $this->marcacion)) {
                            $indice     += 1;
                            $anterior   = $val;
                        }
                        break;
                    default :
                        if ($anterior != $val) {
                            $respuesta .= $this->marcacion[$anterior][$indice];
                            $indice         = -1;
                            $respuesta     .= "";
                            $anterior       = "";
                        }
                        if (array_key_exists($val, $this->marcacion)) {
                            $indice     += 1;
                            $anterior   = $val;
                        }
                        break;
                }
            } else {
                if ($indice != -1)  {
                    $respuesta .= $this->marcacion[$anterior][$indice];
                }
                $indice         = -1;
                $respuesta     .= "";
                $anterior       = "";
            }
        }
        if ($indice != -1)  {
                $respuesta .= $this->marcacion[$anterior][$indice];
            }
        return strtolower($respuesta);
    }
}