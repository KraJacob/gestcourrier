<?php

class VoyageModel extends CI_model
{
    function __construct()
    {
        parent::__construct();

    }

    public function add_type_colis($data)
    {

        /* $date = date("d/m/Y");
         $date = explode("/",$date);
         $date = time($date);
         $data_activite = array(

           'user_id' => $this->session->userdata("user_id"),
           'date_activite' => date("d/m/Y H:i"),
           'type_activite' => "ajout",
           'date_activite_stamp' => $date,
           'desc_activite' => "ajouté l'utilisateur " .  $data["username"]
         );

         $this->db->insert('activites', $data_activite);
        */
        return $this->db->insert('type_colis', $data);

    }

    public function nbre_passager_jour($imat, $date_jour)
    {
        $query = $this->db->query("SELECT immatriculation,date_create, count(id_passager) AS nbre FROM passager,depart WHERE `passager`.`id_depart`=`depart`.`id_depart` AND immatriculation='$imat' AND date_create = '$date_jour'");

        $result = $query->row();

        return $result->nbre;
    }

    public function nbre_place_veh($imat)
    {
        $query = $this->db->query("SELECT nbr_place FROM vehicule WHERE immatriculation='$imat'");

        $result = $query->row();

        return $result->nbr_place;
    }

    public function get_tarif($ville_depart, $ville_arrive)
    {
        $query = $this->db->query("SELECT tarif FROM destination WHERE ville_depart='$ville_depart' AND ville_arrive='$ville_arrive'");

        $result = $query->row();

        return $result->tarif;
    }

    public function get_destination()
    {
        $ville_depart = $this->session->userdata("ville");
        $query = $this->db->query("SELECT id_destination,ville_arrive FROM destination WHERE ville_arrive <> '$ville_depart'");

        return $query->result_array();
    }


    public function check_num_siege($num_depart, $num_siege, $date, $id_gare)
    {
        $query = $this->db->query("SELECT `depart`.`id_depart`,num_depart,`depart`.`date_ajout`, id_passager,num_siege,`passager`.`id_depart` FROM depart,
        passager WHERE `depart`.`id_gare`='$id_gare' AND `depart`.`id_depart` =`passager`.`id_depart`  AND `depart`.`date_ajout`='$date'
         AND num_depart ='$num_depart' AND num_siege='$num_siege'");

        $result = $query->row();

        if ($result) {
            return $result->num_siege;
        } else {
            return null;
        }

    }

    public function add_depart($data)
    {

        /* $date = date("d/m/Y");
         $date = explode("/",$date);
         $date = time($date);
         $data_activite = array(

           'user_id' => $this->session->userdata("user_id"),
           'date_activite' => date("d/m/Y H:i"),
           'type_activite' => "ajout",
           'date_activite_stamp' => $date,
           'desc_activite' => "ajouté l'utilisateur " .  $data["username"]
         );

         $this->db->insert('activites', $data_activite);
        */

        $id_gare = $this->session->userdata("id_gare");

        $date = date("d/m/Y");

        /**
         * Vérifier si le depart n'a pas encore été enregistré dans la base de données
         */

        $query = $this->db
            ->where('id_gare', $id_gare)
            ->where('date_depart', $date)
            ->get("depart");
        if ($query) {
            $result['result'] = "exist";
            return json_encode($result);
        } else {
            /**
             * Début de la transaction
             */
            $this->db->trans_begin();

            /**
             * Insertion du depart
             */
            $this->db->insert('depart', $data);

            /**
             * récupération de l'id du dernier depart
             */
            // $this->db->get_where('mytable', array('id' => $id), $limit, $offset);
            $query = $this->db
                ->where('id_gare', $id_gare)
                ->where('date_depart', $date)
                ->order_by('id_depart DESC')
                ->limit(1)
                ->get("depart");
            $row = $query->row();
            $id_depart = $row->id_depart;

            /**
             * Attribution du depart aux passagers du jour
             */

            $data = array('id_depart' => $id_depart);

            $this->db->where('date_depart', $date);
            $this->db->update('passager', $data);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $result['result'] = "failed";
                return json_encode($result);

            } else {
                $this->db->trans_commit();
                $result['result'] = "success";
                return json_encode($result);

            }

        }


    }

    public function get_last_id_depart()
    {
        $query = $this->db->query("SELECT id_depart from depart ORDER BY id_depart DESC LIMIT 1");
        $result = $query->row();
        return $result->id_depart;
    }

    public function add_passager($data)
    {

        /* $date = date("d/m/Y");
         $date = explode("/",$date);
         $date = time($date);
         $data_activite = array(

           'user_id' => $this->session->userdata("user_id"),
           'date_activite' => date("d/m/Y H:i"),
           'type_activite' => "ajout",
           'date_activite_stamp' => $date,
           'desc_activite' => "ajouté l'utilisateur " .  $data["username"]
         );

         $this->db->insert('activites', $data_activite);
        */
        return $this->db->insert('passager', $data);

    }

    public function add_affectation($data)
    {
        /* $date = date("d/m/Y");
          $date = explode("/",$date);
          $date = time($date);
          $data_activite = array(
            'user_id' => $this->session->userdata("user_id"),
            'date_activite' => date("d/m/Y H:i"),
            'type_activite' => "ajout",
            'date_activite_stamp' => $date,
            'desc_activite' => "ajouté l'utilisateur " . $data["username"]
          );
          $this->db->insert('activites', $data_activite);
         */
        return $this->db->insert('affecter', $data);
    }

