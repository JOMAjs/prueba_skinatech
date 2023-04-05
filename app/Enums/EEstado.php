<?php

namespace App\Enums;



/**;

 *

 * @tutorial Working Class

 * @author Eminson Mendoza ~ emimaster16@gmail.com

 * @since 15/04/2018

 */

class EEstado extends AEnum

{



    /**

     *

     * @var array;

     */

    protected static $items = array();



    const ACTIVO = 'N_1';



    const INACTIVO = 'N_2';










    /**

     *

     * @tutorial Method Description: inicializa los valores

     * @author Eminson Mendoza ~ emimaster16@gmail.com

     * @since {15/04/2018}

     */

    public static function values()

    {

        static::$items[static::ACTIVO] = new EEstado(1, 'ACTIVO', 'CC');

        static::$items[static::INACTIVO] = new EEstado(2, 'INACTIVO', 'CE');

  

    }



    /**
;
     *

     * @tutorial Method Description: returns list of data for selects

     * @author Eminson Mendoza ~ emimaster16@gmail.com

     * @since {13/05/2018}

     * @return multitype:AEnum

     */

    public static function items()

    {

        if (blank(static::$items)) {

            static::values();

        }

        $items = [];

        foreach (static::$items as $item) {

            if($item->getId()>3) break;

            $items[$item->getId()] = $item->getDescription();

        }

        return $items;

    }



    /**

     *

     * @tutorial Method Description: retorna el valor filtrado

     * @author Eminson Mendoza ~ emimaster16@gmail.com

     * @since {15/04/2018}

     * @param string $search            

     * @return AEnum

     */

    public static function index($search)

    {

        if (blank(static::$items)) {

            static::values();

        }

        return static::$items[$search];

    }



    /**

     *

     * @tutorial Method Description: retorna enumerado filtrado

     * @author Eminson Mendoza ~ emimaster16@gmail.com

     * @since {15/04/2018}

     * @param string $search            

     * @return Ambigous <\app\Enums\EEstadoFactura, AEnum>

     */

    public static function result($search)

    {

        if (blank(static::$items)) {

            static::values();

        }

        $result = new EEstado(NULL, NULL);

        foreach (static::$items as $item) {

            if ($item->getId() == $search) {

                $result = $item;

                break;

            }

        }

        return $result;

    }



    /**

     *

     * @tutorial Method Description: retorna los valores del enumerado

     * @author Eminson Mendoza ~ emimaster16@gmail.com

     * @since {15/04/2018}

     * @return multitype:AEnum

     */

    public static function data()

    {

        if (blank(static::$items)) {

            static::values();

        }

        return static::$items;

    }

    


}