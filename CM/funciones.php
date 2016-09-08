<?php

$matrizA[1][1] = $_POST["a11"];
$matrizA[1][2] = $_POST["a12"];
$matrizA[1][3] = $_POST["a13"];
$matrizA[2][1] = $_POST["a21"];
$matrizA[2][2] = $_POST["a22"];
$matrizA[2][3] = $_POST["a23"];
$matrizA[3][1] = $_POST["a31"];
$matrizA[3][2] = $_POST["a32"];
$matrizA[3][3] = $_POST["a33"];


$matrizB[1][1] = $_POST["b11"];
$matrizB[1][2] = $_POST["b12"];
$matrizB[1][3] = $_POST["b13"];
$matrizB[2][1] = $_POST["b21"];
$matrizB[2][2] = $_POST["b22"];
$matrizB[2][3] = $_POST["b23"];
$matrizB[3][1] = $_POST["b31"];
$matrizB[3][2] = $_POST["b32"];
$matrizB[3][3] = $_POST["b33"];


$matrizC[1][1] = 0;
$matrizC[1][2] = 0;
$matrizC[1][3] = 0;
$matrizC[2][1] = 0;
$matrizC[2][2] = 0;
$matrizC[2][3] = 0;
$matrizC[3][1] = 0;
$matrizC[3][2] = 0;
$matrizC[3][3] = 0;

$opcion = $_POST["opcion"];

$multi = $_POST["multi"];
$elev = $_POST["elev"];

$opcion = (int)$opcion;

$multi = (int)$multi;
$elev = (int)$elev;




//Determinante

function determinante($matrizA)
{
	$temporalA=($matrizA[1][1]*$matrizA[2][2]*$matrizA[3][3])+($matrizA[1][2]*$matrizA[2][3]*$matrizA[3][1])+($matrizA[1][3]*$matrizA[2][1]*$matrizA[3][2]);

	$temporalB=($matrizA[1][3]*$matrizA[2][2]*$matrizA[3][1])+($matrizA[1][1]*$matrizA[2][3]*$matrizA[3][2])+($matrizA[1][2]*$matrizA[2][1]*$matrizA[3][3]);

	$determinante=$temporalA-$temporalB;

return $determinante;
}




