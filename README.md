# HostHome 🏠

Uma plataforma web para compartilhar conhecimento sobre **GNU/Linux** e **Software Livre**. Permite que usuários criem, compartilhem e gerenciem conteúdo educativo em um ambiente colaborativo.

---

## 📋 Índice

- [Instalação](#instalação)
- [Configuração](#configuração)
- [Estrutura](#estrutura)
- [Banco de Dados](#banco-de-dados)
- [Segurança](#segurança)
- [Stack Tecnológico](#stack-tecnológico)

---

## 📦 Instalação

### 1. Clonar o Repositório

```bash
git clone https://github.com/Myguel-H/hosthome.git
cd hosthome
```

### 2. Iniciar o Servidor

```bash
php -S localhost:2000
```

### 3. Acessar

```
http://localhost:2000
```

---

## ⚙️ Configuração

### Banco de Dados PostgreSQL

#### Criar Banco de Dados

```bash
psql -U postgres
```

```sql
CREATE DATABASE hosthome_db;
CREATE USER nygts WITH PASSWORD 'admin';
GRANT ALL PRIVILEGES ON DATABASE hosthome_db TO nygts;
```

#### Importar Schema

```bash
psql -U nygts -d hosthome_db -f banco.sql
```

#### Configurar `config.php`

```php
<?php
$host = 'localhost';
$dbname = 'hosthome_db';
$user = 'nygts';
$password = 'admin';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo('Erro na conexão: '.$e->getMessage());
}
?>
```

---

## 📁 Estrutura

```
hosthome/
├── admin/                    # Painel administrativo
├── pages/                    # Páginas públicas
├── static/                   # Imagens e ícones
├── auth.php                  # Autenticação
├── config.php                # Configuração BD
├── index.php                 # Página inicial
├── create_post.php           # Criar publicação
├── create_category.php       # Criar categoria
├── delete_post.php           # Deletar publicação
├── delete_category.php       # Deletar categoria
├── logout.php                # Logout
└── style.css                 # Estilos
```

---

## 🗄️ Banco de Dados

### `users`
```sql
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    type VARCHAR(20) DEFAULT 'comum',
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### `publications`
```sql
CREATE TABLE publications (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    about TEXT NOT NULL,
    content TEXT NOT NULL,
    creator_id INTEGER NOT NULL,
    category_id INTEGER NOT NULL,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (creator_id) REFERENCES creators(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);
```

### `categories`
```sql
CREATE TABLE categories (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## 🛡️ Segurança

- ✅ Autenticação via sessões PHP
- ✅ Senhas criptografadas com `password_hash()`
- ✅ Proteção contra SQL Injection com prepared statements
- ✅ Validação de acesso por tipo de usuário
- ✅ Escape de HTML com `htmlspecialchars()`

---

## 🛠️ Stack Tecnológico

### Frontend
- **HTML5** - Estrutura
- **CSS3** - Estilos
  - **80% desenvolvido com assistência de IA** (Claude + DeepSeek)
  - Responsividade adaptativa
  - Animações e transições suaves
  - Grid layout moderno
  - Design mobile-first

### Backend
- **PHP 7.4+** - Lógica 100% desenvolvida manualmente
  - 📚 Documentação oficial PHP
  - 🔍 Stack Overflow
  - 💬 Reddit (r/PHP, r/learnprogramming)
  - 👥 Comunidade de programação
  - 📖 Boas práticas e padrões de design

### Database 
- **PostgreSQL 15+**

---

## 🔗 Rotas Principais

| Rota | Descrição |
|------|-----------|
| `/` | Página inicial |
| `/pages/login.php` | Login |
| `/pages/register.php` | Registro |
| `/pages/profile.php` | Perfil |
| `/pages/publications.php` | Publicações |
| `/pages/add_publication.php` | Criar publicação |
| `/admin/conf_users.php` | Gerenciar usuários (admin) |
| `/admin/conf_publications.php` | Gerenciar publicações (admin) |

---

## 👤 Autor

- GitHub: [@Myguel-H](https://github.com/Myguel-H)

---

## 📝 Licença

GNU General Public License v3.0
