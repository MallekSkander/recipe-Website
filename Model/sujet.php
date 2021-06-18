<?php
class Forum
{
        private $utilisateur = null;
        private $date = null;
        private $titre = null;
        private $contenu = null;
        private $ID = null;

        public function __construct($utilisateur, $titre, $contenu)
        {
                $this->utilisateur = $utilisateur;
                $this->titre = $titre;
                $this->contenu = $contenu;
        }

        public function getUtilisateur()
        {
                return $this->utilisateur;
        }

        public function setUtilisateur($utilisateur)
        {
                $this->utilisateur = $utilisateur;
                return $this;
        }

        public function getDate()
        {
                return $this->date;
        }

        public function setDate($date)
        {
                $this->date = $date;
                return $this;
        }

        public function getTitre()
        {
                return $this->titre;
        }

        public function setTitre($titre)
        {
                $this->titre = $titre;
                return $this;
        }

        public function getContenu()
        {
                return $this->contenu;
        }

        public function setContenu($contenu)
        {
                $this->contenu = $contenu;
                return $this;
        }

        public function getID()
        {
                return $this->ID;
        }

        public function setID($ID)
        {
                $this->ID = $ID;
                return $this;
        }
}
