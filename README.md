# SIMPLE JSON DB
A simple json db class, very useful to run some tests or to develop very basic apps for internal use. Also, it's very useful to configure.


## INSTALLING
In order to install the db, you have to download `simple-json-db.class.php` and put it wherever you want.

```php
    //Require the file in your script
    require("../your-path/simple-json-db.class.php");
```

## INSTANTIATE THE DB
In order to connect to a json db or to create one, you need to run the following code:

```php
    //Instantiate the class with default name (db.json)
    $database = new simple_json_db();
```

This will assign to the variable `$database` the database 'db', as you haven't provided a custom db.

```php
    //Instantiate the class with default name (db.json)
    $database2 = new simple_json_db("custom");
```

This one, though, will assign to the variable `$database2` the database 'costum', provided as a paramether when you instantiate the class.
Please note that if the custom database doesn't exists when you instantiate it, it will be created from scratch as an empty db.

## INSERT
In order to insert a new field inside the selected db, you need to run the following code:

```php
    //Add a new field to the db, passing the data (an array) and the key (in this case, the id, but you can choose a custom one)
    $data = array(
        "id" => 1,
        "name" => "John",
        "surname" => "Doe"
    );
     $database->insert($data, $data['id']);
```

## GET SINGLE
In case you need a single result based on the key, you need to run the following code:

```php
    $result = $database->getSingle("1");

    print_r($result);
```

This will return a Json object, like this:

```json
    {
        "1": {
            "id": "1",
            "name": "John",
            "surname": "Doe"
        }
    }
```

## GET LIST
You might also decide to select more than one result, based on a query. 
The query is an array of keys with the relative values, something like this:

```php
    $query = array(
        "name" => "John",
        "surname" => "Doe"
    );
```

With this query, I'm trying to select all the results whose name is 'John' and whose surname is 'Doe'.
Now we need to run that query and get our results:

```php
    //Show several results based on array query (in this case, all the fields with name: "John" and surname: "Doe")
    $result2 = $database3->getList($query);

    print_r($result2);
```

This will return a Json object, like this:

```json
    {
        "1": {
            "id": 1,
            "name": "John",
            "surname": "Doe",
            "age": 24,
            "city": "Amsterdam"
        },
        "27": {
            "id": 27,
            "name": "John",
            "surname": "Doe",
            "age": 47,
            "city": "Rome"
        }
    }
```
This is just a test whith a database I've populated with several random results!

### SORT
You can also sort your result by passing another param to the `getList` function, as it follows:

```php
    //Order the provided param
    $result2 = $database3->getList($query, array("on" => "name", "order" => "ASC"));
```

In the previous example, together with the function we have passed information about the way we want the result to be sorted:
* `on` is the key we want to consider
* `order` is the order, and it can be ASC or DESC

## DELETE
You can easily delete a result by running the function `delete`, as it follows:

```php
    //Remove the row from the db based on the key you pass
    $database3->delete("my-key");
```

## CLEAR
You can easily clear the selected database by running the function `clear`, as it follows:

```php
    //Clear the db
    $database3->clear();
```

### EXAMPLE
You can have a look at the example (index.php) for more information about how to use Simple JSON DB.


Please, enjoy this class, and don't hesitate to ask, if you have any questions.