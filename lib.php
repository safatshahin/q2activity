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
 * @copyright  2021 Catalyst IT Australia Pty Ltd
 * @author     Safat Shahin <safatshahin@catalyst-au.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Gets the question ID's from a given raw request
 *
 * @param array $rawrequest raw request data
 * @return array question ids that have been retreived
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

/**
 * Retrieves a list of all activities from a course's context
 *
 * @param object $coursecontext The course context that will be used to generate a list of activities
 * @return array The activities that have been retrieved
 * 
 * Note: get_array_of_activities(stdclass $course, bool $usecache = false) might be able to replace this entirely. Test.
 */
function get_used_activities($coursecontext): array {
    $plugins = [];
    $moduleinfo = get_fast_modinfo($coursecontext);
    
    foreach($moduleinfo->get_used_module_names() as $pluginname => $readablename){

        array_push($plugins, $pluginname);
    }




}
