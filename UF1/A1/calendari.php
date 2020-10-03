<!-- PRÀCTICA 1

Elabora una pàgina amb PHP que dibuixi el calendari del mes actual.
Guía:
    • Ho renderitzarem amb una taula de 6x7, i a la capçalera posarem el nom dels dies de la setmana. Comença per crear la taula i formatar correctament la primera fila dels dies de la setmana. 
    • La funció date() pot ser d'utilitat. 
    • Mira d'esbrinar quin dia de la setmana era el dia 1 del mes present, i a partir d'aquí omple la taula aidentment. 
ENTREGA:
    • Crea un repositori al teu usuari de GitHub. 
    • Carrega el codi realitzat. Xuleta d'ús del Git 
    • Entrega el link al teu projecte al professor.  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $hoy = date("D M j G:i:s T Y");
        
        $fechaParametros = date("l N F t");
        $dia = date("l");
        $diaNumero = date("N");
        $mes = date("F");
        $diasMes = date("t");
        $celdasVacias = date("N") -1;
        /* $semana1 = array();
        $semana2 = array();
        $semana3 = array();
        $semana4 = array();
        $semana5 = array(); */
        /* 
        l = Una representación textual completa del día de la semana 	Sunday hasta Saturday
        N = Representación numérica ISO-8601 del día de la semana (añadido en PHP 5.1.0)
        1 (para lunes) hasta 7 (para domingo)
        F = Una representación textual completa de un mes, como January o March
        t = Número de días del mes dado */
        echo $fechaParametros. "\n";
        echo $dia. "\n";

    ?>

    <table border="1">
    <tr><th colspan="7"><?php echo $mes; ?></th></tr>    
    <tr>
        <?php
        $dias = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        foreach ( $dias as $d ):
                ?>
                
                <th><?php echo $d ?></th>
                
        <?php
        endforeach;
        ?>
    </tr>
    <tr>
        <?php
        $j = 0;
        while ($j < $celdasVacias){
            ?>
            <td><?php echo "" ?></td>
            <?php
            $j++;
        }
        $numero = 0;
        while ($numero < $diasMes) {
            $i = 0;
            while ($i < 7){
                 
                
                // acabar el algoritmo
            $i++;
            }
            $numero++;
        }
        ?>
    </tr>

    
<!-- la representación numérica del dia de la semana ** $diaNumero = date("N");** menos 1, es el número de celdas que ha de imprimir vacias, después imprime hasta llegar al domingo
y cambia de tr hasta el número de dias que tenga el mes ** $diasMes = date("t"); ** 
Se podría hacer un array para cada semana, el array de la semana 1 se le imprimiran celdas vacias para desplazar el día uno al dia de la seman correspondiente-->

    </tr>    
    </table>
</body>
</html>



