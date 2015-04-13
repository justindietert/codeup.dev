<?php
require_once 'park_logins.php';

class Model {

    protected static $dbc;
    protected static $table;

    public $attributes = array();

    /*
     * Constructor
     */
    public function __construct()
    {
        self::dbConnect();
    }

    /*
     * Connect to the DB
     */
    private static function dbConnect()
    {
        // if the static property $dbc has not been set, then assign it
        if (!self::$dbc)
        {
            // Get new instance of PDO object
            self::$dbc = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            // Tell PDO to throw exceptions on error
            self::$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "You are connected to the database. \n";
        }
    }

    /*
     * Get a value from attributes based on name
     */
    public function __get($name)
    {
        // Return the value from attributes with a matching $name, if it exists
        if (array_key_exists($name, $this->attributes)) {
            return $this->attributes[$name];
        }

        return null;
    }

    /*
     * Set a new attribute for the object
     */
    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;       
    }

    /*
     * Persist the object to the database
     */
    public function save()
    {
        // Ensure there are attributes before attempting to save
        if (!empty($this->attributes)) {
        // if the `id` is set, this is an update, if not it is a insert
            if (isset($this->attributes['id'])) {
                $query = "UPDATE " . static::$table;
            } else {
                $query = "INSERT INTO " . static::$table;
            }
        
        // @TODO: Ensure that update is properly handled with the id key

        // @TODO: After insert, add the id back to the attributes array so the object can properly reflect the id

        // @TODO: You will need to iterate through all the attributes to build the prepared query
            foreach($this->attributes as $attribute) {

            }

        // @TODO: Use prepared statements to ensure data security

        }
    }

    /*
     * Find a record based on an id
     */
    public static function find($id)
    {
        // Get connection to the database
        self::dbConnect();

        // Create select statement using prepared statements
        $stmt = self::$dbc->prepare("SELECT * FROM " . static::$table . " WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Store the result set in a variable named $result
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // The following code will set the attributes on the calling object based on the result variable's contents
        $instance = null;
        if ($result)
        {
            $instance = new static;
            $instance->attributes = $result;
        }
        return $instance;
    }

    /*
     * Find all records in a table
     */
    public static function all()
    {
        self::dbConnect();

        // Learning from the previous method, return all the matching records
        return self::$dbc->query("SELECT * FROM " . static::$table)->fetchAll(PDO::FETCH_ASSOC);  
    }

}


$model = new Model();

