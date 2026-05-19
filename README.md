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