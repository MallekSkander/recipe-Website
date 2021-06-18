
<?php
    
    require("fpdf/fpdf.php");
    $db=new PDO('mysql:host=localhost;dbname=projet_web', 'root', '');  
   
    class myPDF extends FPDF
    {
    	
    	function header()
    	{
    		$this->SetFont("Arial","B",14);
           // $this->Cell(10,10,"W&P",'C');
            $this->Ln(20);
            $this->Cell(5,5,"liste des livraisons:",'C');
            $this->ln();
    	}
    	function headertable()
    	{
    		$this->SetFont('Times','B',12);
    		$this->Cell(20,10,'Identifiant',1,0,'C');
    		$this->Cell(40,10,'Nom',1,0,'C');
    		$this->Cell(40,10,'Prenom',1,0,'C');
    		$this->Cell(30,10,'Telephone',1,0,'C');
    		$this->ln();
    	}
    	function viewsTable($db)
    	{ 
    		$this->SetFont('times','',12);
    		$stmt = $db->query("SElECT * From livraison");
            while($data = $stmt->fetch(PDO::FETCH_OBJ))
            {
    		    $this->Cell(20,10,$data->id,1,0,'C');
    		    $this->Cell(40,10,$data->nom,1,0,'L');
    		    $this->Cell(40,10,$data->prenom,1,0,'L');
    		    $this->Cell(30,10,$data->num_tel,1,0,'C');
    		    $this->ln();
            }

    	}
    }
    $pdf=new myPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4',0);
    $pdf->headertable();
    $pdf->viewsTable($db);
    $pdf->Output("F","liste_livraisons.pdf");
    header('Location: liste_livraisons.pdf');


?>   