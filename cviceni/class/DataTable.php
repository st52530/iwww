<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 12/11/2018
 * Time: 08:33
 */

class DataTable
{
    private $dataSet;
    private $columns;
    private $actions;

    public function __construct($dataSet)
    {
        $this->dataSet = $dataSet;
        $this->columns = array();
        $this->actions = array();
    }

    public function addColumn($databaseColumnName, $tableHeadTitle)
    {
        //$this->columns[$databaseColumnName] = array("table-head-title" => $tableHeadTitle);
        $this->columns[$databaseColumnName] = $tableHeadTitle;
    }

    public function addActionColumn($databaseColumnName, $actionName, $url)
    {
        $this->actions[$actionName] = array("url" => $url, "databaseName" => $databaseColumnName);
    }

    public function render()
    {
        echo '<table>';

        echo '<tr>';
        foreach ($this->columns as $column) {
            echo '<th>' . $column . '</th>';
        }
        foreach ($this->actions as $key => $value) {
            echo '<th>' . $key . '</th>';
        }
        echo '</tr>';

        foreach ($this->dataSet as $row) {
            echo '<tr>';
            foreach ($this->columns as $key => $value) {
                echo '<td>' . $row[$key] . '</td>';
            }
            foreach ($this->actions as $key => $value) {
                echo '<td><a href="' . sprintf($value['url'], $row[$value['databaseName']]) . '">' . $key . '</a></td>';
            }
            echo '</tr>';
        }

        echo '</table>';
        echo 'Total rows: ' . sizeof($this->dataSet);
    }
}