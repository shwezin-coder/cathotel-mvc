<?php 
namespace Core;
abstract class Model{

    protected $dbc;
    protected $tableName;
    protected $fields;
    protected $primaryKeys = ['id'];
    abstract protected function initFields();
    protected function __construct($dbc,$tableName)
    {
       $this->dbc = $dbc;
       $this->tableName = $tableName;
       $this->initFields();
    }

    public function findBy($fieldName,$fieldValue,$condition)
    {
        
        $sql = "SELECT * FROM ". $this->tableName . " WHERE ". $fieldName .' '.$condition." :value";
        $stmt = $this->dbc->prepare($sql);
        $stmt->execute(['value' => $fieldValue]);
        $pageData = $stmt->fetch();
        $databaseData = $this->setValues($pageData,$this);
        return $databaseData;
    }
    public function findAll()
    {
        $result = [];
        $sql = "SELECT * FROM ". $this->tableName;
        $stmt = $this->dbc->prepare($sql);
        $stmt->execute();
        $pageData = $stmt->fetchAll();
        if($pageData)
        {
            $className = static::class;
            foreach ($pageData as $objData) {
                $object = new $className($this->dbc);
                $object = $this->setValues($objData,$object);
                $result[] = $object;
            }
            return $result;

        }
       
    }
    public function setValues($values, $object = null)
    {
        if($object === null)
        {
            $object = $this;
        }

        foreach ($object->primaryKeys as $keyName) {

            if(isset($values[$keyName]))
            {
                $object->$keyName = $values[$keyName];
            }
          
        }

        foreach ($object->fields as $fieldName) {

            if(isset($values[$fieldName]))
            {
                $object->$fieldName = $values[$fieldName];
            }
          
        }
        return $object;
    }

    public function save()
    {
        $fieldBindings = [];
        $prepareFields = [];

        foreach ($this->fields as $fieldName) {
            $fieldBindings[$fieldName] = $fieldName;
            $keyBindings[$fieldName] = ":" .$fieldName;
            $prepareFields[$fieldName] = $this->$fieldName;     
        }

        $fieldBindingsString = join(',',$fieldBindings);
        $keyBindingsString = join(',',$keyBindings);

        $sql = "INSERT INTO " . $this->tableName ." ( ". $fieldBindingsString 
                . " ) VALUES ( ".$keyBindingsString . ")";
        $stmt = $this->dbc->prepare($sql);
        $stmt->execute($prepareFields);
        return true;
    }


    public function find($findings,$condition, $between = null)
    {
        $fieldBindings = [];
        $prepareFields = [];

        foreach ($findings as $key => $value) {
            $fieldBindings[$key] = $key .' '. $condition[$key] .'  :' . $key;
            $prepareFields[$key] = $value;
        }

        $fieldBindingsString = join(' AND ',$fieldBindings);

        $sql = "SELECT * FROM " . $this->tableName
                . " WHERE ".$fieldBindingsString;
        
        if($between != null)
        {
            $sql .= " AND ". $between['key'] ." BETWEEN :min AND :max";
            $prepareFields['min'] = $between['min'];
            $prepareFields['max'] = $between['max'];
        }
        
        $stmt = $this->dbc->prepare($sql);
        $stmt->execute($prepareFields);
        $pageData = $stmt->fetchAll();
        if($pageData)
        {
            $className = static::class;
            foreach ($pageData as $objData) {
                $object = new $className($this->dbc);
                $object = $this->setValues($objData,$object);
                $result[] = $object;
            }
            return $result;

        }
    }

    public function count($column,$findings,$condition, $between = null)
    {
        $fieldBindings = [];
        $prepareFields = [];

        foreach ($findings as $key => $value) {
            $fieldBindings[$key] = $key .' '. $condition[$key] .'  :' . $key;
            $prepareFields[$key] = $value;
        }

        $fieldBindingsString = join(' AND ',$fieldBindings);

        $sql = "SELECT COUNT($column) AS ". 'total'.$column ." FROM " . $this->tableName
                . " WHERE ".$fieldBindingsString;
        $stmt = $this->dbc->prepare($sql);
        $stmt->execute($prepareFields);
        $pageData = $stmt->fetchAll();
        if($pageData)
        {
            $className = static::class;
            foreach ($pageData as $objData) {
                $object = new $className($this->dbc);
                $object = $this->setValues($objData,$object);
                var_dump($object);
                $result[] = $object;
            }
            return $result;

        }
    }

    public function sum($column,$findings,$condition, $between = null)
    {
        $fieldBindings = [];
        $prepareFields = [];

        foreach ($findings as $key => $value) {
            $fieldBindings[$key] = $key .' '. $condition[$key] .'  :' . $key;
            $prepareFields[$key] = $value;
        }

        $fieldBindingsString = join(' AND ',$fieldBindings);

        $sql = "SELECT SUM($column) AS ". 'total'.$column ." FROM " . $this->tableName
                . " WHERE ".$fieldBindingsString;
        $stmt = $this->dbc->prepare($sql);
        $stmt->execute($prepareFields);
        $pageData = $stmt->fetchAll();
        return $pageData[0]['total'.$column];
    }


    public function update()
    {
        $fieldBindings = [];
        $keyBindings = [];
        $prepareFields = [];
        foreach ($this->primaryKeys as $keyName) {
            $keyBindings[$keyName] = $keyName . ' = :' . $keyName;
            $prepareFields[$keyName] = $this->$keyName;
        }

        foreach ($this->fields as $fieldName) {
            $fieldBindings[$fieldName] = $fieldName . ' = :' . $fieldName;
            $prepareFields[$fieldName] = $this->$fieldName;
            
        }

        $fieldBindingsString = join(',',$fieldBindings);

        $keyBindingsString = join(',',$keyBindings);

        $sql = "UPDATE " . $this->tableName ." SET ". $fieldBindingsString 
                . " WHERE ".$keyBindingsString;

        $stmt = $this->dbc->prepare($sql);
        $stmt->execute($prepareFields);
        return true;
    }

    public function delete()
    {
        $keyBindings = [];
        $prepareFields = [];
        foreach ($this->primaryKeys as $keyName) {
            $keyBindings[$keyName] = $keyName . ' = :' . $keyName;
            $prepareFields[$keyName] = $this->$keyName;
        }

        $keyBindingsString = join(',',$keyBindings);

        $sql = "DELETE FROM " . $this->tableName
                . " WHERE ".$keyBindingsString;

        $stmt = $this->dbc->prepare($sql);
        $stmt->execute($prepareFields);
        return true;
    }
}