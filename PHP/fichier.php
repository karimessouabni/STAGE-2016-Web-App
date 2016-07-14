<?php 
session_start() ;
$_SESSION['monnom'] = $_POST['monnom'];  // recuperation du nom deja saisie et laissé dans la case nom comme variable de session

?>
<?php
/*
 * AUSU jQuery-Ajax Autosuggest v1.0
 * Demo of a simple server-side request handler
 * Note: This is a very cumbersome code and should only be used as an example
 */

# Establish DB Connection


   // connexion a la BD
   include_once './includes/cnx.php' ;
  //requete 

                   

# Assign local variables

$id     =   @$_POST['id'];          // The id of the input that submitted the request.
$data   =   @$_POST['data'];        // The value of the textbox.
$oui =$_COOKIE["nom_cookie"] ;

$remplis =  $_SESSION['remplis'] ; 

echo " recherche de personnel avec le nom suivant : ".$_SESSION['monnom']  ;
echo 'Le cookie existe ' . $_COOKIE["nom_cookie"] . '!<br />'; 
if ($id && $data)
{
  if ($id=='prenom')
  

                                {   
                                    session_start();
                                    $mnnom =  $_SESSION['monnom'] ; 


                                     $query  = "SELECT id,civilite,nom,prenom
                                              FROM personnel
                                              WHERE prenom LIKE '$data%' and nom='$oui' 
                                              ";

                                    $result = mysql_query($query);

                                    $dataList = array();

                                    while ($row = mysql_fetch_array($result))
                                    {
                                        $toReturn   = $row['nom'];
                                        $dataList[] = '<table  style="background-color:black;" width =100 border="4"> 
                                        <tr> <li id="' .$row['id'] . '"><a href="#">' . htmlentities($toReturn) . '</a></li>
                                            <td width=40> Civilite<td/>
                                            <td width=400> Prenom<td/>
                                            <td width=400> Unite<td/>
                                            <td width=400> Fonction<td/>
                                        </tr>
                                        
                                        <tr>
                                           <td width=400> '.$row['nom'].'<td/>
                                            <td width=400> '.$row['prenom'].'<td/>
                                            <td width=400> '.$row['mail'].'<td/>
                                           
                                        </tr>
                                            </table> ';
                                    }

                                    if (count($dataList)>0)
                                    {
                                        $dataOutput = join("\r\n", $dataList);
                                        echo $dataOutput;
                                    }
                                    else
                                    {
                                        echo '<li><a href="#">No Results</a></li>';
                                    }
                                }
}
    else
{
    echo 'Request Error';
}

?>
