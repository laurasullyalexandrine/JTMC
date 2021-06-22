# Dictionnaire de données

## User (`user`)

| Champ    | Type         | Spécificités                                    | Description                    |
| -------- | ------------ | ----------------------------------------------- | ------------------------------ |
| id       | INT          | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT | L'identifiant de l'utilisateur |
| email    | VARCHAR(255) | NOT NULL                                        | email de l'utilisateur         |
| password | VARCHAR(255) | NOT NULL                                        | mot de passe de l'utilisateur  |

## Store (`store`)

| Champ          | Type         | Spécificités                                    | Description                            |
| -------------- | ------------ | ----------------------------------------------- | -------------------------------------- |
| id             | INT          | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT | L'identifiant du commerce              |
| store_activity | VARCHAR(255) | NOT NULL                                        | L'activité du commerce                 |
| name           | VARCHAR(255) | NOT NULL                                        | nom de l'enseigne                      |
| picture        | VARCHAR(255) | NULL                                            | L'URL de l'image du commerce           |
| siret          | INT          | NOT NULL                                        | Le siret du commerce                   |
| road_number    | INT          | NOT NULL                                        | Le numéro de la rue                    |
| address        | VARCHAR(255) | NOT NULL                                        | L'adresse du commerce                  |
| postal_code    | INT          | NOT NULL                                        | Le code postal                         |
| store_email    | STRING       | NOT NULL                                        | L'email du commerce                    |
| phone          | VARCHAR(255) | NOT NULL                                        | Le numéro du commerce                  |
| website        | VARCHAR(255) | NULL                                            | L'adresse du site internet du commerce |
| open_hours     | JSON         | NOT NULL                                        | Les horaires d'ouverture du commerce   |
| description    | VARCHAR(255) | NOT NULL                                        | La description du commerce             |
| longitude      | DECIMAL(10.8)| NOT NULL                                        | longitude du commerce                  |
| latitude       | DECIMAL(10.8)| NOT NULL                                        | latitude du commerce                   |
| user           | entity       | NOT NULL                                        | Le commerçant                          |


## Information_payment (`information_payment`)

| Champ         | Type         | Spécificités                                    | Description                                  |
| ------------- | ------------ | ----------------------------------------------- | -------------------------------------------- |
| id            | INT          | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT | L'identifiant de l'information de paiement   |
| payment_types | VARCHAR(255) | NULL                                            | Les différents modes de paiement du commerce |


## Commercial_service (`commercial_service`)

| Champ            | Type         | Spécificités                                    | Description                         |
| ---------------- | ------------ | ----------------------------------------------- | ----------------------------------- |
| id               | INT          | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT | L'identifiant du service commercial |
| service_types    | VARCHAR(255) | NULL                                            | Les différents services commerciaux |


## Open_days (`open_days`)

| Champ            | Type         | Spécificités                                    | Description                                   |
| ---------------- | ------------ | ----------------------------------------------- | --------------------------------------------- |
| id               | INT          | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT | L'identifiant du jour d'ouverture du commerce |
| days             | VARCHAR(255) | NOT NULL                                        | Jours d'ouverture du commerce                 |


## Role (`role`)

| Champ | Type         | Spécificités                                    | Description           |
| ----- | ------------ | ----------------------------------------------- | --------------------- |
| id    | INT          | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT | L'identifiant du role |
| name  | VARCHAR(255) | NOT NUL                                         | Le nom du role        |
| role  | VARCHAR(255) | NOT NUL                                         | Le type de role       |