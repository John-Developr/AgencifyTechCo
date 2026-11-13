<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cronjob extends MY_Controller
{
    // public function index()
    // {
    //     $query['schedule']['select'] =
    //         PREFIX . 'request_schedule.id,' .
    //         PREFIX . 'request_schedule.status,' .
    //         PREFIX . 'calendar.start_date,' .
    //         PREFIX . 'calendar.id AS Calendar_ID,' .
    //         PREFIX . 'request_schedule.fk_calendar_id AS FK_Calendar_ID';
    //     $query['schedule']['where'] = 'status != 3 AND status != 4';
    //     $query['schedule']['join'] = array(PREFIX . 'calendar' => PREFIX . 'calendar.id = ' . PREFIX . 'request_schedule.fk_calendar_id');
    //     $run_query['schedule'] = $this->MY_Model->getRows(PREFIX . 'request_schedule', $query['schedule']);

    //     $param['date'] = date('Y-m-d');

    //     foreach ($run_query['schedule'] as $key => $value) {
    //         switch ($value['status']) {
    //             case 0:
    //                 if ($value['start_date'] <= $param['date']) {
    //                     $this->update($value['id'], 3);
    //                 }
    //                 break;
    //             case 2:
    //                 if ($value['start_date'] == $param['date']) {
    //                     $this->update($value['id'], 1);
    //                 }
    //                 break;
    //             default:
    //                 if ($value['start_date'] > $param['date']) {
    //                     $this->update($value['id'], 4);
    //                 }
    //         }
    //     }
    // }
    // public function update($__ID, $set_status)
    // {
    //     $query['update']['set'] = array('status' => $set_status);
    //     $query['update']['where'] = array('id' => $__ID);
    //     $this->MY_Model->update(PREFIX . 'request_schedule', $query['update']['set'], $query['update']['where']);
    // }
}
