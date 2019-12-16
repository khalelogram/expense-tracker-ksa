<?php

function insert_expenses($expense_item) {
  global $db;
  $query = "INSERT INTO userexpense ";
  $query .= "(user_id, expense_date, expense_item, expense_cost, note_date) ";
  $query .= "VALUES (";
  $query .= "'2', ";
  $query .= "'" . __escape_string($expense_item['date']) . "', ";
  $query .= "'" . __escape_string($expense_item['item']) . "', ";
  $query .= "'" . __escape_string($expense_item['costitem']) . "', ";
  $query .= "now()";
  $query .= ")";
//   echo $query;
  $result = mysqli_query($db, $query);
  check_query_from_db($result);
}


function show_user_expense() {
  global $db;
  $query = "SELECT * FROM userexpense ";
  $query .= " WHERE user_id = 2 ";
  $query .= "ORDER BY expense_item ASC";

  $result = mysqli_query($db, $query);
  check_query_from_db($result);
  return $result;
}


function delete_user_expense($id) {
  global $db;
  $query = "DELETE FROM userexpense ";
  $query .= "WHERE id = '" . $id . "' ";
  $query .= "LIMIT 1";

  $result = mysqli_query($db, $query);
  check_query_from_db($result);
  header("Location: manage_expenses.php");
}