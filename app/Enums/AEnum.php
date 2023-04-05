<?php

namespace App\Enums;



/**

 *

 * @tutorial Working Class

 * @author Bayron Tarazona ~bayronthz@gmail.com

 * @since 15/04/2018

 */

abstract class AEnum

{



    /**

     *

     * @var integer

     */

    protected $id = NULL;



    /**

     *

     * @var string

     */

    protected $description = NULL;



    /**

     *

     * @var string

     */

    protected $assistant = NULL;



    /**

     *

     * @var string

     */

    protected $auxiliar = NULL;

    /**

     *

     * @var string

     */

    protected $auxiliar2 = NULL;

    /**

     *

     * @var string

     */

    protected $auxiliar3 = NULL;



    /**

     *

     * @tutorial Method Description: constructor class

     * @author Bayron Tarazona ~bayronthz@gmail.com

     * @since {15/04/2018}

     * @param integer $id            

     * @param string $description            

     * @param string $assistant            

     * @param string $auxiliar            

     */

    public function __construct($id, $description, $assistant = NULL, $auxiliar = NULL, $auxiliar2 = NULL, $auxiliar3 = NULL)

    {

        $this->description = $description;

        $this->assistant = $assistant;

        $this->auxiliar = $auxiliar;

        $this->auxiliar2 = $auxiliar2;

        $this->auxiliar3 = $auxiliar3;

        $this->id = $id;

    }



    /**

     *

     * @author Bayron Tarazona ~bayronthz@gmail.com

     * @since {15/04/2018}

     * @return number

     */

    public function getId()

    {

        return $this->id;

    }



    /**

     *

     * @author Bayron Tarazona ~bayronthz@gmail.com

     * @since {15/04/2018}

     * @return string

     */

    public function getDescription()

    {

        return $this->description;

    }



    /**

     *

     * @author Bayron Tarazona ~bayronthz@gmail.com

     * @since {15/04/2018}

     * @return string

     */

    public function getAssistant()

    {

        return $this->assistant;

    }



    /**

     *

     * @author Bayron Tarazona ~bayronthz@gmail.com

     * @since {15/04/2018}

     * @return string

     */

    public function getAuxiliar()

    {

        return $this->auxiliar;

    }


    /**

     *

     * @author Bayron Tarazona ~bayronthz@gmail.com

     * @since {15/04/2018}

     * @return string

     */

    public function getAuxiliar2()

    {

        return $this->auxiliar2;

    }

    /**

     *

     * @author Bayron Tarazona ~bayronthz@gmail.com

     * @since {15/04/2018}

     * @return string

     */

    public function getAuxiliar3()

    {

        return $this->auxiliar3;

    }

    /**

     *

     * @author Bayron Tarazona ~bayronthz@gmail.com

     * @since {15/04/2018}

     * @param number $id            

     */

    public function setId($id)

    {

        $this->id = $id;

    }



    /**

     *

     * @author Bayron Tarazona ~bayronthz@gmail.com

     * @since {15/04/2018}

     * @param string $description            

     */

    public function setDescription($description)

    {

        $this->description = $description;

    }



    /**

     *

     * @author Bayron Tarazona ~bayronthz@gmail.com

     * @since {15/04/2018}

     * @param string $assistant            

     */

    public function setAssistant($assistant)

    {

        $this->assistant = $assistant;

    }



    /**

     *

     * @author Bayron Tarazona ~bayronthz@gmail.com

     * @since {15/04/2018}

     * @param string $auxiliar            

     */

    public function setAuxiliar($auxiliar)

    {

        $this->auxiliar = $auxiliar;

    }

    /**

     *

     * @author Bayron Tarazona ~bayronthz@gmail.com

     * @since {15/04/2018}

     * @param string $auxiliar            

     */

    public function setAuxiliar2($auxiliar)

    {

        $this->auxiliar2 = $auxiliar;

    }

    /**

     *

     * @author Bayron Tarazona ~bayronthz@gmail.com

     * @since {15/04/2018}

     * @param string $auxiliar            

     */

    public function setAuxiliar3($auxiliar)

    {

        $this->auxiliar3 = $auxiliar;

    }

}