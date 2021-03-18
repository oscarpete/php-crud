<?php


class Exporter
{
    public function exportCSV(array $array, string $fileName) : void
    {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=' . $fileName . '.csv');

        $output = fopen('php://output', 'w');
        fputcsv($output, array_keys(reset($array)));
        foreach($array as $row)
        {
            fputcsv($output, $row);
        }
        fclose($output);
        exit;
    }
}