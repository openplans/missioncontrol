<?php

include 'class.php';

// Create Tables 
// dates are stored as text, as ISO8601 strings ("YYYY-MM-DD HH:MM:SS.SSS")
$db->exec('CREATE TABLE projects (
  project_id integer PRIMARY KEY,
  project text NOT NULL,
  starred integer
  )');
$db->exec('CREATE TABLE team (
  person_id integer PRIMARY KEY,
  person text NOT NULL,
  updated text
  )');
$db->exec('CREATE TABLE links (
  person_id integer,
  project_id integer
  )');

// $db->exec("INSERT INTO team (person) VALUES ('Andy')");
// $db->exec("INSERT INTO projects (project) VALUES ('Shareabouts')");

?>