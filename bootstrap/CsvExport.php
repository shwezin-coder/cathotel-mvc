<?php

namespace Core;
class CsvExport {
    private $filename;
    private $data;
    private $delimiter;
    private $fields;
    public function __construct($filename, $fields, $data, $delimiter = ',') {
        $this->filename = $filename;
        $this->data = $data;
        $this->delimiter = $delimiter;
        $this->fields = $fields;
    }
    
    public function export() {
  
        ob_end_clean();
        // Create a file pointer
        $fp = fopen('php://output', 'w');

        // Set the headers to force a download dialog box
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename='.$this->filename);

        fputcsv($fp, $this->fields, $this->delimiter); 
        // Loop through the data and write each row to the CSV file
        foreach ($this->data as $row) {
            fputcsv($fp, $row, $this->delimiter);
        }
        // Close the file pointer
        fclose($fp);
        
        exit;
    }
}
?>
