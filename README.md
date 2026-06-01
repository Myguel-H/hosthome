# HOMEHOST

A ideia inicial deste projeto era desenvolver um site/aplicação que servisse como ponto de partida e suporte para pessoas interessadas em ingressar na área de tecnologia ou no universo do software livre/Linux.

## Documentação do Projeto

#### Clonar o projeto

Para começar, clone o repositório em sua máquina utilizando o comando:

```bash
git clone https://github.com/Myguel-H/hosthome.git
```

#### Iniciar o projeto

Com o projeto em sua máquina, é necessário possuir o PHP instalado. Após isso, para executar o projeto localmente (localhost), utilize o seguinte comando no terminal:

```bash
php -S localhost:2000
```

Você pode substituir `2000` pela porta de sua preferência.

> Obs.: Caso nenhuma porta seja especificada, o PHP poderá utilizar uma porta disponível automaticamente.

Após executar o comando, acesse no navegador a URL retornada pelo terminal. Exemplo:

```bash
http://localhost:2000
```

Ao acessar o projeto em localhost, você terá acesso à página principal, onde poderá aprender um pouco mais sobre software livre.

---

## Lógica do Projeto

Esta aplicação foi desenvolvida utilizando o padrão de arquitetura [MVC](https://www.devmedia.com.br/introducao-ao-padrao-mvc/29308) *(Model-View-Controller)*.

### Tecnologias utilizadas

- [HTML5](https://developer.mozilla.org/pt-BR/docs/Glossary/HTML5) — Estruturação das páginas.
- [CSS](https://developer.mozilla.org/pt-BR/docs/Web/CSS) — Estilização das páginas (Frontend).
- [PHP](https://www.php.net/docs.php) — Lógica e funcionamento da aplicação (Backend).

### Sobre a lógica

O projeto segue o padrão MVC, separando responsabilidades entre:

- **Model** → Responsável pela lógica de dados e comunicação.
- **View** → Responsável pela interface visual exibida ao usuário.
- **Controller** → Responsável por intermediar as requisições entre Model e View.

Essa separação torna o projeto mais organizado, escalável e de fácil manutenção.

hosthome_db=> \d users;
                                          Table "public.users"
    Column     |            Type             | Collation | Nullable |              Default              
---------------+-----------------------------+-----------+----------+-----------------------------------
 id            | integer                     |           | not null | nextval('users_id_seq'::regclass)
 name          | character varying(100)      |           |          | 
 age           | character varying(10)       |           |          | 
 sex           | character varying(20)       |           |          | 
 phone         | character varying(50)       |           |          | 
 email         | character varying(100)      |           | not null | 
 avatar        | character varying(255)      |           |          | 
 data_cadastro | timestamp without time zone |           |          | CURRENT_TIMESTAMP
 password      | character varying(255)      |           | not null | 
 type          | character varying(20)       |           |          | 'comum'::character varying
Indexes:
    "users_pkey" PRIMARY KEY, btree (id)
Referenced by:
    TABLE "publications" CONSTRAINT "publication_user_id_fkey" FOREIGN KEY (creator_id) REFERENCES users(id)



hosthome_db=> \d publications;
                                         Table "public.publications"
    Column     |            Type             | Collation | Nullable |                 Default                 
---------------+-----------------------------+-----------+----------+-----------------------------------------
 id            | integer                     |           | not null | nextval('publication_id_seq'::regclass)
 title         | character varying(100)      |           | not null | 
 resume        | text                        |           | not null | 
 about         | character varying(250)      |           | not null | 
 creator_id    | integer                     |           | not null | 
 category_id   | integer                     |           | not null | 
 creation_date | timestamp without time zone |           |          | CURRENT_TIMESTAMP
 content       | text                        |           |          | 
Indexes:
    "publication_pkey" PRIMARY KEY, btree (id)
Foreign-key constraints:
    "publication_category_id_fkey" FOREIGN KEY (category_id) REFERENCES categorys(id)
    "publication_user_id_fkey" FOREIGN KEY (creator_id) REFERENCES users(id)

hosthome_db=# 

                                        Table "public.categorys"
    Column     |            Type             | Collation | Nullable |               Default                
---------------+-----------------------------+-----------+----------+--------------------------------------
 id            | integer                     |           | not null | nextval('category_id_seq'::regclass)
 name          | character varying(50)       |           | not null | 
 creation_date | timestamp without time zone |           |          | CURRENT_TIMESTAMP
Indexes:
    "category_pkey" PRIMARY KEY, btree (id)
Referenced by:
    TABLE "publications" CONSTRAINT "publication_category_id_fkey" FOREIGN KEY (category_id) REFERENCES categorys(id)

~

hosthome_db=> \d creators;
                                      Table "public.creators"
    Column    |         Type          | Collation | Nullable |               Default               
--------------+-----------------------+-----------+----------+-------------------------------------
 id           | integer               |           | not null | nextval('creator_id_seq'::regclass)
 user_creator | character varying(50) |           | not null | 
Indexes:
    "creator_pkey" PRIMARY KEY, btree (id)

hosthome_db=> 


