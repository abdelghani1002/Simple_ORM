# Simple_ORM

# **Simple Object-Relational Mapping (ORM) Class**

This is a basic PHP class designed to provide simple CRUD (Create, Read, Update, Delete) operations for database entities using PDO.

## **Installation**

Ensure you have a working PDO connection to your database. Pass the PDO object and the target table name to the constructor.

```php
phpCopy code
$pdo = new PDO("mysql:host=localhost;dbname=mydatabase", "username", "password");
$orm = new ObjectRelationalMapping($pdo, "mytable");
```

## **Usage**

### **1. Create**

Insert a new record into the database.

```php
phpCopy code
$data = [
    'column1' => 'value1',
    'column2' => 'value2',
    // Add more columns and values as needed
];

$result = $orm->create($data);
```

### **2. Read**

Retrieve a record from the database by its ID.

```php
phpCopy code
$id = 1; // ID of the record to retrieve
$record = $orm->read($id);
```

### **3. Update**

Update an existing record in the database.

```php
phpCopy code
$id = 1; // ID of the record to update
$data = [
    'column1' => 'new_value1',
    'column2' => 'new_value2',
    // Add more columns and values as needed
];

$result = $orm->update($id, $data);
```

### **4. Delete**

Delete a record from the database by its ID.

```php
phpCopy code
$id = 1; // ID of the record to delete
$result = $orm->delete($id);
```

## **Notes**

- This class assumes that the table has a primary key column named "id"

Feel free to customize and extend this class based on your specific project requirements.