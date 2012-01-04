<?php
/**
 * Include the the SimplyPie class.
 * Wrapper is developed by NexonSoft (nexonsoft.eu) in 2011
 */
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'simplepie'.DIRECTORY_SEPARATOR.'simplepie.php');
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'simplepie'.DIRECTORY_SEPARATOR.'idn'.DIRECTORY_SEPARATOR.'idna_convert.class.php');
/**
 * SimplyPie is a simple wrapper for the SimplePie library.
 */
class SimplyPie
{
   

   //***************************************************************************
   // Private properties
   //***************************************************************************

   /**
    * The internal SimplyPie object.
    *
    * @var object SimplyPie
    */
   public $_mySimplePie;

   //***************************************************************************
   // Initialization
   //***************************************************************************

 
   /**
    * Constructor. Here the instance of SimplyPie is created.
    */
	public function __construct()
	{
		$this->_mySimplePie = new SimplePie();
	}
	
	/**
    * Init method for the application component mode.
    */
   public function init() {
   }
	
	public function run(){
        }

   //***************************************************************************
   // Setters and getters
   //***************************************************************************

   
      
   //***************************************************************************
   // Magic
   //***************************************************************************

   /**
    * Call a SimplyPie function
    *
    * @param string $method the method to call
    * @param array $params the parameters
    * @return mixed
    */
	public function __call($method, $params)
	{
		if (is_object($this->_mySimplePie) && get_class($this->_mySimplePie)==='SimplePie') return call_user_func_array(array($this->_mySimplePie, $method), $params);
		else throw new CException(Yii::t('SimplyPie', 'Can not call a method of a non existent object'));
	}

	/**
	 * Cleanup work before serializing.
	 * This is a PHP defined magic method.
	 * @return array the names of instance-variables to serialize.
	 */
	public function __sleep()
	{
	}

	/**
	 * This method will be automatically called when unserialization happens.
	 * This is a PHP defined magic method.
	 */
	public function __wakeup()
	{
	}

}