switch ($opcion)
{

	case '1':

		echo "El determinate es: ".determinante($matrizA);

		break;

	case '2': //Matriz Inversa

		$determinante = determinante($matrizA);
		if ($determinante != 0)
		{

			$matrizC[1][1] =  1*( ( $matrizA[2][2]*$matrizA[3][3] ) - ( $matrizA[2][3]*$matrizA[3][2] ) );
			$matrizC[1][2] = -1*( ( $matrizA[2][1]*$matrizA[3][3] ) - ( $matrizA[2][3]*$matrizA[3][1] ) );
			$matrizC[1][3] =  1*( ( $matrizA[2][1]*$matrizA[3][2] ) - ( $matrizA[2][2]*$matrizA[3][1] ) );
			$matrizC[2][1] = -1*( ( $matrizA[1][2]*$matrizA[3][3] ) - ( $matrizA[1][3]*$matrizA[3][2] ) );
			$matrizC[2][2] =  1*( ( $matrizA[1][1]*$matrizA[3][3] ) - ( $matrizA[1][3]*$matrizA[3][1] ) );
			$matrizC[2][3] = -1*( ( $matrizA[1][1]*$matrizA[3][2] ) - ( $matrizA[1][2]*$matrizA[3][1] ) );
			$matrizC[3][1] =  1*( ( $matrizA[1][2]*$matrizA[2][3] ) - ( $matrizA[1][3]*$matrizA[2][2] ) );
			$matrizC[3][2] = -1*( ( $matrizA[1][1]*$matrizA[2][3] ) - ( $matrizA[1][3]*$matrizA[2][1] ) );
			$matrizC[3][3] =  1*( ( $matrizA[1][1]*$matrizA[2][2] ) - ( $matrizA[1][2]*$matrizA[2][1] ) );

			for($lIncrementoX = 1; $lIncrementoX <= 3; $lIncrementoX++)
			{
				for ($lIncrementoY = 1; $lIncrementoY <= 3 ; $lIncrementoY++)
				{
					$matrizC[$lIncrementoX][$lIncrementoY] = $matrizC[$lIncrementoX][$lIncrementoY] * (1/$determinante);

				}
			}

			for($lIncrementoX = 1; $lIncrementoX <= 3; $lIncrementoX++)
			{
				for ($lIncrementoY = 1; $lIncrementoY <= 3 ; $lIncrementoY++)
				{
					echo "(".$matrizC[$lIncrementoY][$lIncrementoX].") ";

				}
				echo "<br>";
			}
		}else
		{
			echo "El determinante de la matriz es cero, la matriz es no invertible";
		}



		break;

	case '3': //Matriz Transpuesta

	for($lIncrementoX = 1; $lIncrementoX <= 3; $lIncrementoX++)
	{
		for ($lIncrementoY = 1; $lIncrementoY <= 3 ; $lIncrementoY++)
		{
			echo "(".$matrizA[$lIncrementoY][$lIncrementoX].") ";

		}
		echo "<br>";
	}

	break;

	case '4': //Multiplicar por

		echo "Matriz A multiplicada por: ".$multi."<br>";

		for($lIncrementoX = 1; $lIncrementoX <= 3; $lIncrementoX++)
		{
			for ($lIncrementoY = 1; $lIncrementoY <= 3 ; $lIncrementoY++)
			{
				echo "(".$matrizA[$lIncrementoX][$lIncrementoY]*$multi.")  ";
			}
				echo "<br>";
		}

		break;

	case '5': //Elevado Por

	$matrizB = $matrizA;

	for ($lIncremento = 1; $lIncremento <= $elev-1 ; $lIncremento++)
	{

		for($lIncrementoX = 1; $lIncrementoX <= 3; $lIncrementoX++)
		{
			for ($lIncrementoY = 1; $lIncrementoY <= 3 ; $lIncrementoY++)
			{
				$lIncrementoX1 = 1;
				$lIncrementoX2 = 2;
				$lIncrementoX3 = 3;
				$lIncrementoY1 = 1;
				$lIncrementoY2 = 2;
				$lIncrementoY3 = 3;

				$matrizC[$lIncrementoX][$lIncrementoY]=
				(
				( $matrizB[$lIncrementoX1][$lIncrementoY]*$matrizA[$lIncrementoX][$lIncrementoY1] )+
				( $matrizB[$lIncrementoX2][$lIncrementoY]*$matrizA[$lIncrementoX][$lIncrementoY2] )+
				( $matrizB[$lIncrementoX3][$lIncrementoY]*$matrizA[$lIncrementoX][$lIncrementoY3] )
				);
			}
		}

		$matrizB = $matrizC;
	}


	for($lIncrementoX = 1; $lIncrementoX <= 3; $lIncrementoX++)
	{
		for ($lIncrementoY = 1; $lIncrementoY <= 3 ; $lIncrementoY++)
		{
			echo "(".$matrizC[$lIncrementoX][$lIncrementoY].") ";

		}
		echo "<br>";
	}

		break;

	case '6': //(A+B)

		echo "La suma de (A+B):<br><br>";

		for($lIncrementoX = 1; $lIncrementoX <= 3; $lIncrementoX++)
		{
			for ($lIncrementoY = 1; $lIncrementoY <= 3 ; $lIncrementoY++)
			{
				$matrizC[$lIncrementoX][$lIncrementoY]=($matrizA[$lIncrementoX][$lIncrementoY])+($matrizB[$lIncrementoX][$lIncrementoY]);
			}
		}

		for($lIncrementoX = 1; $lIncrementoX <= 3; $lIncrementoX++)
		{
			for ($lIncrementoY = 1; $lIncrementoY <= 3 ; $lIncrementoY++)
			{
				echo "(".$matrizC[$lIncrementoX][$lIncrementoY].")  ";
			}
			echo "<br>";
		}

		break;

	case '7': //(A-B)

		for($lIncrementoX = 1; $lIncrementoX <= 3; $lIncrementoX++)
		{
			for ($lIncrementoY = 1; $lIncrementoY <= 3 ; $lIncrementoY++)
			{
				$matrizC[$lIncrementoX][$lIncrementoY]=($matrizA[$lIncrementoX][$lIncrementoY]-$matrizB[$lIncrementoX][$lIncrementoY]);
			}
		}

		for($lIncrementoX = 1; $lIncrementoX <= 3; $lIncrementoX++)
		{
			for ($lIncrementoY = 1; $lIncrementoY <= 3 ; $lIncrementoY++)
			{
				echo "(".$matrizC[$lIncrementoX][$lIncrementoY].")  ";
			}
			echo "<br>";
		}

		break;

	case '8': //(A*B)

		for($lIncrementoX = 1; $lIncrementoX <= 3; $lIncrementoX++)
		{
			for ($lIncrementoY = 1; $lIncrementoY <= 3 ; $lIncrementoY++)
			{
				$lIncrementoX1 = 1;
				$lIncrementoX2 = 2;
				$lIncrementoX3 = 3;
				$lIncrementoY1 = 1;
				$lIncrementoY2 = 2;
				$lIncrementoY3 = 3;

				$matrizC[$lIncrementoX][$lIncrementoY]=
				(
				( $matrizB[$lIncrementoX1][$lIncrementoY]*$matrizA[$lIncrementoX][$lIncrementoY1] )+
				( $matrizB[$lIncrementoX2][$lIncrementoY]*$matrizA[$lIncrementoX][$lIncrementoY2] )+
				( $matrizB[$lIncrementoX3][$lIncrementoY]*$matrizA[$lIncrementoX][$lIncrementoY3] )
				);
			}
		}

		for($lIncrementoX = 1; $lIncrementoX <= 3; $lIncrementoX++)
		{
			for ($lIncrementoY = 1; $lIncrementoY <= 3 ; $lIncrementoY++)
			{
				echo "(".$matrizC[$lIncrementoX][$lIncrementoY].") ";

			}
			echo "<br>";
		}

		break;


	default:
		# code...
		break;
}

 ?>
