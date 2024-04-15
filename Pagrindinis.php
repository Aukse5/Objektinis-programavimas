<?php
include 'Tevinisfailas.php';
include 'Vaikinisfailas.php';
class Skaiciuoti
{
    private $skaiciavimaiObj;
	private $histogramaObj;
	public function __construct()
    {
        $this->skaiciavimaiObj = new Skaiciavimai();
        $this->histogramaObj = new Histograma();
    }
    /*ublic function skaiciavimas1($v)
    {
        echo "Pasirinktas skaičius: $v<br>";
        $this->skaiciavimaiObj->Skaiciavimas1($v);
    }*/
    public function skaiciavimas2($x, $y)
    {
        echo "Intervalas nuo $x iki $y<br>";
        $this->skaiciavimaiObj->pradzia = $x;
        $this->skaiciavimaiObj->pabaiga = $y;
        $this->skaiciavimaiObj->Maxi($this->Maxi, $this->MaxSkaicius);
    }
    public function skaiciavimas3($x, $y)
    {
        $this->skaiciavimaiObj->pradzia = $x;
        $this->skaiciavimaiObj->pabaiga = $y;
        $this->skaiciavimaiObj->Iteracijos($this->MinIteracijos, $this->MaxIteracijos);
    }
	public function aritmetineprogresija($pirmas, $skirtumas, $nariai)
	{
		$this->skaiciavimaiObj->pirmas = $pirmas;
        $this->skaiciavimaiObj->skirtumas = $skirtumas;
		$this->skaiciavimaiObj->nariai = $nariai;
		$this->skaiciavimaiObj->Progresija($pirmas, $skirtumas, $nariai);
	}
	 public function gautiHistograma($pradzia, $pabaiga)
    {
        $histograma = $this->histogramaObj->Histograma($pradzia, $pabaiga);
        return $histograma;
    }

    public function spausdintiHistograma($histograma)
    {
        $this->histogramaObj->Rezultatai($histograma);
    }
}

$skaiciuotiObj = new Skaiciuoti();
/*if (isset($_GET["v"])) 
{
    $v = $_GET["v"];
    $skaiciuotiObj->skaiciavimas1($v);
}*/
if (isset($_GET["x"]) && isset($_GET["y"])) 
{
    $x = $_GET["x"];
    $y = $_GET["y"];
    $skaiciuotiObj->skaiciavimas2($x, $y);
    $skaiciuotiObj->skaiciavimas3($x, $y);
	$histograma = $skaiciuotiObj->gautiHistograma($x, $y);
    $skaiciuotiObj->spausdintiHistograma($histograma);
}
if (isset($_GET["pirmas"]) && isset($_GET["skirtumas"]) && isset($_GET["nariai"])) 
{
    $pirmas = $_GET["pirmas"];
    $skirtumas = $_GET["skirtumas"];
	$nariai = $_GET["nariai"];
	$skaiciuotiObj->aritmetineprogresija($pirmas, $skirtumas, $nariai);
}
?>
