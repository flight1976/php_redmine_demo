<?php
require_once 'config.inc.php';
require_once 'func.inc.php';

$id_budget = 0;
$id_duedate = 1;
$id_am = 2;
$id_mm = 3;
$id_startdate = 4;
$id_name = 5;
$id_pm = 6;
$id_cloudtype = 7; # array
$id_revenue = 8;
$id_path = 9;

$json_data = redmine_api("$redmine_api_url/issues.json?status_id=*&project_id=test_001&sort=created_on:desc&limit=5000");

#print_r($json_data);

$tt = json_decode($json_data);

echo "<table border=1>".PHP_EOL;
echo "<tr>".PHP_EOL;
echo "<th>案件名稱</th>".PHP_EOL;
echo "<th>產品分類</th>".PHP_EOL;
echo "<th>首次客訪日</th>".PHP_EOL;
echo "<th>預計成案日</th>".PHP_EOL;
echo "<th>預算金額</th>".PHP_EOL;
echo "<th>AM</th>".PHP_EOL;
echo "<th>MM</th>".PHP_EOL;
echo "<th>PM</th>".PHP_EOL;
echo "<th>營收歸屬</th>".PHP_EOL;
echo "<th>通路</th>".PHP_EOL;
echo "</tr>".PHP_EOL;
echo "".PHP_EOL;
echo "".PHP_EOL;
echo "".PHP_EOL;
echo "".PHP_EOL;

foreach ($tt->issues as $issue) {
        $budget = $issue->custom_fields[$id_budget]->value;
        $duedate = $issue->custom_fields[$id_duedate]->value;
        $am = $issue->custom_fields[$id_am]->value;
        $mm = $issue->custom_fields[$id_mm]->value;
        $startdate = $issue->custom_fields[$id_startdate]->value;
        $name = $issue->custom_fields[$id_name]->value;
        $pm = $issue->custom_fields[$id_pm]->value;
        $revenue = $issue->custom_fields[$id_revenue]->value;
        $path = $issue->custom_fields[$id_path]->value;
        $cloudtype_array = $issue->custom_fields[$id_cloudtype]->value;
        $cloudtype = implode(',', $cloudtype_array);
	echo "<tr>".PHP_EOL;
	echo "<td>$name</td>".PHP_EOL;
	echo "<td>$cloudtype</td>".PHP_EOL;
	echo "<td>$startdate</td>".PHP_EOL;
	echo "<td>$duedate</td>".PHP_EOL;
	echo "<td>$budget</td>".PHP_EOL;
	echo "<td>$am</td>".PHP_EOL;
	echo "<td>$mm</td>".PHP_EOL;
	echo "<td>$pm</td>".PHP_EOL;
	echo "<td>$revenue</td>".PHP_EOL;
	echo "<td>$path</td>".PHP_EOL;
	echo "</tr>".PHP_EOL;

}

echo "".PHP_EOL;
echo "".PHP_EOL;
echo "</table>".PHP_EOL;
