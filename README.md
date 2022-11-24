## BT-LaravelCRUD

A simple project demonstrating CRUD functionality with API access.

All CRUD functionality has been tested with Postman, with results as follows;

### GET api/todos/
```json
{
    "success": true,
    "status": 200,
    "message": "Todo List",
    "data": [
        {
            "id": 1,
            "name": "Todo Name 1",
            "description": "Todo Description",
            "due_date": null,
            "is_complete": 0
        },
        {
            "id": 2,
            "name": "Todo Name 2",
            "description": "Todo Description 2",
            "due_date": "2022-11-30",
            "is_complete": 1
        },
    ]
}
```

### GET api/todos/1
```json
{
    "success": true,
    "status": 200,
    "message": "Todo with ID 1 retrieved.",
    "data": {
        "id": 1,
        "name": "Todo Name 1",
        "description": "Todo Description",
        "due_date": null,
        "is_complete": 0
    }
}
```

### GET api/todos/99 (fail)
```json
{
    "success": false,
    "status": 404,
    "message": "Todo with ID 99 not found.",
    "data": ""
}
```

### POST api/todos
```json
{
    "success": true,
    "status": 201,
    "message": "Successfully added",
    "data": {
        "name": "Test Todo Added",
        "description": "Description Added",
        "due_date": "2023-11-26",
        "id": 3
    }
}
```

### POST api/todos (empty or null required field)
```json
{
    "message": "The name field is required.",
    "errors": {
        "name": [
            "The name field is required."
        ]
    }
}
```

### PATCH api/todos (POST with _method = PATCH)
```json
{
    "success": true,
    "status": 201,
    "message": "Todo with ID 1 successfully updated.",
    "data": {
        "id": 1,
        "name": "Updated Name",
        "description": "Todo Description",
        "due_date": null,
        "is_complete": "0"
    }
}
```

### DEL api/todos/2
```json
{
    "success": true,
    "status": 418,
    "message": "Todo with ID 2 deleted.",
    "data": {
        "id": 2,
        "name": "Todo Name 2",
        "description": "Todo Description 2",
        "due_date": "2022-11-30",
        "is_complete": 1
    }
}
