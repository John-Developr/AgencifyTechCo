<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Personal extends MY_Controller
{
    public function index()
    {
        redirect(base_url('personal/documents'));
    }
    public function documents()
    {
        $data['title'] = 'Personal Documents';
        $this->_admin_loadpage_('personal_documents', $data);
    }
}
