<?php
class comment
{
        private $user = null;
        private $date = null;
        private $thread = null;
        private $content = null;
        private $ID = null;

        public function __construct($user, $thread, $content)
        {
                $this->user = $user;
                $this->thread = $thread;
                $this->content = $content;
        }

        public function getUser()
        {
                return $this->user;
        }

        public function setUser($user)
        {
                $this->user = $user;
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

        public function getThread()
        {
                return $this->thread;
        }

        public function setThread($thread)
        {
                $this->thread = $thread;
                return $this;
        }

        public function getContent()
        {
                return $this->content;
        }

        public function setContent($content)
        {
                $this->content = $content;
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
