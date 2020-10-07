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
    
    <!-- Algunos parámetros de la función date() 

        l = Una representación textual completa del día de la semana 	Sunday hasta Saturday
        N = Representación numérica ISO-8601 del día de la semana (añadido en PHP 5.1.0)
        1 (para lunes) hasta 7 (para domingo)
        F = Una representación textual completa de un mes, como January o March
        t = Número de días del mes dado 
 -->
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    <style>
        #diaActual {
            color: red;
        }
    </style>
</head>
    <body>
        <?php
            
            $diaActual = date('j'); /* Día del mes sin ceros iniciales 1 a 31 */
            $diasMes = date("t");  /* Número de días que tiene el mes */
            $mes = date("F");       /* Mes actual */
            $diaPrimero = date('N', strtotime('2020-10-01')); /*Para una fecha, devuelve el dia de la semana en formato número, Lunes =1,... Domingo =7. Devuelve un 4, que corresponde al Jueves*/
            $celdasVacias = $diaPrimero-1;/*Por tanto, las celdas vacias a añadir serán 3*/ 
        ?>

        <table border="0">
        <!-- primera fila: Imprime el mes actual -->
        <tr>
            <th colspan="7"><?php echo $mes; ?></th>
        </tr> 
        <!-- Segunda fila: Imprime los días de la semana recorriendo un array -->   
        <tr>
            <?php
            $dias = array("L", "M", "X", "J", "V", "S", "D");
            foreach ( $dias as $d ):
            ?>
                <th><?php echo $d ?></th>
                    
            <?php
            endforeach;
            ?>
        </tr>
        <!-- Resto de filas... -->
        <tr>
            <?php
            $j = 0;         /* Imprime 3 celdas vacias para situar el dia 1 en Jueves en la cuarta celda */
            while ($j < $celdasVacias){
                ?>
                <td><?php echo "" ?></td>
                <?php
                $j++;
            }

            $contCeldas = $celdasVacias;/* Esta variable controla en la columna que estamos imprimiendo */
            $numero = 1;    /* Inicializo el dia del mes */
            while ($numero <= $diasMes) {  /* Mientras no llegue a 31 */

                if ($contCeldas % 7 == 0)   {
                ?> 
                    </tr>    <!-- Cierra la fila porque ha completado una semana y      
                    abre la siguiente -->
                    <tr>
                <?php
                }
                if ($diaActual == $numero){  /* Imprime en rojo el día actual */
                ?>
                    <td id="diaActual">  <!-- Aplico un estilo para esta celda -->
                <?php         
                    echo $diaActual;
                ?>    
                </td> 
                <?php
                }else{
                ?>
                <td>  
                <?php  
                    echo $numero;
                        }    
                ?>
                </td>
                <?php
                $numero++;
                
                $contCeldas++;

            }
            ?>
            </tr>
        </tr>    
        </table>
    </body>
</html>



