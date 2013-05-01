<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

    function get_hash($link)
    {
        $this->db->where('Link', $link);
        $query = $this->db->get('links');
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row['Hash'];
        }
        else
            return null;
    }

    function get_link($hash)
    {
        $this->db->where('Hash', $hash);
        $query = $this->db->get('links');
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row['Link'];
        }
        else
            return null;
    }

    function gen_hash() {
        return hash("crc32", uniqid(rand()));
    }
}
