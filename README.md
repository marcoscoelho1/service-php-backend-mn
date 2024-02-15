# SERVICE-PHP-BACKEND-MN

## Descrição

Este é um projeto de um crud de usuários. Ele foi desenvolvido com PHP, Docker e MySQL.

## Requisitos

- Docker

## Como Executar

1. Certifique-se de ter o Docker instalado em sua máquina.
2. Clone este repositório para sua máquina local.
3. Abra um terminal e navegue até o diretório do projeto.
4. Execute o seguinte comando para iniciar a aplicação:

```
docker-compose up

```

Isso iniciará a aplicação e fará com que ela esteja disponível em `http://localhost:8000/`.

## PRINCIPAIS ROTAS

| Rota          | Método | Descrição                  |
| ------------- | ------ | -------------------------- |
| /users        | GET    | Obtém todos os usuários    |
| /users        | POST   | Cria um novo usuário       |
| /users/{id}   | GET    | Obtém um usuário por ID    |
| /users/{id}   | PUT    | Atualiza um usuário por ID |
| /users/{id}   | DELETE | Deleta um usuário por ID   |
| /address      | GET    | Obtém todos os endereços   |
| /address/{id} | GET    | Obtém um endereço por ID   |
| /city         | GET    | Obtém todas as cidades     |
| /city/{id}    | GET    | Obtém uma cidade por ID    |
| /state        | GET    | Obtém todos os estados     |
| /state/{id}   | GET    | Obtém um estado por ID     |

## OBSERVAÇAO

Não consegui gerar o dump da base, então a criação do database e tabelas está na pasta sql.
