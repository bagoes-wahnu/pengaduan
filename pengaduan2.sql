PGDMP     (                	    z         	   pengaduan    10.22    10.22                0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            �            1259    21651 	   pengaduan    TABLE     f  CREATE TABLE public.pengaduan (
    id integer NOT NULL,
    nama_pengadu character varying(255),
    alamat_pengadu character varying(255),
    nama_teradu character varying(255),
    alamat_teradu character varying(255),
    kelurahan character varying(255),
    kecamatan character varying(255),
    no_skrk character varying(255),
    no_imb character varying(255),
    status_pengaduan character varying(255),
    latitude character varying(255),
    longitude character varying(255),
    keterangan character varying(255),
    file_dokumen character varying(255),
    file_lapangan character varying(255)
);
    DROP TABLE public.pengaduan;
       public         postgres    false                      0    21651 	   pengaduan 
   TABLE DATA               �   COPY public.pengaduan (id, nama_pengadu, alamat_pengadu, nama_teradu, alamat_teradu, kelurahan, kecamatan, no_skrk, no_imb, status_pengaduan, latitude, longitude, keterangan, file_dokumen, file_lapangan) FROM stdin;
    public       postgres    false    198   �       �           2606    23573    pengaduan penertiban_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.pengaduan
    ADD CONSTRAINT penertiban_pkey PRIMARY KEY (id);
 C   ALTER TABLE ONLY public.pengaduan DROP CONSTRAINT penertiban_pkey;
       public         postgres    false    198               �   x���[�0 �g�+�yټl����0ۃ�K�PP����bjׇgv��8��kY�Q$M�h�S�f�c4Y������Tql�#C�B��j��k� �Ց��RT,E%RTӐÚ���&�G|�f|�zoe��M�u	��ᆉ���U�͌��=�����@hO)�q�Q���<�G�ߟ/���8��Шv#����o��Y���t��B � �t"     