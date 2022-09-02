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
 * Helper functions and callbacks.
 *
 * @package    qbank_q2activity
 * @copyright   2022 Harrison Liddell, hliddell@myune.edu.au
 * @copyright   Mark Hay,              mhay23@myune.edu.au
 * @copyright   Henry Campbell,        hcampb25@myune.edu.au
 * @copyright   Luke Purnell,          lpurnell@myune.edu.au
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */



defined('MOODLE_INTERNAL') || die();


require_once(__DIR__ . '/../../../config.php');

/**
 * Question - add question fragment callback.
 *
 * @param array $args
 * @return string rendered output
 */
function qbank_q2activity_output_fragment_add_question(array $args): string {

    global $PAGE;


    $questionids = [$args['questionid']];
    $requestdata = $args['rawrequest'];

    parse_str($requestdata, $requestarray);

    if ($questionids[0] == -1){
        $questionids = [1,2,3];
    }
    $outputstring = '<h4>Modal triggered from: ';

    foreach ($questionids as $id) {
        $outputstring = $outputstring . "Question {$id}. ";
    }

    $displaydata['question'] = $outputstring . "</h4>";

    return $PAGE->get_renderer('qbank_q2activity')->render_q2activity_fragment($displaydata);

}

/**
 * Gets the question ID's from a given raw request.
 *
 * @param array $rawrequest raw request data
 * @return array question ids that have been retrieved
 */
function get_question_ids(array $rawrequest): array {
    $ids = [];

    foreach ($rawrequest as $key => $value) {
        if (preg_match('!^q([0-9]+)$!', $key, $matches)) {
            array_push($ids, $matches[1]);
        }
    }

    return $ids;
}
