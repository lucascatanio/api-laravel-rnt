# API Laravel - Gestão de Usuários

API REST desenvolvida em **Laravel**, responsável pela gestão de usuários, incluindo funcionalidades de cadastro, listagem, atualização e remoção, com validações robustas e tratamento de erros customizados.

> 🚀 Projeto em desenvolvimento — Release: `v0.1.0`

---

## 📑 Funcionalidades

-   ✅ Listar todos os usuários
-   ✅ Visualizar um usuário específico por ID
-   ✅ Cadastrar novo usuário com validações:
    -   Nome obrigatório
    -   E-mail obrigatório, válido e único
    -   Senha obrigatória (mínimo 6 caracteres)
-   ✅ Atualizar dados de um usuário (nome, email e senha)
    -   Com validação de unicidade de e-mail (não permite duplicados)
    -   Senha criptografada automaticamente
-   ✅ Excluir usuário
-   ✅ Validação de erros estruturada com retornos em JSON
-   ✅ Tratamento global de erros no `Handler.php` personalizado

---

## 🔗 Rotas da API

| Método | Rota                 | Descrição                |
| ------ | -------------------- | ------------------------ |
| GET    | `/api/usuarios`      | Listar todos os usuários |
| GET    | `/api/usuarios/{id}` | Buscar usuário por ID    |
| POST   | `/api/usuarios`      | Criar novo usuário       |
| PUT    | `/api/usuarios/{id}` | Atualizar usuário por ID |
| DELETE | `/api/usuarios/{id}` | Deletar usuário por ID   |

---

## 🔐 Validações

-   Campos obrigatórios em cadastro:
    -   `nome` (string)
    -   `email` (email, único)
    -   `senha` (mínimo 6 caracteres)
-   No update (`PUT`):
    -   Permite atualizar parcialmente (`nome`, `email` ou `senha`)
    -   Verifica se o email não está em uso por outro usuário

---

## ❌ Tratamento de erros

-   ✅ Erros de validação retornam `422 Unprocessable Entity` com detalhes dos campos inválidos.
-   ✅ Se usuário não encontrado: retorna `404 Not Found` com mensagem clara.
-   ✅ Se tentativa de acesso não autorizado (se aplicável): retorna `401 Unauthorized`.
-   ✅ Erros internos: `500 Internal Server Error` com detalhes no ambiente de desenvolvimento.

---

## 🏗️ Tecnologias Utilizadas

-   PHP `^8.1`
-   Laravel `^10`
-   Banco de Dados: PostgreSQL, MySQL ou SQLite (configurável)
-   Composer
-   Git e GitHub

---

## 🚀 Como rodar o projeto localmente

1️⃣ Clone o repositório:

```bash
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
```

2️⃣ Instale as dependências:

```bash
composer install
```

3️⃣ Configure o `.env`:

```bash
cp .env.example .env
```

> Configure o banco de dados e outras variáveis no `.env`

4️⃣ Gere a chave do projeto:

```bash
php artisan key:generate
```

5️⃣ Execute as migrations:

```bash
php artisan migrate
```

6️⃣ Rode o servidor local:

```bash
php artisan serve
```

A API estará disponível em:

```
http://127.0.0.1:8000
```

---

## 🐘 Banco de Dados

Por padrão, utiliza tabela:

```
usuarios
```

| Campo      | Tipo      | Observação        |
| ---------- | --------- | ----------------- |
| id         | bigint    | Primary Key       |
| nome       | string    | Obrigatório       |
| email      | string    | Obrigatório/Único |
| senha      | string    | Criptografada     |
| created_at | timestamp | Laravel padrão    |
| updated_at | timestamp | Laravel padrão    |

---

## 🔥 Próximos passos (Roadmap)

-   [ ] Implementar autenticação JWT
-   [ ] Documentação da API

---

## ✨ Desenvolvido por:

**Lucas Catanio** — [@lucascatanio](https://github.com/lucascatanio)
