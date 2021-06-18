<?PHP
	class Carte{
		private $id = null;
		private $username = null;
		private $date_creation = null;
		private $nb_points = null;

		
	 function __construct( string $username,  string $date_creation, int $nb_points){
			
			$this->username=$username;
			$this->date_creation=$date_creation;
			$this->nb_points=$nb_points;

		}
		
        function getId(): int{
			return $this->id;
		}
		 function getusername(): string{
			return $this->username;
		}	
		 function getdate_creation(): string{
			return $this->date_creation;
		}
		 function getnb_points(): int{
			return $this->nb_points;
		}


	
		 function setusername( string $username): void{
			$this->username=$username;
		}
		 function setdate_creation(string $date_creation): void{
			$this->date_creation=$date_creation;
		}
		 function setnb_points(int $nb_points): void{
			$this->nb_points=$nb_points;
		}

		}
	
?>