using System;

namespace Banco
{
    class Banco
    {
      /* Declaracio arrays */
        public static string[] usuari = new string[3];
        public static string[] dni = new string[3];
        public static float[] saldo = new float[3];

      /******** Declaracio de funcions *******/

      /* mostra el menú de usuari */
        public static void menuInici()
        {
          int opcio;
          bool EntrarMenu = true;
          while(EntrarMenu){  
            do
            {
              Console.WriteLine("MENÚ DE INICI");
              Console.WriteLine();
              Console.WriteLine("1. Alta usuari");
              Console.WriteLine("2. Ja sóc usuari");
              Console.WriteLine("3. Salir");
              Console.WriteLine();

              opcio = demanarOpcio();
              if (opcio <1 || opcio > 3)
                Console.WriteLine("opció incorrecta!");
            }
            while (opcio < 1 || opcio > 3);
/* Mentres la opció és incorrecta mostra el menú */
/* dintre del swhitch crida a cada funció o surt si la variable
EntrarMenu es false */
              switch(opcio){
                case 1:
                  altaUsuari(usuari);
                  break;
                case 2:
                  login();
                  break;
                case 3:
                  Console.WriteLine("Adeu!");
                  EntrarMenu = false;
                  break;           
                default:      
                  Console.WriteLine("Opció default");
                  break;
              }
          } 
          
        }
/* mostra el menú de operacions un cop l'usuari s'ha logat */
        public static void menuOperar(int index)
        {
          int opcio;
          bool EntrarMenu = true;
          while(EntrarMenu){  
            do
            {
              Console.WriteLine("MENÚ DE OPERACIONS");
              Console.WriteLine();
              Console.WriteLine("1. Ingrés");
              Console.WriteLine("2. Reintegrament");
              Console.WriteLine("3. Consulta de saldo");
              Console.WriteLine("4. Modificació dades d'usuari");
              Console.WriteLine("5. Consulta dades d'usuari");
              Console.WriteLine("6. Baixa d'usuari");
              Console.WriteLine("7. Salir");
              Console.WriteLine();
              opcio = demanarOpcio();
              if (opcio <1 || opcio > 7)
                Console.WriteLine("opció incorrecta!");
            }
            while (opcio < 1 || opcio > 7);
              switch(opcio){
                case 1:
                  ingres(saldo, index);
                  break;
                case 2:
                  reintegrament(saldo, index);
                  break;
                case 3:
                  consulta(saldo, index);
                  break;
                case 4:
                  modificarDades(usuari, dni, index);
                  break;
                case 5:
                  consultaDades(usuari, dni,saldo,index);
                  break;
                case 6:
                  baixa(usuari, dni,saldo,index);
                  break;  
                case 7:
                  Console.WriteLine("Adeu!");
                  Console.WriteLine();

                  EntrarMenu = false;
                  break;           
                default:      
                  Console.WriteLine("Opció default");
                  break;
              }
          }
          
        }
/* Sol·licita la opció de menú */
        public static int demanarOpcio()
        {
          int opcio;
          Console.Write("Quina operació vol realitzar? ");
          opcio = System.Convert.ToInt32(System.Console.ReadLine());
          return opcio;
        }
/* Sol·licita el DNI per logar-se, comprova si existeix  en el array dni i guarda el index. El index es farà servir en la resta d'operacions d'usuari, un cop s'hagi logat */
        public static int login()
        {
          string dniUsuari;
          int index=0;
          bool usuariExisteix = false;
          Console.Write("Introdueix el teu DNI... ");
          dniUsuari = Console.ReadLine();
          for (int i=0; i<3;i++){
            if (dni[i]==dniUsuari){
              usuariExisteix = true;
              index = i;
            }
          }/* Si el usuari existeix mostra el menu d'operacions */
          if (usuariExisteix){
              Console.WriteLine("Hola {0}",usuari[index]);
              Console.WriteLine();
              menuOperar(index);
            }else{
              Console.WriteLine("No existeis el DNI {0}",dniUsuari);
            }
          return index;
        }
/* dona d'alta un usuari. Recorre las posicions del string usuari i si troba contingut en les posicions incrementa un contador. D'aquesta manera sap en quina posició ha d'escriure el nou usuari. Si el cont=3 vol dir que l'array està ple i no pot donar de alta mes usuaris  */        

