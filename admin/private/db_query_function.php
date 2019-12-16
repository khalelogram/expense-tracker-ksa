<?php

function insert_expenses($expense_item) {
  global $db;
  $query = "INSERT INTO userexpense ";
  $query .= "(user_id, expense_date, expense_item, expense_cost, note_date) ";
  $query .= "VALUES (";
  $query .= "'1', ";
  $query .= "'" . __escape_string($expense_item['date']) . "', ";
  $query .= "'" . __escape_string($expense_item['item']) . "', ";
  $query .= "'" . __escape_string($expense_item['costitem']) . "', ";
  $query .= "now()";
  $query .= ")";
//   echo $query;
  $result = mysqli_query($db, $query);
  check_query_from_db($result);

