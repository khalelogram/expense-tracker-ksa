<?php 
function insert_expenses($expense_item) {
  global $db;
  $query = "INSERT INTO userexpense ";
  $query .= "(user_id, expense_date, expense_item, expense_cost, note_date) ";
  $query .= "VALUES (";
  $query .= "'" . $_SESSION['user_id'] . "', ";
  $query .= "'" . __escape_string($expense_item['date']) . "', ";
  $query .= "'" . __escape_string($expense_item['item']) . "', ";
  $query .= "'" . __escape_string($expense_item['costitem']) . "', ";
  $query .= "now()";
  $query .= ")";
  $result = mysqli_query($db, $query);
  check_query_from_db($result);
}
function show_user_expense() {
  global $db;
  $query = "SELECT * FROM userexpense ";
  $query .= "WHERE user_id = '" . $_SESSION['user_id'] . "'";
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
function show_all_today_and_yesterday($date) {
  global $db;
  $query = "SELECT SUM(expense_cost) AS 'cost' ";
  $query .= "FROM userexpense ";
  $query .= "WHERE expense_date = '" . $date . "' AND user_id = '" . $_SESSION['user_id'] . "'";
  $result = mysqli_query($db, $query);
  check_query_from_db($result);
  return $result;
}
function show_all_week_and_month_exp($past_date, $current_date) {
  global $db;
  $query = "SELECT SUM(expense_cost) AS 'cost' ";
  $query .= "FROM userexpense ";
  $query .= "WHERE expense_date BETWEEN'" . $past_date . "' AND '" . $current_date . "'  AND user_id = '" . $_SESSION['user_id'] . "'";
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
function find_username($username) {
  global $db;
  $query = "SELECT * FROM users ";
  $query .= "WHERE username='" . __escape_string($username) . "' ";
  $query .= "LIMIT 1";
  $result = mysqli_query($db, $query);
  check_query_from_db($result);
  $user = mysqli_fetch_assoc($result); // find first
  mysqli_free_result($result);
  return $user; // returns an assoc. array
}





// start of expenses report functions
function show_daily_report($fdate,$tdate){
  global $db;
  $query = "SELECT expense_date,SUM(expense_cost) AS totaldaily FROM userexpense ";
  $query .= "WHERE (expense_date BETWEEN '$fdate' AND '$tdate') ";
  $query .= "GROUP BY expense_date";

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
// end of expenses report functions