        public static void altaUsuari(string[] usuari)
        {
          /* Comprueba cuantos usuarios tiene el banco */
          int cont = 0;
          bool usuariExisteix = false;
          string dniUsuari;
          float saldoInicial;
          
          foreach(string u in usuari){
            if (u!=null){
              cont++;
            }
          }
          if (cont < 3){
            Console.WriteLine("Introdueix el tu nom");
            usuari[cont]=Console.ReadLine();
            Console.WriteLine("nou usuari {0}",usuari[cont]);
            Console.WriteLine();
            Console.WriteLine("Introdueix el teu DNI");
            dniUsuari=Console.ReadLine();
/* Comprova si existeix el usuari buscant el DNI. Si existeix el reenvia al menu de inici. Sino existeix el dona d'alta i demana el saldo inicial */

          foreach(string u in dni){
            if (u==dniUsuari){
              usuariExisteix = true;
            }
          }
          if (usuariExisteix){
              Console.WriteLine("El DNI {0} ja existeix",dniUsuari);
              Console.WriteLine();
              menuInici();
          }else{
              dni[cont]=dniUsuari;
              Console.WriteLine("nou usuari amb DNI {0}",dni[cont]);
              Console.WriteLine();
          }
/* Comprova si el saldo no és superior a 1000€ */            
            Console.WriteLine("Introdueix el teu saldo inicial");
            saldoInicial=Convert.ToSingle(Console.ReadLine());
            if (saldoInicial<=1000){
              saldo[cont]=saldoInicial;
              Console.WriteLine("tu saldo incial es {0}",saldo[cont]);
              Console.WriteLine();
            }else{
              Console.WriteLine("noo puedes ingresar más de 1000€");
              Console.WriteLine();
            }
          }else{
            Console.WriteLine("máximo número de usuarios");
            Console.WriteLine();
          }
        }
/* Fa un ingrés en el compte de l'usuari logat sempre que la quantita sigui inferior a 1000€ */
        public static void ingres(float[] saldo, int index){

          float euros;
          Console.WriteLine("Quant vas a ingressar?");
          euros=Convert.ToSingle(Console.ReadLine());
          if (euros < 1000){
            saldo[index] += euros;
            Console.WriteLine("El teu saldo es de {0}",saldo[index]);
            Console.WriteLine();
          }else{
            Console.WriteLine("No pots ingresar més de 1000€");
            Console.WriteLine();
          }  
        }
/* Consulta el saldo de l'usuari logat, agafant com a parámetre el index i el array saldo */
        public static void consulta(float[] saldo, int index){

          float saldoActual=0f;
          saldoActual = saldo[index];
          Console.WriteLine("El teu saldo actual es {0}",saldoActual);
        }
/* Fa el reintegrament de la quantitat sol·licitada sempre que no sigui superior al saldo actual */
        public static void reintegrament(float[] saldo, int index){

          float euros;
          Console.WriteLine("Quant vols retirar?");
          euros=Convert.ToSingle(Console.ReadLine());
          if (euros <= saldo[index]){
            saldo[index] -= euros;
            Console.WriteLine("El teu saldo es de {0}",saldo[index]);
            Console.WriteLine();
          }else{
            Console.WriteLine("Saldo insuficient, no pots treure més de la quantitat que tens");
          }
        }
/* modifica les dades de l'usuari, osigui, el nom i el dni. Es passen el arrays com a paràmetres */
        public static void modificarDades(string[] usuari, string[] dni ,int index){

          string nomUsuari;
          string dniUsuari;
          
          Console.WriteLine("Indica el nou nom..");
          nomUsuari = Console.ReadLine();
          usuari[index] = nomUsuari;
          Console.WriteLine("El teu nou nom és {0}",usuari[index]);
          Console.WriteLine();
          Console.WriteLine("Indica el nou DNI..");
          dniUsuari= Console.ReadLine();
          dni[index] = dniUsuari;
          Console.WriteLine("El teu nou DNI és de {0}",dni[index]);
          Console.WriteLine();
        }
/* Consulta les dades de l'usuari* fent servir els 3 arrays que defineixen a l'usuari i el index que l'identifica */
        public static void consultaDades(string[] usuari, string[] dni, float[] saldo, int index){

          Console.WriteLine("El teu usuari actual es {0}, el teu DNI es {1} i el teu saldo és {2}",usuari[index],dni[index], saldo[index]);
          Console.WriteLine();
        }
/* Dona de baixa a l'usuari esborrant les posicions indicades per l'index */
        public static void baixa(string[] usuari, string[] dni, float[] saldo, int index){

          usuari[index]=null;
          dni[index]=null;
          saldo[index]=0;
          Console.WriteLine("El teu usuari a sigut donat de baixa");
          Console.WriteLine();
        }

/* ********************************************************** */
/* ******************* Main ********************************* */
/* ********************************************************** */
        static void Main(string[] args)
        {
/* Crida al menu d'inici per començar el programa */            
            menuInici();
          
              

        }
    }
}