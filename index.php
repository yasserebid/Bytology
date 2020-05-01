<?php
include_once './DBConnection.php';
include_once './mathCalculation.php';
include_once './dealWithDB.php';

if (isset($argc)) {
    $math_calculation = new mathCalculation(getopt("w:h:"));
    $width = $math_calculation->getWidth();
    $height = $math_calculation->getHeight();
    $average = $math_calculation->getAverage();
    $area = $math_calculation->getArea();
    $area_square = $math_calculation->getAreaSquared();

    echo "Width : ".$width . "\n";
    echo "Height : ".$height . "\n";
    echo "Average : ".$average . "\n";
    echo "Area : ".$area . "\n";
    echo "Area Square : ".$area_square . "\n";

    $deal_with_db = new dealWithDB();
    $deal_with_db->insertRow($width, $height, $average, $area, $area_square);
    $deal_with_db->getRows();
    $deal_with_db->generateHtmlFile();

} else {
    echo "No parameters passed \n";
}
