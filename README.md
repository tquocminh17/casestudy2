# Minh Tran - Zek

## Prerequisites
- Docker

## How to run
1. Clone the repository
2. Run the following command in the root directory of the repository
```bash
make up # Provision the containers
```
3. To see other available commands, run
```bash
make help
```
---
## Available Endpoints:

### 1. Issue token
Default credentials:
- email: `admin@test.com`
- password: `password`
 
```shell
curl --location --request POST 'http://localhost/api/auth/issue-access-token?email=admin%40test.com&password=password' \
--header 'Content-Type: application/json' \
--header 'Accept: application/json'
```

### 2. Revoke token
```shell
curl --location --request DELETE 'http://localhost/api/auth/revoke-access-token' \
--header 'Accept: application/json' \
--header 'Authorization: Bearer <YOUR-TOKEN>'
```

### 3. Schedule job

```shell
curl --location 'http://localhost/api/schedule-job' \
--header 'Content-Type: application/json' \
--header 'Accept: application/json' \
--header 'Authorization: Bearer <YOUR-TOKEN>'
--data '{
	"type": "reset_password",
    "template_id": "00000000-0000-0000-0000-000000000001",
    "template_vars": {
        "here": 1
    },
    "scheduled_at": "2025-04-01T09:00:00Z"
}'
```
