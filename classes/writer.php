<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Data format Class
 *
 * @package   dataformat_tsv
 * @copyright  2021 Mukudu Publishing
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later 
 */

namespace dataformat_tsv;

defined('MOODLE_INTERNAL') || die();

/**
 * tsv data format writer
 *
 * @package   dataformat_tsv
 * @copyright  2021 Mukudu Publishing
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later 
 */
class writer extends \core\dataformat\base {

    /** @var $mimetype */
    public $mimetype = "text/tab-separated-values";

    /** @var $extension */
    public $extension = ".tsv";

    /**
     * Write the start of the file.
     *
     */
    //public function start_output() {}
    
    /**
     * Write the end of the sheet containing the data.
     *
     * @param array $columns
     */
    // public function close_sheet($columns) {}
    
    /**
     * Write the end of the sheet containing the data.
     */
    // public function close_output() {}


    /**
     * Write the start of the sheet we will be adding data to.
     *
     * @param array $columns
     */
    public function start_sheet($columns) {
        echo $this->array2tsv($columns);
    }

    /**
     * Write a single record
     *
     * @param array $record
     * @param int $rownum
     */
    public function write_record($record, $rownum) {
        echo $this->array2tsv($record);
    }
        
    /**
     * Function to use fputcsv() function to convert an array to a tab separated
     *
     * @param array $data
     * @return string - tab separated line
     */
    private function array2tsv($data) {
        $data = (array) $data;
        $f = fopen('php://memory', 'r+');
        fputcsv($f, $data, "\t");
        rewind($f);
        return stream_get_contents($f);
    }
    

}
