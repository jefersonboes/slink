<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
Author: Jeferson Ricardo Böes
Email: jefersonboes@gmail.com
Date: 05/2013
*/

class LinkModel extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get_links()
    {
        $query = $this->db->get('links');
        return $query->result();
    }

    function insert_link()
    {
        $this->db->insert('links', $this);
    }

    function update_link()
    {
        $this->db->update('links', $this, array('idLink' => $this->idLink));
    }

    function get_link($hash)
    {
        $this->db->where('idLink', $this->get_id_by_hash($hash));
        $query = $this->db->get('links');
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row['Link'];
        }
        else
            return null;
    }

    function gen_link_hash($link) 
    {
        $hash = $this->get_hash($link);

        if (!$hash)
        {
            $this->Link = $link;
            $this->insert_link();

            $hash = $this->get_hash($link);
        }

        return $hash;
    }

    private function get_hash_by_id($id)
    {
        $b64 =  base64_encode($id);

        $replaces = array('a' => 'a1', '+' => 'a2',  '/' => 'a3', '=' => 'a4');

        $hash = strtr($b64, $replaces);

        return $hash;
    }

    private function get_id_by_hash($hash)
    {
        $replaces = array('a1' => 'a', 'a2' => '+',  'a3' => '/', 'a4' => '=');

        $hash64 = strtr($hash, $replaces);

        return base64_decode($hash64);
    }

    private function get_hash($link)
    {
        $this->db->where('Link', $link);
        $query = $this->db->get('links');
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $this->get_hash_by_id($row['idLink']);
        }
        else
            return null;
    }
}
