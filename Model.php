<?php
require_once 'adlister_logins.php';

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
        var_dump($this);
        // Ensure there are attributes before attempting to save
        // if the `key` is set, this is an update, if not it is a insert
        if (!empty($this->attributes['id'])) {
            
            $this->update();

        } else {

            $this->insert();
        }

        // Ensure that update is properly handled with the id key

        // After insert, add the id back to the attributes array so the object can properly reflect the id

        // You will need to iterate through all the attributes to build the prepared query

        // Use prepared statements to ensure data security    
    }

    protected function update()
    {
        echo "update method called";
        $stmt = self::$dbc->prepare("UPDATE " . static::$table . 
                                       "SET first_name  = :first_name,
                                            last_name   = :last_name,
                                            email       = :email,
                                            birth_date  = cast(:birth_date as DATE)
                                            WHERE email = :email");
   
            $stmt->bindValue(':first_name', $this->first_name, PDO::PARAM_STR);
            $stmt->bindValue(':last_name', $this->last_name, PDO::PARAM_STR);
            $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindValue(':birth_date', $this->birth_date, PDO::PARAM_STR);
            $stmt->execute();
            echo 'Updated ID: ' . self::$dbc->lastInsertId() . PHP_EOL;
    }

    protected function insert()
    {
        $stmt = self::$dbc->prepare("INSERT INTO " . static::$table .
                                 " (  first_name,  last_name,  email,  birth_date ) 
                            VALUES ( :first_name, :last_name, :email, :birth_date )");

            $stmt->bindValue(':first_name', $this->first_name, PDO::PARAM_STR);
            $stmt->bindValue(':last_name', $this->last_name, PDO::PARAM_STR);
            $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindValue(':birth_date', $this->birth_date, PDO::PARAM_STR);
            $stmt->execute();
            // $this->attributes['id'] = self::$dbc->lastInsertId();
            echo 'Inserted ID: ' . self::$dbc->lastInsertId() . PHP_EOL;
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

