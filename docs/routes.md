
# Routes

## description de l'api

| route              | method | description     | controlleur | nom                 |
| ------------------ | ------ | --------------- | ----------- | ------------------- |
| /get               | GET    | map             | Main        | api_geo             |


## description du site

| route              | method | description     | controlleur | nom                 |
| ------------------ | ------ | --------------- | ----------- | ------------------- |
| /                  | GET    | homepage        | Main        | home                |
| /commerces         | GET    | stores list     | Main        | store_index         |
| /{id}              | GET    | show one store  | Main        | store_read          |
| /mentions-legales  | GET    | legal   mention | Main        | legal_mention       |
| /team-jtmc         | GET    | show team J'TMC | Main        | team_jtmc           |