    public function check_chauffeur_for_depart($num_depart, $date_depart)
    {
        $query = $this->db->query("SELECT * FROM depart INNER JOIN vehicule on depart.immatriculation = vehicule.immatriculation
          INNER JOIN affecter ON vehicule.immatriculation=affecter.immatriculation 
          INNER JOIN personnel on affecter.id_personnel=personnel.id_personnel 
          INNER JOIN type_personnel ON personnel.id_type_personnel = type_personnel.id_type_personnel 
          WHERE type_personnel.lib_personnel='CHAUFFEUR' AND depart.date_ajout='$date_depart' AND depart.num_depart='$num_depart' LIMIT 1");

        return $query->result_array();
    }

    public function check_convoyeur_for_depart($num_depart, $date_depart)
    {
        $query = $this->db->query("SELECT * FROM depart INNER JOIN vehicule on depart.immatriculation = vehicule.immatriculation
          INNER JOIN affecter ON vehicule.immatriculation=affecter.immatriculation 
          INNER JOIN personnel on affecter.id_personnel=personnel.id_personnel 
          INNER JOIN type_personnel ON personnel.id_type_personnel = type_personnel.id_type_personnel 
          WHERE type_personnel.lib_personnel='CONVOYEUR' AND depart.date_ajout='$date_depart' AND depart.num_depart='$num_depart' LIMIT 1");

        return $query->result_array();
    }

    public function get_num_depart_en_cours($id_gare, $date)
    {
        $query = $this->db->query("SELECT * FROM depart WHERE id_gare='$id_gare' AND depart.date_ajout='$date' ORDER BY id_depart DESC LIMIT 1 ");
        return $query->result_array();
    }

    public function get_ville_arrive_by_id($id)
    {
        $query = $this->db->query("SELECT ville_arrive from destination where id_destination =$id");
        $result = $query->row();
        return $result->ville_arrive;
    }

    public function check_depart_en_cours($date, $heure, $parcours)
    {
        $query = $this->db->query("SELECT * FROM depart WHERE depart.date_depart='$date' AND depart.heure_depart='$heure' AND depart.parcours='$parcours'");
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->id_depart;
        } else {
            return false;
        }
    }

    public function update_depart($id, $data)
    {
        return $this->db->where('id_depart', $id)
            ->Update('depart', $data);
    }

    public function valider_depart($num_depart, $id_gare, $date)
    {
        $data["etat"] = "fin chargement";
        return $this->db->where('num_depart', $num_depart)
            ->where('id_gare', $id_gare)
            ->where('date_depart', $date)
            ->Update('depart', $data);
    }

    public function check_num_siege_reservation($date_depart, $num_depart, $num_siege, $id_gare)
    {
        $data = array();
        $query = $this->db->get_where("reservation", array('date_depart' => $date_depart, 'num_depart' => $num_depart, 'num_siege' => $num_siege, 'id_gare' => $id_gare));
        $req = $this->db->query("SELECT * FROM `depart`, `passager` WHERE depart.date_depart='$date_depart' AND depart.num_depart = $num_depart
				AND passager.num_siege = $num_siege AND depart.id_depart = passager.id_depart");
        if ($query->num_rows() > 0) {
            $data = $query->result_array();
        } elseif ($req->num_rows() > 0) {
            $data = $req->result_array();
        }
        return $data;
    }

    public function reservation($data)
    {
        return $this->db->insert('reservation', $data);

    }

    public function getreservation()
    {
        $id_gare = $this->session->userdata("id_gare");
        $query = $this->db->query("SELECT * FROM reservation,destination WHERE reservation.id_destination = destination.id_destination AND reservation.id_gare =$id_gare AND reservation.etat='reservation en cours' AND reservation.statut_reservation = 'Actif' ORDER BY id_reservation DESC");
        return $query->result();
    }

    /*public function get_passager_jour()
    {
        $date = date("d/m/Y");
        $gare = $this->session->userdat("id_gare");
        $query = $this->db->query(" SELECT * FROM ")
    } */

    public function get_valeur_depart_jour($date)
    {
        $query = $this->db->query("SELECT SUM(tarif) as val from passager where passager.date_create = '$date' ");
        $result = $query->row();
        return $result->val;
    }

    public function get_valeur_depart_between($date1, $date2)
    {
        $query = $this->db->query("SELECT SUM(tarif) as val from passager where passager.date_create BETWEEN '$date1' AND '$date2' ");
        $result = $query->row();
        return $result->val;
    }

    public function get_depart_reservation($id_gare, $date)
    {
        $query = $this->db->get_where("depart", array('id_gare' => $id_gare, 'date_depart' => $date));
        return $query->result_array();
    }

    public function get_reservation_by_id($id)
    {
        $query = $this->db->get_where('reservation', array('id_reservation' => $id));
        return $query->result_array();
    }

    public function updata_reservation($id, $data)
    {
        return $this->db->where('id_reservation', $id)
            ->Update('reservation', $data);
    }

    public function delete($ids)
    {
        $this->db->set('statut_reservation', 'supprimé');
        $this->db->or_where_in('id_reservation', $ids);
        return $this->db->update('reservation');

    }

    public function get_nbr_reservation_du_jour()
    {
        $date = date('d/m/Y');
        $query = $this->db->query("SELECT count(*) as total from reservation where reservation.date_depart = '$date' ");
        $result = $query->row();
        return $result->total;
    }

    public function annulation_auto_reservation($date)
    {
        $this->db->set('statut_reservation', 'annulée');
        $this->db->where('date_depart <', $date);
        $this->db->where('statut_reservation ', 'Actif');
        return $this->db->update('reservation');

    }

    public function annulerTicket($id_passager,$data)
    {
        return $this->db->where('id_passager',$id_passager)
                        ->update('passager',$data);
    }

    /**
     * get passager tarif for annulation
     */

    public function getPassagerTransport($idpassager)
    {
        $query = $this->db->where('id_passager',$idpassager)
                          ->get('passager');
        $resultat = $query->row();

        return $resultat->tarif;
    }




}
