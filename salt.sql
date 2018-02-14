--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.10
-- Dumped by pg_dump version 9.5.10

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: fish_salt_categories; Type: TABLE; Schema: public; Owner: adp
--

CREATE TABLE fish_salt_categories (
    id integer NOT NULL,
    category character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE fish_salt_categories OWNER TO adp;

--
-- Name: fish_salt_categories_id_seq; Type: SEQUENCE; Schema: public; Owner: adp
--

CREATE SEQUENCE fish_salt_categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE fish_salt_categories_id_seq OWNER TO adp;

--
-- Name: fish_salt_categories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: adp
--

ALTER SEQUENCE fish_salt_categories_id_seq OWNED BY fish_salt_categories.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: adp
--

ALTER TABLE ONLY fish_salt_categories ALTER COLUMN id SET DEFAULT nextval('fish_salt_categories_id_seq'::regclass);


--
-- Data for Name: fish_salt_categories; Type: TABLE DATA; Schema: public; Owner: adp
--

COPY fish_salt_categories (id, category, created_at, updated_at) FROM stdin;
1	angelfish	\N	\N
2	anthias	\N	\N
3	bass_and_groupers	\N	\N
4	basslets_and_assessors	\N	\N
5	batfish	\N	\N
6	blennies_and_engineer_gobies	\N	\N
7	box_fish_and_blowfish	\N	\N
8	butterflyfish	\N	\N
9	cardinalfish	\N	\N
10	chromis	\N	\N
11	clownfish	\N	\N
12	damselfish	\N	\N
13	dartfish	\N	\N
14	dragonets	\N	\N
15	eels	\N	\N
16	filefish	\N	\N
17	fox_face	\N	\N
18	flatfish	\N	\N
19	frogfish	\N	\N
20	goatfish	\N	\N
21	gobies_and_clingfishes	\N	\N
22	grunts	\N	\N
23	hamlet	\N	\N
24	hawkfish	\N	\N
25	hogfish	\N	\N
26	idols	\N	\N
27	jacks	\N	\N
28	jawfish	\N	\N
29	lionfish	\N	\N
30	parrotfish	\N	\N
31	pipefish	\N	\N
32	pseudochromis	\N	\N
33	rabbitfish	\N	\N
34	rays	\N	\N
35	scorpionfish	\N	\N
36	seahorses	\N	\N
37	squirrelfish	\N	\N
38	sharks	\N	\N
39	snappers	\N	\N
40	tangs	\N	\N
41	tilefish	\N	\N
42	triggerfish	\N	\N
43	wrasse	\N	\N
\.


--
-- Name: fish_salt_categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: adp
--

SELECT pg_catalog.setval('fish_salt_categories_id_seq', 43, true);


--
-- Name: fish_salt_categories_pkey; Type: CONSTRAINT; Schema: public; Owner: adp
--

ALTER TABLE ONLY fish_salt_categories
    ADD CONSTRAINT fish_salt_categories_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

