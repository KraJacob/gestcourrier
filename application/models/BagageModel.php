<?php
/**
 * Created by PhpStorm.
 * User: STEINER
 * Date: 14/07/2018
 * Time: 09:41
 */

class BagageModel extends CI_Model
{

    public function listBagage()
    {
          $query =  $this->db->select('*')
                 ->from('bagage')
                 ->join('passager', 'bagage.passager_id = passager.id_passager')
                 ->join('gare', 'bagage.id_gare = gare.id_gare')
                 ->get();

        return $query->result();
    }

    public function save($data)
    {
        return $this->db->insert('bagage',$data);

    }

}