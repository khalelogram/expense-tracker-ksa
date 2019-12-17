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
  // echo $query;
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


function show_all_today_and_yesterday($expense) {
  global $db;
  $query = "SELECT SUM(expense_cost) AS 'cost' ";
  $query .= "FROM userexpense ";
  $query .= "WHERE expense_date = '" . $expense . "'";
  $result = mysqli_query($db, $query);
  check_query_from_db($result);
  return $result;
}


function show_all_week_and_month_exp($past_date, $current_date) {
  global $db;
  $query = "SELECT SUM(expense_cost) AS 'cost' ";
  $query .= "FROM userexpense ";
  $query .= "WHERE expense_date BETWEEN'" . $past_date . "' AND '" . $current_date . "'";
  $result = mysqli_query($db, $query);
  check_query_from_db($result);
  return $result;
}

function show_this_year_expense($current_year) {
  global $db;
  $query = "SELECT SUM(expense_cost) AS 'cost' ";
  $query .= "FROM userexpense ";
  $query .= "WHERE YEAR(expense_date) = '" . $current_year . "'";
  $result = mysqli_query($db, $query);
  check_query_from_db($result);
  return $result;
}


