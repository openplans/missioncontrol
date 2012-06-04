<?php

include 'class.php';

// Create Tables 
// dates are stored as text, as ISO8601 strings ("YYYY-MM-DD HH:MM:SS.SSS")
$db->exec('CREATE TABLE projects (
  project_id integer PRIMARY KEY,
  project text UNIQUE NOT NULL,
  starred text
  )');
$db->exec('CREATE TABLE team (
  person_id integer PRIMARY KEY,
  person text UNIQUE NOT NULL,
  updated text
  )');
$db->exec('CREATE TABLE links (
  link_id integer PRIMARY KEY,
  person_id text,
  project_id text
  )');

?>