--
-- PostgreSQL database dump
--

\restrict W4Fed6xa8KZhUGS3HaS0Oz9gqTQJ3MIMpuyqYtrcahnYqZhdMs8EOPfAEsd8Iou

-- Dumped from database version 15.18 (Debian 15.18-0+deb12u1)
-- Dumped by pg_dump version 15.18 (Debian 15.18-0+deb12u1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: categorys; Type: TABLE; Schema: public; Owner: nygts
--

CREATE TABLE public.categorys (
    id integer NOT NULL,
    name character varying(50) NOT NULL,
    creation_date timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.categorys OWNER TO nygts;

--
-- Name: category_id_seq; Type: SEQUENCE; Schema: public; Owner: nygts
--

CREATE SEQUENCE public.category_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.category_id_seq OWNER TO nygts;

--
-- Name: category_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: nygts
--

ALTER SEQUENCE public.category_id_seq OWNED BY public.categorys.id;


--
-- Name: creators; Type: TABLE; Schema: public; Owner: nygts
--

CREATE TABLE public.creators (
    id integer NOT NULL,
    user_creator character varying(50) NOT NULL
);


ALTER TABLE public.creators OWNER TO nygts;

--
-- Name: creator_id_seq; Type: SEQUENCE; Schema: public; Owner: nygts
--

CREATE SEQUENCE public.creator_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.creator_id_seq OWNER TO nygts;

--
-- Name: creator_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: nygts
--

ALTER SEQUENCE public.creator_id_seq OWNED BY public.creators.id;


--
-- Name: publications; Type: TABLE; Schema: public; Owner: nygts
--

CREATE TABLE public.publications (
    id integer NOT NULL,
    title character varying(255) NOT NULL,
    resume text NOT NULL,
    about text NOT NULL,
    creator_id integer NOT NULL,
    category_id integer NOT NULL,
    creation_date timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    content text
);


ALTER TABLE public.publications OWNER TO nygts;

--
-- Name: publication_id_seq; Type: SEQUENCE; Schema: public; Owner: nygts
--

CREATE SEQUENCE public.publication_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.publication_id_seq OWNER TO nygts;

--
-- Name: publication_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: nygts
--

ALTER SEQUENCE public.publication_id_seq OWNED BY public.publications.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: nygts
--

CREATE TABLE public.users (
    id integer NOT NULL,
    name character varying(100),
    age character varying(10),
    sex character varying(20),
    phone character varying(50),
    email character varying(100) NOT NULL,
    avatar character varying(255),
    data_cadastro timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    password character varying(255) NOT NULL,
    type character varying(20) DEFAULT 'comum'::character varying
);


ALTER TABLE public.users OWNER TO nygts;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: nygts
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO nygts;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: nygts
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: categorys id; Type: DEFAULT; Schema: public; Owner: nygts
--

ALTER TABLE ONLY public.categorys ALTER COLUMN id SET DEFAULT nextval('public.category_id_seq'::regclass);


--
-- Name: creators id; Type: DEFAULT; Schema: public; Owner: nygts
--

ALTER TABLE ONLY public.creators ALTER COLUMN id SET DEFAULT nextval('public.creator_id_seq'::regclass);


--
-- Name: publications id; Type: DEFAULT; Schema: public; Owner: nygts
--

ALTER TABLE ONLY public.publications ALTER COLUMN id SET DEFAULT nextval('public.publication_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: nygts
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: categorys; Type: TABLE DATA; Schema: public; Owner: nygts
--

COPY public.categorys (id, name, creation_date) FROM stdin;
1	Linux	2026-05-21 20:27:28.015156
2	Protocolos	2026-05-21 20:27:28.015156
3	Softwares Livres	2026-05-21 20:27:28.015156
\.


--
-- Data for Name: creators; Type: TABLE DATA; Schema: public; Owner: nygts
--

COPY public.creators (id, user_creator) FROM stdin;
4	myguel
\.


--
-- Data for Name: publications; Type: TABLE DATA; Schema: public; Owner: nygts
--

COPY public.publications (id, title, resume, about, creator_id, category_id, creation_date, content) FROM stdin;
21	Bacharelado em Sistemas de Informação: Formação para a Transformação Digital	O Bacharelado em Sistemas de Informação é um curso superior voltado para a formação de profissionais capazes de desenvolver, gerenciar e aplicar soluções tecnológicas nas organizações. A graduação combina conhecimentos de tecnologia, gestão e negócio	O curso de Bacharelado em Sistemas de Informação tem como objetivo capacitar profissionais para analisar, projetar, desenvolver e administrar sistemas computacionais que auxiliem empresas e instituições em seus processos. Durante a formação, os aluno	4	1	2026-06-03 00:52:04.91696	O Bacharelado em Sistemas de Informação é uma das principais graduações da área de tecnologia da informação. Seu foco está na utilização da tecnologia para resolver problemas organizacionais, melhorar processos e apoiar a tomada de decisões nas empresas. Diferentemente de outros cursos da área, Sistemas de Informação possui uma forte integração entre conhecimentos técnicos e de gestão, permitindo que o profissional compreenda tanto os aspectos tecnológicos quanto as necessidades do negócio.\r\n\r\nAo longo do curso, os estudantes desenvolvem habilidades em programação, modelagem de sistemas, administração de bancos de dados, redes de computadores, segurança da informação e desenvolvimento de software. Além disso, disciplinas relacionadas à administração, empreendedorismo e gestão de projetos contribuem para uma visão ampla sobre o papel da tecnologia nas organizações.\r\n\r\nO mercado de trabalho para o bacharel em Sistemas de Informação é amplo e está em constante crescimento. Os profissionais podem atuar como analistas de sistemas, desenvolvedores de software, administradores de banco de dados, gestores de tecnologia, consultores de TI, analistas de segurança da informação e em diversas outras funções. Com a crescente transformação digital das empresas, a demanda por especialistas qualificados continua aumentando.
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: nygts
--

COPY public.users (id, name, age, sex, phone, email, avatar, data_cadastro, password, type) FROM stdin;
9	myguel	\N	\N	\N	user@gmail.com	\N	2026-06-03 00:46:14.756902	$2y$12$usJ42Reh8h1cAYvNscntwO/wHzaGQ3CsFb.aiMZq1NcrFYmo3/Cta	comum
\.


--
-- Name: category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: nygts
--

SELECT pg_catalog.setval('public.category_id_seq', 3, true);


--
-- Name: creator_id_seq; Type: SEQUENCE SET; Schema: public; Owner: nygts
--

SELECT pg_catalog.setval('public.creator_id_seq', 4, true);


--
-- Name: publication_id_seq; Type: SEQUENCE SET; Schema: public; Owner: nygts
--

SELECT pg_catalog.setval('public.publication_id_seq', 21, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: nygts
--

SELECT pg_catalog.setval('public.users_id_seq', 9, true);


--
-- Name: categorys category_pkey; Type: CONSTRAINT; Schema: public; Owner: nygts
--

ALTER TABLE ONLY public.categorys
    ADD CONSTRAINT category_pkey PRIMARY KEY (id);


--
-- Name: creators creator_pkey; Type: CONSTRAINT; Schema: public; Owner: nygts
--

ALTER TABLE ONLY public.creators
    ADD CONSTRAINT creator_pkey PRIMARY KEY (id);


--
-- Name: publications publication_pkey; Type: CONSTRAINT; Schema: public; Owner: nygts
--

ALTER TABLE ONLY public.publications
    ADD CONSTRAINT publication_pkey PRIMARY KEY (id);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: nygts
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

\unrestrict W4Fed6xa8KZhUGS3HaS0Oz9gqTQJ3MIMpuyqYtrcahnYqZhdMs8EOPfAEsd8Iou

