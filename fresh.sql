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
-- Name: fish_fresh_categories; Type: TABLE; Schema: public; Owner: adp
--

CREATE TABLE fish_fresh_categories (
    id integer NOT NULL,
    category character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE fish_fresh_categories OWNER TO adp;

--
-- Name: fish_fresh_categories_id_seq; Type: SEQUENCE; Schema: public; Owner: adp
--

CREATE SEQUENCE fish_fresh_categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE fish_fresh_categories_id_seq OWNER TO adp;

--
-- Name: fish_fresh_categories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: adp
--

ALTER SEQUENCE fish_fresh_categories_id_seq OWNED BY fish_fresh_categories.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: adp
--

ALTER TABLE ONLY fish_fresh_categories ALTER COLUMN id SET DEFAULT nextval('fish_fresh_categories_id_seq'::regclass);


--
-- Data for Name: fish_fresh_categories; Type: TABLE DATA; Schema: public; Owner: adp
--

COPY fish_fresh_categories (id, category, created_at, updated_at) FROM stdin;
1	bichirs_and_reedfish	\N	\N
2	catfish	\N	\N
3	characins_and_other_characiformes	\N	\N
4	cichlids	\N	\N
5	cyprinids	\N	\N
6	darters	\N	\N
7	gobies_and_sleepers	\N	\N
8	killifish	\N	\N
9	labyrinth_fish	\N	\N
10	live_bearers	\N	\N
11	loaches_and_related_cypriniformes	\N	\N
12	neotropical_electric_fish	\N	\N
13	nufferfish	\N	\N
14	rainbowfish	\N	\N
15	spiny_eels	\N	\N
16	sunfish_and_relatives	\N	\N
17	gar	\N	\N
18	other_fish	\N	\N
\.


--
-- Name: fish_fresh_categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: adp
--

SELECT pg_catalog.setval('fish_fresh_categories_id_seq', 18, true);


--
-- Name: fish_fresh_categories_pkey; Type: CONSTRAINT; Schema: public; Owner: adp
--

ALTER TABLE ONLY fish_fresh_categories
    ADD CONSTRAINT fish_fresh_categories_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

