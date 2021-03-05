<?php
function load_view($view, $data = array())
{
    $CI = &get_instance();
    $CI->load->view('header', $data);
    $CI->load->view($view, $data);
    $CI->load->view('footer', $data);
}
function load_view_user($view, $data = array())
{
    $CI = &get_instance();
    $CI->load->view('header_user', $data);
    $CI->load->view($view, $data);
    $CI->load->view('footer_user', $data);
}

function load_view_cetak($view, $data = array())
{
    $CI = &get_instance();
    $CI->load->view('header_cetak', $data);
    $CI->load->view($view, $data);
    $CI->load->view('footer_cetak', $data);
}

function load_message($message = '', $type = 'danger')
{
    if ($type == 'danger') {
        $data['title'] = 'Error';
    } else {
        $data['title'] = 'Success';
    }

    $data['class'] = $type;
    $data['message'] = $message;

    load_view('message', $data);
}

function get_parent_array()
{
    $CI = &get_instance();

    $data = array('' => 'No Parent');
    $rows = $CI->kriteria_model->get_parent();
    $data2 = walk_kriteria($rows);

    return array_merge($data, $data2);
}

function get_crips_option($kode_kriteria, $selected = '')
{
    $CI = &get_instance();
    $rows = $CI->crips_model->get_crips_by_kriteria($kode_kriteria);

    $a = '';
    foreach ($rows as $row) {
        if ($selected == $row->kode_crips)
            $a .= "<option value='$row->kode_crips' selected>$row->nama_crips</option>";
        else
            $a .= "<option value='$row->kode_crips'>$row->nama_crips</option>";
    }
    return $a;
}



function get_kriteria_option($selected = '')
{
    $CI = &get_instance();
    $rows = $CI->kriteria_model->tampil();

    $a = '';
    foreach ($rows as $row) {
        if ($selected == $row->kode_kriteria)
            $a .= "<option value='$row->kode_kriteria' selected>$row->nama_kriteria</option>";
        else
            $a .= "<option value='$row->kode_kriteria'>$row->nama_kriteria</option>";
    }
    return $a;
}

function get_atribut_option($selected = '')
{
    $atribut = array('Benefit' => 'Benefit', 'Cost' => 'Cost');
    $a = '';
    foreach ($atribut as $key => $value) {
        if ($selected == $key)
            $a .= "<option value='$key' selected>$value</option>";
        else
            $a .= "<option value='$key'>$value</option>";
    }
    return $a;
}

function print_error()
{
    return validation_errors('<div class="alert alert-danger" alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
}
