<?php

function insert_expenses($expense_item) {
  global $db;
  $query = "INSERT INTO userexpense ";
  $query .= "(user_id, expense_date, expense_item, expense_cost, note_date) ";
  $query .= "VALUES (";
  $query .= "'4', ";
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

function show_daily_report($fdate,$tdate){
  global $db;
  $query = "SELECT expense_date,SUM(expense_cost) AS totaldaily FROM `userexpense`
            WHERE (expense_date BETWEEN '$fdate' AND '$tdate') 
            GROUP BY expense_date";// && (user_id='$userid')

  $result = mysqli_query($db, $query);
  check_query_from_db($result);
  return $result;
}

function show_monthly_report($fdate,$tdate){
  global $db;
  $query = "SELECT month(expense_date) AS rptmonth,year(expense_date) 
            AS rptyear,SUM(expense_cost) AS totalmonth FROM userexpense  
            WHERE (expense_date BETWEEN '$fdate' AND '$tdate') 
            GROUP BY month(expense_date),year(expense_date)";// && (user_id='$userid')
    
  $result = mysqli_query($db, $query);
  check_query_from_db($result);
  return $result;
}

function show_yearly_report($fdate,$tdate){
  global $db;
  $query = "SELECT year(expense_date) AS rptyear,SUM(expense_cost) 
            AS totalyear FROM userexpense  
            WHERE (expense_date BETWEEN '$fdate' AND '$tdate') 
            GROUP BY year(expense_date)";// && (user_id='$userid')

  $result = mysqli_query($db, $query);
  check_query_from_db($result);
  return $result;
}