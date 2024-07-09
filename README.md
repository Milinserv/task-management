# Task-management
Простое приложение для управления задачами с использованием Laravel

### Endpoints

- Create a task
    - Endpoint: /api/task
    - Method: POST
    - Body:
````
      {
        "title": "Task Title",
        "description": "Task Description",
        "status": "DONE",
        "endDate": "2020-01-01"
      }
````
---
- Get all tasks
    - Endpoint: /api/task
    - Method: GET
---
- Get a specific task by id
    - Endpoint: /api/task{id}
    - Method: GET
---
- Get a specific task by End Date
    - Endpoint: /api/task?endDate={date}
    - Method: GET
````
      {
        "endDate": "2020-01-01"
      }
````
---
- Get a specific task by status
    - Endpoint: /api/task?status={status}
    - Method: GET
````
      {
        "status": "DONE"
      }
````
---
- Update a task
    - Endpoint: /api/task/{id}
    - Method: PUT
    - Body:
````
      {
        "title": "New Task Title",
        "description": "New Task Description",
        "status": "DONE",
        "endDate": "2020-01-01"
      }
````
---
- Delete a task
    - Endpoint: /api/task/{id}
    - Method: DELETE
